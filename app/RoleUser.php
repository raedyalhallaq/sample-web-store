<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = 'role_user';
    public $primaryKey  = 'user_id';
    public $timestamps = false;

    public $fillable = [
        "user_id",
        "role_id"
    ];
    public function role_name(){
        return $this->belongsTo(Role::class , 'role_id', 'id');
    }
}
