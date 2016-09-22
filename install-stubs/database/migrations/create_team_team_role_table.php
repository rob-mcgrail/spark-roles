<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleTeamTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('team_role_team', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('role_id')->unsigned()->index();
			$table->foreign('role_id')->references('id')->on('team_roles')->onDelete('cascade');
			$table->integer('team_id')->unsigned()->index();
			$table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migration.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('team_role_team');
	}
}