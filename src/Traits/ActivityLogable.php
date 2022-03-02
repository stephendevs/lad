<?php

namespace Stephendevs\Lad\Traits;

trait ActivityLogable
{
    /**
     * Get all of the Model's comments.
     */
    public function activityLog()
    {
        return $this->morphMany('Stephendevs\Lad\Models\Activity\ActivityLog', 'causer');
    }
}