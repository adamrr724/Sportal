<?php

	require_once 'src/Pickup.php';

	class PickupTest extends PHPUnit_Framework_TestCase
	{

		function test_getters()
		{
			$pickup_name = "Adams Soccer Pickup";
			$sport_id = 1;
			$location = "1 Main Street, Portland Oregon";
			$date_time = "11:00 2016-03-12";
			$recurring = 0;
			$skill_level = "All";
			$description = "Join this pickup!";
			$email = "adam@asl.com";
			$id = 1;
			$test_pickup = new Pickup($pickup_name, $sport_id, $location, $date_time, $recurring, $skill_level, $description, $email, $id);

			$result1 = $test_pickup->getPickupName();
			$result2 = $test_pickup->getSportId();
			$result3 = $test_pickup->getLocation();
			$result4 = $test_pickup->getDateTime();
			$result5 = $test_pickup->getRecurring();
			$result6 = $test_pickup->getSkillLevel();
			$result7 = $test_pickup->getDescription();
			$result8 = $test_pickup->getEmail();
			$result9 = $test_pickup->getId();

			$this->assertEquals($pickup_name, $result1);
			$this->assertEquals($sport_id, $result2);
			$this->assertEquals($location, $result3);
			$this->assertEquals($date_time, $result4);
			$this->assertEquals($recurring, $result5);
			$this->assertEquals($skill_level, $result6);
			$this->assertEquals($description, $result7);
			$this->assertEquals($email, $result8);
			$this->assertEquals($id, $result9);
		}
	}

?>
