<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_nodes', function (Blueprint $table) {
            $table->increments('node_id');
            $table->integer('pid')->default(0);
            $table->string('nodename')->default('');
            $table->tinyInteger('nav')->default(2)->unsigned(); // 1=导航显示 2=导航隐藏
            $table->char('auth', 100)->default('')->index('auth');
            $table->string('url')->default('javascript:void(0);');
            $table->integer('sortid')->default(1991); // 升序 排序id
            $table->softDeletes();
            $table->timestamps();
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
        //admin_nodes
        Schema::dropIfExists('admin_nodes');
    }
}
