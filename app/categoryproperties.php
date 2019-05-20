<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoryproperties extends Model
{
    protected $table = 'category_properties';
    protected $fillable = ['category_id','property_id'];

    public function category(){
        return $this->belongsTo(category::class,'category_id','id');
    }
    
    public function property(){
        return $this->belongsTo(Properties::class,'property_id','id')->select('name','id');
    }
}
