<?php
	include 'includes/header.php';
		if(isset($_GET['allow'])){
		$id = $_GET['allow'];
		$query = "UPDATE users set access='1' where id='$id'";
			mysql_query($query);
			if(mysql_affected_rows()==1){
					header("Location: users.php?message=User Allowed");
						die();
				}else{
					header("Location: users.php?message=Could not Allow a User");
						die();
				}
		
	}

	if(isset($_GET['block'])){
		$id = $_GET['block'];
		$query = "UPDATE users set access='0' where id='$id'";
			mysql_query($query);
			if(mysql_affected_rows()==1){
					header("Location: users.php?message=User Blocked");
					die();
				}else{
					header("Location: users.php?message=Could not Block a User");
						die();
				}
		
	}


	if(isset($_GET['delete'])){
		$id = $_GET['delete'];
			$query = "delete from users where id='$id' limit 1";
			mysql_query($query);
			if(mysql_affected_rows()==1){
					header("Location: users.php?message=User Deleted");
						die();
				}else{
					header("Location: users.php?message=Could not Delete a User");
						die();
				}
		
	}

?>