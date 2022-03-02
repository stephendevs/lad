<?php
use Stephendevs\Lad\Models\Option\Option;


if(!function_exists('lad_auth_guard')){
    function lad_auth_guard(){
        return config('lad.auth_guard', 'admin');
    }
}

if(!function_exists('lad_auth_model')){
    function lad_auth_model(){
        return config('auth.providers.'.config('auth.guards.'.config('lad.auth_guard', 'admin').'.provider', 'admins').'.model');
    }
}

if(!function_exists('lad_auth_table')){
    function lad_auth_table(){
        $auth_guard = lad_auth_guard();
        return config('lad.auth_table', config('auth.guards.'.config('lad.auth_guard', 'admin').'.provider', 'admins'));
    }
}

if(!function_exists('lad_manage_users_permissions')){
    function lad_manage_users_permissions(){
        return [
            'view_users' => 'Ability to view user account listing ... Admins and other user accounts',
            'delete_users' => 'Ability to delete user accounts ....',
            'edit_users' => 'Ability to edit user accounts ....',
            'add_users' => 'Adds or creates user accounts ... Like admins accounts',
            'manage_user_permissions' => 'Manages user permissions'
        ];
    }
}

//returns a single option
if(!function_exists('option')){
    function option($option_key = null, $default = null){
        if($option_key != null){
            if(cache($option_key) != null){
                return cache($option_key);
            }else{
                $value = Option::findOption('option_key', $option_key)->first();
                return ($value) ? $value->option_value : $default;
            }
        }else{
            return $default;
        }
    }
}

if(!function_exists('save_option')){
    function save_option($option_key, $option_value){
       return  (Option::where('option_key', $option_key)->first()) ? Option::where('option_key', $option_key)->update(['option_value' => $option_value]) : Option::create(['option_key' => $option_key, 'option_value' => $option_value]);
    }
}