<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
    DB::table('users')->delete();
	$users = array(
		array(
			'name' => 'Terry',
			'password' => Hash::make('terry'), 
			'email' => 'test@test.com'
			)
		);
	DB::table('users')->insert($users);
    }
}
