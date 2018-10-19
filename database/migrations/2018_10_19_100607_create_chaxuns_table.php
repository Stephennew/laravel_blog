<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChaxunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chaxuns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name',20);
            $table->integer('product_sn');
            $table->integer('product_cate');
            $table->integer('porduct_status');
            $table->integer('product_num');
            $table->integer('product_sale');
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
        Schema::dropIfExists('chaxuns');
    }
}
