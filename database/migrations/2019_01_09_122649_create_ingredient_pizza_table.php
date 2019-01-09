<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientPizzaTable extends Migration
{

    public function up()
    {
        Schema::create('ingredient_pizza', function (Blueprint $table) {
            $table->increments('id');
            $table->integer ('ingredient_id') -> unsigned ();
            $table->integer ('pizza_id') -> unsigned ();
            $table->foreign('ingredient_id')->references('id')->on('ingredients')->onDelete('cascade');
            $table->foreign('pizza_id')->references('id')->on('pizzas')->onDelete('cascade');
        });
    }
    public function down()
    {
        Schema::dropIfExists('ingredient_pizza');
    }
}
