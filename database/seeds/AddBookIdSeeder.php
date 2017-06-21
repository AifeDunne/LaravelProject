<?php

use Illuminate\Database\Seeder;

class AddBookIdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('AddBookIdList')->delete();
	$AddBookId = array(
		array(
			'id' => 1,
			'arr_id' => 1, 
			'all_id' => 9780547951942,
			'owner_id' => 2),
		array(
			'id' => 2,
			'arr_id' => 2, 
			'all_id' => 9780553802023,
			'owner_id' => 2),
		array(
			'id' => 3,
			'arr_id' => 3, 
			'all_id' => 9780753516898,
			'owner_id' => 2),
		array(
			'id' => 4,
			'arr_id' => 4, 
			'all_id' => 9780753516898,
			'owner_id' => 2),
		array(
			'id' => 5,
			'arr_id' => 5, 
			'all_id' => 9780061965104,
			'owner_id' => 2),
		array(
			'id' => 6,
			'arr_id' => 6, 
			'all_id' => 0393062244,
			'owner_id' => 2)
		);
	DB::table('AddBookIdList')->insert($AddBookId);
    }
}
