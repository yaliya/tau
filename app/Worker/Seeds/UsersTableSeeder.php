<?php

namespace Tau\Worker\Seeds;

use Tau\Worker\Seeder;

use Tau\Models\User;

class UsersTableSeeder implements Seeder
{
	public function run() 
	{
		//Code
		User::create([
			'name' => 'Tau User'
		]);
	}

	public function clear() 
	{
		//Code
		User::getQuery()->delete();
	}
};