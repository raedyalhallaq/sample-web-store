<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusorderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });

        \DB::table('status_order')->insert([
            ['name' => 'انتظار الموافقة على الطلب'],
            ['name' => 'تم الطلب'],
            ['name' => 'تم تسليم الطلب'],
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statusorder');
    }
}
