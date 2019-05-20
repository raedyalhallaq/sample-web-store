<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productImage extends Model
{
    protected $table = 'product_image';
    protected $fillable = ['image','product_id'];

    public function product(){
        return $this->belongsTo('App\product','product_id','id');
    }
}
