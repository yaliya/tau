<?php

namespace Tau\Worker\Migrations;

use Tau\Worker\Migrator;
use Illuminate\Database\Schema\Blueprint;

class DatabaseMigrator implements Migrator
{
	public function up($schema) 
	{
		//Create
		(new CreateUsersTable)->up($schema);

		return "Migrations updated \n";
	}

	public function down($schema) 
	{
		//Drop
		(new CreateUsersTable)->down($schema);

		return "Migrations deleted \n";
	}
};