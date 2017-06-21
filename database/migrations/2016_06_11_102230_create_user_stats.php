<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserStats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_stats', function(Blueprint $table) {
		$table->increments('id');
		$table->integer('owner_id')->default(0);
		$table->integer('crnt_count')->default(0);
		$table->integer('list_count')->default(0);
		$table->integer('all_count')->default(0);
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('user_stats');
    }
}
