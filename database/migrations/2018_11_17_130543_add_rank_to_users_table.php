<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRankToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('isAdmin')->default(false);
        });
    }

    public function down()
    {
        Schema::table('restaurants', function ($table) {
            $table->dropColumn('isAdmin');
        });
    }
}
