<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subCategory extends Model
{
    protected $table = 'sub_category';
    protected $fillable = ['name_ar','name_en','description_ar','description_en','category_id'];

    public function category(){
        return $this->belongsTo(category::class,'category_id')->select(['id', 'name_ar']);
    }

    public function images(){
        return $this->hasMany(subCategoryImage::class, 'sub_category_id', 'id');
    }
}
