<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $table = 'cart';
    protected $fillable = ['user_id','item_id','quantity','session_id'];

    public function product(){
        return $this->belongsTo(product::class,'item_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
