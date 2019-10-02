<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $table = 'user_roles';

    public function users(){
    	return $this->belongsToMany('App\User', 'user_id');
    }
    // public function permissions(){
    // 	return $this->belongsToMany('App\module_permission', 'user_roles', 'role_id', 'id');
    // }
}
