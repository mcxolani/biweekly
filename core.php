<<<<<<< HEAD
<?php
ob_start(); 
=======
<?php 
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
session_start();

	function loggedin(){
		if(isset($_SESSION['user_id'])){
			return true;
		}else{
			return false;
		}
	}
	
	function getuserfield($field){
		$query = "SELECT $field From users WHERE id=".$_SESSION['user_id']."";
		$run_query = mysql_query($query);
		if($results = mysql_result($run_query, 0, $field)){
			return $results;
		}
	}
	function clear_string($string){
		return mysql_real_escape_string(trim($string));
	}
?>