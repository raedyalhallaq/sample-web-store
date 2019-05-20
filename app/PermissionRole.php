<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    protected $table = 'permission_role';
    public $timestamps = false;
    protected $primaryKey = 'role_id';
    public $fillable = [
        "permission_id",
        "role_id"
    ];

    public function permission_role()
    {
        return $this->belongsToMany('App\Role', 'permission_role', 'permission_id', 'role_id');
    }
}
