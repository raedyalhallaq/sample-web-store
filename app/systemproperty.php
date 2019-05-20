<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class systemproperty extends Model
{
    protected $table = 'system_property';
    protected $fillable = ['system_id','element_id','category_id','value','lenght','width'];

}
