<?php

	require_once 'src/Sport.php';

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
