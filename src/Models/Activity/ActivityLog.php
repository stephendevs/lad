<?php

namespace Stephendevs\Lad\Models\Activity;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{

  protected $table = 'activity_log';

  protected $guarded = [];

   /**
   * Get all of the owning activitylogable models.
   */
  public function causer()
  {
      return $this->morphTo();
  }
  
}
