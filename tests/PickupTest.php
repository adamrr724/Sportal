<?php
	/**
	* @backupGlobals disabled
	* @backupStaticAttributes disabled
	*/

	require_once 'src/Pickup.php';


	    $server = 'mysql:host=localhost:8889;dbname=sportal_test';
	    $username = 'root';
	    $password = 'root';
	    $DB = new PDO($server, $username, $password);


	class PickupTest extends PHPUnit_Framework_TestCase
	{
		protected function tearDown()
				{
					Pickup::deleteAll();
				}

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

		function test_save()
		{
			//Arrange
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

			//Act
			$test_pickup->save();
			$result = Pickup::getAll();
			//Assert
			$this->assertEquals([$test_pickup], $result);
		}

		function test_getAll()
		{
			//Arrange
			$pickup_name = "Adams Soccer Pickup";
			$sport_id = 1;
			$location = "1 Main Street, Portland Oregon";
			$date_time = "11:00 2016-03-12";
			$recurring = 0;
			$skill_level = "All";
			$description = "Join this pickup!";
			$email = "adam@asl.com";
			$id = null;
			$test_pickup = new Pickup($pickup_name, $sport_id, $location, $date_time, $recurring, $skill_level, $description, $email, $id);
			$test_pickup->save();

			$pickup_name2 = "Bills Soccer Pickup";
			$sport_id2 = 2;
			$location2 = "2 Main Street, Portland Oregon";
			$date_time2 = "9:00 2016-04-11";
			$recurring2 = 1;
			$skill_level2 = "Pro";
			$description2 = "Join this pickup now!";
			$email2 = "bill@asl.com";
			$test_pickup2 = new Pickup($pickup_name2, $sport_id2, $location2, $date_time2, $recurring2, $skill_level2, $description2, $email2, $id);
			$test_pickup2->save();

			//Act
			$result = Pickup::getAll();
			//Assert
			$this->assertEquals([$test_pickup, $test_pickup2], $result);
		}

		function test_deleteAll()
		{
			//Arrange
			$pickup_name = "Adams Soccer Pickup";
			$sport_id = 1;
			$location = "1 Main Street, Portland Oregon";
			$date_time = "11:00 2016-03-12";
			$recurring = 0;
			$skill_level = "All";
			$description = "Join this pickup!";
			$email = "adam@asl.com";
			$id = null;
			$test_pickup = new Pickup($pickup_name, $sport_id, $location, $date_time, $recurring, $skill_level, $description, $email, $id);
			$test_pickup->save();

			$pickup_name2 = "Bills Soccer Pickup";
			$sport_id2 = 2;
			$location2 = "2 Main Street, Portland Oregon";
			$date_time2 = "9:00 2016-04-11";
			$recurring2 = 1;
			$skill_level2 = "Pro";
			$description2 = "Join this pickup now!";
			$email2 = "bill@asl.com";
			$test_pickup2 = new Pickup($pickup_name2, $sport_id2, $location2, $date_time2, $recurring2, $skill_level2, $description2, $email2, $id);
			$test_pickup2->save();

			//Act
			Pickup::deleteAll();
			//Assert
			$this->assertEquals([], Pickup::getAll());
		}

		function test_find()
		{
			//Arrange
			$pickup_name = "Adams Soccer Pickup";
			$sport_id = 1;
			$location = "1 Main Street, Portland Oregon";
			$date_time = "11:00 2016-03-12";
			$recurring = 0;
			$skill_level = "All";
			$description = "Join this pickup!";
			$email = "adam@asl.com";
			$id = null;
			$test_pickup = new Pickup($pickup_name, $sport_id, $location, $date_time, $recurring, $skill_level, $description, $email, $id);
			$test_pickup->save();

			$pickup_name2 = "Bills Soccer Pickup";
			$sport_id2 = 2;
			$location2 = "2 Main Street, Portland Oregon";
			$date_time2 = "9:00 2016-04-11";
			$recurring2 = 1;
			$skill_level2 = "Pro";
			$description2 = "Join this pickup now!";
			$email2 = "bill@asl.com";
			$test_pickup2 = new Pickup($pickup_name2, $sport_id2, $location2, $date_time2, $recurring2, $skill_level2, $description2, $email2, $id);
			$test_pickup2->save();

			//Act
			$result = Pickup::find($test_pickup->getId());
			//Assert
			$this->assertEquals($test_pickup, $result);
		}

		function test_delete()
		{
			//Arrange
			$pickup_name = "Adams Soccer Pickup";
			$sport_id = 1;
			$location = "1 Main Street, Portland Oregon";
			$date_time = "11:00 2016-03-12";
			$recurring = 0;
			$skill_level = "All";
			$description = "Join this pickup!";
			$email = "adam@asl.com";
			$id = null;
			$test_pickup = new Pickup($pickup_name, $sport_id, $location, $date_time, $recurring, $skill_level, $description, $email, $id);
			$test_pickup->save();

			$pickup_name2 = "Bills Soccer Pickup";
			$sport_id2 = 2;
			$location2 = "2 Main Street, Portland Oregon";
			$date_time2 = "9:00 2016-04-11";
			$recurring2 = 1;
			$skill_level2 = "Pro";
			$description2 = "Join this pickup now!";
			$email2 = "bill@asl.com";
			$test_pickup2 = new Pickup($pickup_name2, $sport_id2, $location2, $date_time2, $recurring2, $skill_level2, $description2, $email2, $id);
			$test_pickup2->save();

			//Act
			$test_pickup->delete();
			$result = Pickup::getAll();
			//Assert
			$this->assertEquals([$test_pickup2], $result);
		}

		function test_update()
		{
			//Arrange
			$pickup_name = "Adams Soccer Pickup";
			$sport_id = 1;
			$location = "1 Main Street, Portland Oregon";
			$date_time = "11:00 2016-03-12";
			$recurring = 0;
			$skill_level = "All";
			$description = "Join this pickup!";
			$email = "adam@asl.com";
			$id = null;
			$test_pickup = new Pickup($pickup_name, $sport_id, $location, $date_time, $recurring, $skill_level, $description, $email, $id);
			$test_pickup->save();

			$pickup_name2 = "Bills Soccer Pickup";
			$location2 = "2 Main Street, Portland Oregon";
			$date_time2 = "9:00 2016-04-11";
			$recurring2 = 1;
			$skill_level2 = "Pro";
			$description2 = "Join this pickup now!";
			$email2 = "bill@asl.com";

			//Act
			$test_pickup->update($pickup_name2, $location2, $date_time2, $recurring2, $skill_level2, $description2, $email2);
			$db_output = Pickup::getAll();
			$found_pickup = $db_output[0];
			//Assert
			$this->assertEquals($pickup_name2, $found_pickup->getPickupName());
			$this->assertEquals($location2, $found_pickup->getLocation());
			$this->assertEquals($date_time2, $found_pickup->getDateTime());
			$this->assertEquals($recurring2, $found_pickup->getRecurring());
			$this->assertEquals($skill_level2, $found_pickup->getSkillLevel());
			$this->assertEquals($description2, $found_pickup->getDescription());
			$this->assertEquals($email2, $found_pickup->getEmail());
		}

		// function test_search()
		// {
		// 	//Arrange
		// 	$strain_name = "Blue Dream";
		// 	$dispensary_id = 1;
		// 	$pheno = "Indica";
		// 	$quantity = 1;
		// 	$id = null;
		// 	$test_dispensary_demand = new DispensaryDemand($strain_name, $dispensary_id, $pheno, $quantity, $id);
		// 	$test_dispensary_demand->save();
		// 	$strain_name2 = "Purple Haze";
		// 	$dispensary_id2 = 2;
		// 	$pheno2 = "Sativa";
		// 	$quantity2 = 1;
		// 	$test_dispensary_demand2 = new DispensaryDemand($strain_name2, $dispensary_id2, $pheno2, $quantity2, $id);
		// 	$test_dispensary_demand2->save();
		// 	$search_term = "Purple";
		// 	//Act
		// 	$result = DispensaryDemand::search($search_term);
		// 	//Assert
		// 	$this->assertEquals([$test_dispensary_demand2], $result);
		// }


	}

?>
