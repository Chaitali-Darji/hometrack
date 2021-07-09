<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesTax extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sales_tax';

    const MODULE_NAME = 'Sales Tax';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'state_id',
        'tax',
        'is_active'
    ];

    /**
     * Get the state associated with the sales tax.
     */
    public function state()
    {
        return $this->hasOne(State::class,'id','state_id');
    }
}