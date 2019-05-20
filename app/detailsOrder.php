<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailsOrder extends Model
{
    protected $table = 'details_Order';
    protected $fillable = ['price','product_id','quantity','user_id','currency_id','order_id'];

    public function order(){
        return $this->belongsTo(order::class, 'order_id', 'id');
    }

    public function product(){
        return $this->belongsTo(product::class, 'product_id', 'id');
    }

}