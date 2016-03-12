<?php

	/**
	* @backupGlobals disabled
	* @backupStaticAttributes disabled
	*/

	require_once 'src/Sport.php';

	$server = 'mysql:host=localhost:8889;dbname=sportal_test';
	$username = 'root';
	$password = 'root';
	$DB = new PDO($server, $username, $password);


	class SportTest extends PHPUnit_Framework_TestCase
	{
		protected function tearDown()
		{
			Sport::deleteAll();
		}

		function test_getters()
		{
			$sport_name = "Soccer";
			$id = 1;
			$test_sport = new Sport($sport_name, $id);

			$result1 = $test_sport->getSportName();
			$result2 = $test_sport->getId();

			$this->assertEquals($sport_name, $result1);
			$this->assertEquals($id, $result2);
		}

		function test_save()
		{
			//Arrange
			$sport_name = "Soccer";
			$id = null;
			$test_sport = new Sport($sport_name, $id);

			//Act
			$test_sport->save();
			$result = Sport::getAll();
			//Assert
			$this->assertEquals([$test_sport], $result);
		}

		function test_getAll()
		{
			//Arrange
			$sport_name = "Soccer";
			$id = null;
			$test_sport = new Sport($sport_name, $id);
			$test_sport->save();

			$sport_name2 = "Basketball";
			$test_sport2 = new Sport($sport_name2, $id);
			$test_sport2->save();

			//Act
			$result = Sport::getAll();
			//Assert
			$this->assertEquals([$test_sport, $test_sport2], $result);
		}

		function test_deleteAll()
		{
			//Arrange
			$sport_name = "Soccer";
			$id = null;
			$test_sport = new Sport($sport_name, $id);
			$test_sport->save();

			$sport_name2 = "Basketball";
			$test_sport2 = new Sport($sport_name2, $id);
			$test_sport2->save();

			//Act
			Sport::deleteAll();
			//Assert
			$this->assertEquals([], Sport::getAll());
		}

		function test_find()
		{
			//Arrange
			$sport_name = "Soccer";
			$id = null;
			$test_sport = new Sport($sport_name, $id);
			$test_sport->save();

			$sport_name2 = "Basketball";
			$test_sport2 = new Sport($sport_name2, $id);
			$test_sport2->save();

			//Act
			$result = Sport::find($test_sport->getId());
			//Assert
			$this->assertEquals($test_sport, $result);
		}
	}

?>
