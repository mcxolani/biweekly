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
