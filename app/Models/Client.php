<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Module;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'brokerage',
        'brokerage_code',
        'team_name',
        'mrisid',
        'mobile_phone',
        'office_phone',
        'email',
        'team_emails',
        'website',
        'notes',
        'address1',
        'address2',
        'city',
        'state',
        'zip',
        'instagram_url',
        'facebook_url',
        'linkedin_url',
        'youtube_url',
        'primary_account_id',
        'billing_address1',
        'billing_address2',
        'billing_city',
        'billing_state',
        'billing_zip',
        'is_active'
    ];
}