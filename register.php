<?php 
	require "includes/user.class.php";
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
	if(isset($_POST['username'])&&isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['password1'])){
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password1 = $_POST['password1'];
		if(!empty($username)&&!empty($email)&&!empty($password)&&!empty($password1)){
<<<<<<< HEAD
			if(!$var2 = preg_match("%[a-zA-Z0-9_\.-]{5,10}%", $username)){
					$error .= "* Username must be 5 to 10 charecters long<br>";
=======
			$error = "";
			if(!$var2 = preg_match("%[a-zA-Z0-9_\.-]{5,10}%", $username)){
					$error .= "* Username must be 5 to 10 charecters long<br/>";
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
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
			
					
			}
		}else{
			$error .= "* Enter all fields";
		}
	}
	}
?>

    <!-- Main jumbotron for a primary marketing message or call to action -->
		<!--end of header-->
			<div class="container" >
		<div class="row" >
		  <div class="col-lg-4">

		  </div>
		  <div class="col-lg-4" >
=======
					
			}
		}else{
			$error = "* Enter all fields";
		}
	}
?>
<?php include 'includes/header.php'; ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" id="orange">
      <div class="container">
        <h1>Registration Page</h1>
        <p>You must be registered to login</p>
     
      </div>
    </div>
		<!--end of header-->
			<div class="container" >
		<div class="row" >
		  <div class="col-lg-4"></div>
		  <div class="col-lg-4" id="orange">
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
		  
		  
			<form action="register.php" method="post">
			  <fieldset>
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
							}
				?></b></p>
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
				<button type="submit"  class="btn btn-default">Submit</button><br/><br/>
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
			  </fieldset>
			  
			</form>

		  
		  
		  </div>
		  <div class="col-lg-4"></div>
		</div>
	</div>
	<!--end of form-->
<<<<<<< HEAD
    <?php include 'includes/footer.php'; ?>
=======
    <?php include 'includes/footer.php'; ?>
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
