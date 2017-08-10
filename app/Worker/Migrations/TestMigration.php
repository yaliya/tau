<?php

namespace Tau\Worker\Migrations;

use Tau\Worker\Migrator;
use Illuminate\Database\Schema\Blueprint;

class TestMigration implements Migrator
{
	public function up($schema) 
	{
		//Create
		$schema->create('test_table', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
		});
	}

	public function down($schema) 
	{
		//Drop
		$schema->dropIfExists('test_table');
	}
};