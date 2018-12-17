<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePizzaOrderTable extends Migration
{
    public function up()
    {
        Schema::create('pizza_order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('pizza_id')->unsigned();

            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('pizza_id')->references('id')->on('pizzas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pizza_order');
    }
}
