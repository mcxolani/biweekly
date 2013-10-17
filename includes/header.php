<?php include 'core.php'; 
require "dbconn.class.php";

$db = new DatabaseConnection;
$con = $db->establsh_con();
<<<<<<< HEAD
if(isset($_POST['login'])){
=======
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
    if(isset($_POST['username']) && isset($_POST['password'])){
    $username = clear_string($_POST['username']);
    $pass = clear_string($_POST['password']);
    $password = md5($pass);
    if(!empty($username) || !empty($password)){
<<<<<<< HEAD
      $query = "SELECT id FROM users WHERE username='$username' AND password='$password' AND access='1'";
=======
      $query = "SELECT id FROM users WHERE username='$username' AND password='$password'";
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
      $run_query = mysql_query($query);
      $rows = mysql_num_rows($run_query);
      if($rows>=1){
        $user_id = mysql_result($run_query, 0 , 'id');
        $_SESSION['user_id'] = $user_id;
      }else{
        $message = "failed to loggin <br><br>";
      }
      
    }else{
      $message = "must entr all";
    }
  
  }
<<<<<<< HEAD
  }
  
=======

>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">

    <title>211325127 ITN30AT</title>

    <!-- Bootstrap core CSS -->
<<<<<<< HEAD
    <link href="css/bootstrap.min.css" rel="stylesheet">
=======
    <link href="css/bootstrap.css" rel="stylesheet">
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540

    <!-- Custom styles for this template -->
	<style type="text/css">
		#orange{
<<<<<<< HEAD
			background: gray;
		}
		#body{
			background:url('images/bg.jpg');
=======
			background: orange;
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
		}
		#black{
			background: black;
		}
		#success{
			background: green;
		}
		
		#error{
			background:red;
		}
	</style>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

<<<<<<< HEAD
  <body id="body">
	<div class="container">
		<p><img src="images/logo.jpg" width="10%"/></p>
</div>
    <div class="navbar navbar-default" >
=======
  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" >
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Shop</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li ><a href="index.php">Home</a></li>
            <li><a href="products.php">Products</a></li>
<<<<<<< HEAD
            <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart badge "  id="orange"> Cart <?php if(isset($_SESSION['total'])) echo ' R'.$_SESSION['total'];?></span></a></li>
           <li id="orange"><?php if(isset($message)){echo $message;} ?></li>
		  
          </ul>
          <?php
		  
	
            if(loggedin()){
				if(getuserfield('admin')){
		?>
			   	<ul class="nav navbar-nav pull-right"> 
					<li><a href="manage.php"> Manage Store </a></li>
					<?php if(getuserfield('admin')<'3'){?>
					<li><a href="users.php"> Manage Access </a></li>
					<?php
					}
					?>
				  <li class="dropdown">
					  <a href="#" class="dropdown-toggle" id="orange"data-toggle="dropdown"><span class="badge " id="orange"><?php echo getuserfield('username');?></span></a>
					<div class="dropdown-menu" >
					<a href="account.php" > MyAccount </a><br>
					<a href="logout.php"> Logout </a>
					</div>
				  </li>
				</ul>
				<?php
				}else{
				?>
				<ul class="nav navbar-nav pull-right"> 			
				  <li class="dropdown">
					  <a href="#" class="dropdown-toggle" id="orange" data-toggle="dropdown"><span class="badge " id="orange"><?php echo getuserfield('username');?></span</a>
					<div class="dropdown-menu" >
					<a href="account.php" > MyAccount </a><br>
					<a href="logout.php"> Logout </a>
					</div>
				  </li>
				</ul>
			   <?php
			   }
=======
            <li><a href="cart.php">Cart</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
           <li id="orange"><?php if(isset($message)){echo $message;} ?></li>
          </ul>
          <?php
            if(loggedin()){
               echo '<ul class="nav pull-right" id="orange">';
               echo '<li> You are logged in as '.getuserfield('username').'</li>';
                echo '<li><a href="logout.php">Logout</a></li>';
               echo '</ul>';
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
            }
            else{

              ?>

<<<<<<< HEAD
  

						
         <ul class="nav navbar-nav pull-right"> 
		 
		 <li ><a   href="register.php" > Register </a></li>	
          <li class="dropdown">
              <a href="#" class="dropdown-toggle"  data-toggle="dropdown">Login </a>
=======
  <a class="nav btn btn-success pull-right" id="orange" href="register.php" > Register </a>

         <ul class="nav pull-right">
          <li class="dropdown">
            <a class="btn btn-success" id="orange" href="#" data-toggle="dropdown"> Login </a>
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
            <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
              <form method="post" action="#" accept-charset="UTF-8">
                <input style="margin-bottom: 15px;" type="text" placeholder="Username" id="username" name="username">
                <input style="margin-bottom: 15px;" type="password" placeholder="Password" id="password" name="password">
<<<<<<< HEAD
                <input class="btn btn-primary btn-block" name="login" type="submit" id="orange" value="Login"><br>
=======
                <input class="btn btn-primary btn-block" type="submit" id="orange" value="Sign In"><br>
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
              </form>
            </div>
          </li>
        </ul>
            <?php
            }
           ?>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

<<<<<<< HEAD

=======
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
          
		