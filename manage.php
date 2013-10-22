<?php
	//require 'db_con.php';
	include 'includes/header.php';
<<<<<<< HEAD
	if(!$core->loggedin()||!$core->getuserfield('admin')){
=======
	
	if(!loggedin()||!getuserfield('admin')){
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
		header("Location: index.php");
		die();
	}
	?>
<<<<<<< HEAD
=======
	
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
<?php
		//Adding Products
		if(isset($_GET['message'])){
		$message .= $_GET['message'];
		}
<<<<<<< HEAD
		if(isset($_GET['error'])){
		$error .= $_GET['error'];
		}
	
?>
    <div class="container">
      <div class="row">
	  <section class="col-lg-12 ">
=======
	if(isset($_POST['add'])){
		$target_file = basename($_FILES['image']['name']);
	
			$name = $_POST['name'];
			$price = $_POST['price'];
			$descr = $_POST['descr'];
			$cat = $_POST['catagory'];
			$image = 'images/'.$target_file;
			if(!empty($name)&&!empty($price)&&!empty($image)&&!empty($descr)&&!empty($cat)){
			$temp_file = $_FILES['image']['tmp_name'];
		
		$image_folder = "images";
		$uploaded=move_uploaded_file($temp_file, $image_folder.'\\'.$target_file);
			
			$query = "INSERT into product values('','$name','$price','$image','$descr','$cat')";
			
			if($run_query = mysql_query($query)&&$uploaded){
					$message .= 'Product Added';
				}else{
					$message .= 'Could not add product';
				}
			}else{
				$message .= 'must enter all fields';
			}
		}

?>
    <!-- Main jumbotron for a primary marketing message or call to action -->


    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
	  <section class="col-lg-8 ">
	  
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
	  	  <?php 
	  if(isset($message)){
	  ?>
		<div class="alert alert-success">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<<<<<<< HEAD
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
			 <p>Welcome to Your Shop Manager <?php echo $core->getuserfield('username');?></p>
			 <p class=""><a href="add_product.php">Add Product</a></p>
			 </div>
		</div>
	  	<div class="tabbable tabs" >
		<ul class="nav nav-tabs" >
			
		    <?php
			
				$query = "SELECT * FROM sub_categories";
				$run_query = $db->query($query);			
				while($row = mysql_fetch_assoc($run_query)){
				?>
			
				<li ><a  href="manage.php?cat_id=<?php echo $row['id'];?>#cat" ><?php echo $row['name'];?></a></li>
				<?php }
			?>
			</ul>
		</div>
	  <section class="tab-content">
			<div class="tab-pane active" id="cat">
			
					    <?php
						$cat_id = '1';
						if(isset($_GET['cat_id'])){
							$cat_id = $_GET['cat_id'];
						} 
						?>
			 <table class="table table-striped">
				  <th>Name</th>
				  <th>Image</th>
				  <th>Price</th>
				  <th>Delete</th>
				  <?php
				$query = "SELECT * FROM product where catagory='$cat_id'";
				$run_query = $db->query($query);
					
				while($row = mysql_fetch_assoc($run_query)){
			//
				?>
				 <tr>
					<td><a href='edit.php?prodid=<?php echo $row['id']; ?>'><?php echo $row['name']; ?></a></td>
					<td><a href='edit.php?prodid=<?php echo $row['id']; ?>'><img width='50px' height='50px' src='<?php echo $row['image']; ?>'/></td>
					<td><?php echo $row['unit_price']; ?></td>
					<td><button class='btn btn-danger'><a href='manage.php?delete=<?php echo $row['id']; ?>' onclick="return confirm('Are You Sure?');">Delete</a></button></td>
					</tr>
					<?php } ?>
			</table>

			</div>
			
		</section>
		</section>
				<?php
			if(isset($_GET['delete'])){
	$core->delete_product($_GET['delete']);
}
		?>
		</div>
	</div>		
<?php include 'includes/footer.php'; ?>
=======
		  <strong>Thanks!</strong> <?php echo $message;?>
		</div>
		<?php
		}
		?>
		<div class="panel panel-info" >
			 <div class="panel-body ">
			 <li>Welcome to Your Shop Manager <?php echo getuserfield('username');?></li>
			 </div>
		</div>
	  	<div class="tabbable tabs" >
			<ul class="nav nav-tabs" >
				<li class="active"><a href="#cat1" data-toggle="tab">Piano</a></li>
				<li ><a href="#cat2" data-toggle="tab">Guitor</a></li>
				<li ><a href="#cat3" data-toggle="tab">Speakers</a></li>
				<li ><a href="#cat4" data-toggle="tab">Microphones</a></li>
				<li ><a href="#cat5" data-toggle="tab">Stands</a></li>
			</ul>
		</div>
	  
	  <section class="tab-content">
			<div class="tab-pane active" id="cat1">
					    <?php
				$query = "SELECT * FROM product where catagory=1";
				$run_query = mysql_query($query);
			
				while($row = mysql_fetch_assoc($run_query)){
					echo '  <div class="col col-lg-4 col-md-4 col-sm-4">';
					echo "<a href='edit.php?prodid=".$row['id']."'><img width='100%' src='".$row['image']."'/></a><hr>";
					echo "<a href='edit.php?prodid=".$row['id']."'>".$row['name']."</a><span class=\"badge pull-right\">R".number_format($row['unit_price'], 2)."</span>";
					echo "<button class='btn btn-danger'><a href='delete.php?id=".$row['id']."' onclick=\"return confirm('Are You Sure?');\">Delete</a></button>";
					echo ' </div>';
				}

			?>
			</div>
			<div class="tab-pane" id="cat2">
				    <?php
				$query = "SELECT * FROM product where catagory=2";
				$run_query = mysql_query($query);
			
				while($row = mysql_fetch_assoc($run_query)){
					echo '  <div class="col col-lg-4 col-md-4 col-sm-4">';
					echo "<a href='edit.php?prodid=".$row['id']."'><img width='100%' src='".$row['image']."'/></a><hr>";
				echo "<a href='edit.php?prodid=".$row['id']."'>".$row['name']."</a><span class=\"badge pull-right\">R".number_format($row['unit_price'], 2)."</span>";
				echo "<button class='btn btn-danger'><a href='delete.php?id=".$row['id']."' onclick=\"return confirm('Are You Sure?');\">Delete</a></button>";
					echo ' </div>';
				}

			?>
			</div>
			<div class="tab-pane" id="cat3">
						    <?php
				$query = "SELECT * FROM product where catagory=3";
				$run_query = mysql_query($query);
			
				while($row = mysql_fetch_assoc($run_query)){
					echo '  <div class="col col-lg-4 col-md-4 col-sm-4">';
					echo "<a href='edit.php?prodid=".$row['id']."'><img width='100%' src='".$row['image']."'/></a><hr>";
					echo "<a href='edit.php?prodid=".$row['id']."'>".$row['name']."</a><span class=\"badge pull-right\">R".number_format($row['unit_price'], 2)."</span>";
					echo "<button class='btn btn-danger'><a href='delete.php?id=".$row['id']."' onclick=\"return confirm('Are You Sure?');\">Delete</a></button>";
					echo ' </div>';
				}

			?>
			</div>
			<div class="tab-pane" id="cat4">
						    <?php
				$query = "SELECT * FROM product where catagory=4";
				$run_query = mysql_query($query);
			
				while($row = mysql_fetch_assoc($run_query)){
					echo '  <div class="col col-lg-4 col-md-4 col-sm-4">';
					echo "<a href='edit.php?prodid=".$row['id']."'><img width='100%' src='".$row['image']."'/></a><hr>";
					echo "<a href='edit.php?prodid=".$row['id']."'>".$row['name']."</a><span class=\"badge pull-right\">R".number_format($row['unit_price'], 2)."</span>";
					echo "<button class='btn btn-danger'><a href='delete.php?id=".$row['id']."' onclick=\"return confirm('Are You Sure?');\">Delete</a></button>";
					echo ' </div>';
				}

			?>
			</div>
			<div class="tab-pane" id="cat5">
						    <?php
				$query = "SELECT * FROM product where catagory=5";
				$run_query = mysql_query($query);
			
				while($row = mysql_fetch_assoc($run_query)){
					echo '  <div class="col col-lg-4 col-md-4 col-sm-4">';
					echo "<a href='edit.php?prodid=".$row['id']."'><img width='100%' src='".$row['image']."'/></a><hr>";
					echo "<a href='edit.php?prodid=".$row['id']."'>".$row['name']."</a><span class=\"badge pull-right\">R".number_format($row['unit_price'], 2)."</span>";
					echo "<button class='btn btn-danger'><a href='delete.php?id=".$row['id']."' onclick=\"return confirm('Are You Sure?');\">Delete</a></button>";
					echo ' </div>';
				}

			?>
			</div>
		</section>
		</section>
		
	  <section class="col-lg-4">
		<div class="accordion accordion-success" id="manage"  >
		<!--Add users-->
			<section class="accordion-group" >
				<div class="accordion-heading" >
					<a href="#add" class="accordion-toggle " data-toggle="collapse" data-parent="#manage" >Add Product<a/>
				</div>
			</section>
			<div id="add" class="accordion-body collapse in">
				<section class="accordion-inner">
					
						<form method="post" enctype="multipart/form-data" action="manage.php">
							Product name: <input type="text" class="form-control" name="name"><br>
							Product Price: <input type="text" class="form-control" name="price"><br>
							Product Description: <textarea type="text" class="form-control" name="descr"></textarea>
							Product Image: <input type="file" class="form-control" name="image"><br>
							Product Catagory: <select class="form-control" name="catagory">
											<option value="1">Piano</option>
											<option value="2">Guiters</option>
											<option value="3">Speakers</option>
											<option value="4">Microphone</option>
											<option value="5">Stands</option>
											</select><br>
											<button class="btn btn-succes" type="submit" name="add">Add</button>
						</form >
				
				</section>
			</div>	<!--Add users-->
			
		</div>
		
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
