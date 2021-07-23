<?php

namespace App\Models;

use App\Models\SpecialPricing;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pricing extends Model
{
    use HasFactory, SoftDeletes;

    const MODULE_NAME = 'Pricing';

    protected $table = 'service_pricing';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'service_id',
        'code',
        'name',
        'price',
        'commission',
        'taxable',
        'commission_paid',
        'min_sq_ft',
        'max_sq_ft',
        'type',
        'is_active'
    ];

    /**
     * Get the service associated with the pricing.
     */
    public function service()
    {
        return $this->hasOne(Service::class,'id','service_id');
    }

    /**
     * The special_pricing that belong to the pricing.
     */
    public function special_pricing()
    {
        return $this->hasMany(SpecialPricing::class,'service_pricing_id','id');
    }
}
