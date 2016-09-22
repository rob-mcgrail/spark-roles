<?php
namespace ZiNETHQ\SparkRoles;

use Blade;
use Illuminate\Support\ServiceProvider;
use ZiNETHQ\SparkRoles\Console\InstallCommand;

class SparkRolesServiceProvider extends ServiceProvider
{
	/**
	 * Indicates of loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Boot the service provider
	 *
	 * @return null
	 */
	public function boot()
	{
		$this->publishes([
			__DIR__.'/../install-stubs/config' => $this->app->config_path(),
			__DIR__.'/../install-stubs/model' => $this->app->app_path(),
		]);

		$this->registerBladeDirectives();
	}

	/**
	 * Register the service provider
	 *
	 * @return void
	 */
	public function register()
	{
		$this->mergeConfigFrom(
			__DIR__.'/../install-stubs/config/sparkteam.php', 'sparkteam'
		);

		$this->app->singleton('sparkroles', function ($app) {
			$auth = $app->make('Illuminate\Contracts\Auth\Guard');

			return new \ZiNETHQ\SparkRoles\SparkRoles($auth);
		});

		if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
	}

	/**
	 * Register the blade directives.
	 *
	 * @return void
	 */
	protected function registerBladeDirectives()
	{
		Blade::directive('teamcan', function($expression) {
			return "<?php if (\\SparkRoles::can({$expression})): ?>";
		});

		Blade::directive('endteamcan', function($expression) {
			return "<?php endif; ?>";
		});

		Blade::directive('teamcanatleast', function($expression) {
			return "<?php if (\\SparkRoles::canAtLeast({$expression})): ?>";
		});

		Blade::directive('endteamcanatleast', function($expression) {
			return "<?php endif; ?>";
		});

		Blade::directive('teamrole', function($expression) {
			return "<?php if (\\SparkRoles::is({$expression})): ?>";
		});

		Blade::directive('endteamrole', function($expression) {
			return "<?php endif; ?>";
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return ['teamroles'];
	}
}
