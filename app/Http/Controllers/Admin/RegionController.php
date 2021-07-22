<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Controllers\BaseController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Region;
use App\Http\Requests\Admin\RegionRequest;
use Redirect;
use Session;
use App\Repositories\Region\RegionRepository;

class RegionController extends BaseController {

    private $regionRepository;
    private $region;

    public function __construct(RegionRepository $regionRepository, Region $region)
   {
       $this->regionRepository = $regionRepository;
       $this->region = $region;
   }

    /**
     * Display a listing of regions
     *
     * @return Response
     */
    public function index()
    {
        $regions = $this->regionRepository->all();
        $archive_data = $this->regionRepository->trashAll();
        return view('admin.regions.index', compact('regions','archive_data'));
    }

    /**
     * Show the form for creating a new region
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.regions._add-edit-modal');
    }

    /**
     * Store a newly created region in storage.
     *
     * @return Response
     */
    public function store(RegionRequest $regionRequest)
    {

        if($this->regionRepository->create($regionRequest->region)){
            Session::flash(config('constants.SUCCESS_STATUS'),  trans('response.store',['module' => Region::MODULE_NAME]));
        }
        else{
            Session::flash(config('constants.ERROR_STATUS'), trans('response.try_again'));
        }

        return Redirect::route('regions.index');
    }

    /**
     * Show the form for editing the region.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        if(!$region = $this->regionRepository->find($id)){
            Session::flash(config('constants.ERROR_STATUS'), trans('response.not_found',['module' => Region::MODULE_NAME]));
            return redirect()->route('regions.index');
        }
        return view('admin.regions._add-edit-modal', compact('region'));
    }

    /**
     * Update the region resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function update($id, RegionRequest $regionRequest)
    {
        if($this->regionRepository->update($id,$regionRequest->region)){
            Session::flash(config('constants.SUCCESS_STATUS'),  trans('response.update',['module' => Region::MODULE_NAME]));
        }
        else{
            Session::flash(config('constants.ERROR_STATUS'), trans('response.try_again'));
        }
        return redirect()->route('regions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->regionRepository->delete($id)){
            return response()->json([
                'status' => config('constants.SUCCESS_STATUS'),
                'message' => trans('response.delete',['module' => Region::MODULE_NAME])
            ]);
        }
        return response()->json([
            'status' => config('constants.ERROR_STATUS'),
            'message' => trans('response.try_again')
        ]);
    }


    public function activeInactive($id){

        if (! $region = $this->regionRepository->find($id)) {
            return response()->json([
                'status' => config('constants.ERROR_STATUS'),
                'message' => trans('response.not_found',['module' => Region::MODULE_NAME])
            ]);
        }

        $this->regionRepository->update($id,['is_active' => ($region->is_active) ? 0 : 1]);
        return response()->json([
            'status' => config('constants.SUCCESS_STATUS'),
            'message' => trans(($region->is_active) ? 'response.disabled' : 'response.enabled',['module' => Region::MODULE_NAME])
        ]);
    }

    /**
     * Show the form for get all regions
     *
     * @return Response
     */
    public function getDropdownList()
    {
        $regions = $this->region->pluck('name','id')->toArray();
        $region = $this->region->latest()->first();

        return view('admin.regions._get-dropdown-list',compact('regions','region'));
    }
}
