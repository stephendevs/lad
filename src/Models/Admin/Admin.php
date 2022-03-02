<?php

namespace Stephendevs\Lad\Models\Admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;

use Stephendevs\Lad\IsAdmin;

use Stephendevs\Lad\Notifications\Admin\ResetPasswordNotification;
use Stephendevs\Lad\Notifications\Admin\AdminStatusNotification;

use Stephendevs\Lad\Traits\ActivityLogable;

use Stephendevs\Lad\Traits\UserTypeModel as User;


class Admin extends Authenticatable implements MustVerifyEmail, CanResetPassword
{
    use Notifiable;
    use IsAdmin;
    use ActivityLogable;
    use User;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username'];

    /*
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function __construct()
    {
      $this->table = lad_auth_table();
    }

public function permissions()
{
  return $this->morphMany('Stephendevs\Lad\Models\Permission\HasPermission', 'model');
}


   

}
