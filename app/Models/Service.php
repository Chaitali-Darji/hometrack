<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    const MODULE_NAME = 'Service';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'region_id',
        'parent_id',
        'description',
        'youtube_or_vimeo_link',
        'notes_required',
        'display_icon',
        'sort',
        'code',
        'check_lists',
        'is_active',
        'service_type_id'
    ];

    /**
     * Get the service type associated with the service.
     */
    public function service_type()
    {
        return $this->hasOne(ServiceType::class,'id','service_type_id');
    }
}