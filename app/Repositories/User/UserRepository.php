<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;  

class UserRepository
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
    * @return Collection
    */
    public function all(): Collection
    {
       return $this->model->get();    
    }

    /**
    * @param array $attributes
    * @return Model
    */
    public function create(array $attributes): Model
    {
       return $this->model->create($attributes);   
    }

    /**
    * @param request 
    * @return Model
    */
    public function createUser($userRequest)
    {
        $user = $this->model->create($userRequest->user);
        return $user->roles()->sync($userRequest->roles); 
    }

     /**
    * @param $id
    * @return Model
    */
    public function find($id): ?Model
    {
        return $this->model->find($id);
    }

    /**
    * @param user array
    * @return boolean
    */
    public function update($id, array $attributes)
    {
        return $this->model->where('id',$id)->update($attributes);
    }

    /**
    * @param user request data
    * @return boolean
    */
    public function updateUser($id, $userRequest)
    {
        $user = $this->model->find($id);
        $user->roles()->sync($userRequest->roles); 
        return $user->update($userRequest->user);
    }

    /**
    * @param id
    * @return boolean
    */
    public function delete($id)
    {
        return $this->model->where('id',$id)->delete();    
    }

    /**
    * @return Collection
    */
    public function trashAll(): Collection
    {
       return $this->model->onlyTrashed()->get();    
    }
}