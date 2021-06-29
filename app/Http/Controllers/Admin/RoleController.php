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
        return view('admin.roles.index', compact('roles'));
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
        $role = $this->roleRepository->create($roleRequest->role);
        $role->modules()->sync($roleRequest->permissions);
        Session::flash('success', 'Role successfully created!');
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
        $role = $this->roleRepository->find($id);
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
        if($this->roleRepository->update($id,$roleRequest)){
            Session::flash('success', 'Role successfully updated!');
        }
        else{
            Session::flash('error', 'Please try again!');   
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
        if($this->roleRepository->forceDelete($id)){
            return response()->json([
                'status' => 'success',
                'message' => 'Role successfully deleted!'
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Please try again!'
        ]);
    }


    public function activeInactive($id){

        if (! $role = $this->role->withTrashed()->find($id)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Role not found!!'
            ]);
        }

        if(empty($role->deleted_at)){
            $role->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Role successfully disabled!'
            ]);
        }
        else{
            $role->restore();

            return response()->json([
                'status' => 'success',
                'message' => 'Rser successfully enabled!'
            ]);
        }
    }
}