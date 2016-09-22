<?php

namespace ZiNETHQ\SparkRoles\Console;

use Carbon\Carbon;
use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'spark:roles:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the migrations for Spark Roles into the application';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $date = Carbon::now();

        foreach ($this->getMigrations() as $key => $migration) {

            $timestamp = $date->addSeconds($key)->format('Y_m_d_His');

            copy(
                realpath(__DIR__."/../../migrations/{$migration}.php"),
                database_path("migrations/{$timestamp}_{$migration}.php")
            );
        }

        $this->comment('Spark Roles installed. Inspirational phrase!');
    }

    /**
     * Get the appropriate migration files.
     *
     * @return array
     */
    protected function getMigrations()
    {
        return [
            'create_team_roles_table',
            'create_team_permissions_table',
            'create_team_permission_team_role_table',
            'create_team_team_role_table',
        ];
    }
}
