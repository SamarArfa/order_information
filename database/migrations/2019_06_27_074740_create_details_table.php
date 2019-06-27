<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {

//
//            $table->increments('id');
//            $table->unsignedInteger('order_id');
//            $table->unsignedInteger('item_id');
//            $table->string('qty');
//            $table->double('total');
////
            $table->timestamps();
////
//            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
//            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details');
    }
}
