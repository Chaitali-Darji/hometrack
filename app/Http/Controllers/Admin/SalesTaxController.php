<?php 

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Controllers\BaseController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\SalesTax;
use App\Http\Requests\Admin\SalesTaxRequest;
use Redirect;
use Session;
use App\Repositories\SalesTax\SalesTaxRepository;

class SalesTaxController extends BaseController {

    private $salesTaxRepository;
    private $state;
    private $salesTax;

    public function __construct(SalesTaxRepository $salesTaxRepository, State $state, SalesTax $salesTax)
   {
       $this->salesTaxRepository = $salesTaxRepository;
       $this->state = $state;
       $this->salesTax = $salesTax;
   }

    /**
     * Display a listing of sales tax
     *
     * @return Response
     */
    public function index()
    {
        $salestaxes = $this->salesTaxRepository->all();
        $archive_data = $this->salesTaxRepository->trashAll();
        return view('admin.sales-tax.index', compact('salestaxes','archive_data'));
    }

    /**
     * Show the form for creating a new sales tax
     *
     * @return Response
     */
    public function create()
    {
        $states = $this->state->orderBy('name')->pluck('name', 'id');
        return view('admin.sales-tax.add-edit', compact('states'));
    }

    /**
     * Store a newly created sales tax in storage.
     *
     * @return Response
     */
    public function store(SalesTaxRequest $salestaxRequest)
    {
        if(!$salestax = $this->salesTaxRepository->create($salestaxRequest->salestax)){
            Session::flash(config('constants.ERROR_STATUS'), trans('response.try_again'));
            return redirect()->route('sales-tax.index');
        }
        Session::flash(config('constants.SUCCESS_STATUS'), trans('response.store',['module' => SalesTax::MODULE_NAME]));
        return Redirect::route('sales-tax.index');
    }

    /**
     * Show the form for editing the sales tax.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        if(!$salestax = $this->salesTaxRepository->find($id)){
            Session::flash(config('constants.ERROR_STATUS'), trans('response.not_found',['module' => SalesTax::MODULE_NAME]));
            return redirect()->route('sales-tax.index');
        }
        $states = $this->state->pluck('name', 'id');
        return view('admin.sales-tax.add-edit', compact('salestax','states'));
    }

    /**
     * Update the sales tax resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function update($id, SalesTaxRequest $salestaxRequest)
    {
        if($this->salesTaxRepository->updateSalesTax($id,$salestaxRequest)){
            Session::flash(config('constants.SUCCESS_STATUS'),  trans('response.update',['module' => SalesTax::MODULE_NAME]));
        }
        else{
            Session::flash(config('constants.ERROR_STATUS'), trans('response.try_again'));   
        }
        return redirect()->route('sales-tax.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->salesTaxRepository->delete($id)){
            return response()->json([
                'status' => config('constants.SUCCESS_STATUS'),
                'message' => trans('response.delete',['module' => SalesTax::MODULE_NAME])
            ]);
        }
        return response()->json([
            'status' => config('constants.ERROR_STATUS'),
            'message' => trans('response.try_again')
        ]);
    }


    public function activeInactive($id){

        if (! $role = $this->salesTaxRepository->find($id)) {
            return response()->json([
                'status' => config('constants.ERROR_STATUS'),
                'message' => trans('response.not_found',['module' => SalesTax::MODULE_NAME])
            ]);
        }

        if($role->is_active){
            $this->salesTaxRepository->update($id,['is_active' => 0]);

            return response()->json([
                'status' => config('constants.SUCCESS_STATUS'),
                'message' => trans('response.disabled',['module' => SalesTax::MODULE_NAME])
            ]);
        }
        else{
            $this->salesTaxRepository->update($id,['is_active' => 1]);

            return response()->json([
                'status' => config('constants.SUCCESS_STATUS'),
                'message' => trans('response.enabled',['module' => SalesTax::MODULE_NAME])
            ]);
        }
    }
}