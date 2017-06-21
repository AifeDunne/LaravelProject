<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookCatalog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_catalog', function(Blueprint $table) {
		$table->increments('id');
		$table->integer('owner_id')->default(0);
		$table->integer('book_id')->default(0);
		$table->integer('google_id')->default(0);
		$table->integer('list_id')->default(0);
		$table->string('title')->default('None');
		$table->string('author_last')->default('None');
		$table->string('author_first')->default('None');
		$table->integer('year')->default(2000);
		
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
       Schema::drop('book_catalog');
    }
}
