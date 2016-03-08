<?php
	 class Sport
		{
		private $sport_name;
		private $id;

		function __construct($sport_name, $id = null)
		{
			$this->sport_name = $sport_name;
			$this->id = $id;
		}

		function getSportName()
		{
			return $this->sport_name;
		}

		function setSportName()
		{
			$this->sport_name = $sport_name;
		}

		function getId()
		{
			return $this->id;
		}
	}
 ?>
