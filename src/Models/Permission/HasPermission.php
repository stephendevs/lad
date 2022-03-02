<?php

namespace Stephendevs\Lad\Models\Permission;


use Illuminate\Database\Eloquent\Model;

class HasPermission extends Model
{

    protected $with = ['permission'];

    protected $fillable = ['permission_id'];

    public function models()
    {
        return $this->morphTo();
    }

    public function permission()
    {
        return $this->belongsTo('Stephendevs\Lad\Models\Permission\Permission');
    }
}
