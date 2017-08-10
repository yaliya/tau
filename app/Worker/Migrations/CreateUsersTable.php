<?php

namespace Tau\Worker\Migrations;

use Tau\Worker\Migrator;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable implements Migrator
{
	public function up($schema) 
	{
		//Create
		$schema->create('users', function(Blueprint $table) {
			$table->increments('id')->unsigned();
			$table->string('name');
			$table->timestamps();
		});
	}

	public function down($schema) 
	{
		//Drop
		$schema->dropIfExists('users');
	}
};