<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddListId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AddListId', function(Blueprint $table) {
		$table->increments('id');
		$table->integer('arr_id')->default(0);
		$table->integer('all_id')->default(0);
		$table->integer('owner_id')->default(0);
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('AddListId');
    }
}
