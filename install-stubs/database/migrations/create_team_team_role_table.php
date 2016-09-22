<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamTeamRoleTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('team_team_role', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('team_id')->unsigned()->index();
			$table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
			$table->integer('team_role_id')->unsigned()->index();
			$table->foreign('team_role_id')->references('id')->on('team_roles')->onDelete('cascade');
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
		Schema::drop('team_team_role');
	}
}