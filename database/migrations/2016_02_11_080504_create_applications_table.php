<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('applications', function(Blueprint $table){
		    $table->increments('id');
		    $table->string('nama_aplikasi');
		    $table->string('deskripsi');
		    $table->string('return_url');
		    $table->string('remote_login_url');
		    $table->string('remote_logout_url');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('applications');
	}

}
