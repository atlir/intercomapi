<?php

use \IntercomApi\Api;
use \Mockery as M;

class ApiTest extends PHPUnit_Framework_TestCase{

	protected function setUp(){

	}

	protected function tearDown(){
		M::close();
	}

	public function testPushEvent(){

		$userId = 54678654;
		$eventName = 'test event name';
		$eventProperties = array(
			'prop1' => 'value1',
			'prop2' => 'value2',
		);

		$mock = M::mock('\Intercom\IntercomBasicAuthClient');
		$mock->shouldReceive('createEvent')->with(M::type('array'))->once()->andReturnNull();

		$api = new \IntercomApi\Api($mock);
		$api->pushEvent($userId, $eventName, $eventProperties);
	}

	public function testPushPurchase(){

		$userId = 54678654;
		$price = 56;

		$mock = M::mock('\Intercom\IntercomBasicAuthClient');
		$mock->shouldReceive('createEvent')->with(M::type('array'))->once()->andReturnNull();

		$api = new \IntercomApi\Api($mock);
		$api->pushPurchase($userId, $price);
	}

	public function testCreateUser(){
		$userId = 54678654;
		$userProperties = [
			'prop1' => 'vallue1'
		];

		$mock = M::mock('\Intercom\IntercomBasicAuthClient');
		$mock->shouldReceive('createUser')->with(M::type('array'))->once();

		$api = new \IntercomApi\Api($mock);
		$api->createUser($userId, $userProperties);
	}

	public function testUpdateProperty(){
		$userId = 54678654;
		$property = 'prop1';
		$value = 'value1';

		$mock = M::mock('\Intercom\IntercomBasicAuthClient');
		$mock->shouldReceive('updateUser')->with(M::type('array'))->once();

		$api = new \IntercomApi\Api($mock);
		$api->updateProperty($userId, $property, $value);
	}
}