<?php 

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Controllers\BaseController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Http\Requests\Admin\UserRequest;
use Redirect;
use Session;
use App\Repositories\User\UserRepository;

class UserController extends BaseController {

    private $userRepository;
    private $role;
    private $user;

    public function __construct(UserRepository $userRepository, Role $role, User $user)
   {
       $this->userRepository = $userRepository;
       $this->role = $role;
       $this->user = $user;
   }

    /**
     * Display a listing of users
     *
     * @return Response
     */
    public function index()
    {
        $users = $this->userRepository->all();
        $archive_data = $this->userRepository->trashAll();
        $roles = $this->role->pluck('name', 'id');
        return view('admin.users.index', compact('users','roles','archive_data'));
    }

    /**
     * Show the form for creating a new user
     *
     * @return Response
     */
    public function create()
    {
        $roles = $this->role->pluck('name', 'id');
        return view('admin.users.add-edit', compact('roles'));
    }

    /**
     * Store a newly created user in storage.
     *
     * @return Response
     */
    public function store(UserRequest $userRequest)
    {
        $user = $this->userRepository->create($userRequest->user);
        $user->roles()->sync($userRequest->roles);
        Session::flash(config('constants.SUCCESS_STATUS'), trans('response.store',['module'=>'User']));
        return Redirect::route('users.index');
    }

    /**
     * Show the form for editing the user.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        if(!$user = $this->userRepository->find($id)){
            Session::flash(config('constants.ERROR_STATUS'), trans('response.not_found',['module'=>'User']));
            return redirect()->route('users.index');
        }
        $roles = $this->role->pluck('name', 'id');
        return view('admin.users.add-edit', compact('user', 'roles'));
    }

    /**
     * Update the user resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function update($id, UserRequest $userRequest)
    {
        if($this->userRepository->updateUser($id,$userRequest)){
            Session::flash(config('constants.SUCCESS_STATUS'),  trans('response.update',['module'=>'User']));
        }
        else{
            Session::flash(config('constants.ERROR_STATUS'), trans('response.try_again'));  
        }
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if($this->userRepository->delete($id)){
            return response()->json([
                'status' => config('constants.SUCCESS_STATUS'),
                'message' => trans('response.delete',['module'=>'User'])
            ]);
        }
        return response()->json([
            'status' => config('constants.ERROR_STATUS'),
            'message' => trans('response.try_again')
        ]);
    }


    public function activeInactive($id){

        if (! $user = $this->userRepository->find($id)) {
            return response()->json([
                'status' => config('constants.ERROR_STATUS'),
                'message' => trans('response.not_found',['module'=>'User'])
            ]);
        }

        if($user->is_active){
            $this->userRepository->update($id,array('is_active' => 0));

            return response()->json([
                'status' => config('constants.SUCCESS_STATUS'),
                'message' => trans('response.disabled',['module'=>'User'])
            ]);
        }
        else{
            $this->userRepository->update($id,['is_active' => 1]);

            return response()->json([
                'status' => config('constants.SUCCESS_STATUS'),
                'message' => trans('response.enabled',['module'=>'User'])
            ]);
        }
    }
}