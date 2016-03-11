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
	}

?>
