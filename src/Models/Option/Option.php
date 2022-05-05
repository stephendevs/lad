<?php

namespace Stephendevs\Lad\Models\Option;


use Illuminate\Database\Eloquent\Model;
use Stephendevs\Lad\Events\OptionSaved;
use Stephendevs\Lad\Events\OptionDeleted;
use Stephendevs\Lad\Events\OptionUpdated;

class Option extends Model
{

   protected $guarded = [];

   protected $dispatchesEvents = [
       'created' => OptionSaved::class,
       'deleted' => OptionDeleted::class,
       'updated' => OptionUpdated::class,
   ];



   public function scopeOption($query, $option_key)
   {
       return $query
       ->where('option_key', $option_key);
   }
  
   public function scopeFIndOption($query, $column, $value)
   {
       return $query
       ->where($column, $value);
   }

  
}
