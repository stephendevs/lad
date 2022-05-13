<?php
namespace Stephendevs\Lad;

trait Permissionable
{

    public function permissions()
    {
        return $this->morphMany('Stephendevs\Lad\Models\Permission\Permission', 'permissionable');
    }

}