<?php

namespace Stephendevs\Lad;

trait Userable
{
    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }
}