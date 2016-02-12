<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumsToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
            $table->string('nip');
			$table->string('kemenkeu');
			$table->string('depkeu');
			$table->integer('role');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
            $table->dropColumn('nip');
			$table->dropColumn('kemenkeu');
			$table->dropColumn('depkeu');
			$table->dropColumn('role');
		});
	}

}
