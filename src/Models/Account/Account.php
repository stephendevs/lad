<?php

namespace Stephendevs\Lad\Models\Account;

use Illuminate\Database\Eloquent\Model;

use Stephendevs\Lad\Traits\UserTypeModel as User;


class Account extends Model
{
    use User;


    public function __construct()
    {
      $this->table = lad_auth_table();
    }

}
