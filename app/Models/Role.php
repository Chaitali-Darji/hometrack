<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Module;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    const MODULE_NAME = 'Role';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'is_active'
    ];

     /**
     * The modules that belong to the role.
     */
    public function modules()
    {
        return $this->belongsToMany(Module::class, 'role_modules', 'role_id', 'module_id')->withTimestamps();
    }

    public function AdminRole()
    {
        return Self::Where('name', 'Admin')->first();
    }
}