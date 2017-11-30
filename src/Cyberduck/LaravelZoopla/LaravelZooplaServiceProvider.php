<?php namespace Cyberduck\LaravelZoopla;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;

class LaravelZooplaServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
        $this->publishes([
            __DIR__.'/../../config/config.php' => config_path('zoopla.php'),
        ]);
	}

	/**
	 * Register the service provider.
	 *
	 * @return void    
	 */
	public function register()
	{
		$this->app->singleton('zoopla', function ($app) {

            $api_key  = $this->app['config']->get('zoopla.api_key');
            $endpoint = $this->app['config']->get('zoopla.endpoint');
            $client   = new Client();

            return new Zoopla($api_key, $endpoint, $client);

        });

        $this->app->bind('Cyberduck\LaravelZoopla\Zoopla', function($app)
        {
            return $app['zoopla'];
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return ['zoopla'];
	}

}
