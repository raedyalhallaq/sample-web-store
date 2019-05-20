<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'productss';
    protected $fillable = ['name_ar','name_en','description_ar','description_en', 'price', 'isdiscount', 'new_price','sub_category_id' ,'category_id','currency_id','record_by','system_id'];

    public function category(){
        return $this->belongsTo(category::class,'category_id')->select(['id', 'name_ar as name']);
    }

    public function subCategory(){
        return $this->belongsTo(subCategory::class,'sub_category_id','id')->select(['id', 'name_ar']);;
    }

    public function images(){
        return $this->hasMany(productImage::class, 'product_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'record_by', 'id');
    }

    public function system(){
        return $this->belongsTo(System::class, 'system_id', 'id');
    }

    public function currency(){
        return $this->belongsTo(currency::class, 'currency_id', 'id');
    }

    public function isdiscount(){
        if($this->isdiscount == 1){
            return "نعم";
        }
        return "لا";
    }
}