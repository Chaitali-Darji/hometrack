<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ServiceTypeRequest;
use App\Models\ServiceType;
use App\Models\Service;
use App\Models\ServicePhoto;
use App\Repositories\ServiceType\ServiceTypeRepository;
use Carbon\Carbon;
use App\Http\Controllers\BaseController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Redirect;
use Session;
use App\Models\Region;
use App\Repositories\Region\RegionRepository;
use App\Repositories\Service\ServiceRepository;
use App\Http\Requests\Admin\ServiceRequest;

class ServicesController extends BaseController
{

    private $region;
    /**
     * @var ServiceTypeRepository
     */
    private $serviceTypeRepository;
    /**
     * @var ServiceType
     */
    private $serviceType;
    /**
     * @var RegionRepository
     */
    private $regionRepository;
    /**
     * @var ServiceRepository
     */
    private $serviceRepository;
    /**
     * @var Service
     */
    private $service;
    /**
     * @var ServicePhoto
     */
    private $servicePhoto;

    public function __construct(RegionRepository $regionRepository,
                                Region $region,
                                ServiceTypeRepository $serviceTypeRepository,
                                ServiceType $serviceType,
                                ServiceRepository $serviceRepository,
                                Service $service,
                                ServicePhoto $servicePhoto)
    {
        $this->serviceTypeRepository = $serviceTypeRepository;
        $this->serviceType = $serviceType;
        $this->regionRepository = $regionRepository;
        $this->region = $region;
        $this->serviceRepository = $serviceRepository;
        $this->service = $service;
        $this->servicePhoto = $servicePhoto;
    }

    /**
     * Display a listing of regions
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $services = $this->serviceRepository->paginate();
            return view('admin.services.list', compact('services'));
        }
        $archive_data = $this->serviceRepository->trashAll();
        return view('admin.services.index', compact('archive_data'));
    }

    /**
     * Show the form for creating a new serviceType
     *
     * @return Response
     */
    public function create()
    {
        $service_types = $this->serviceType->pluck('name','id')->toArray();
        $regions = $this->region->pluck('name','id')->toArray();
        return view('admin.services.add-edit',compact('service_types','regions'));
    }

    /**
     * Store a newly created region in storage.
     *
     * @return Response
     */
    public function store(ServiceRequest $serviceRequest)
    {
        if($serviceRequest->display_icon){
            $imageName = time().Str::random(5).'.'.$serviceRequest->display_icon->extension();
            $serviceRequest->display_icon->move(config('constants.SERVICE_IMAGE_PATH'), $imageName);
            $display_icon = $imageName;
        }

        if ($service = $this->serviceRepository->create($serviceRequest->service+ ['check_lists' => json_encode($serviceRequest->check_lists),
                'parent_id' => 0,
                'display_icon' => $display_icon ?? null,
                'region_id' => implode(',',$serviceRequest->region_id)])) {

            if($serviceRequest->photos) {
                foreach ($serviceRequest->photos as $photo) {
                    $imageName = time() . Str::random(5) . '.' . $photo['image_name']->extension();
                    $photo['image_name']->move(config('constants.SERVICE_IMAGE_PATH'), $imageName);

                    $service->photos()->create([
                        'image_name' => $imageName
                    ]);
                }
            }

            Session::flash(config('constants.SUCCESS_STATUS'), trans('response.store', ['module' => Service::MODULE_NAME]));
        } else {
            Session::flash(config('constants.ERROR_STATUS'), trans('response.try_again'));
        }
        return Redirect::route('services.index');
    }

    /**
     * Show the form for editing the service.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        if(!$service = $this->serviceRepository->find($id)){
            Session::flash(config('constants.ERROR_STATUS'), trans('response.not_found',['module' => Service::MODULE_NAME]));
            return redirect()->route('services.index');
        }
        $service_types = $this->serviceType->pluck('name','id')->toArray();
        $regions = $this->region->pluck('name','id')->toArray();
        $photos = $this->servicePhoto->where('service_id',$id)->get();

        return view('admin.services.add-edit', compact('service','service_types','regions','photos'));
    }

    /**
     * Update the role resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function update($id, ServiceRequest $serviceRequest)
    {
        if($serviceRequest->display_icon){
            $imageName = time().Str::random(5).'.'.$serviceRequest->display_icon->extension();
            $serviceRequest->display_icon->move(config('constants.SERVICE_IMAGE_PATH'), $imageName);
            $display_icon = $imageName;
        }

        if($this->serviceRepository->update($id,$serviceRequest->service+ ['check_lists' => json_encode($serviceRequest->check_lists),
                'parent_id' => 0,
                'display_icon' => $display_icon ?? null,
                'region_id' => implode(',',$serviceRequest->region_id)])){

            $hidden_photos = [];

            if($serviceRequest->photos) {
                foreach ($serviceRequest->photos as $photo) {
                    if(isset($photo['image_name_hidden'])){
                        $hidden_photos[] = $photo['image_name_hidden'];
                    }
                }

                $this->servicePhoto->whereNotIn('image_name',$hidden_photos)->delete();

                foreach ($serviceRequest->photos as $photo) {

                    if(isset($photo['image_name'])) {
                        $imageName = time() . Str::random(5) . '.' . $photo['image_name']->extension();
                        $photo['image_name']->move(config('constants.SERVICE_IMAGE_PATH'), $imageName);
                        $this->service->find($id)->photos()->create([
                            'image_name' => $imageName
                        ]);
                    }
                }
            }

            Session::flash(config('constants.SUCCESS_STATUS'),  trans('response.update',['module' => Service::MODULE_NAME]));
        }
        else{
            Session::flash(config('constants.ERROR_STATUS'), trans('response.try_again'));
        }
        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->serviceRepository->delete($id)){
            return response()->json([
                'status' => config('constants.SUCCESS_STATUS'),
                'message' => trans('response.delete',['module' => Service::MODULE_NAME])
            ]);
        }
        return response()->json([
            'status' => config('constants.ERROR_STATUS'),
            'message' => trans('response.try_again')
        ]);
    }


    public function activeInactive($id){

        if (! $service = $this->serviceRepository->find($id)) {
            return response()->json([
                'status' => config('constants.ERROR_STATUS'),
                'message' => trans('response.not_found',['module' => Service::MODULE_NAME])
            ]);
        }

        $this->serviceRepository->update($id,['is_active' => ($service->is_active) ? 0 : 1]);
        return response()->json([
            'status' => config('constants.SUCCESS_STATUS'),
            'message' => trans(($service->is_active) ? 'response.disabled' : 'response.enabled',['module' => Service::MODULE_NAME])
        ]);
    }

    public  function updateOrder(Request $request){
        foreach ($request->service_order as $key => $order){
            $this->serviceRepository->update($order, [
                    'sort' => $key]);
        }
        return response()->json([
            'status' => config('constants.SUCCESS_STATUS'),
            'message' => trans('response.update',['module' => Service::MODULE_NAME])
        ]);
    }
}
