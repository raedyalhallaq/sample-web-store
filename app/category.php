<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'category';
    protected $fillable = ['name_ar','name_en','description_ar','description_en'];

    public function images(){
        return $this->hasMany(categoryImage::class, 'category_id', 'id');
    }

}
