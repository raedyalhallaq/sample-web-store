<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable{
    use EntrustUserTrait; 
    use Notifiable;
    protected $fillable = ['fname', 'lname', 'email', 'password','type','phone'];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = ['email_verified_at' => 'datetime'];

    public function role_user(){
        return $this->belongsTo(RoleUser::class , 'id', 'user_id');
    }
}