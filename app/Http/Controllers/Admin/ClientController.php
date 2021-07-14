<?php 

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Controllers\BaseController;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\ClientRequest;
use App\Repositories\Client\ClientRepository;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\ClientAddress;
use Redirect;
use Session;

class ClientController extends BaseController {

    private $clientRepository;
    private $client;
    private $clientAddress;

    const HOME_ADDRESS = 'home';
    const BILLING_ADDRESS = 'billing';
   
    public function __construct(ClientRepository $clientRepository, Client $client, ClientAddress $clientAddress)
   {
       $this->clientRepository = $clientRepository;
       $this->client = $client;
       $this->clientAddress = $clientAddress;
   }

    /**
     * Display a listing of clients
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
     * Show the form for creating a new client
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.clients.add-edit');
    }

    /**
     * Store a newly created client in storage.
     *
     * @return Response
     */
    public function store(ClientRequest $clientRequest)
    {
        $client = $this->clientRepository->create($clientRequest->client);
        $this->clientAddress->create($clientRequest->address + ['type' => HOME_ADDRESS,'client_id' => $client->id]);
        Session::flash(config('constants.SUCCESS_STATUS'), trans('response.store',['module' => Client::MODULE_NAME]));
        return Redirect::route('clients.index');
    }

    /**
     * Show the form for editing the client.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        if(!$client = $this->clientRepository->find($id)){
            Session::flash(config('constants.ERROR_STATUS'), trans('response.not_found',['module' => 'Client'])); 
            return redirect()->route('clients.index');
        }

        $clients = $this->client->where('id','<>',$id)->orderBy('last_name')->get()->pluck('parent_display', 'id');
        $address = $this->clientAddress->where(['type' => HOME_ADDRESS,'client_id' => $client->id])->first();
        $billing_address = $this->clientAddress->where(['type' => BILLING_ADDRESS,'client_id' => $client->id])->first();
        
        return view('admin.clients.edit', compact('client','clients','address','billing_address'));
    }

    /**
     * Update the client resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function update($id, ClientRequest $clientRequest)
    {
        if($this->clientRepository->update($id,$clientRequest->client)){
            $this->clientAddress->where('client_id',$id)->delete();
            $this->clientAddress->create($clientRequest->address + ['type' => HOME_ADDRESS,'client_id' => $id]);
            $this->clientAddress->create($clientRequest->billing_address + ['type' => BILLING_ADDRESS,'client_id' => $id]);
            Session::flash(config('constants.SUCCESS_STATUS'),  trans('response.update',['module' => Client::MODULE_NAME]));
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
                'message' => trans('response.delete',['module' => Client::MODULE_NAME])
            ]);
        }
        return response()->json([
            'status' => config('constants.ERROR_STATUS'),
            'message' => trans('response.try_again')
        ]);
    }


    public function activeInactive($id){

        if (! $client = $this->clientRepository->find($id)) {
            return response()->json([
                'status' => config('constants.ERROR_STATUS'),
                'message' => trans('response.not_found',['module' => Client::MODULE_NAME])
            ]);
        }

        $this->clientRepository->update($id,['is_active' => ($client->is_active) ? 0 : 1]);
        return response()->json([
            'status' => config('constants.SUCCESS_STATUS'),
            'message' => trans(($client->is_active) ? 'response.disabled' : 'response.enabled',['module' => Client::MODULE_NAME])
        ]);
    }
}