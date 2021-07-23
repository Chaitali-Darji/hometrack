<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Controllers\BaseController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\SpecialPricingColumn;
use App\Http\Requests\Admin\SpecialPricingColumnRequest;
use Redirect;
use Session;
use App\Repositories\SpecialPricingColumn\SpecialPricingColumnRepository;

class SpecialPricingColumnController extends BaseController {

    private $specialPricingColumnRepository;
    private $specialPricing;

    public function __construct(SpecialPricingColumnRepository $specialPricingColumnRepository, SpecialPricingColumn $specialPricing)
   {
       $this->specialPricingColumnRepository = $specialPricingColumnRepository;
       $this->specialPricing = $specialPricing;
   }

    /**
     * Display a listing of special Pricing column
     *
     * @return Response
     */
    public function index()
    {
        $specialPricingColumns = $this->specialPricingColumnRepository->all();
        $archive_data = $this->specialPricingColumnRepository->trashAll();
        return view('admin.special-pricing-columns.index', compact('specialPricingColumns','archive_data'));
    }

    /**
     * Show the form for creating a new special Pricing column
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.special-pricing-columns._add-edit-modal');
    }

    /**
     * Store a newly created special Pricing column in storage.
     *
     * @return Response
     */
    public function store(SpecialPricingColumnRequest $specialPricingColumnRequest)
    {

        if($this->specialPricingColumnRepository->create($specialPricingColumnRequest->special_pricing_column)){
            Session::flash(config('constants.SUCCESS_STATUS'),  trans('response.store',['module' => SpecialPricingColumn::MODULE_NAME]));
        }
        else{
            Session::flash(config('constants.ERROR_STATUS'), trans('response.try_again'));
        }

        return Redirect::route('special-pricing-columns.index');
    }

    /**
     * Show the form for editing the special Pricing column.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        if(!$special_pricing_column = $this->specialPricingColumnRepository->find($id)){
            Session::flash(config('constants.ERROR_STATUS'), trans('response.not_found',['module' => SpecialPricingColumn::MODULE_NAME]));
            return redirect()->route('special-pricing-columns.index');
        }
        return view('admin.special-pricing-columns._add-edit-modal', compact('special_pricing_column'));
    }

    /**
     * Update the special Pricing column resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function update($id, SpecialPricingColumnRequest $specialPricingColumnRequest)
    {
        if($this->specialPricingColumnRepository->update($id,$specialPricingColumnRequest->special_pricing_column)){
            Session::flash(config('constants.SUCCESS_STATUS'),  trans('response.update',['module' => SpecialPricingColumn::MODULE_NAME]));
        }
        else{
            Session::flash(config('constants.ERROR_STATUS'), trans('response.try_again'));
        }
        return redirect()->route('special-pricing-columns.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->specialPricingColumnRepository->delete($id)){
            return response()->json([
                'status' => config('constants.SUCCESS_STATUS'),
                'message' => trans('response.delete',['module' => SpecialPricingColumn::MODULE_NAME])
            ]);
        }
        return response()->json([
            'status' => config('constants.ERROR_STATUS'),
            'message' => trans('response.try_again')
        ]);
    }


    public function activeInactive($id){

        if (! $specialPricingColumn = $this->specialPricingColumnRepository->find($id)) {
            return response()->json([
                'status' => config('constants.ERROR_STATUS'),
                'message' => trans('response.not_found',['module' => SpecialPricingColumn::MODULE_NAME])
            ]);
        }

        $this->specialPricingColumnRepository->update($id,['is_active' => ($specialPricingColumn->is_active) ? 0 : 1]);
        return response()->json([
            'status' => config('constants.SUCCESS_STATUS'),
            'message' => trans(($specialPricingColumn->is_active) ? 'response.disabled' : 'response.enabled',['module' => SpecialPricingColumn::MODULE_NAME])
        ]);
    }
}
