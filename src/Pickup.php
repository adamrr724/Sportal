<?php
	 class Pickup
		{
		private $pickup_name;
		private $sport_id;
		private $location;
		private $date_time;
		private $recurring;
		private $skill_level;
		private $description;
		private $email;
		private $id;

		function __construct($pickup_name, $sport_id, $location, $date_time, $recurring, $skill_level, $description, $email, $id = null)
		{
			$this->pickup_name = $pickup_name;
			$this->sport_id = $sport_id;
			$this->location = $location;
			$this->date_time = $date_time;
			$this->recurring = $recurring;
			$this->skill_level = $skill_level;
			$this->description = $description;
			$this->email = $email;
			$this->id = $id;
		}

		function getPickupName()
		{
			return $this->pickup_name;
		}

		function setPickupName($new_pickup_name)
		{
			$this->pickup_name = $new_pickup_name;
		}

		function getSportId()
		{
			return $this->sport_id;
		}

		function setSportId($new_sport_id)
		{
			$this->sport_id = $new_sport_id;
		}

		function getLocation()
		{
			return $this->location;
		}

		function setLocation($new_location)
		{
			$this->location = $new_location;
		}

		function getRecurring()
		{
			return $this->recurring;
		}

		function setRecurring($new_recurring)
		{
			$this->recurring = $new_recurring;
		}

		function getSkillLevel()
		{
			return $this->skill_level;
		}

		function setSkillLevel($new_skill_level)
		{
			$this->skill_level = $new_skill_level;
		}

		function getDateTime()
		{
			return $this->date_time;
		}

		function setDateTime($new_date_time)
		{
			$this->date_time = $new_date_time;
		}


		function getDescription()
		{
			return $this->description;
		}

		function setDescription($new_description)
		{
			$this->description = $new_description;
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


		function save()
		{
			$GLOBALS['DB']->exec("INSERT INTO pickups (pickup_name, sport_id, location, date_time, recurring, skill_level, description, email) VALUES ('{$this->getPickupName()}', {$this->getSportId()}, '{$this->getLocation()}', '{$this->getDateTime()}', {$this->getRecurring()}, '{$this->getSkillLevel()}', '{$this->getDescription()}', '{$this->getEmail()}');");
			$this->id = $GLOBALS['DB']->lastInsertId();
		}

		static function getAll()
		{
			$returned_pickups = $GLOBALS['DB']->query("SELECT * FROM pickups");
			$pickups = array();
			foreach($returned_pickups as $pickup){
				 $pickup_name = $pickup['pickup_name'];
				 $sport_id = $pickup['sport_id'];
				 $location = $pickup['location'];
				 $date_time = $pickup['date_time'];
				 $recurring = $pickup['recurring'];
				 $skill_level = $pickup['skill_level'];
				 $description = $pickup['description'];
				 $email = $pickup['email'];
				 $id = $pickup['id'];
				 $new_pickup = new Pickup($pickup_name, $sport_id, $location, $date_time, $recurring, $skill_level, $description, $email, $id);
				 array_push($pickups, $new_pickup);
			}
			return $pickups;
		}

		static function deleteAll()
		{
			$GLOBALS['DB']->exec("DELETE FROM pickups");
		}

        static function find($id)
        {
            $all_pickups = Pickup::getAll();
            $found_pickup = null;
            foreach($all_pickups as $pickup) {
                $pickup_id = $pickup->getId();
                if ($pickup_id == $id) {
                    $found_pickup = $pickup;
                }
            }
            return $found_pickup;
        }

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM pickups WHERE id = {$this->getId()};");
        }

		function update($new_pickup_name, $new_location, $new_date_time, $new_recurring, $new_skill_level, $new_description, $new_email)
		{
		   $GLOBALS['DB']->exec("UPDATE pickups SET pickup_name = '{$new_pickup_name}', location = '{$new_location}', date_time = '{$new_date_time}', recurring = '{$new_recurring}', skill_level = '{$new_skill_level}', description = '{$new_description}', email = '{$new_email}' WHERE id={$this->getId()};");
		   $this->setPickupName($new_pickup_name);
		   $this->setLocation($new_location);
		   $this->setDateTime($new_date_time);
		   $this->setRecurring($new_recurring);
		   $this->setSkillLevel($new_skill_level);
		   $this->setDescription($new_description);
		   $this->setEmail($new_email);
		}

	   static function search($search_term)
        {
            $query = $GLOBALS['DB']->query("SELECT * FROM pickups WHERE pickup_name LIKE '%{$search_term}%'");
            $all_pickups = $query->fetchAll(PDO::FETCH_ASSOC);
            $found_pickups = array();
            foreach ($all_pickups as $pickup) {
                $pickup_name = $pickup['pickup_name'];
                $sport_id = $pickup['sport_id'];
                $location = $pickup['location'];
                $date_time = $pickup['date_time'];
                $date_time = $pickup['date_time'];
                $recurring = $pickup['recurring'];
                $skill_level = $pickup['skill_level'];
                $description = $pickup['description'];
                $email = $pickup['email'];
                $id = $pickup['id'];
                $new_pickup = new Pickup($pickup_name, $sport_id, $location, $date_time, $recurring, $skill_level, $description, $email, $id);
                array_push($found_pickups, $new_pickup);
            }
            return $found_pickups;
        }

	}
 ?>
