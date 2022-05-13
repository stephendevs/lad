<?php

namespace Stephendevs\Lad;

trait HasUserType
{
    public function userable()
    {
        return $this->morphTo();
    }

    public function getUserTypeAttribute()
    {
        $userType = explode('\\', $this->userable_type);
        return ($count = count($userType)) ? $userType[$count -1] : null;
    }
}