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
use App\Repositories\User\UserRepositoryInterface;

class UserController extends BaseController {

    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
   {
       $this->userRepository = $userRepository;
   }

    /**
     * Display a listing of users
     *
     * @return Response
     */
    public function index()
    {
        $users = $this->userRepository->all();
        $roles = Role::pluck('name', 'id');
        return view('admin.users.index', compact('users','roles'));
    }

    /**
     * Show the form for creating a new user
     *
     * @return Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id');
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
        return Redirect::route('users.index');
    }

    /**
     * Display the user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        return view('admin.users.show', compact('user'));
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
        $roles = Role::pluck('name', 'id');
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
        $user = $this->userRepository->find($id);
        $user->update($userRequest->user);
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
        $user = $this->userRepository->forceDelete($id);
       
        return Redirect::route('users.index');
    }
}