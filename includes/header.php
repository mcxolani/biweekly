<?php include 'core.php'; 
require "dbconn.class.php";

$db = new DatabaseConnection;
$con = $db->establsh_con();
    if(isset($_POST['username']) && isset($_POST['password'])){
    $username = clear_string($_POST['username']);
    $pass = clear_string($_POST['password']);
    $password = md5($pass);
    if(!empty($username) || !empty($password)){
      $query = "SELECT id FROM users WHERE username='$username' AND password='$password'";
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
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
	<style type="text/css">
		#orange{
			background: orange;
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

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" >
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
            }
            else{

              ?>

  <a class="nav btn btn-success pull-right" id="orange" href="register.php" > Register </a>

         <ul class="nav pull-right">
          <li class="dropdown">
            <a class="btn btn-success" id="orange" href="#" data-toggle="dropdown"> Login </a>
            <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
              <form method="post" action="#" accept-charset="UTF-8">
                <input style="margin-bottom: 15px;" type="text" placeholder="Username" id="username" name="username">
                <input style="margin-bottom: 15px;" type="password" placeholder="Password" id="password" name="password">
                <input class="btn btn-primary btn-block" type="submit" id="orange" value="Sign In"><br>
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

          
		