<?php

namespace Stephendevs\Lad;

trait IsAdmin {
     /**
     * 
     */
    public function scopeGetAdmins($query, $paginated = false, $count = 3)
    {
        if($paginated)
            return $query
            ->paginate($count);
        return $query
        ->get();

    }

    public function scopeFindBy($query, $column, $value)
    {
        return $query
        ->where($column, $value);
    }

    /**
     * Get admin by username
     * 
     */
    public function scopeGetAdminByUsername($query, $username)
    {
        return $query
        ->with(['adminBlocked'])
        ->where('username', $username)
        ->get();
    }

    public function scopeGetAdminById($query, $id)
    {
        return $query
        ->findOrFail($id);
    }

    public function scopeGetBlockedAdminById($query, $id)
    {
        return $query
        ->findOrFail($id);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }


    public function sendPasswordResetNotification($token)
    {
        try {
            $this->notify(new ResetPasswordNotification($token));
        } catch (\Exception $e) {
            abort(500, 'Can not send emails right now!');
        }
    }

    public function sendAdminStatusNotification($status)
    {
        try {
            $this->notify(new AdminStatusNotification($status));
        } catch (\Exception $e) {
            //throw $th;
        }
    }


    public function colorSchemes()
    {
        return $this->hasMany('Stephendevs\Lad\Models\Dashboard\DashboardColorScheme');
    }

  
}