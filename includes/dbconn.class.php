<?php
	if(!class_exists(DatabaseConnection)){ 

		class DatabaseConnection{
		private $host = 'localhost';
		private $user = 'root';
		private $password = '';
		private $db = 'project';
		
		public function establsh_con(){
			$con = mysql_connect($this->host,$this->user,$this->password)or die('could not connect');
			mysql_select_db($this->db);
			return $con;
		}
		public function execute($query){
			$run_query = $this->query($query);
			
			if($row = mysql_affected_rows()==1){
				return 'Successfully Registered <br>';
			}else{
				return 'ERROR could not add to database <br>';
			}

		}
		
		public function query($sql){
			$results = mysql_query($sql);
			$this->query_confirm($results);
			return $results;
		}
		
		private	function query_confirm($result){
			if(!$result){
				die('Database query failed'.mysql_error());
			}
		}
	}
}
?>