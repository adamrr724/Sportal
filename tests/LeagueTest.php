<?php

	/**
	* @backupGlobals disabled
	* @backupStaticAttributes disabled
	*/

	require_once 'src/League.php';

	$server = 'mysql:host=localhost:8889;dbname=sportal_test';
	$username = 'root';
	$password = 'root';
	$DB = new PDO($server, $username, $password);


	class LeagueTest extends PHPUnit_Framework_TestCase
	{
		protected function tearDown()
				{
					League::deleteAll();
				}

		function test_getters()
		{
			$league_name = "Adams Soccer League";
			$sport_id = 1;
			$price = "90";
			$location = "1 Main Street, Portland Oregon";
			$skill_level = "All";
			$description = "Join this league!";
			$website = "www.adams.com";
			$email = "adam@asl.com";
			$org_id = 1;
			$id = 1;
			$test_league = new League($league_name, $sport_id, $price, $location, $skill_level, $description, $website, $email, $org_id, $id);

			$result1 = $test_league->getLeagueName();
			$result2 = $test_league->getSportId();
			$result3 = $test_league->getPrice();
			$result4 = $test_league->getLocation();
			$result5 = $test_league->getSkillLevel();
			$result6 = $test_league->getDescription();
			$result7 = $test_league->getWebsite();
			$result8 = $test_league->getEmail();
			$result9 = $test_league->getOrgId();
			$result10 = $test_league->getId();

			$this->assertEquals($league_name, $result1);
			$this->assertEquals($sport_id, $result2);
			$this->assertEquals($price, $result3);
			$this->assertEquals($location, $result4);
			$this->assertEquals($skill_level, $result5);
			$this->assertEquals($description, $result6);
			$this->assertEquals($website, $result7);
			$this->assertEquals($email, $result8);
			$this->assertEquals($org_id, $result9);
			$this->assertEquals($id, $result10);
		}

		function test_save()
		{
			//Arrange
			$league_name = "Adams Soccer League";
			$sport_id = 1;
			$price = "90";
			$location = "1 Main Street, Portland Oregon";
			$skill_level = "All";
			$description = "Join this league!";
			$website = "www.adams.com";
			$email = "adam@asl.com";
			$org_id = 1;
			$id = null;
			$test_league = new League($league_name, $sport_id, $price, $location, $skill_level, $description, $website, $email, $org_id, $id);

			//Act
			$test_league->save();
			$result = League::getAll();
			//Assert
			$this->assertEquals([$test_league], $result);
		}

		function test_getAll()
		{
			//Arrange
			$league_name = "Adams Soccer League";
			$sport_id = 1;
			$price = "90";
			$location = "1 Main Street, Portland Oregon";
			$skill_level = "All";
			$description = "Join this league!";
			$website = "www.adams.com";
			$email = "adam@asl.com";
			$org_id = 1;
			$id = null;
			$test_league = new League($league_name, $sport_id, $price, $location, $skill_level, $description, $website, $email, $org_id, $id);
			$test_league->save();

			$league_name2 = "Adams Soccer League";
			$sport_id2 = 1;
			$price2 = "90";
			$location2 = "1 Main Street, Portland Oregon";
			$skill_level2 = "All";
			$description2 = "Join this league!";
			$website2 = "www.adams.com";
			$email2 = "adam@asl.com";
			$org_id2 = 1;
			$test_league2 = new League($league_name2, $sport_id2, $price2, $location2, $skill_level2, $description2, $website2, $email2, $org_id2, $id);
			$test_league2->save();

			//Act
			$result = League::getAll();
			//Assert
			$this->assertEquals([$test_league, $test_league2], $result);
		}

		function test_deleteAll()
		{
			//Arrange
			$league_name = "Adams Soccer League";
			$sport_id = 1;
			$price = "90";
			$location = "1 Main Street, Portland Oregon";
			$skill_level = "All";
			$description = "Join this league!";
			$website = "www.adams.com";
			$email = "adam@asl.com";
			$org_id = 1;
			$id = null;
			$test_league = new League($league_name, $sport_id, $price, $location, $skill_level, $description, $website, $email, $org_id, $id);
			$test_league->save();

			$league_name2 = "Adams Soccer League";
			$sport_id2 = 1;
			$price2 = "90";
			$location2 = "1 Main Street, Portland Oregon";
			$skill_level2 = "All";
			$description2 = "Join this league!";
			$website2 = "www.adams.com";
			$email2 = "adam@asl.com";
			$org_id2 = 1;
			$test_league2 = new League($league_name2, $sport_id2, $price2, $location2, $skill_level2, $description2, $website2, $email2, $org_id2, $id);
			$test_league2->save();

			//Act
			League::deleteAll();
			//Assert
			$this->assertEquals([], League::getAll());
		}

		function test_find()
		{
			//Arrange
			$league_name = "Adams Soccer League";
			$sport_id = 1;
			$price = "90";
			$location = "1 Main Street, Portland Oregon";
			$skill_level = "All";
			$description = "Join this league!";
			$website = "www.adams.com";
			$email = "adam@asl.com";
			$org_id = 1;
			$id = null;
			$test_league = new League($league_name, $sport_id, $price, $location, $skill_level, $description, $website, $email, $org_id, $id);
			$test_league->save();

			$league_name2 = "Adams Soccer League";
			$sport_id2 = 1;
			$price2 = "90";
			$location2 = "1 Main Street, Portland Oregon";
			$skill_level2 = "All";
			$description2 = "Join this league!";
			$website2 = "www.adams.com";
			$email2 = "adam@asl.com";
			$org_id2 = 1;
			$test_league2 = new League($league_name2, $sport_id2, $price2, $location2, $skill_level2, $description2, $website2, $email2, $org_id2, $id);
			$test_league2->save();

			//Act
			$result = League::find($test_league->getId());
			//Assert
			$this->assertEquals($test_league, $result);
		}

		function test_delete()
		{
			//Arrange
			$league_name = "Adams Soccer League";
			$sport_id = 1;
			$price = "90";
			$location = "1 Main Street, Portland Oregon";
			$skill_level = "All";
			$description = "Join this league!";
			$website = "www.adams.com";
			$email = "adam@asl.com";
			$org_id = 1;
			$id = null;
			$test_league = new League($league_name, $sport_id, $price, $location, $skill_level, $description, $website, $email, $org_id, $id);
			$test_league->save();

			$league_name2 = "Adams Soccer League";
			$sport_id2 = 1;
			$price2 = "90";
			$location2 = "1 Main Street, Portland Oregon";
			$skill_level2 = "All";
			$description2 = "Join this league!";
			$website2 = "www.adams.com";
			$email2 = "adam@asl.com";
			$org_id2 = 1;
			$test_league2 = new League($league_name2, $sport_id2, $price2, $location2, $skill_level2, $description2, $website2, $email2, $org_id2, $id);
			$test_league2->save();

			//Act
			$test_league->delete();
			$result = League::getAll();
			//Assert
			$this->assertEquals([$test_league2], $result);
		}


	}

?>
