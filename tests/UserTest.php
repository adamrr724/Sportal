<?php

	/**
	* @backupGlobals disabled
	* @backupStaticAttributes disabled
	*/
	
	require_once 'src/User.php';

	$server = 'mysql:host=localhost:8889;dbname=sportal_test';
	$username = 'root';
	$password = 'root';
	$DB = new PDO($server, $username, $password);

	class UserTest extends PHPUnit_Framework_TestCase
	{

		function test_getters()
		{
			$first_name = "Adam";
			$user_name = "Adamrr724@yahoo.com";
			$password = "hello";
			$id = 1;
			$test_user = new User($first_name, $user_name, $password, $id);

			$result1 = $test_user->getUserName();
			$result2 = $test_user->getId();
			$result3 = $test_user->getFirstName();

			$this->assertEquals($user_name, $result1);
			$this->assertEquals($id, $result2);
			$this->assertEquals($first_name, $result3);
		}
	}

?>
