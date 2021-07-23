<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpecialPricing extends Model
{
    use HasFactory, SoftDeletes;

    const MODULE_NAME = 'Special Pricing';

    protected $table = 'special_pricing';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'service_pricing_id',
        'special_pricing_id',
        'price',
        'is_active'
    ];

}
