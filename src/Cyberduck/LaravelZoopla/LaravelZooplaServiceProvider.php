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
		$this->package('cyberduck/laravel-zoopla');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void    
	 */
	public function register()
	{
		$this->app['zoopla'] = $this->app->share(function ($app) {

            $api_key  = isset($_ENV['laravel-zoopla.api_key']) ? $_ENV['laravel-zoopla.api_key'] : $this->app['config']->get('laravel-zoopla::api_key');
            $endpoint = isset($_ENV['laravel-zoopla.endpoint']) ? $_ENV['laravel-zoopla.endpoint'] : $this->app['config']->get('laravel-zoopla::endpoint');
            $client   = new Client();

            return new Zoopla($api_key, $endpoint, $client);

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
