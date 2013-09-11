<?php
	if(!class_exists(DatabaseConnection)){ 

		class DatabaseConnection{
		private $host = 'localhost';
		private $user = 'root';
		private $password = '';
		private $db = 'project';
		
		function establsh_con(){
			$con = mysql_connect($this->host,$this->user,$this->password)or die('could not connect');
			mysql_select_db($this->db);
			return $con;
		}
		function execute($query){
			$run_query = mysql_query($query);
			
			if($row = mysql_affected_rows()==1){
				return 'Successfully Registered <br>';
			}else{
				return 'ERROR could not add to database <br>';
			}

		}
	}
}
?>