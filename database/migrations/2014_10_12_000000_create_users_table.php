<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kokrokoo_admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('admin_id')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('title');
            $table->string('status');
            $table->string('role');
            $table->timestamps('last_login');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('kokrokoo_admins');
    }
}
