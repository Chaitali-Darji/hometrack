<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SMSTemplate extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "sms_templates";

    const MODULE_NAME = 'SMS Template';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'template_type',
        'body',
        'created_by',
        'updated_by'
    ];
}