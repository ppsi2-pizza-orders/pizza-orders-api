<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProviderFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('provider')->after('remember_token');
            $table->string('provider_id')->after('remember_token');
            $table->string('password')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('provider');
            $table->dropColumn('provider_id');
        });
    }
}
