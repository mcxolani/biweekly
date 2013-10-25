<?php
<<<<<<< HEAD
		include 'includes/header.php';
	//require 'db_con.php';
	if(!$core->loggedin()||!$core->getuserfield('admin')){
=======
<<<<<<< HEAD
		include 'includes/header.php';
	//require 'db_con.php';
	if(!$core->loggedin()||!$core->getuserfield('admin')){
=======

	//require 'db_con.php';
	include 'includes/header.php';
	
	if(!loggedin()||!getuserfield('admin')){
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
		header("Location: index.php");
		die();
	}
	?>
	
<?php
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
		if(isset($_GET['message'])){
		$message .= $_GET['message'];
		}
				//update Products
<<<<<<< HEAD
=======
=======
		//Adding Products
		if(isset($_GET['message'])){
		$message .= $_GET['message'];
		}
		
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
		if(isset($_POST['update'])){
			$target_file = basename($_FILES['image']['name']);
	
			$name = $_POST['name'];
			$price = $_POST['price'];
			$descr = $_POST['descr'];
			$cat = $_POST['catagory'];
<<<<<<< HEAD
			$model = $_POST['model'];
			$image = 'images/'.$target_file;
			$id = $_GET['prodid'];
			if(!empty($name)&&!empty($price)&&!empty($image)&&!empty($descr)&&!empty($model)&&!empty($id)){
			$temp_file = $_FILES['image']['tmp_name'];
		
		$image_folder = "images";
		$uploaded=move_uploaded_file($temp_file, $image_folder.'\\'.$target_file);
			
			$query = "UPDATE product set name='$name',model='$model',unit_price='$price', ";
			if($uploaded){
			$query .= "image='$image', ";
			}
			$query .= "description='$descr' where id='$id'";
=======
<<<<<<< HEAD
			$model = $_POST['model'];
			$image = 'images/'.$target_file;
			$id = $_GET['prodid'];
			if(!empty($name)&&!empty($price)&&!empty($image)&&!empty($descr)&&!empty($model)&&!empty($id)){
=======
			$image = 'images/'.$target_file;
			if(!empty($name)&&!empty($price)&&!empty($image)&&!empty($descr)){
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
			$temp_file = $_FILES['image']['tmp_name'];
		
		$image_folder = "images";
		$uploaded=move_uploaded_file($temp_file, $image_folder.'\\'.$target_file);
<<<<<<< HEAD
			
			$query = "UPDATE product set name='$name',model='$model',unit_price='$price', ";
			if($uploaded){
			$query .= "image='$image', ";
			}
			$query .= "description='$descr' where id='$id'";
			mysql_query($query);
			if(mysql_affected_rows()==1){
					$message = 'Changes Saved';
				}else{
					$message = 'No Changes Made'.mysql_error();
=======
			$id = $_GET['prodid'];
			$query = "UPDATE product set name='$name',unit_price='$price',image='$image',description='$descr' where id='$id'";
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
			mysql_query($query);
			if(mysql_affected_rows()==1){
					$message = 'Changes Saved';
				}else{
<<<<<<< HEAD
					$message = 'No Changes Made'.mysql_error();
=======
					$message = 'Could not add product'.mysql_error();
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
				}
			}else{
				$message = 'must enter all fields';
			}
		}
<<<<<<< HEAD
?>

   <div class="container">
=======
<<<<<<< HEAD
?>

   <div class="container">
=======

?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
   <div class="container">
      <!-- Example row of columns -->
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
      <div class="row">
	  <section class="col-lg-8 ">
	  	  <?php 
	  if(isset($message)){
	  ?>
		<div class="alert alert-success">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<<<<<<< HEAD
		  <strong></strong> <?php echo $message;?>
=======
<<<<<<< HEAD
		  <strong></strong> <?php echo $message;?>
=======
		  <strong>Thanks!</strong> <?php echo $message;?>
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
		</div>
		<?php
		}
		?>
<<<<<<< HEAD
		<h4>Welcome to User Management <?php echo $core->getuserfield('username');?></h4><hr>
</div>
</div>
    <div class="container">
=======
<<<<<<< HEAD
		<h4>Welcome to User Management <?php echo $core->getuserfield('username');?></h4><hr>
</div>
</div>
    <div class="container">
=======
		<h4>Welcome to User Management <?php echo getuserfield('username');?></h4><hr>
</div>
</div>
    <div class="container">
      <!-- Example row of columns -->
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
      <div class="row">
	  <section class="col-lg-4 " >
				 <?php
				$query = "SELECT * FROM product order by id desc limit 4";
<<<<<<< HEAD
				$run_query = $db->query($query);
=======
<<<<<<< HEAD
				$run_query = $db->query($query);
=======
				$run_query = mysql_query($query);
			
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
				while($row = mysql_fetch_assoc($run_query)){
			
				}

			?>
			<form method="post" enctype="multipart/form-data" action="edit.php?prodid=<?php echo $_GET['prodid']; ?>">
				<fieldset>
					<legend>Update </legend>
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
					<?php
					$id = $_GET['prodid'];
						$query = "SELECT * FROM product WHERE id='$id'";
			$run_query = mysql_query($query);
			if(!mysql_num_rows($run_query) > 0){
						die('User Not Found');
					}
			while($row = mysql_fetch_assoc($run_query)){
			?>
							Product name: <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
							Product Model: <input type="text" class="form-control" name="model" value="<?php echo $row['model']; ?>"><br>
							Product Price: <input type="text" class="form-control" name="price" value="<?php echo $row['unit_price']; ?>">
							Product Description: <textarea class="form-control"  name="descr" ><?php echo $row['description']; ?></textarea>
							Product Image: <input class="form-control" type="file" name="image"><br>
			<?php } ?>
						<button type="submit" class="btn btn-default" value="Update" name="update">Save Changes</button>
<<<<<<< HEAD
					<fieldset>
				</form >
=======
					<fieldset>
				</form >
=======
					
							Product name: <input type="text" class="form-control" name="name" value="xolani">
					
					
							Product Price: <input type="text" class="form-control" name="price">
					
							Product Description: <textarea class="form-control" type="text"  name="descr"></textarea>
				
								Product Image: <input class="form-control" type="file" name="image"><br>
				
											<button type="submit" class="btn btn-default" value="Update" name="update">Update</button>
					<fieldset>
				</form >
	
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
		</section>
		
	  <section class="col-lg-8 ">
	  <?php
<<<<<<< HEAD

	
	$id = $_GET['prodid'];
	$product = $core->get_product_edit($id);
=======
<<<<<<< HEAD
		function get_product($id){
			$query = "SELECT * FROM product WHERE id='$id'";
			$run_query = mysql_query($query);
			if(mysql_num_rows($run_query) > 0){
=======
		function get_product($id){	

			$query = "SELECT * FROM product WHERE id='$id'";
			$run_query = mysql_query($query);
			
			if(mysql_num_rows($run_query) > 0){
			
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
			while($row = mysql_fetch_assoc($run_query)){
				$name = "Name: ".$row['name'];
				$price = "Price: R".number_format($row['unit_price'], 2);
				$image = "<img width='60%' src='".$row['image']."'";
				$descrp = "Description: ".$row['description'];
			}
			$product = array($name,$price,$image,$descrp);
<<<<<<< HEAD
=======
			
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
		return $product;
		}	
		else{
				die('Item not found');
			}
	}
	
	$id = $_GET['prodid'];
	$product = get_product($id);
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
	foreach ($product as $p){
		echo '<div class="col-lg-12">';
		echo $p;
		echo '</div>';
<<<<<<< HEAD
	}
	?>	
		</section>
		</div>
	</div>	
<?php include 'includes/footer.php'; ?>
=======
<<<<<<< HEAD
	}
	?>	
		</section>
		</div>
	</div>	
<?php include 'includes/footer.php'; ?>
=======
		
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
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
