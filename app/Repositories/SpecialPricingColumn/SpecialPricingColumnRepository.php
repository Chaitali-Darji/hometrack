<?php

namespace App\Repositories\SpecialPricingColumn;

use App\Models\SpecialPricingColumn;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

class SpecialPricingColumnRepository
{
    public function __construct(SpecialPricingColumn $model)
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
