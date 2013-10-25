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
			$query = "INSERT into users (username, email, password, clean_password, access, admin)
			values('".mysql_escape_string($this->username)."','".mysql_escape_string($this->email)."','".mysql_escape_string($this->password)."','".mysql_escape_string($this->clean_password)."','1','".mysql_escape_string($this->type)."')";
			echo $database->execute($query);
		}
		
	}

?>
