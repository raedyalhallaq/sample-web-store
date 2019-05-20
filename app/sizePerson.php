<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sizePerson extends Model
{
    protected $table = 'sizePerson';
    protected $fillable = ['value','session_id','user_id'];
}
