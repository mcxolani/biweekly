<<<<<<< HEAD
<?php
ob_start(); 
=======
<<<<<<< HEAD
<?php
ob_start(); 
=======
<<<<<<< HEAD
<?php
ob_start(); 
=======
<?php 
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
session_start();
require "includes/dbconn.class.php";

	class Core{
<<<<<<< HEAD
	
=======

>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
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
		
<<<<<<< HEAD
		if(mysql_num_rows($run_query) <= 0){
			echo '<h4>no product found</h4>';
		}
		while($row = mysql_fetch_assoc($run_query)){
				$product .= "<div class=\"row\">";
				$product .= "<div class=\"col-lg-6\">";
				$product .= "<img width='100%' height='300px' src='".$row['image']."'/>";
				$product .= "</div>";
				$product .= "<div class=\"col-lg-6\">";

				$product .= "Name: ".$row['name'];
				$product .= "<br><br>Price: R".number_format($row['unit_price'], 2);
				$product .=  "<br><br><a class=\"btn btn-success\" href='product.php?add_to_cart=".$id."&prodid=".$id."'>add to cart</a><br>";
				$product .=	"<br><br><a class=\"btn btn-info\" href=\"cart.php\" >Go to Cart</a>";

				$product .= "</div >";
				$product .= "</div >";

				$product .= "<div class=\"row\">";
				$product .= "<br>Description: ".$row['description']."</div>";
				$product .= "</div >";
		}
		
	return $product;
	
	}
	//diplay product when editing
	function get_product_edit($id){	

		$query = "SELECT * FROM product WHERE id='$id'";
		$run_query = mysql_query($query);
		
=======
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
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
<<<<<<< HEAD
					echo "<a href='product.php?prodid=".$row['id']."'><img width='100%' height='150px' src='".$row['image']."'/></a>";
					echo "<a href='product.php?prodid=".$row['id']."'>".$row['name']."</a><hr>";
					echo "<span class=\"badge pull-right\">R".number_format($row['unit_price'], 2)."</span><br>";
					echo ' </div>';
=======
					echo "<a href='product.php?prodid=".$row['id']."'><img width='100%' height='150px' src='".$row['image']."'/></a><hr>";
					echo "<a href='product.php?prodid=".$row['id']."'>".$row['name']."</a><span class=\"badge pull-right\">R".number_format($row['unit_price'], 2)."</span>";
					echo ' </div><br>';
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
					echo ' </div>';
					if($count%4==0){
					echo '  </div >';
				}
					$count++;
				}
	}
	//delete category
	function delete_cat($id){
<<<<<<< HEAD
		$db = new DatabaseConnection;
=======
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
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
<<<<<<< HEAD
	function reject_order($order_num){
		$query = "UPDATE orders set order_status='2' where order_num='$order_num'";
			$run_query = mysql_query($query);
			if(mysql_affected_rows()==1){
					header("Location: orders.php?message=Order Rejected");
				}else{
					header("Location: orders.php?error=Could not Rejected Order");
				}
	}
	function approve_order($order_num){
		$query = "UPDATE orders set order_status='1' where order_num='$order_num'";
			$run_query = mysql_query($query);
			if(mysql_affected_rows()==1){
					header("Location: orders.php?message=Order Approved");
				}else{
					header("Location: orders.php?error=Could not Approved Order");
				}
	}	
=======
	
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
}
?>