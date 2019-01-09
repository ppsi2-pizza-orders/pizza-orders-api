<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientRestaurantTable extends Migration
{

    public function up()
    {
        Schema::create('ingredient_restaurant', function (Blueprint $table) {
            $table->increments('id');
            $table->integer ('restaurant_id') -> unsigned ();
            $table->integer ('ingredient_id') -> unsigned ();
            $table->float ('price')->default(1.0);
            $table->boolean('available')->default(false);
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
            $table->foreign('ingredient_id')->references('id')->on('ingredients')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('ingredient_restaurant');
    }
}
