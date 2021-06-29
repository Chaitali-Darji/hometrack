<?php

namespace App\Repositories\Role;

use App\Models\Role;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;  

class RoleRepository
{
    public function __construct(Role $model)
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
        return $this->model->find($id);
    }

    /**
    * @param role request data
    * @return boolean
    */
    public function update($id, $roleRequest)
    {
        $role = $this->model->withTrashed()->find($id);
        $role->modules()->sync($roleRequest->permissions); 
        return $role->update($roleRequest->role);
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