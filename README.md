Require the package in your ``composer.json`` file

	"require": {
		...
		"atlir/intercomapi": "@dev"
	},


In the ``$providers`` array add the service providers for this package

	'IntercomApi\IntercomApiServiceProvider',




## USAGE
	
	$api = \App::make('\IntercomApi\Api', array(
				'app_id' => 'YOUR_APP_ID',
				'api_key' => 'YOUR_API_KEY'
			));