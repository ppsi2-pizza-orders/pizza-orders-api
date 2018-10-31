<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePizzaIngredientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizza_ingredient', function (Blueprint $table) {
            $table->increments('id');
            $table->integer ('ingredient_id') -> unsigned ();
            $table->integer ('pizza_id') -> unsigned ();
            $table->foreign('ingredient_id')->references('id')->on('ingredient')->onDelete('cascade');
            $table->foreign('pizza_id')->references('id')->on('pizza')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pizza_ingredient');
    }
}
