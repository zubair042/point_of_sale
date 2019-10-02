<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Module_permission extends Model
{
    protected $table = "module_permissions";

    public static function getPermissions($role_id){
    	return DB::table("module_permissions as mp")->join("modules as m", "m.id", "=", "mp.module_id")->selectRaw("mp.*, m.name as module_name, m.slug as module_slug")->where("mp.role_id", $role_id)->get();
    }
}
