<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function(Blueprint $table) {
		$table->increments('id');
		$table->integer('owner_id')->default(0);
		$table->string('real_name')->default('None');
		$table->boolean('gender')->default(0);
		$table->string('fav_book')->default('None');
		$table->string('fav_genre')->default('None');
		$table->string('fav_author')->default('None');
		$table->string('region')->default('None');
		$table->string('country')->default('None');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('user_details');
    }
}
