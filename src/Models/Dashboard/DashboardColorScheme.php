<?php

namespace Stephendevs\Lad\Models\Dashboard;


use Illuminate\Database\Eloquent\Model;

class DashboardColorScheme extends Model
{

    public function accounts()
    {
        return $this->belongsToMany('Stephendevs\Lad\Models\Account\Account');
    }

}
