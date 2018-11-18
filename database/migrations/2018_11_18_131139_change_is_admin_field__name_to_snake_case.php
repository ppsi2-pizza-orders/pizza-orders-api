<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeIsAdminFieldNameToSnakeCase extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('isAdmin', 'is_admin');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('is_admin', 'isAdmin');
        });
    }
}
