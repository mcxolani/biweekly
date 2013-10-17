<?php

	//require 'db_con.php';
	include 'includes/header.php';
	
	if(!loggedin()||!getuserfield('admin')){
		header("Location: index.php");
		die();
	}
	?>
	
<?php
		//Adding Products
		if(isset($_GET['message'])){
		$message .= $_GET['message'];
		}
		
		if(isset($_POST['update'])){
			$target_file = basename($_FILES['image']['name']);
	
			$name = $_POST['name'];
			$price = $_POST['price'];
			$descr = $_POST['descr'];
			$cat = $_POST['catagory'];
			$image = 'images/'.$target_file;
			if(!empty($name)&&!empty($price)&&!empty($image)&&!empty($descr)){
			$temp_file = $_FILES['image']['tmp_name'];
		
		$image_folder = "images";
		$uploaded=move_uploaded_file($temp_file, $image_folder.'\\'.$target_file);
			$id = $_GET['prodid'];
			$query = "UPDATE product set name='$name',unit_price='$price',image='$image',description='$descr' where id='$id'";
			mysql_query($query);
			if(mysql_affected_rows()==1){
					$message = 'Product Updated';
				}else{
					$message = 'Could not add product'.mysql_error();
				}
			}else{
				$message = 'must enter all fields';
			}
		}

?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
   <div class="container">
      <!-- Example row of columns -->
      <div class="row">
	  <section class="col-lg-8 ">
	  	  <?php 
	  if(isset($message)){
	  ?>
		<div class="alert alert-success">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <strong>Thanks!</strong> <?php echo $message;?>
		</div>
		<?php
		}
		?>
		<h4>Welcome to User Management <?php echo getuserfield('username');?></h4><hr>
</div>
</div>
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
	  <section class="col-lg-4 " >
				 <?php
				$query = "SELECT * FROM product order by id desc limit 4";
				$run_query = mysql_query($query);
			
				while($row = mysql_fetch_assoc($run_query)){
			
				}

			?>
			<form method="post" enctype="multipart/form-data" action="edit.php?prodid=<?php echo $_GET['prodid']; ?>">
				<fieldset>
					<legend>Update </legend>
					
							Product name: <input type="text" class="form-control" name="name" value="xolani">
					
					
							Product Price: <input type="text" class="form-control" name="price">
					
							Product Description: <textarea class="form-control" type="text"  name="descr"></textarea>
				
								Product Image: <input class="form-control" type="file" name="image"><br>
				
											<button type="submit" class="btn btn-default" value="Update" name="update">Update</button>
					<fieldset>
				</form >
	
		</section>
		
	  <section class="col-lg-8 ">
	  <?php
		function get_product($id){	

			$query = "SELECT * FROM product WHERE id='$id'";
			$run_query = mysql_query($query);
			
			if(mysql_num_rows($run_query) > 0){
			
			while($row = mysql_fetch_assoc($run_query)){
				$name = "Name: ".$row['name'];
				$price = "Price: R".number_format($row['unit_price'], 2);
				$image = "<img width='60%' src='".$row['image']."'";
				$descrp = "Description: ".$row['description'];
			}
			$product = array($name,$price,$image,$descrp);
			
		return $product;
		}	
		else{
				die('Item not found');
			}
	}
	
	$id = $_GET['prodid'];
	$product = get_product($id);
	foreach ($product as $p){
		echo '<div class="col-lg-12">';
		echo $p;
		echo '</div>';
		
	}
			
	?>	
		</section>
		</div>
	</div>
	
			
			<?php
			//iveri.co.za
			//iverilite.co.za
			//NSA bullrun
include 'includes/footer.php';
?>
