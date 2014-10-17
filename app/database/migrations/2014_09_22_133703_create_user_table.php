<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function($table)
		{
			$table->increments('id');
			$table->string('first_name', 35);
			$table->string('last_name', 35);
			$table->string('email', 255);
			$table->timestamps();
			$table->rememberToken();
			$table->boolean('admin');
			$table->string('password');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user');
	}

}
