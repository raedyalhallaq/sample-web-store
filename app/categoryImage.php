<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoryImage extends Model
{
    protected $table = 'category_image';
    protected $fillable = ['image','category_id'];

    public function category(){
        return $this->belongsTo('App\category','category_id','id');
    }
}
