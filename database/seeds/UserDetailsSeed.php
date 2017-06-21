<?php

use Illuminate\Database\Seeder;

class UserDetailsSeed extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
    DB::table('user_details')->delete();
	$user_details = array(
		array(
			'owner_id' => 2,
			'real_name' => 'Terry', 
			'gender' => 1,
			'fav_book' => 'Of Mice And Programmers',
			'fav_genre' => 'White Pages',
			'fav_author' => 'Harry Potter',
			'region' => 'Colorado',
			'country' => 'USA'
			)
		);
	DB::table('user_details')->insert($user_details);
    }
}
