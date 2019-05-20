<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subCategoryImage extends Model
{
    protected $table = 'subcategory_image';
    protected $fillable = ['image','sub_category_id'];

    public function subCategory(){
        return $this->belongsTo('App\subCategory','sub_category_id','id');
    }
}
