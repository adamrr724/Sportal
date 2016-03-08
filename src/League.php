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

		function setLeagueName()
		{
			$this->league_name = $league_name;
		}

		function getOrgId()
		{
			return $this->org_id;
		}

		function setOrgId()
		{
			$this->org_id = $org_id;
		}

		function getSportId()
		{
			return $this->sport_id;
		}

		function getPrice()
		{
			return $this->price;
		}

		function setPrice()
		{
			$this->price = $price;
		}

		function getSkillLevel()
		{
			return $this->skill_level;
		}

		function setSkillLevel()
		{
			$this->skill_level = $skill_level;
		}

		function getDescription()
		{
			return $this->description;
		}

		function setDescription()
		{
			$this->description = $description;
		}

		function getLocation()
		{
			return $this->location;
		}

		function setLocation()
		{
			$this->location = $location;
		}

		function getWebsite()
		{
			return $this->website;
		}

		function setWebsite()
		{
			$this->website = $website;
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
