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
		protected function tearDown()
		{
			User::deleteAll();
		}

		function test_getters()
		{
			$name = "Adam";
			$user_type = 1;
			$user_name = "Adamrr724@yahoo.com";
			$password = "hello";
			$id = 1;
			$test_user = new User($name, $user_type, $user_name, $password, $id);

			$result1 = $test_user->getUserName();
			$result2 = $test_user->getId();
			$result3 = $test_user->getName();

			$this->assertEquals($user_name, $result1);
			$this->assertEquals($id, $result2);
			$this->assertEquals($name, $result3);
		}

		function test_save()
		{
			//Arrange
			$name = "Adam";
			$user_type = 1;
			$user_name = "Adamrr724@yahoo.com";
			$password = "hello";
			$id = null;
			$test_user = new User($name, $user_type, $user_name, $password, $id);

			//Act
			$test_user->save();
			$result = User::getAll();
			//Assert
			$this->assertEquals([$test_user], $result);
		}

		function test_getAll()
		{
			//Arrange
			$name = "Adam";
			$user_type = 1;
			$user_name = "Adamrr724@yahoo.com";
			$password = "hello";
			$id = null;
			$test_user = new User($name, $user_type, $user_name, $password, $id);
			$test_user->save();

			$name2 = "Adam";
			$user_type2 = 1;
			$user_name2 = "Adamrr724@yahoo.com";
			$password2 = "hello";
			$test_user2 = new User($name, $user_type, $user_name, $password, $id);
			$test_user2->save();

			//Act
			$result = User::getAll();
			//Assert
			$this->assertEquals([$test_user, $test_user2], $result);
		}

		function test_deleteAll()
		{
			//Arrange
			$name = "Adam";
			$user_type = 1;
			$user_name = "Adamrr724@yahoo.com";
			$password = "hello";
			$id = null;
			$test_user = new User($name, $user_type, $user_name, $password, $id);
			$test_user->save();

			$name2 = "Adam";
			$user_type2 = 1;
			$user_name2 = "Adamrr724@yahoo.com";
			$password2 = "hello";
			$test_user2 = new User($name, $user_type, $user_name, $password, $id);
			$test_user2->save();

			//Act
			User::deleteAll();

			//Assert
			$this->assertEquals([], User::getAll());
		}

		function test_find()
		{
			//Arrange
			$name = "Adam";
			$user_type = 1;
			$user_name = "Adamrr724@yahoo.com";
			$password = "hello";
			$id = null;
			$test_user = new User($name, $user_type, $user_name, $password, $id);
			$test_user->save();

			$name2 = "Adam";
			$user_type2 = 1;
			$user_name2 = "Adamrr724@yahoo.com";
			$password2 = "hello";
			$test_user2 = new User($name, $user_type, $user_name, $password, $id);
			$test_user2->save();

			//Act
			$result = User::find($test_user->getId());

			//Assert
			$this->assertEquals($test_user, $result);
		}
	}

?>
