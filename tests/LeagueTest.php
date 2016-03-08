<?php

	require_once 'src/League.php';

	class LeagueTest extends PHPUnit_Framework_TestCase
	{

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
	}

?>
