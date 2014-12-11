<?php namespace IntercomApi;

use Illuminate\Support\ServiceProvider;


class IntercomServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->singleton('\IntercomApi\Api', function($app)
		{
			return new \IntercomApi\Api($app['config']['intercom']);
		});
	}
}