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

		function setPickupName()
		{
			$this->pickup_name = $pickup_name;
		}

		function getSportId()
		{
			return $this->sport_id;
		}

		function getLocation()
		{
			return $this->location;
		}

		function setLocation()
		{
			$this->location = $location;
		}

		function getRecurring()
		{
			return $this->recurring;
		}

		function getSkillLevel()
		{
			return $this->skill_level;
		}

		function setSkillLevel()
		{
			$this->skill_level = $skill_level;
		}

		function getDateTime()
		{
			return $this->date_time;
		}

		function setDateTime()
		{
			$this->date_time = $date_time;
		}


		function getDescription()
		{
			return $this->description;
		}

		function setDescription()
		{
			$this->description = $description;
		}

		function getEmail()
		{
			return $this->email;
		}

		function setEmail()
		{
			$this->email = $email;
		}

		function getId()
		{
			return $this->id;
		}
	}
 ?>
