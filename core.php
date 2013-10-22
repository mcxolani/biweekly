<?php
ob_start(); 
session_start();

	class Core{

		//check if user is logged in
	function loggedin(){
		if(isset($_SESSION['user_id'])){
			return true;
		}else{
			return false;
		}
	}
	//gets the single field from user table;
	function getuserfield($field){
		$query = "SELECT $field From users WHERE id=".$_SESSION['user_id']."";
		$run_query = mysql_query($query);
		if($results = mysql_result($run_query, 0, $field)){
			return $results;
		}
	}
	//clear user string for sql injection
	function clear_string($string){
		return mysql_real_escape_string(trim($string));
	}
	//figure the user type  
	function type($admin){
		if($admin=='2'){
			return 'Admin';
		}else if($admin=='3'){
			return 'Stuff';
		}else{
			return 'Customer';
		}
	}
	
	//getting the one product from database for product page
	function get_product($id){	

		$query = "SELECT * FROM product WHERE id='$id'";
		$run_query = mysql_query($query);
		
		if(mysql_num_rows($run_query) > 0){
		
		while($row = mysql_fetch_assoc($run_query)){
				$name = "Name: ".$row['name'];
				$price = "Price: R".number_format($row['unit_price'], 2);
				$image = "<img width='40%' height='300px' src='".$row['image']."'";
				$descrp = "Description: ".$row['description'];
		}
		$product = array($name,$price,$image,$descrp);
		
	return $product;
	}	
	else{
			die('Item not found');
		}
	}
	//delete product from database
	function delete_product($product){
		$query = "delete from product where id=".$product;
		$run_query = mysql_query($query);
		if(mysql_affected_rows()){
			header("Location: manage.php?message=Item Deleted");
		}else{
			header("Location: manage.php?error=Could not delete a user");
		}
	}
	
	//allow user access
	function allow_user($id){
		$query = "UPDATE users set access='1' where id='$id'";
			$run_query = mysql_query($query);
			if(mysql_affected_rows()==1){
					header("Location: users.php?message=User Allowed");
				}else{
					header("Location: users.php?message=Could not Allow a User");
				}
		
	}
	//block user access
	function block_user($id){
		$query = "UPDATE users set access='0' where id='$id'";
			$run_query = mysql_query($query);
			if(mysql_affected_rows()==1){
					header("Location: users.php?message=User Blocked");
				}else{
					header("Location: users.php?message=Could not Block a User");
				}
		
	}
	//delete user from database
	function delete_user($id){
			$query = "delete from users where id='$id' limit 1";
			$run_query = mysql_query($query);
			if(mysql_affected_rows()==1){
					header("Location: users.php?message=User Deleted");
				}else{
					header("Location: users.php?message=Could not Delete a User");
				}		
	}
	//get the 4 new products for advertising
	function new_products(){
				$query = "SELECT * FROM product order by id desc limit 4";
				$run_query = mysql_query($query);
				$count = 1;
				while($row = mysql_fetch_assoc($run_query)){
			
				if($count%4==0){
					echo '  <div class="row">';
				}
				echo '  <div class="col col-lg-3 col-md-3 col-sm-6">';
					echo '<div class="thumbnail">';
					echo "<a href='product.php?prodid=".$row['id']."'><img width='100%' height='150px' src='".$row['image']."'/></a><hr>";
					echo "<a href='product.php?prodid=".$row['id']."'>".$row['name']."</a><span class=\"badge pull-right\">R".number_format($row['unit_price'], 2)."</span>";
					echo ' </div><br>';
					echo ' </div>';
					if($count%4==0){
					echo '  </div >';
				}
					$count++;
				}
	}
	//delete category
	function delete_cat($id){
			$query = "delete from categories where id='$id' limit 1";
			$run_query = mysql_query($query);
			if(mysql_affected_rows()==1){
					header("Location: categories.php?message=Category Deleted");
				}else{
					header("Location: categories.php?error=Could not Delete Category");
				}
	}
	//delete sub category
	function delete_sub_cat($id){
			$query = "delete from sub_categories where id='$id' limit 1";
			$run_query = mysql_query($query);
			if(mysql_affected_rows()==1){
					header("Location: categories.php?message=Sub Category Deleted");
				}else{
					header("Location: categories.php?error=Could not Delete Sub Category");
				}
	}
	
}
?>