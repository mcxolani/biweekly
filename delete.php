<?php
include 'core.php'; 
	require 'db_con.php';

	
		if(!getuserfield('admin')){
		die();
	}
	
	if(isset($_GET['id'])){
	
		$query = "delete from product where id=".$_GET['id'];
		
		$run_query = mysql_query($query);
		
		if(mysql_affected_rows()){
			header("Location: manage.php?message=Item Deleted");
				die();
		}
	}
	?>
	
<?php
include 'includes/footer.php';
?>
