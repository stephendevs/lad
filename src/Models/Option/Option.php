<?php

namespace Stephendevs\Lad\Models\Option;


use Illuminate\Database\Eloquent\Model;

class Option extends Model
{

   protected $guarded = [];



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
