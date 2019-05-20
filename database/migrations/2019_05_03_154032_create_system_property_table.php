<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemPropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_property', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('system_id');
            $table->integer('element_id');
            $table->integer('category_id');
            $table->text('bust')->nullable;
            $table->text('length')->nullable;
            $table->text('shoulder')->nullable;
            $table->text('sleeve')->nullable;
            $table->timestamps();
        });

        \DB::table('system_property')->insert([
            ['system_id' => 3, 'element_id' => 1, 'category_id' => 1, 'bust' => 92, 'length' => 63 , 'shoulder' => 42 , 'sleeve' => 16],
            ['system_id' => 3, 'element_id' => 2, 'category_id' => 1, 'bust' => 96, 'length' => 65 , 'shoulder' => 44 , 'sleeve' => 17],
            ['system_id' => 3, 'element_id' => 3, 'category_id' => 1, 'bust' => 100, 'length' => 67 , 'shoulder' => 46 , 'sleeve' => 18],
            ['system_id' => 3, 'element_id' => 4, 'category_id' => 1, 'bust' => 104, 'length' => 69 , 'shoulder' => 48 , 'sleeve' => 19],
            ['system_id' => 3, 'element_id' => 5, 'category_id' => 1, 'bust' => 108, 'length' => 70 , 'shoulder' => 50 , 'sleeve' => 20],
            ['system_id' => 3, 'element_id' => 6, 'category_id' => 1, 'bust' => 114, 'length' => 72 , 'shoulder' => 54 , 'sleeve' => 21],
            ['system_id' => 3, 'element_id' => 7, 'category_id' => 1, 'bust' => 122, 'length' => 74 , 'shoulder' => 58 , 'sleeve' => 22],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_property');
    }
}
