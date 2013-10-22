<?php
<<<<<<< HEAD
		require "includes/user.class.php";
	include 'includes/header.php';
	
	if(!$core->loggedin()||!$core->getuserfield('admin')){
=======
	//require 'db_con.php';
	include 'includes/header.php';
	
	if(!loggedin()||!getuserfield('admin')){
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
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
<<<<<<< HEAD
			$username = $_POST['username'];
			$type = $_POST['type'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$password1 = $_POST['password1'];
			if(!empty($username)&&!empty($type)&&!empty($email)&&!empty($password)&&!empty($password1)){
			
			if(!$var2 = preg_match("%[a-zA-Z0-9_\.-]{5,10}%", $username)){
					$error .= "* Username must be 5 to 10 charecters long<br>";
			}
			if(!$var3 = preg_match("%^[a-z0-9A-Z_\.-]+@[a-z0-9A-Z_-]+\.[a-z0-9A-Z_\.-]%", $email)){
					$error .= "* Invalid email<br/>";
			}
			if(!$var4 = preg_match("%[a-zA-Z0-9\W]{8,}%", $password)){
					$error .= "* Password must be 8 charecters or more<br/>";
					
			}else{
				if($password != $password1){
					$error .= "* Password must match<br/>";
				}
			}
			if($var2&&$var3&&$var4&&$password == $password1){
				//registration goes here if all validations pass
			$user = new User($username,$email,$type);
			$user->set_password($password);
			
			}
		}else{
			$error .= "* Enter all fields";
		}
	}
=======
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
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce

?>
    <!-- Main jumbotron for a primary marketing message or call to action -->

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
<<<<<<< HEAD
	  <section class="col-lg-6 ">
	  
	  	  <?php 
		  //status success
=======
	  <section class="col-lg-8 ">
	  	  <?php 
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
	  if(isset($message)){
	  ?>
		<div class="alert alert-success">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<<<<<<< HEAD
		  <strong></strong> <?php echo $message;?>
=======
		  <strong>Thanks!</strong> <?php echo $message;?>
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
		</div>
		<?php
		}
		?>
<<<<<<< HEAD
		
		<?php 
		//error
	  if(isset($error)){
	  ?>
		<div class="alert alert-danger">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <strong>Error!</strong> <?php echo $error;?>
		</div>
		<?php } ?>
		<?php
						if(isset($user)){ ?>
						<div class="alert alert-success">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						  <strong>Welcome!</strong> <?php  $save = $user->save(); $user->display_user_info(); ?>
						</div>
						<?php } ?>
				
				<h4>Welcome to User Management <?php echo $core->getuserfield('username');?></h4><hr>
		
		<div class="tabbable tabs" >
			<ul class="nav nav-tabs" >
				<li class="active"><a href="#cat1" data-toggle="tab">Customers</a></li>
				<?php  if($core->getuserfield('admin')==1){
			
			?>
				<li ><a href="#cat2" data-toggle="tab">Admin</a></li>
				
				<?php } ?>
=======
		<h4>Welcome to User Management <?php echo getuserfield('username');?></h4><hr>

		
	  	<div class="tabbable tabs" >
			<ul class="nav nav-tabs" >
				<li class="active"><a href="#cat1" data-toggle="tab">Users</a></li>
				<li ><a href="#cat2" data-toggle="tab">Admin</a></li>
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
				<li ><a href="#cat3" data-toggle="tab">Stuff</a></li>
				<li ><a href="#cat4" data-toggle="tab">Blocked Users</a></li>
			</ul>
		</div>
<<<<<<< HEAD

		<section class="tab-content">
			<div class="tab-pane active" id="cat1">
				  <table class="table table-striped">
				  <th>Name</th>
=======
	  
	  <section class="tab-content">
			<div class="tab-pane active" id="cat1">
				  <table class="table table-striped">
				  <th>Name</th>
				  <th>Send Message</th>
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
				  <th>Delete</th>
				  <th>Block</th>
					    <?php
				$query = "SELECT * FROM users where admin=0 AND access=1";
				$run_query = mysql_query($query);
<<<<<<< HEAD
				while($row = mysql_fetch_assoc($run_query)){
				?> <tr>
					<td><a href='user_status.php?user_id=<?php echo $row['id'];?>'><?php echo $row['username']; ?></a></td>
					<td><button class='btn btn-danger'><a href='users.php?delete=<?php echo $row['id'];?>' onclick="return confirm('Are You Sure?');">Delete</a></button></td>
					<td><button class='btn btn-info'><a href='users.php?block=<?php echo $row['id'];?>'>Block</a></button></td>
					</tr>
					<?php } ?>
			</table>
			</div>
			<?php  if($core->getuserfield('admin')==1){
			
			?>
	
			<div class="tab-pane" id="cat2">
					  <table class="table table-striped">
				  <th>Name</th>
				  <th>Delete</th>
				  <th>Block</th>
					    <?php
				$query = "SELECT * FROM users where admin=2 AND access=1";
				$run_query = $db->query($query);
			
				while($row = mysql_fetch_assoc($run_query)){
				?> <tr>
					<td><a href='user_status.php?user_id=<?php echo $row['id'];?>'><?php echo $row['username']; ?></a></td>
					<td><button class='btn btn-danger'><a href='users.php?delete=<?php echo $row['id'];?>' onclick="return confirm('Are You Sure?');">Delete</a></button></td>
					<td><button class='btn btn-info'><a href='users.php?block=<?php echo $row['id'];?>'>Block</a></button></td>
					</tr>
					<?php } ?>
			</table>
			</div>
			
			<?php } ?>
			<div class="tab-pane" id="cat3">
			  <table class="table table-striped">
				  <th>Name</th>
				  <th>Delete</th>
				  <th>Block</th>
					    <?php
				$query = "SELECT * FROM users where admin=3 AND access=1";
				$run_query = $db->query($query);
				while($row = mysql_fetch_assoc($run_query)){
				?> <tr>
					<td><a href='user_status.php?user_id=<?php echo $row['id'];?>'><?php echo $row['username']; ?></a></td>
					<td><button class='btn btn-danger'><a href='users.php?delete=<?php echo $row['id'];?>' onclick="return confirm('Are You Sure?');">Delete</a></button></td>
					<td><button class='btn btn-info'><a href='users.php?block=<?php echo $row['id'];?>'>Block</a></button></td>
					</tr>
					<?php	}	?>
=======
			
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
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
			</table>
			</div>
			<div class="tab-pane" id="cat4">
							  <table class="table table-striped">
				  <th>Name</th>
<<<<<<< HEAD
				  <th>Type</th>
				  <th>Delete</th>
				  <th>Allow</th>
					    <?php
						if($core->getuserfield('admin')==1){
				$query = "SELECT * FROM users where access=0 order by admin desc";
				}else{
				$query = "SELECT * FROM users where access=0 AND admin>2 OR admin=0 order by admin desc";
				}
				$run_query = $db->query($query);
				while($row = mysql_fetch_assoc($run_query)){
				?>
					<tr>
					<td><a href='user_status.php?user_id=<?php echo $row['id'];?>'><?php echo $row['username']; ?></a></td>
					<td><?php echo $core->type($row['admin']);?></td>
					<td><button class='btn btn-danger'><a href='users.php?delete=<?php echo $row['id'];?>' onclick="return confirm('Are You Sure?');">Delete</a></button></td>
					<td><button class='btn btn-info'><a href='users.php?allow=<?php echo $row['id'];?>'>Allow</a></button></td>
					</tr>
					<?php  } ?>
=======
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
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
			</table>
			</div>
			
		</section>
		</section>
		
<<<<<<< HEAD
	  <section class="col-lg-4 pull-right">
		<div class="accordion" id="Adduser"  >
		<!--Add users-->
			<section class="accordion-group" id="orange">
=======
	  <section class="col-lg-4">
		<div class="accordion" id="Adduser"  >
		<!--Add users-->
			<section class="accordion-group" >
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
				<div class="accordion-heading" >
					<a href="#add" class="accordion-toggle" data-toggle="collapse" data-parent="#Adduser">Add User<a/>
				</div>
			</section>
			<div id="add" class="accordion-body collapse in">
				<section class="accordion-inner">
					
<<<<<<< HEAD
						<form method="post"  action="users.php">
							Username: <input type="text" class="form-control" name="username"><br>
							Email: <input class="form-control" type="email" name="email"><br>
							Password: <input type="password" class="form-control" name="password"><br>
							Re-Enter Password: <input type="password" class="form-control" name="password1"><br>
							User Type: <select class="form-control" name="type">
											<option  value="2">Admin</option>
											<option  value="3">Stuff</option>
											<option  value="0">Customer</option>
=======
						<form method="post" enctype="multipart/form-data" action="manage.php">
							Username: <input type="text" class="form-control" name="username"><br>
							Email: <input class="form-control" type="text" name="email"><br>
							Password: <input type="password" class="form-control" name="pass"><br>
							User Type: <select class="form-control" name="catagory">
											<option  value="2">Admin</option>
											<option  value="3">Stuff</option>
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
											</select><br>
											<button class="btn btn-succes" type="submit" name="add">Add User</button>
						</form >
				
				</section>
<<<<<<< HEAD
			</div>	<!--Add users--><br><br>
			


			<div class="accordion" id="Send"  >
		<!--Add users-->
			<section class="accordion-group" id="orange">
				<div class="accordion-heading" >
					<a href="#send" class="accordion-toggle" data-toggle="collapse" data-parent="#Send">Send NewsLetter<a/>
				</div>
			</section>
			<div id="send" class="accordion-body collapse ">
				<section class="accordion-inner">
					<?php 
						if(isset($_POST['send'])){
							$subject = $_POST['send'];
							$message = $_POST['message'];

						}
					?>
					
						<form method="post"  action="users.php">
							Subject: <input type="text" class="form-control" name="username"><br>
							Message: <textarea class="form-control" type="email" name="email"></textarea>
							
							<button class="btn btn-succes" type="submit" name="send">Send</button>
						</form >
				
				</section>
			</div>	<!--Add users-->
		
		</section>
		</div>
		<?php
		
		if(isset($_GET['delete'])){
			$core->delete_user($_GET['delete']);
		}
		if(isset($_GET['block'])){
			$core->block_user($_GET['block']);
		}
		if(isset($_GET['allow'])){
			$core->allow_user($_GET['allow']);
		}
		
		
		?>
	</div>
	</div>
			
<?php include 'includes/footer.php'; ?>
=======
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
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
