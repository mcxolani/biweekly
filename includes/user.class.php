<?php
require "dbconn.class.php";
	class User{
		public $email;
		public $username;
		public $password;
	
		function __construct($username, $email){
			$this->username = $username;
			$this->email = $email;
		}
		function set_password($password){
			$this->password = md5($password);
		}
		function display_user_info(){
			echo "Username is <strong>". $this->username. "</strong> and email is <strong>". $this->email."</strong>";
		}
		function save($username,$email,$password){
			$database = new DatabaseConnection;
			$con = $database->establsh_con();
			$query = "INSERT into users (username, email, password) values('".mysql_escape_string($username)."','".mysql_escape_string($email)."','".mysql_escape_string($password)."')";
			echo $database->execute($query);
		}
		
	}
?>
