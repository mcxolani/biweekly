<<<<<<< HEAD
<?php 
	require "includes/user.class.php";

	//
	
	if(isset($_POST['username'])&&isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['password1'])){
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password1 = $_POST['password1'];
		if(!empty($username)&&!empty($email)&&!empty($password)&&!empty($password1)){
			$error = "";
			if(!$var2 = preg_match("%[a-zA-Z0-9_\.-]{5,10}%", $username)){
					$error .= "* Username must be 5 to 10 charecters long<br/>";
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
		  
		  
			<form action="register.php" method="post">
			  <fieldset>
				<legend>Registration form</legend>
				<p id="error"><b><?php if(isset($error)){
							echo $error;	
							}
							?></b></p>
				<p id="success"><b><?php
						if(isset($user)){
							$save = $user->save($user->username,$user->email,$user->password);
							$user->display_user_info();
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
				<button type="submit"  class="btn btn-default">Submit</button><br/><br/>
			  </fieldset>
			  
			</form>

		  
		  
		  </div>
		  <div class="col-lg-4"></div>
		</div>
	</div>
	<!--end of form-->
    <?php include 'includes/footer.php'; ?>
=======
<?php
		$username = $_POST['username'];
		$surname = $_POST['surname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
		if(!empty($username)&&!empty($surname)&&!empty($email)&&!empty($password)&&!empty($password2)){
			$error = "";
			if(!preg_match("%[a-zA-Z\s\-]{3,}%", $surname)){
					$error .= "* Name invalid<br/>";
			}
			if(!preg_match("%[a-zA-Z0-9_\.-]{5,10}%", $username)){
					$error .= "User name musts exceed 5 characters<br/>";
			}
			if(!preg_match("%^[a-z0-9A-Z_\.-]+@[a-z0-9A-Z_-]+\.[a-z0-9A-Z_\.-]%", $email)){
					$error .= "email is invalid<br/>";
			}
			if(!preg_match("%[a-zA-Z0-9\W]{10,}%", $password)){
					$error .= "Password must not be less than 10 characters <br/>";
					
			}else{
				if($password != $password2){
					$error .= "* Password does not match<br/>";
				}
			}
		
		}else{
			$error = "Please enter all required information";
		}
	
	
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap 101 Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<style type="text/css">
		#myrow{
			background: gray;
		}
		
		span{
			color: red;
		}
	</style>

  </head>
  <body>
  <div class="container">
  <div class="row">
	<div class="col-4">
   

	</div>	
	
	<div class="col-4">
    <h1>Registration Form</h1>

	</div>	
	
	<div class="col-4">


	</div>
	</div>
	</div>
	
	
	
	<div class="container">

		<div class="row" >
			<div class="col-lg-3"></div>
			<div class="col-lg-6 " id="myrow">
				<form class="form" name="myform" method="post" action = "register.php">
				  <div class="form-group">
				  	<span id="email_error" style="color:#FF0000 ">&nbsp;</span>
					<label for="inputEmail" class="col-lg-2 control-label">Username</label>
					<div class="col-lg-10">
					  <input type="text" name="username" class="form-control" id="username" placeholder="Stan">
					</div>
					<label for="inputEmail" class="col-lg-2 control-label">Surname</label>
					<div class="col-lg-10">
					  <input type="text" name="surname" class="form-control" id="surname" placeholder="Gates">
					</div>
					<label for="inputEmail" class="col-lg-2 control-label">Email</label>
					<div class="col-lg-10">
					  <input type="email" name="email" class="form-control" id="email" placeholder="stangates@gmail.com">
					</div>
					<label for="inputEmail" class="col-lg-2 control-label">Password</label>
					<div class="col-lg-10">
					  <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
					</div>
					<label for="inputEmail" class="col-lg-2 control-label">Password</label>
					<div class="col-lg-10">
					  <input type="password" name="password2" class="form-control" id="password2" placeholder="Re-enter Password">
					</div>
				  </div>
				  <div class="form-group">
					<div class="col-lg-offset-2 col-lg-6">
					  <button type="submit" class="btn btn-default" id="register">Register</button><br />
					 <span><?php echo $error; ?></span>
					</div>
					
				  </div>
				</form>
			</div>
			
			<div class="col-lg-3"></div>
		</div>
	</div>
	
	
	    <!-- JavaScript plugins (requires jQuery) -->
    <script src="js/jquery-1.10.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Enable responsive features in IE8 with Respond.js (https://github.com/scottjehl/Respond) -->
    <script src="js/respond.js"></script>

		
</script>
  </body>
</html>
>>>>>>> 05b096a22c88a7a7d9d1fea04549b4918da6ca22
