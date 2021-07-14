<?php 

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Controllers\BaseController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\ServiceType;
use App\Http\Requests\Admin\ServiceTypeRequest;
use Redirect;
use Session;
use App\Repositories\ServiceType\ServiceTypeRepository;

class ServiceTypeController extends BaseController {

    private $serviceTypeRepository;
    private $serviceType;

    public function __construct(ServiceTypeRepository $serviceTypeRepository, serviceType $serviceType)
   {
       $this->serviceTypeRepository = $serviceTypeRepository;
       $this->serviceType = $serviceType;
   }

    /**
     * Display a listing of regions
     *
     * @return Response
     */
    public function index()
    {
        $service_types = $this->serviceTypeRepository->all();
        $archive_data = $this->serviceTypeRepository->trashAll();
        return view('admin.service-types.index', compact('service_types','archive_data'));
    }

    /**
     * Show the form for creating a new serviceType
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.service-types.add-edit');
    }

    /**
     * Store a newly created region in storage.
     *
     * @return Response
     */
    public function store(ServiceTypeRequest $serviceTypeRequest)
    {

        if($this->serviceTypeRepository->create($serviceTypeRequest->service_type)){
            Session::flash(config('constants.SUCCESS_STATUS'),  trans('response.store',['module' => ServiceType::MODULE_NAME]));
        }
        else{
            Session::flash(config('constants.ERROR_STATUS'), trans('response.try_again'));   
        }

        return Redirect::route('services.index');
    }

    /**
     * Show the form for editing the region.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        if(!$service_type = $this->serviceTypeRepository->find($id)){
            Session::flash(config('constants.ERROR_STATUS'), trans('response.not_found',['module' => ServiceType::MODULE_NAME]));
            return redirect()->route('services.index');
        }
        return view('admin.service-types.add-edit', compact('service_type'));
    }

    /**
     * Update the service-types resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function update($id, ServiceTypeRequest $serviceTypeRequest)
    {
        if($this->serviceTypeRepository->update($id,$serviceTypeRequest->service_type)){
            Session::flash(config('constants.SUCCESS_STATUS'),  trans('response.update',['module' => ServiceType::MODULE_NAME]));
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
        if($this->serviceTypeRepository->delete($id)){
            return response()->json([
                'status' => config('constants.SUCCESS_STATUS'),
                'message' => trans('response.delete',['module' => ServiceType::MODULE_NAME])
            ]);
        }
        return response()->json([
            'status' => config('constants.ERROR_STATUS'),
            'message' => trans('response.try_again')
        ]);
    }


    public function activeInactive($id){

        if (! $serviceType = $this->serviceTypeRepository->find($id)) {
            return response()->json([
                'status' => config('constants.ERROR_STATUS'),
                'message' => trans('response.not_found',['module' => ServiceType::MODULE_NAME])
            ]);
        }

        $this->serviceTypeRepository->update($id,['is_active' => ($serviceType->is_active) ? 0 : 1]);
        return response()->json([
            'status' => config('constants.SUCCESS_STATUS'),
            'message' => trans(($serviceType->is_active) ? 'response.disabled' : 'response.enabled',['module' => ServiceType::MODULE_NAME])
        ]);
    }
}