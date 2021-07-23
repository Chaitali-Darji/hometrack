<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\PricingRequest;
use App\Models\Pricing;
use App\Models\Service;
use App\Models\SpecialPricingColumn;
use App\Models\SpecialPricing;
use App\Repositories\Pricing\PricingRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Redirect;
use Session;
use View;

class PricingController extends BaseController {

    private $pricingRepository;
    private $pricing;
    private $service;
    private $special_pricing_column;
    private $special_pricing;

    public function __construct(PricingRepository $pricingRepository, Pricing $pricing, Service $service, SpecialPricingColumn $special_pricing_column, SpecialPricing $special_pricing)
   {
       $this->pricingRepository = $pricingRepository;
       $this->pricing = $pricing;
       $this->service = $service;
       $this->special_pricing_column = $special_pricing_column;
       $this->special_pricing = $special_pricing;
   }

    /**
     * Display a listing of pricing
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $pricing = $this->pricingRepository->paginate();
            return View::make('admin.pricing.list', compact('pricing'));
        }
        $archive_data = $this->pricingRepository->trashAll();
        return view('admin.pricing.index', compact('archive_data'));
    }

    /**
     * Show the form for creating a new pricing
     *
     * @return Response
     */
    public function create()
    {
        $services = $this->service->get()->pluck('name', 'id');
        $special_pricing_columns = $this->special_pricing_column->pluck('name', 'id');
        return view('admin.pricing._add-edit-modal', compact('services','special_pricing_columns'));
    }

    /**
     * Store a newly created pricing in storage.
     *
     * @return Response
     */
    public function store(PricingRequest $pricingRequest)
    {
        $data = $pricingRequest->pricing;
        $pricing = $this->pricingRepository->create($data);

        foreach ($pricingRequest->special_pricing as $key => $val){
            $this->special_pricing->create(['service_pricing_id' => $pricing->id , 'special_pricing_id' => $key, 'price' => $val]);
        }

        Session::flash(config('constants.SUCCESS_STATUS'), trans('response.store',['module' => Pricing::MODULE_NAME]));
        return Redirect::route('pricing.index');
    }

    /**
     * Show the form for editing the client.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        if(!$pricing = $this->pricingRepository->find($id)){
            Session::flash(config('constants.ERROR_STATUS'), trans('response.not_found',['module' => Pricing::MODULE_NAME]));
            return redirect()->route('clients.index');
        }
        $services = $this->service->get()->pluck('name', 'id');
        $special_pricing_columns = $this->special_pricing_column->pluck('name', 'id');
        return view('admin.pricing._add-edit-modal', compact('pricing','services','special_pricing_columns'));
    }

    /**
     * Update the client resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function update($id, PricingRequest $pricingRequest)
    {
        $data = $pricingRequest->pricing;
        if ($this->pricingRepository->update($id, $data)) {

            $this->special_pricing->where('service_pricing_id' , $id)->delete();
            foreach ($pricingRequest->special_pricing as $key => $val){
                $this->special_pricing->create(['service_pricing_id' => $id , 'special_pricing_id' => $key, 'price' => $val]);
            }

            Session::flash(config('constants.SUCCESS_STATUS'),  trans('response.update',['module' => Pricing::MODULE_NAME]));
        }
        else{
            Session::flash(config('constants.ERROR_STATUS'), trans('response.try_again'));
        }
        return redirect()->route('pricing.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->pricingRepository->delete($id)){
            return response()->json([
                'status' => config('constants.SUCCESS_STATUS'),
                'message' => trans('response.delete',['module' => Pricing::MODULE_NAME])
            ]);
        }
        return response()->json([
            'status' => config('constants.ERROR_STATUS'),
            'message' => trans('response.try_again')
        ]);
    }


    public function activeInactive($id){

        if (! $pricing = $this->pricingRepository->find($id)) {
            return response()->json([
                'status' => config('constants.ERROR_STATUS'),
                'message' => trans('response.not_found',['module' => Pricing::MODULE_NAME])
            ]);
        }

        $this->pricingRepository->update($id,['is_active' => ($pricing->is_active) ? 0 : 1]);
        return response()->json([
            'status' => config('constants.SUCCESS_STATUS'),
            'message' => trans(($pricing->is_active) ? 'response.disabled' : 'response.enabled',['module' => Pricing::MODULE_NAME])
        ]);
    }
}
