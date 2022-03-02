<?php

namespace Stephendevs\Lad\Traits;

trait UserTypeModel
{
    
    public function user()
    {
        return $this->morphOne('App\User', 'user');
    }
}