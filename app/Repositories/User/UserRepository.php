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
       return $this->model->withTrashed()->get();    
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
    * @param $id
    * @return Model
    */
    public function find($id): ?Model
    {
        return $this->model->withTrashed()->find($id);
    }

    /**
    * @param user request data
    * @return boolean
    */
    public function update($id, $userRequest)
    {
        $user = $this->model->withTrashed()->find($id);
        $user->roles()->sync($userRequest->roles); 
        return $user->update($userRequest->user);
    }

    /**
    * @param id
    * @return boolean
    */
    public function forceDelete($id)
    {
        return $this->model->where('id',$id)->forceDelete();    
    }
}