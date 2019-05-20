<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'order';
    protected $fillable = ['user_id','status_id','currency_id','price','address'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function status(){
        return $this->belongsTo(statusOrder::class, 'status_id', 'id');
    }

    public function currency(){
        return $this->belongsTo(currency::class, 'currency_id', 'id');
    }

    public function detailsOrder(){
        return $this->hasMany(detailsOrder::class, 'order_id', 'id');
    }

}
