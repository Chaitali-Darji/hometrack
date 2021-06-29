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
        $roles = $this->role->pluck('name', 'id');
        return view('admin.users.index', compact('users','roles'));
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
        Session::flash('success', 'User successfully created!');
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
        $user = $this->userRepository->find($id);
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
        if($this->userRepository->update($id,$userRequest)){
            Session::flash('success', 'User successfully updated!');
        }
        else{
            Session::flash('error', 'Please try again!');   
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
        if($this->userRepository->forceDelete($id)){
            return response()->json([
                'status' => 'success',
                'message' => 'User successfully deleted!'
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Please try again!'
        ]);
    }


    public function activeInactive($id){

        if (! $user = $this->user->withTrashed()->find($id)) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found!!'
            ]);
        }

        if(empty($user->deleted_at)){
            $user->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'User successfully disabled!'
            ]);
        }
        else{
            $user->restore();

            return response()->json([
                'status' => 'success',
                'message' => 'User successfully enabled!'
            ]);
        }
    }
}