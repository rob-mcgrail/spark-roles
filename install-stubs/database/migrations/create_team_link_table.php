<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamLinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_link', function (Blueprint $table) {
            $table->integer('parent')->unsigned()->index();
            $table->foreign('parent')->references('id')->on('teams')->onDelete('cascade');
            $table->integer('child')->unsigned()->index();
            $table->foreign('child')->references('id')->on('teams')->onDelete('cascade');
            $table->string('role', 20);
            $table->timestamps();
            $table->unique(['parent', 'child']);
        });
    }

    /**
     * Reverse the migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('team_link');
    }
}
