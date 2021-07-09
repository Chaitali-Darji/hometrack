<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Role;
use App\Models\EmailTemplate;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    const MODULE_NAME = 'User';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     /**
     * Set the password
     *
     * @param  string  $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        if(!empty($value)){
            $this->attributes['password'] = \Hash::make($value);    
        }
    }


     /**
     * The roles that belong to the role.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles', 'user_id', 'role_id')->withTimestamps();
    }

    /**
     *  Overrite send password reset notification mail
     */
    public function sendPasswordResetNotification($token)
    {
        $template = EmailTemplate::where('template_type','reset_password')->first();
        
        $body = strval($template->body);
        $body = str_replace('[user-name]', !empty($this->name) ? $this->name : "", $body);        
        $this->notify(new ResetPasswordNotification($token,$body,$template->subject));
    }
}
