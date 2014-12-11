<?php namespace IntercomApi;


use Intercom\IntercomBasicAuthClient;

class Api {

	protected $intercom;

	protected $event_name = 'purchase';

	public function __construct($credentials){

		$this->intercom = IntercomBasicAuthClient::factory($credentials);
	}

	public function pushEvent($userId, $eventName, $eventProperties)
	{
		$event_data = array_merge($eventProperties, array(
			'user_id'=>$userId,
			'event_name'=>$eventName,
			'created_at' => time()
		));

		$this->intercom->createEvent($event_data);
	}

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

	public function createUser($userId, $userProperties)
	{
		// Create a new user with more details
		$user_data = array_merge($userProperties, array(
			'user_id'=>$userId
		));

		$user = $this->intercom->createUser($user_data);

		return $user;
	}

	public function updateProperty($userId, $property, $value)
	{
		$user_data = array(
			'id'=>$userId,
			$property=>$value,
		);

		$user = $this->intercom->updateUser($user_data);

		return $user;
	}

	public function getUsers(){
		$users = $this->intercom->getUsers();
		return $users['users'];
	}

	public function getUserById($id){
		$user = $this->intercom->getUser(array("id" => $id));
		return $user;
	}

	public function getUserByEmail($email){
		$user = $this->intercom->getUser(array("email" => $email));
		return $user;
	}

	public function deleteUserById($id){
		$user = $this->intercom->deleteUser(array("id" => $id));
		return $user;
	}

	public function deleteUserByEmail($email){
		$user = $this->intercom->deleteUser(array("email" => $email));
		return $user;
	}

	public function deleteUserByUserId($userId){
		$user = $this->intercom->deleteUser(array("user_id" => $userId));
		return $user;
	}
} 