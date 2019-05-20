<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\sizePerson;

class siteController extends Controller
{
    public function size(){
        return sizePerson::where('user_id', 1)->get('value');
    }
}
