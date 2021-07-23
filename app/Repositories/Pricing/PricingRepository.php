<?php

namespace App\Repositories\Pricing;

use App\Models\Pricing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class PricingRepository
{
    public function __construct(Pricing $model)
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
     * @return Collection
     */
    public function paginate()
    {
        return $this->model->paginate(config('constants.PAGINATE'));
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
    * @param user array
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
