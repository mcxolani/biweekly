<?php 
	require "includes/user.class.php";
<<<<<<< HEAD
 include "includes/header.php";

		if($core->loggedin()){
		header("Location: index.php");
		die();
	}
	if(isset($_GET['error'])){
		$error = $_GET['error'];
	}
if(isset($_POST['register'])){
=======
<<<<<<< HEAD
 include "includes/header.php";

		if($core->loggedin()){
		header("Location: index.php");
		die();
	}
	if(isset($_GET['error'])){
		$error = $_GET['error'];
	}
if(isset($_POST['register'])){
=======
<<<<<<< HEAD
 include "includes/header.php";

	//
			if(loggedin()){
		header("Location: index.php");
		die();
	}
if(isset($_POST['register'])){
=======

	//
	
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
	if(isset($_POST['username'])&&isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['password1'])){
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password1 = $_POST['password1'];
		if(!empty($username)&&!empty($email)&&!empty($password)&&!empty($password1)){
<<<<<<< HEAD
			if(!$var2 = preg_match("%[a-zA-Z0-9_@\.-]{5,10}%", $username)){
					$error .= "* Username must be 5 to 10 charecters long<br>";
=======
<<<<<<< HEAD
			if(!$var2 = preg_match("%[a-zA-Z0-9_@\.-]{5,10}%", $username)){
					$error .= "* Username must be 5 to 10 charecters long<br>";
=======
<<<<<<< HEAD
			if(!$var2 = preg_match("%[a-zA-Z0-9_\.-]{5,10}%", $username)){
					$error .= "* Username must be 5 to 10 charecters long<br>";
=======
			$error = "";
			if(!$var2 = preg_match("%[a-zA-Z0-9_\.-]{5,10}%", $username)){
					$error .= "* Username must be 5 to 10 charecters long<br/>";
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
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
			$user = new User($username,$email);
			$user->set_password($password);
<<<<<<< HEAD
			//uset textboxes
			$username = '';
			$email = '';
			$password = '';
			$password1 = '';	
=======
<<<<<<< HEAD
			
=======
<<<<<<< HEAD
			
					
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
			}
		}else{
			$error .= "* Enter all fields";
		}
	}
	}
?>

<<<<<<< HEAD
<div class="container" >
		<div class="row" >
		  <div class="col-lg-4">
=======
    <!-- Main jumbotron for a primary marketing message or call to action -->
		<!--end of header-->
			<div class="container" >
		<div class="row" >
		  <div class="col-lg-4">

		  </div>
		  <div class="col-lg-4" >
=======
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
					
			}
		}else{
			$error .= "* Enter all fields";
		}
	}
	}
?>

<div class="container" >
		<div class="row" >
<<<<<<< HEAD
		  <div class="col-lg-4">
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
				 <form class="form" method="post" action="#" accept-charset="UTF-8">
				 <fieldset>
				<legend>Login</legend>
				<div class="form-group">
				 <label >Username</label>
                <input class="form-control" type="text" placeholder="Username" id="username" name="username">
				</div>
				<div class="form-group">
				<label >Password</label>
                <input class="form-control" type="password" placeholder="Password" id="password" name="password">
				</div>
				<div class="form-group">
                <input class="btn btn-primary " name="login" type="submit" value="Login"><br>
				</div>
				<fieldset>
              </form>
		  </div>
		  <div class="col-lg-4">
		  				  	  <?php 
					  if(isset($error)){
					  ?>
						<div class="alert alert-danger">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						  <strong></strong> <?php echo $error;?>
						</div>
						<?php
						}
						
						?>
			</div>
		  <div class="col-lg-4 pull-right" >
<<<<<<< HEAD
=======
=======
		  <div class="col-lg-4"></div>
		  <div class="col-lg-4" id="orange">
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
		  
		  
			<form action="register.php" method="post">
			  <fieldset>
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
				<legend>Registration form</legend>	
				<p id="success"><?php
				//succesfully
						if(isset($user)){ 
						 ?>
						<div class="alert alert-success">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						  <strong>Welcome!</strong> <?php $save = $user->save(); $user->display_user_info(); ?>
						</div>
						<?php
<<<<<<< HEAD
=======
=======
				<legend>Registration form</legend>
<<<<<<< HEAD
								  	  <?php 
					  if(isset($error)){
					  ?>
						<div class="alert alert-danger">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						  <strong>Error!</strong> <?php echo $error;?>
						</div>
						<?php
						}
						//succesfully
						?>
						
				<p id="success"><b><?php
						if(isset($user)){
						 $save = $user->save($user->username,$user->email,$user->password);
						 ?>
						<div class="alert alert-success">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						  <strong>Welcome!</strong> <?php $user->display_user_info(); ?>
						</div>
						<?php
						
						
							
=======
				<p id="error"><b><?php if(isset($error)){
							echo $error;	
							}
							?></b></p>
				<p id="success"><b><?php
						if(isset($user)){
							$save = $user->save($user->username,$user->email,$user->password);
							$user->display_user_info();
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
							}
				?></p>
				<div class="form-group">
				  <label >Username</label>
				  <input type="text" class="form-control" value="<?php if(isset($username)){echo $username;}?>" name="username" placeholder="John@69">
				</div>
				<div class="form-group">
				  <label >Email address</label>
				  <input type="email" class="form-control" value="<?php if(isset($email)){echo $email;}?>" name="email" placeholder="john.smith@gmail.com">
				</div>
				<div class="form-group">
				  <label >Password</label>
				  <input type="password" class="form-control" name="password" placeholder="Password">
				</div>
				<div class="form-group">
				  <label >Re-Type Password</label>
				  <input type="password" class="form-control" name="password1" placeholder="Re-Enter Password">
				</div>
<<<<<<< HEAD
				<button type="submit"  class="btn btn-default" name="register" >Register</button><br/><br/>
=======
<<<<<<< HEAD
				<button type="submit"  class="btn btn-default" name="register" >Register</button><br/><br/>
=======
<<<<<<< HEAD
				<button type="submit"  class="btn btn-default" name="register" >Register</button><br/><br/>
=======
				<button type="submit"  class="btn btn-default">Submit</button><br/><br/>
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
			  </fieldset>
			  
			</form>

		  
		  
		  </div>
		  <div class="col-lg-4"></div>
		</div>
	</div>
	<!--end of form-->
    <?php include 'includes/footer.php'; ?>
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
    <?php include 'includes/footer.php'; ?>
=======
    <?php include 'includes/footer.php'; ?>
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
