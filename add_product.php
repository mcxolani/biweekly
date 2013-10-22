<?php
	//require 'db_con.php';
	include 'includes/header.php';
	if(!$core->loggedin()||!$core->getuserfield('admin')){
		header("Location: index.php");
		die();
	}
	?>
<?php
		//Adding Products
		if(isset($_GET['message'])){
		$message .= $_GET['message'];
		}
		if(isset($_GET['error'])){
		$error .= $_GET['error'];
		}
	if(isset($_POST['add'])){
		$target_file = basename($_FILES['image']['name']);
			$name = $_POST['name'];
			$price = $_POST['price'];
			$descr = $_POST['descr'];
			$cat = $_POST['catagory'];
			$model = $_POST['model'];
			$temp_file = $_FILES['image']['tmp_name'];
			
			if(!empty($name)&&!empty($price)&&!empty($temp_file)&&!empty($model)&&!empty($descr)&&!empty($cat)){
			///
			if(!$val1 = preg_match("%[a-zA-Z0-9_\.-]{3,}%", $name)){
					$error .= "* Product name too short<br>";
			}
			if(!$val2 = preg_match("%[\d]{1,6}%", $price)){
					$error .= "* Invalid amount must be numeric 0 > 999999<br/>";
			}
			if($val1&&$val2){
				//registration goes here if all validations pass
				
			$image = 'images/'.$target_file;
			//
					
					
					$image_folder = "images";
					$uploaded=move_uploaded_file($temp_file, $image_folder.'\\'.$target_file);
						
					$query = "INSERT into product values('','$name','$price','$image','$model','$descr','$cat')";
						
					if($run_query = mysql_query($query)&&$uploaded){
							$message .= 'Product Added';
						}else{
							$error .= 'Could not add product';
						}
			}
			
			
			}else{
				$error .= 'must enter all fields';
			}
		}
?>
    <div class="container">
      <div class="row">
	  <section class="col-lg-12 ">
	  	  <?php 
	  if(isset($message)){
	  ?>
		<div class="alert alert-success">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <strong></strong> <?php echo $message;?>
		</div>
		<?php } ?>
	
		<?php 
		//error
	  if(isset($error)){
	  ?>
		<div class="alert alert-danger">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <strong>Error!</strong> <?php echo $error;?>
		</div>
		<?php } ?>
		
		<div class="panel panel-primary" >
			 <div class="panel-body ">
			 <li>Welcome to Your Shop Manager <?php echo $core->getuserfield('username');?></li>
			 </div>
		</div>
	
		
	  <section class="col-lg-4">
		<div class="accordion accordion-success" id="manage"  >
		<!--Add users-->
			<section class="accordion-group" id="orange">
				<div class="accordion-heading" >
					<a href="#add" class="accordion-toggle " data-toggle="collapse" data-parent="#manage" >Add Product<a/>
				</div>
			</section>
			<div id="add" class="accordion-body collapse in">
				<section class="accordion-inner">
						<form method="post" enctype="multipart/form-data" action="add_product.php">
							Product name: <input type="text" class="form-control" name="name" value="<?php if(isset($name)){echo $name;} ?>"><br>
							Product Model: <input type="text" class="form-control" name="model" value="<?php if(isset($model)){echo $model;} ?>"><br>
							Product Price: <input type="text" class="form-control" name="price" value="<?php if(isset($price)){echo $price;} ?>"><br>
							Product Description: <textarea type="text" class="form-control" name="descr" ><?php if(isset($descr)){echo $descr;} ?></textarea>
							Product Image: <input type="file" class="form-control" name="image" value="<?php if(isset($temp_file)){echo $temp_file;} ?>"><br>
							Product Catagory: <select class="form-control" name="catagory">
							  <?php
						$query = "SELECT * FROM sub_categories";
						$run_query = $db->query($query);
						while($row = mysql_fetch_assoc($run_query)){
						?>
						<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
							<?php
							}
								?>
						</select><br>
						<button class="btn btn-succes" type="submit" name="add">Add</button>
						</form >
				</section>
			</div>
			
		</div>
		

		</section>
		</div>
	</div>		
<?php include 'includes/footer.php'; ?>