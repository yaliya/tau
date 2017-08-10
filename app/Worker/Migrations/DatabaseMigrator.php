<?php

namespace Tau\Worker\Migrations;

use Tau\Worker\Migrator;
use Illuminate\Database\Schema\Blueprint;

class DatabaseMigrator implements Migrator
{
	public function up($schema) 
	{
		//Create
		(new TestMigration)->up($schema);

		return "Migrations updated \n";
	}

	public function down($schema) 
	{
		//Drop
		(new TestMigration)->down($schema);

		return "Migrations deleted \n";
	}
};