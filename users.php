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
					$message = 'Product Added';
				}else{
					$message = 'Could not add product';
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

		
	  	<div class="tabbable tabs" >
			<ul class="nav nav-tabs" >
				<li class="active"><a href="#cat1" data-toggle="tab">Users</a></li>
				<li ><a href="#cat2" data-toggle="tab">Admin</a></li>
				<li ><a href="#cat3" data-toggle="tab">Stuff</a></li>
				<li ><a href="#cat4" data-toggle="tab">Blocked Users</a></li>
			</ul>
		</div>
	  
	  <section class="tab-content">
			<div class="tab-pane active" id="cat1">
				  <table class="table table-striped">
				  <th>Name</th>
				  <th>Send Message</th>
				  <th>Delete</th>
				  <th>Block</th>
					    <?php
				$query = "SELECT * FROM users where admin=0 AND access=1";
				$run_query = mysql_query($query);
			
				while($row = mysql_fetch_assoc($run_query)){
				?>
				
			
					<tr>
					<td><a href='edit2.php?prodid=<?php echo $row['id'];?>'><?php echo $row['username']; ?></a></td>
					<td><button class='btn btn-success'><a href='message.php?message=<?php echo $row['id'];?>'>Send Message</a></button></td>
					<td><button class='btn btn-danger'><a href='edit2.php?delete=<?php echo $row['id'];?>' onclick="return confirm('Are You Sure?');">Delete</a></button></td>
					<td><button class='btn btn-info'><a href='edit2.php?block=<?php echo $row['id'];?>'>Block</a></button></td>
					</tr>
					<?php
				}

			?>
			</table>
			</div>
			<div class="tab-pane" id="cat2">
					  <table class="table table-striped">
				  <th>Name</th>
				  <th>Send Message</th>
				  <th>Delete</th>
				  <th>Block</th>
					    <?php
				$query = "SELECT * FROM users where admin=2";
				$run_query = mysql_query($query);
			
				while($row = mysql_fetch_assoc($run_query)){
				?>
				
			
					<tr>
					<td><a href='edit2.php?prodid=<?php echo $row['id'];?>'><?php echo $row['username']; ?></a></td>
					<td><button class='btn btn-success'><a href='message.php?message=<?php echo $row['id'];?>'>Send Message</a></button></td>
					<td><button class='btn btn-danger'><a href='edit2.php?delete=<?php echo $row['id'];?>' onclick="return confirm('Are You Sure?');">Delete</a></button></td>
					<td><button class='btn btn-info'><a href='edit2.php?block=<?php echo $row['id'];?>'>Block</a></button></td>
					</tr>
					<?php
				}

			?>
			</table>
			</div>
			<div class="tab-pane" id="cat3">
			  <table class="table table-striped">
				  <th>Name</th>
				  <th>Send Message</th>
				  <th>Delete</th>
				  <th>Block</th>
					    <?php
				$query = "SELECT * FROM users where admin=3";
				$run_query = mysql_query($query);
			
				while($row = mysql_fetch_assoc($run_query)){
				?>
				
			
					<tr>
					<td><a href='edit2.php?prodid=<?php echo $row['id'];?>'><?php echo $row['username']; ?></a></td>
					<td><button class='btn btn-success'><a href='message.php?message=<?php echo $row['id'];?>'>Send Message</a></button></td>
					<td><button class='btn btn-danger'><a href='edit2.php?delete=<?php echo $row['id'];?>' onclick="return confirm('Are You Sure?');">Delete</a></button></td>
					<td><button class='btn btn-info'><a href='edit2.php?block=<?php echo $row['id'];?>'>Block</a></button></td>
					</tr>
					<?php
				}

			?>
			</table>
			</div>
			<div class="tab-pane" id="cat4">
							  <table class="table table-striped">
				  <th>Name</th>
				  <th>Send Message</th>
				  <th>Delete</th>
				  <th>Block</th>
					    <?php
				$query = "SELECT * FROM users where access=0";
				$run_query = mysql_query($query);
			
				while($row = mysql_fetch_assoc($run_query)){
				?>
				
			
					<tr>
					<td><a href='edit2.php?prodid=<?php echo $row['id'];?>'><?php echo $row['username']; ?></a></td>
					<td><button class='btn btn-success'><a href='message.php?message=<?php echo $row['id'];?>'>Send Message</a></button></td>
					<td><button class='btn btn-danger'><a href='edit2.php?delete=<?php echo $row['id'];?>' onclick="return confirm('Are You Sure?');">Delete</a></button></td>
					<td><button class='btn btn-info'><a href='edit2.php?allow=<?php echo $row['id'];?>'>Allow</a></button></td>
					</tr>
					<?php
				}

			?>
			</table>
			</div>
			
		</section>
		</section>
		
	  <section class="col-lg-4">
		<div class="accordion" id="Adduser"  >
		<!--Add users-->
			<section class="accordion-group" >
				<div class="accordion-heading" >
					<a href="#add" class="accordion-toggle" data-toggle="collapse" data-parent="#Adduser">Add User<a/>
				</div>
			</section>
			<div id="add" class="accordion-body collapse in">
				<section class="accordion-inner">
					
						<form method="post" enctype="multipart/form-data" action="manage.php">
							Username: <input type="text" class="form-control" name="username"><br>
							Email: <input class="form-control" type="text" name="email"><br>
							Password: <input type="password" class="form-control" name="pass"><br>
							User Type: <select class="form-control" name="catagory">
											<option  value="2">Admin</option>
											<option  value="3">Stuff</option>
											</select><br>
											<button class="btn btn-succes" type="submit" name="add">Add User</button>
						</form >
				
				</section>
			</div>	<!--Add users-->
			
		
		</section>
		</div>
	</div>
	</div>
	
			
			<?php
			//iveri.co.za
			//iverilite.co.za
			//NSA bullrun
include 'includes/footer.php';
?>
