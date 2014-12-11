<?php namespace IntercomApi;


use Intercom\IntercomBasicAuthClient;

class Api {

	protected $intercom;

	protected $event_name = 'purchase';

	public function __construct($intercom){

		$this->intercom = $intercom;
	}



	/**
	 * @param $userId
	 * @param $eventName
	 * @param $eventProperties
	 */
	public function pushEvent($userId, $eventName, $eventProperties)
	{
		$event_data = array_merge($eventProperties, array(
			'user_id'=>$userId,
			'event_name'=>$eventName,
			'created_at' => time()
		));

		$this->intercom->createEvent($event_data);
	}



	/**
	 * @param $userId
	 * @param $price
	 */
	public function pushPurchase($userId, $price)
	{
		$eventProperties = array(
			'price'=>array(
				"currency" => "usd",
				"amount" => $price
			)
		);

		$this->pushEvent($userId, $this->event_name, $eventProperties);
	}



	/**
	 * @param $userId
	 * @param $userProperties
	 * @return array
	 */
	public function createUser($userId, $userProperties)
	{
		// Create a new user with more details
		$user_data = array_merge($userProperties, array(
			'user_id'=>$userId
		));

		$user = $this->intercom->createUser($user_data);

		return $user;
	}



	/**
	 * @param $userId
	 * @param $property
	 * @param $value
	 * @return array
	 */
	public function updateProperty($userId, $property, $value)
	{
		$user_data = array(
			'id'=>$userId,
			$property=>$value,
		);

		$user = $this->intercom->updateUser($user_data);

		return $user;
	}

}