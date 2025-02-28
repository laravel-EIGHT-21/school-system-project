<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class role_has_permissions extends Model
{
    public $timestamps = false;

   
    public function permissions(){
        return $this->belongsTo(Permission::class,'permission_id','id');
    }


                 
    public function roles(){
        return $this->belongsTo(Role::class,'role_id','id');
    }
}
