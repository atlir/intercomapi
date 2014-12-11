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
		$this->app->singleton('\IntercomApi\Api', function($app)
		{
			return new \IntercomApi\Api(array(
				'app_id' => 'gn0zv6mj',
				'api_key' => '0da62f3522487aa824f116ffce806b018d667c95'
			));
		});
	}
}