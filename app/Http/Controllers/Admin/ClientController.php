<?php 

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Controllers\BaseController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Requests\Admin\ClientRequest;
use Redirect;
use Session;
use App\Repositories\Client\ClientRepository;

class ClientController extends BaseController {

    private $clientRepository;
    private $client;
   
    public function __construct(ClientRepository $clientRepository, Client $client)
   {
       $this->clientRepository = $clientRepository;
       $this->client = $client;
   }

    /**
     * Display a listing of users
     *
     * @return Response
     */
    public function index()
    {
        $clients = $this->clientRepository->all();
        $archive_data = $this->clientRepository->trashAll();
        return view('admin.clients.index', compact('clients','archive_data'));
    }

    /**
     * Show the form for creating a new user
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.clients.add-edit');
    }

    /**
     * Store a newly created user in storage.
     *
     * @return Response
     */
    public function store(ClientRequest $clientRequest)
    {
        $client = $this->clientRepository->create($clientRequest->client);
        Session::flash(config('constants.SUCCESS_STATUS'), trans('response.store',['module'=>'Client']));
        return Redirect::route('clients.index');
    }

    /**
     * Show the form for editing the user.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $client = $this->clientRepository->find($id);
        return view('admin.clients.add-edit', compact('client'));
    }

    /**
     * Update the user resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function update($id, ClientRequest $clientRequest)
    {
        if($this->clientRepository->update($id,$clientRequest->client)){
            Session::flash(config('constants.SUCCESS_STATUS'),  trans('response.update',['module'=>'Client']));
        }
        else{
            Session::flash(config('constants.ERROR_STATUS'), trans('response.try_again'));  
        }
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->clientRepository->delete($id)){
            return response()->json([
                'status' => config('constants.SUCCESS_STATUS'),
                'message' => trans('response.delete',['module'=>'Client'])
            ]);
        }
        return response()->json([
            'status' => config('constants.ERROR_STATUS'),
            'message' => trans('response.try_again')
        ]);
    }


    public function activeInactive($id){

        if (! $user = $this->clientRepository->find($id)) {
            return response()->json([
                'status' => config('constants.ERROR_STATUS'),
                'message' => trans('response.not_found',['module'=>'User'])
            ]);
        }

        if($user->is_active){
            $this->clientRepository->update($id,array('is_active' => 0));

            return response()->json([
                'status' => config('constants.SUCCESS_STATUS'),
                'message' => trans('response.disabled',['module'=>'User'])
            ]);
        }
        else{
            $this->clientRepository->update($id,['is_active' => 1]);

            return response()->json([
                'status' => config('constants.SUCCESS_STATUS'),
                'message' => trans('response.enabled',['module'=>'User'])
            ]);
        }
    }
}