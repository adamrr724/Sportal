<?php
	 class User
		{
		private $name;
		private $user_type;
		private $user_name;
		private $password;
		private $id;

		function __construct($name, $user_type, $user_name, $password, $id = null)
		{
			$this->name = $name;
			$this->user_type = $user_type;
			$this->user_name = $user_name;
			$this->password = $password;
			$this->id = $id;
		}

		function getUserName()
		{
			return $this->user_name;
		}

		function setUserName($new_user_name)
		{
			$this->user_name = $new_user_name;
		}

		function getUserType()
		{
			return $this->user_type;
		}

		function setUserType($new_user_type)
		{
			$this->user_type = $new_user_type;
		}

		function getName()
		{
			return $this->name;
		}

		function setName($new_name)
		{
			$this->name = $new_name;
		}

		function setPassword($new_password)
		{
			$this->password = $new_password;
		}

		function getPassword()
		{
			return $this->password;
		}

		function getId()
		{
			return $this->id;
		}

		function save()
		{
			$GLOBALS['DB']->exec("INSERT INTO users (name, user_type, username, password) VALUES ('{$this->getName()}', {$this->getUserType()}, '{$this->getUserName()}', '{$this->getPassword()}');");
			$this->id = $GLOBALS['DB']->lastInsertId();
		}

		static function getAll()
		{
			$returned_users = $GLOBALS['DB']->query("SELECT * FROM users");
			$users = array();
			foreach($returned_users as $user){
				 $name = $user['name'];
				 $user_type = $user['user_type'];
				 $user_name = $user['username'];
				 $password = $user['password'];
				 $id = $user['id'];
				 $new_user = new User($name, $user_type, $user_name, $password, $id);
				 array_push($users, $new_user);
			}
			return $users;
		}

		static function deleteAll()
		{
			$GLOBALS['DB']->exec("DELETE FROM users");
		}

		static function find($id)
		{
			$all_users = User::getAll();
			$found_user = null;
			foreach($all_users as $user) {
				$user_id = $user->getId();
				if ($user_id == $id) {
					$found_user = $user;
				}
			}
			return $found_user;
		}
	}
 ?>
