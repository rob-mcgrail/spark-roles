<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamPermissionTeamRoleTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('team_permission_team_role', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('permission_id')->unsigned()->index();
			$table->foreign('permission_id')->references('id')->on('team_permissions')->onDelete('cascade');
			$table->integer('role_id')->unsigned()->index();
			$table->foreign('role_id')->references('id')->on('team_roles')->onDelete('cascade');
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
		Schema::drop('team_permission_team_role');
	}
}