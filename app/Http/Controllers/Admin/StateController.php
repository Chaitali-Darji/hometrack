<?php 

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Controllers\BaseController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\State;
use App\Http\Requests\Admin\StateRequest;
use Redirect;
use Session;
use App\Repositories\State\StateRepository;

class StateController extends BaseController {

    private $stateRepository;
    private $state;

    public function __construct(StateRepository $stateRepository, State $state)
   {
       $this->stateRepository = $stateRepository;
       $this->state = $state;
   }

    /**
     * Display a listing of State
     *
     * @return Response
     */
    public function index()
    {
        $states = $this->stateRepository->all();
        $archive_data = $this->stateRepository->trashAll();
        return view('admin.states.index', compact('states','archive_data'));
    }

    /**
     * Show the form for creating a new State
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.states.add-edit');
    }

    /**
     * Store a newly created State in storage.
     *
     * @return Response
     */
    public function store(StateRequest $stateRequest)
    {
        if(!$state = $this->stateRepository->create($stateRequest->state)){
            Session::flash(config('constants.ERROR_STATUS'), trans('response.try_again'));
            return redirect()->route('states.index');
        }
        Session::flash(config('constants.SUCCESS_STATUS'), trans('response.store',['module' => State::MODULE_NAME]));
        return Redirect::route('states.index');
    }

    /**
     * Show the form for editing the State.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        if(!$state = $this->stateRepository->find($id)){
            Session::flash(config('constants.ERROR_STATUS'), trans('response.not_found',['module' => State::MODULE_NAME]));
            return redirect()->route('states.index');
        }
        return view('admin.states.add-edit', compact('state'));
    }

    /**
     * Update the State resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function update($id, StateRequest $stateRequest)
    {
        if($this->stateRepository->update($id,$stateRequest->state)){
            Session::flash(config('constants.SUCCESS_STATUS'),  trans('response.update',['module' => State::MODULE_NAME]));
        }
        else{
            Session::flash(config('constants.ERROR_STATUS'), trans('response.try_again'));   
        }
        return redirect()->route('states.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->stateRepository->delete($id)){
            return response()->json([
                'status' => config('constants.SUCCESS_STATUS'),
                'message' => trans('response.delete',['module' => State::MODULE_NAME])
            ]);
        }
        return response()->json([
            'status' => config('constants.ERROR_STATUS'),
            'message' => trans('response.try_again')
        ]);
    }


    public function activeInactive($id){

        if (! $state = $this->stateRepository->find($id)) {
            return response()->json([
                'status' => config('constants.ERROR_STATUS'),
                'message' => trans('response.not_found',['module' => State::MODULE_NAME])
            ]);
        }

        if($state->is_active){
            $this->stateRepository->update($id,['is_active' => 0]);

            return response()->json([
                'status' => config('constants.SUCCESS_STATUS'),
                'message' => trans('response.disabled',['module' => State::MODULE_NAME])
            ]);
        }
        else{
            $this->stateRepository->update($id,['is_active' => 1]);

            return response()->json([
                'status' => config('constants.SUCCESS_STATUS'),
                'message' => trans('response.enabled',['module' => State::MODULE_NAME])
            ]);
        }
    }
}