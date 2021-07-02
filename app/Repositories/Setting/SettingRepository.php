<?php

namespace App\Repositories\Setting;

use App\Models\Setting;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;  

class SettingRepository
{
    public function __construct(Setting $model)
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
    * @param role request data
    * @return boolean
    */
    public function updateSetting($where, $data)
    {
        return $this->model->where($where)->update($data);
    }

    /**
    * @param id
    * @return boolean
    */
    public function delete($id)
    {
        return $this->model->delete();    
    }

    public function saveSetting($key,$value)
    {
        $setting_info = $this->model->where('key',$key)->first();
        
        if(empty($setting_info)){
            return $this->model->create([
                'key' => $key,
                'value' => $value
            ]);
        }
        else{
            return $this->model->where('id',$key)->update(['value' => $value]);
        }
    }
}