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