<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWishlistTable extends Migration
{

    public function up()
    {
        Schema::create('wishlist', function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable(true);
            $table->char('session_id', 255)->nullable(true);
            $table->integer('item_id')->unsigned();
            $table->timestamps();

            // index
            $table->index('user_id', 'wishlist_user_id_index');
        });
    }

    public function down()
    {
        Schema::dropIfExists('wishlist');
    }
}
