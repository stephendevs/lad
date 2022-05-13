<?php

namespace Stephendevs\Lad\Models\Role;


use Illuminate\Database\Eloquent\Model;
use Stephendevs\Lad\HasPermissions;

class Role extends Model
{
  use HasPermissions;


  protected $table = 'auth_roles';

    public function assigned_to()
    {
        return $this->morphTo();
    }

    public function scopeWithPermissions($query)
    {
      return $this->query->with['permissions'];
    }


}
