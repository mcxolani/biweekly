<?php
require "dbconn.class.php";
	class User{
		public $email;
		public $username;
		public $password;
		public $clean_password;
		public $type;
		function __construct($username, $email, $type='0'){
			$this->username = $username;
			$this->email = $email;
			$this->type = $type;
		}
		function set_password($password){
			$this->password = md5($password);
			$this->clean_password = ($password);
		}
		function display_user_info(){
			echo "Username is <strong>". $this->username. "</strong> and email is <strong>". $this->email."</strong>";
		}
		function save(){
			$database = new DatabaseConnection;
			$con = $database->establsh_con();
<<<<<<< HEAD
			$query = "INSERT into users (username, email, password, clean_password, access, admin)
			values('".mysql_escape_string($this->username)."','".mysql_escape_string($this->email)."','".mysql_escape_string($this->password)."','".mysql_escape_string($this->clean_password)."','1','".mysql_escape_string($this->type)."')";
=======
<<<<<<< HEAD
			$query = "INSERT into users (username, email, password, access) values('".mysql_escape_string($username)."','".mysql_escape_string($email)."','".mysql_escape_string($password)."','1')";
=======
			$query = "INSERT into users (username, email, password) values('".mysql_escape_string($username)."','".mysql_escape_string($email)."','".mysql_escape_string($password)."')";
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
			echo $database->execute($query);
		}
		
	}

?>
