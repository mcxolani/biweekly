<?php
	if(isset($_POST['username'])&&isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['password1'])){
		$username = $_POST['username'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password1 = $_POST['password1'];
		if(!empty($username)&&!empty($name)&&!empty($email)&&!empty($password)&&!empty($password1)){
			$error = "";
			if(!preg_match("%[a-zA-Z\s\-]{3,}%", $name)){
					$error .= "* Name invalid<br/>";
			}
			if(!preg_match("%[a-zA-Z0-9_\.-]{5,10}%", $username)){
					$error .= "* Username must be 5 to 10 charecters long<br/>";
			}
			if(!preg_match("%^[a-z0-9A-Z_\.-]+@[a-z0-9A-Z_-]+\.[a-z0-9A-Z_\.-]%", $email)){
					$error .= "* Invalid email<br/>";
			}
			if(!preg_match("%[a-zA-Z0-9\W]{8,}%", $password)){
					$error .= "* Password must be 8 charecters or more<br/>";
					
			}else{
				if($password != $password1){
					$error .= "* Password must match<br/>";
				}
			}
		}else{
			$error = "Enter all fields";
		}
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
			background: #592;
		}
		p{
			color:#923;
		}
	</style>
  </head>
  <body>
	<div class="container">
		<div class="row" >
		  <div class="col-lg-4"></div>
		  <div class="col-lg-4" id="myrow">
		  
		  
			<form action="form.php" method="post">
			  <fieldset>
				<legend>Registration form</legend>
				<div class="form-group">
				  <label for="exampleInputEmail">Username</label>
				  <input type="text" class="form-control" value="<?php if(isset($username)){echo $username;}?>" name="username" placeholder="Enter Username">
				</div>
				<div class="form-group">
				  <label for="exampleInputEmail">Full name</label>
				  <input type="text" class="form-control" value="<?php if(isset($name)){echo $name;}?>" name="name" placeholder="Enter Full name">
				</div>
				<div class="form-group">
				  <label for="exampleInputEmail">Email address</label>
				  <input type="email" class="form-control" value="<?php if(isset($email)){echo $email;}?>" name="email" placeholder="Enter email">
				</div>
				<div class="form-group">
				  <label for="exampleInputPassword">Password</label>
				  <input type="text" class="form-control" name="password" placeholder="Password">
				</div>
				<div class="form-group">
				  <label >Re-Type Password</label>
				  <input type="text" class="form-control" name="password1" placeholder="Re-Enter Password">
				</div>
				<button type="submit" class="btn btn-default">Submit</button><br/><br/>
				<p><strong><?php if(isset($error)){echo $error;}?></strong></p>
			  </fieldset>
			  
			</form>

		  
		  
		  </div>
		  <div class="col-lg-4"></div>
		</div>
	</div>
	
	    <!-- JavaScript plugins (requires jQuery) -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Enable responsive features in IE8 with Respond.js (https://github.com/scottjehl/Respond) -->
    <script src="js/respond.js"></script>
  </body>
</html>