<?php namespace IntercomApi;

use Illuminate\Support\ServiceProvider;


class IntercomApiServiceProvider extends ServiceProvider {

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
		$this->app->singleton('\IntercomApi\Api', function($app, $parameters)
		{
			return new \IntercomApi\Api($parameters);
		});
	}
}