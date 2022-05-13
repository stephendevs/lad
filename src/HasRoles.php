<?php

namespace Stephendevs\Lad;

trait HasRoles
{
    public function roles()
    {
        return $this->morphMany('Stephendevs\Lad\Models\Role\Role', 'assigned_to');
    }
}