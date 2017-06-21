<?php

use Illuminate\Database\Seeder;

class AddIdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   DB::table('addidlist')->delete();
	$addidlist = array(
		array(
			'id' => 1,
			'arr_id' => 1, 
			'all_id' => 21,
			'owner_id' => 2),
		array(
			'id' => 2,
			'arr_id' => 2, 
			'all_id' => 22,
			'owner_id' => 2)
		);
	DB::table('addidlist')->insert($addidlist);
    }
}
