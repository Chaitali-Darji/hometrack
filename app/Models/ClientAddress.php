<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Module;

class ClientAddress extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'client_address';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'client_id',
        'address1',
        'address2',
        'city',
        'state',
        'zip',
        'latitude',
        'longitude'
    ];
}