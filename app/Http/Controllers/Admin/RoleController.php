<?php 

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Controllers\BaseController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Role;
use App\Http\Requests\Admin\RoleRequest;
use Redirect;
use Session;
use App\Repositories\Role\RoleRepository;

class RoleController extends BaseController {

    private $roleRepository;
    private $module;
    private $role;

    public function __construct(RoleRepository $roleRepository, Role $role, Module $module)
   {
       $this->roleRepository = $roleRepository;
       $this->role = $role;
       $this->module = $module;
   }

    /**
     * Display a listing of roles
     *
     * @return Response
     */
    public function index()
    {
        $roles = $this->roleRepository->all();
        $modules = $this->module->pluck('name', 'id');
        $archive_data = $this->roleRepository->trashAll();
        return view('admin.roles.index', compact('roles','modules','archive_data'));
    }

    /**
     * Show the form for creating a new role
     *
     * @return Response
     */
    public function create()
    {
        $modules = $this->module->pluck('name', 'id');
        return view('admin.roles.add-edit', compact('modules'));
    }

    /**
     * Store a newly created role in storage.
     *
     * @return Response
     */
    public function store(RoleRequest $roleRequest)
    {

        if($this->roleRepository->createRole($roleRequest->role)){
            Session::flash(config('constants.SUCCESS_STATUS'),  trans('response.store',['module' => Role::MODULE_NAME]));
        }
        else{
            Session::flash(config('constants.ERROR_STATUS'), trans('response.try_again'));   
        }

        return Redirect::route('roles.index');
    }

    /**
     * Show the form for editing the role.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        if(!$role = $this->roleRepository->find($id)){
            Session::flash(config('constants.ERROR_STATUS'), trans('response.not_found',['module' => Role::MODULE_NAME]));
            return redirect()->route('roles.index');
        }
        $modules = $this->module->pluck('name', 'id');
        return view('admin.roles.add-edit', compact('role','modules'));
    }

    /**
     * Update the role resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function update($id, RoleRequest $roleRequest)
    {
        if($this->roleRepository->updateRole($id,$roleRequest)){
            Session::flash(config('constants.SUCCESS_STATUS'),  trans('response.update',['module' => Role::MODULE_NAME]));
        }
        else{
            Session::flash(config('constants.ERROR_STATUS'), trans('response.try_again'));   
        }
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->roleRepository->delete($id)){
            return response()->json([
                'status' => config('constants.SUCCESS_STATUS'),
                'message' => trans('response.delete',['module' => Role::MODULE_NAME])
            ]);
        }
        return response()->json([
            'status' => config('constants.ERROR_STATUS'),
            'message' => trans('response.try_again')
        ]);
    }


    public function activeInactive($id){

        if (! $role = $this->roleRepository->find($id)) {
            return response()->json([
                'status' => config('constants.ERROR_STATUS'),
                'message' => trans('response.not_found',['module' => Role::MODULE_NAME])
            ]);
        }

        $this->roleRepository->update($id,['is_active' => ($role->is_active) ? 0 : 1]);
        return response()->json([
            'status' => config('constants.SUCCESS_STATUS'),
            'message' => trans(($role->is_active) ? 'response.disabled' : 'response.enabled',['module' => Role::MODULE_NAME])
        ]);
    }
}