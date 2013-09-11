<?php 
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