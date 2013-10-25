<?php
		include 'includes/header.php';
	//require 'db_con.php';
	if(!$core->loggedin()||!$core->getuserfield('admin')){
		header("Location: index.php");
		die();
	}
	?>
	
<?php
		if(isset($_GET['message'])){
		$message .= $_GET['message'];
		}
				//update Products
		if(isset($_POST['update'])){
			$target_file = basename($_FILES['image']['name']);
	
			$name = $_POST['name'];
			$price = $_POST['price'];
			$descr = $_POST['descr'];
			$cat = $_POST['catagory'];
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
			mysql_query($query);
			if(mysql_affected_rows()==1){
					$message = 'Changes Saved';
				}else{
					$message = 'No Changes Made'.mysql_error();
				}
			}else{
				$message = 'must enter all fields';
			}
		}
?>

   <div class="container">
      <div class="row">
	  <section class="col-lg-8 ">
	  	  <?php 
	  if(isset($message)){
	  ?>
		<div class="alert alert-success">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <strong></strong> <?php echo $message;?>
		</div>
		<?php
		}
		?>
		<h4>Welcome to User Management <?php echo $core->getuserfield('username');?></h4><hr>
</div>
</div>
    <div class="container">
      <div class="row">
	  <section class="col-lg-4 " >
				 <?php
				$query = "SELECT * FROM product order by id desc limit 4";
				$run_query = $db->query($query);
				while($row = mysql_fetch_assoc($run_query)){
			
				}

			?>
			<form method="post" enctype="multipart/form-data" action="edit.php?prodid=<?php echo $_GET['prodid']; ?>">
				<fieldset>
					<legend>Update </legend>
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
					<fieldset>
				</form >
		</section>
		
	  <section class="col-lg-8 ">
	  <?php

	
	$id = $_GET['prodid'];
	$product = $core->get_product_edit($id);
	foreach ($product as $p){
		echo '<div class="col-lg-12">';
		echo $p;
		echo '</div>';
	}
	?>	
		</section>
		</div>
	</div>	
<?php include 'includes/footer.php'; ?>