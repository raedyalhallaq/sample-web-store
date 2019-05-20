<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class elementsProperties extends Model
{
    protected $table = 'elements_properties';
    protected $fillable = ['name','display_name','property_id','value'];

    public function properties(){
        return $this->belongsTo(Properties::class,'property_id', 'id');
    }
}
