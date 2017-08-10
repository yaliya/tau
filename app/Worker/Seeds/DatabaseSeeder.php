<?php

namespace Tau\Worker\Seeds;

use Tau\Worker\Seeder;

class DatabaseSeeder implements Seeder
{
	public function run() 
	{
		//Code
		(new UsersTableSeeder)->run();

		return "Seeders completed \n";
	}

	public function clear() 
	{
		//Code
		(new UsersTableSeeder)->clear();

		return "Seeders cleared \n";
	}
};