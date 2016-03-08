<?php
	 class User
		{
		private $first_name;
		private $user_name;
		private $password;
		private $id;

		function __construct($first_name, $user_name, $password, $id = null)
		{
			$this->first_name = $first_name;
			$this->user_name = $user_name;
			$this->password = $password;
			$this->id = $id;
		}

		function getUserName()
		{
			return $this->user_name;
		}

		function setUserName()
		{
			$this->user_name = $user_name;
		}

		function getFirstName()
		{
			return $this->first_name;
		}

		function setFirstName()
		{
			$this->first_name = $first_name;
		}

		function setPassword()
		{
			$this->password = $password;
		}

		function getId()
		{
			return $this->id;
		}
	}
 ?>
