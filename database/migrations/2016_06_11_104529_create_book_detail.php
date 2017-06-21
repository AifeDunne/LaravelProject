<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_detail', function(Blueprint $table) {
		$table->increments('id');
		$table->integer('owner_id')->default(0);
		$table->integer('book_id')->default(0);
		$table->string('publisher')->default('None');
		$table->string('categories')->default('None');
		$table->string('rating')->default('None');
		$table->longText('description');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('book_detail');
    }
}
