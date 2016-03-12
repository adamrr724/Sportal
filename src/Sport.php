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

		function save()
		{
			$GLOBALS['DB']->exec("INSERT INTO sports (sport_name) VALUES ('{$this->getSportName()}');");
			$this->id = $GLOBALS['DB']->lastInsertId();
		}

		static function getAll()
		{
			$returned_sports = $GLOBALS['DB']->query("SELECT * FROM sports");
			$sports = array();
			foreach($returned_sports as $sport){
				 $sport_name = $sport['sport_name'];
				 $id = $sport['id'];
				 $new_sport = new Sport($sport_name, $id);
				 array_push($sports, $new_sport);
			}
			return $sports;
		}

		static function deleteAll()
		{
			$GLOBALS['DB']->exec("DELETE FROM sports");
		}

		static function find($id)
		{
			$all_sports = Sport::getAll();
			$found_sport = null;
			foreach($all_sports as $sport) {
				$sport_id = $sport->getId();
				if ($sport_id == $id) {
					$found_sport = $sport;
				}
			}
			return $found_sport;
		}
	}
 ?>
