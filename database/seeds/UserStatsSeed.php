<?php

use Illuminate\Database\Seeder;

class UserStatsSeed extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
    DB::table('user_stats')->delete();
	$user_stats = array(
		array(
			'owner_id' => 2,
			'crnt_count' => 0, 
			'list_count' => 0,
			'all_count' => 0
			)
		);
	DB::table('user_stats')->insert($user_stats);
    }
}
