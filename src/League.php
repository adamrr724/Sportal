<?php

	 class League
		{
		private $league_name;
		private $sport_id;
		private $price;
		private $location;
		private $skill_level;
		private $description;
		private $website;
		private $email;
		private $org_id;
		private $id;

		function __construct($league_name, $sport_id, $price, $location, $skill_level, $description, $website, $email, $org_id = null, $id = null)
		{
			$this->league_name = $league_name;
			$this->sport_id = $sport_id;
			$this->price = $price;
			$this->location = $location;
			$this->skill_level = $skill_level;
			$this->description = $description;
			$this->website = $website;
			$this->email = $email;
			$this->org_id = $org_id;
			$this->id = $id;
		}


		function getLeagueName()
		{
			return $this->league_name;
		}

		function setLeagueName($new_league_name)
		{
			$this->league_name = $new_league_name;
		}

		function getOrgId()
		{
			return $this->org_id;
		}

		function setOrgId($new_org_id)
		{
			$this->org_id = $new_org_id;
		}

		function getSportId()
		{
			return $this->sport_id;
		}

		function getPrice()
		{
			return $this->price;
		}

		function setPrice($new_price)
		{
			$this->price = $new_price;
		}

		function getSkillLevel()
		{
			return $this->skill_level;
		}

		function setSkillLevel($new_skill_level)
		{
			$this->skill_level = $new_skill_level;
		}

		function getDescription()
		{
			return $this->description;
		}

		function setDescription($new_description)
		{
			$this->description = $new_description;
		}

		function getLocation()
		{
			return $this->location;
		}

		function setLocation($new_location)
		{
			$this->location = $new_location;
		}

		function getWebsite()
		{
			return $this->website;
		}

		function setWebsite($new_website)
		{
			$this->website = $new_website;
		}

		function getEmail()
		{
			return $this->email;
		}

		function setEmail($new_email)
		{
			$this->email = $new_email;
		}

		function getId()
		{
			return $this->id;
		}

		// DOESNT SEEM TO BE WORING PROPERLY!\/\/\/\/
		function save()
		{
			$GLOBALS['DB']->exec("INSERT INTO leagues (league_name, sport_id, price, skill_level, description, location, website, email, org_id) VALUES ('{$this->getLeagueName()}', {$this->getSportId()}, {$this->getPrice()}, '{$this->getSkillLevel()}', '{$this->getDescription()}', '{$this->getLocation()}', '{$this->getWebsite()}', '{$this->getEmail()}', {$this->getOrgId()});");
			$this->id = $GLOBALS['DB']->lastInsertId();
		}

		static function getAll()
		{
			$returned_leagues = $GLOBALS['DB']->query("SELECT * FROM leagues");
			$leagues = array();
			foreach($returned_leagues as $league){
				 $league_name = $league['league_name'];
				 $sport_id = $league['sport_id'];
				 $price = $league['price'];
				 $skill_level = $league['skill_level'];
				 $description = $league['description'];
				 $location = $league['location'];
				 $website = $league['website'];
				 $email = $league['email'];
				 $org_id = $league['org_id'];
				 $id = $league['id'];
				 $new_league = new League($league_name, $sport_id, $price, $location, $skill_level, $description, $website, $email, $org_id, $id);
				 array_push($leagues, $new_league);
			}
			return $leagues;
		}

		static function deleteAll()
		{
			$GLOBALS['DB']->exec("DELETE FROM leagues");
		}

        static function find($id)
        {
            $all_leagues = League::getAll();
            $found_league = null;
            foreach($all_leagues as $league) {
                $league_id = $league->getId();
                if ($league_id == $id) {
                    $found_league = $league;
                }
            }
            return $found_league;
        }

		function getSportNameById($sport_id) {
			$returned_sports = $GLOBALS['DB']->query('SELECT * FROM sports');
			foreach($returned_sports as $sport) {
				$id = $sport['id'];
				$name = $sport['sport_name'];
				if ($sport_id == $id) {
					return $name;
				}
			}
		}

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM leagues WHERE id = {$this->getId()};");
        }
	}
 ?>
