<?php
	 class User
		{
		private $user_name;
		private $password;
		private $email;
		private $id;

		function __construct($user_name, $password, $email, $id = null)
		{
			$this->user_name = $user_name;
			$this->password = $password;
			$this->email = $email;
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

		function getPassword()
		{
			return $this->password;
		}

		function setPassword()
		{
			$this->password = $password;
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
