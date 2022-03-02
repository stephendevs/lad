<?php

namespace Stephendevs\Lad\Traits;

trait UserType
{
    
    public function userType()
    {
        return $this->morphTo();
    }


}