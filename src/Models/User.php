<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Stephendevs\Lad\HasUserType;
use Stephendevs\Lad\HasRoles;
use Stephendevs\Lad\HasPermissions;
use Stephendevs\Lad\HasActivityLog;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasUserType, HasRoles,HasPermissions, HasActivityLog;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
