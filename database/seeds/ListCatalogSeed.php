<?php

use Illuminate\Database\Seeder;

class ListCatalogSeed extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
    DB::table('list_catalog')->delete();
	$listCatalog = array(
		array(
			'owner_id' => 2,
			'list_id' => 1, 
			'list_array' => '["","",""]',
			'list_title' => 'None',
			'list_order' => 1,
			'fullCount' => 0
			)
		);
	DB::table('list_catalog')->insert($listCatalog);
    }
}
