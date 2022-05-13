<?php

namespace Stephendevs\Lad;

trait HasActivityLog
{
    public function activityLog()
    {
        return $this->morphMany('Stephendevs\Lad\Models\Activity\ActivityLog', 'loggable');
    }
}