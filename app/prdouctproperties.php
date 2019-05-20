<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prdouctproperties extends Model
{
    protected $table = 'productproperties';
    protected $fillable = ['product_id','property_id'];

    public function product(){
        return $this->belongsTo(product::class,'product_id','id');
    }
    
    public function property(){
        return $this->belongsTo(Properties::class,'property_id','id');
    }
}