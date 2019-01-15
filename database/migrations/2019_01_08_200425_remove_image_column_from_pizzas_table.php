<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveImageColumnFromPizzasTable extends Migration
{
    public function up()
    {
        Schema::table('pizzas', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }

    public function down()
    {
        Schema::table('pizzas', function (Blueprint $table) {
            $table->string ('image')->nullable();
        });
    }
}
