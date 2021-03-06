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


    public function createRole($roleRequest){
        $role = $this->model->create($roleRequest->role);
        return $role->modules()->sync($roleRequest->permissions);
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
    * @param array
    * @return boolean
    */
    public function update($id, array $attributes)
    {
        return $this->model->where('id',$id)->update($attributes);
    }

    /**
    * @param role request data
    * @return boolean
    */
    public function updateRole($id, $roleRequest)
    {
        $role = $this->model->find($id);
        $role->modules()->sync($roleRequest->permissions); 
        return $role->update($roleRequest->role);
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