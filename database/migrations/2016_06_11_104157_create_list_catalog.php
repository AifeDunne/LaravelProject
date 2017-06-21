<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListCatalog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('list_catalog', function(Blueprint $table) {
		$table->increments('id');
		$table->integer('owner_id')->default(0);
		$table->integer('list_id')->default(0);
		$table->string('list_array')->default('None');
		$table->string('list_title')->default('None');
		$table->integer('fullCount')->default(0);
		
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
        Schema::drop('list_catalog');
    }
}
