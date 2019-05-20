<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsorderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_Order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('price');
            $table->integer('product_id');
            $table->integer('quantity');
            $table->integer('user_id');
            $table->integer('currency_id');
            $table->integer('order_id');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detailsorder');
    }
}
