<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('username')->default('');
            $table->string('password')->default('');
            $table->string('salt')->default('');
            $table->string('headportrait')->default('');
            $table->string('style')->default('');
            $table->string('autograph')->default('');
            $table->string('phone')->default('');
            $table->string('email')->default('');
            $table->string('gender')->default('');
            $table->tinyInteger('ban')->default(1)->unsigned(); // 1=正常 2=禁止
            $table->softDeletes();
            $table->timestamps();
            $table->unique('username');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_users');
    }
}
