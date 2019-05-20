<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wishlist extends Model
{
    protected $table = 'wishlist';
    protected $fillable = ['user_id','item_id','session_id'];

    public function product(){
        return $this->belongsTo(product::class,'item_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
