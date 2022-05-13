<?php

namespace Stephendevs\Lad;

trait HasPermissions
{
    public function permissions()
    {
        return $this->morphMany('Stephendevs\Lad\Models\Permission\Permission', 'assigned_to');
    }
}