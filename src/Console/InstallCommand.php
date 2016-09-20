<?php

namespace ZiNETHQ\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shinobi:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the ZiNETHQ Shinobi migrations into the application';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        (new Filesystem)->cleanDirectory(database_path('migrations'));

        $date = Carbon::now();

        foreach ($this->getMigrations() as $key => $migration) {

            $timestamp = $date->addSeconds($key)->format('Y_m_d_His');

            copy(
                'migrations/'.$migration.'.php',
                database_path('migrations/'.$timestamp.'_'.$migration.'.php')
            );
        }

        $this->comment('ZiNETHQ Shinobi installed. Inspirational phrase!');
    }

    /**
     * Get the appropriate migration files.
     *
     * @return array
     */
    protected function getMigrations()
    {
        return [
            'create_roles_table',
            'create_permissions_table',
            'create_permission_role_table',
            'create_role_team_table',
        ];
    }
}
