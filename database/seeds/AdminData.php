<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

class AdminData extends Seeder{

    public function run(){
        DB::table('users')->insert([
            'fname' => 'admin',
            'lname' => 'admin',
            'type' => 1,
            'phone' => '0097594488606',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
          ]);
    }
}
