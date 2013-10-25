<?php require_once 'core.php'; 
 require_once 'cart.class.php';
 require_once 'user.class.php';
require "dbconn.class.php";

$core = new Core;
$cart = new Cart;

<<<<<<< HEAD
=======
$db = new DatabaseConnection;

>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
$db = new DatabaseConnection;

$con = $db->establsh_con();
<<<<<<< HEAD
if(isset($_POST['login'])){
=======
<<<<<<< HEAD
if(isset($_POST['login'])){
=======
<<<<<<< HEAD
if(isset($_POST['login'])){
=======
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
    if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $core->clear_string($_POST['username']);
    $pass = $core->clear_string($_POST['password']);
    $password = md5($pass);
    if(!empty($username) || !empty($password)){
<<<<<<< HEAD
      $query = "SELECT id FROM users WHERE username='$username' AND password='$password' AND access='1'";
      $run_query = $db->query($query);
=======
<<<<<<< HEAD
      $query = "SELECT id FROM users WHERE username='$username' AND password='$password' AND access='1'";
      $run_query = $db->query($query);
=======
<<<<<<< HEAD
      $query = "SELECT id FROM users WHERE username='$username' AND password='$password' AND access='1'";
=======
      $query = "SELECT id FROM users WHERE username='$username' AND password='$password'";
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
      $run_query = mysql_query($query);
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
      $rows = mysql_num_rows($run_query);
      if($rows>=1){
        $user_id = mysql_result($run_query, 0 , 'id');
        $_SESSION['user_id'] = $user_id;
      }else{
        $error = header('Location: register.php?error=failed to loggin');
      }
      
    }else{
      $message = "must entr all";
    }
  
  }
<<<<<<< HEAD
  }
  
=======
<<<<<<< HEAD
  }
  
=======
<<<<<<< HEAD
  }
  
=======

>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
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
<<<<<<< HEAD
    <link href="css/bootstrap.min.css" rel="stylesheet">
=======
<<<<<<< HEAD
    <link href="css/bootstrap.min.css" rel="stylesheet">
=======
    <link href="css/bootstrap.css" rel="stylesheet">
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435

    <!-- Custom styles for this template -->
	<style type="text/css">
		#orange{
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
			background: #005;
		}
    #cola{
      color: #005;
    }
		#body{
			background: #f7f7f7; 

<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
			background: gray;
		}
		#body{
			background:url('images/bg.jpg');
=======
			background: orange;
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
		}
		#black{
			background: black;
		}
		#success{
			background: green;
		}
		#err{
      color: #b75252;
    }
		#error{
			background: #b75252;
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

    <!--
	<div class="container">
		<p><img src="images/logo.jpg" width="10%"/></p>
</div>-->
 <div class="navbar-wrapper">
      <div class="container">
    <div class="navbar navbar-default navbar-fixed-top " >
=======
<<<<<<< HEAD
  <body id="body">

    <!--
	<div class="container">
		<p><img src="images/logo.jpg" width="10%"/></p>
</div>-->
 <div class="navbar-wrapper">
      <div class="container">
    <div class="navbar navbar-default navbar-fixed-top " >
=======
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
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Home</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
            <?php if($core->loggedin()&&!$core->getuserfield('admin')||!$core->loggedin()){
              ?>
 
            <li><a href="products.php"></a></li>


<?php
         $query = "SELECT * FROM categories where visible=1";
        $run_query = $db->query($query);
        while($row = mysql_fetch_assoc($run_query)){
        ?>
<<<<<<< HEAD
=======
=======
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
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
            <li class="dropdown">
                  <a href="products.php?cat_id=<?php echo $row['id'];?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo $row['name'];?><b class="caret"></b></a>
                  <ul class="dropdown-menu">
              <?php
            $query1 = "SELECT * FROM sub_categories where visible=1 AND category='".$row['id']."' ";
            $run_query1 = $db->query($query1);
            while($row1 = mysql_fetch_assoc($run_query1)){
            ?>       
                    <li><a href="products.php?cat_id=<?php echo $row1['id'];?>"><?php echo $row1['name'];?></a></li>
                <?php } ?>
                  </ul>
                </li>
                <?php } ?>





            <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart badge "  id="orange"> Cart R<?php $cart->getItem(); ?></span></a></li>
            <?php } ?>
           <li id="orange"><?php if(isset($message)){echo $message;} ?></li>
		  
          </ul>
          <?php
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
		  
	
            if($core->loggedin()){
				if($core->getuserfield('admin')){
		?>
			   	<ul class="nav navbar-nav pull-right"> 
<<<<<<< HEAD
            <li><a href="statistics.php"> Statistics </a></li>
=======
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
            <li><a href="categories.php"> Manage Categories </a></li>
					<li><a href="manage.php"> Manage Products </a></li>
					<li><a href="orders.php"> Manage Orders </a></li>
					<?php if($core->getuserfield('admin')<'3'){?>
					<li><a href="users.php"> Manage Users </a></li>
					
					<?php
					}
					?>
				  <li class="dropdown">
<<<<<<< HEAD
					  <a href="#" class="dropdown-toggle" id="orange" data-toggle="dropdown"><span class="badge  " id="orange"><?php echo $core->getuserfield('username');?><span class=" glyphicon glyphicon-arrow-down"  id="orange"></span></a>
=======
					  <a href="#" class="dropdown-toggle" id="orange"data-toggle="dropdown"><span class="badge " id="orange"><?php echo $core->getuserfield('username');?></span></a>
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
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
<<<<<<< HEAD
					  <a href="#" class="dropdown-toggle" id="orange" data-toggle="dropdown"><span class="badge " id="orange"><?php echo $core->getuserfield('username');?><span class=" glyphicon glyphicon-arrow-down"  id="orange"></span</a>
=======
					  <a href="#" class="dropdown-toggle" id="orange" data-toggle="dropdown"><span class="badge " id="orange"><?php echo $core->getuserfield('username');?></span</a>
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
					<div class="dropdown-menu" >
					<a href="account.php" > MyAccount </a><br>
					<a href="logout.php"> Logout </a>
					</div>
				  </li>
				</ul>
			   <?php
			   }
<<<<<<< HEAD
=======
=======
            if(loggedin()){
               echo '<ul class="nav pull-right" id="orange">';
               echo '<li> You are logged in as '.getuserfield('username').'</li>';
                echo '<li><a href="logout.php">Logout</a></li>';
               echo '</ul>';
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
            }
            else{

              ?>

<<<<<<< HEAD
  
=======
<<<<<<< HEAD
  
=======
<<<<<<< HEAD
  

						
         <ul class="nav navbar-nav pull-right"> 
		 
		 <li ><a   href="register.php" > Register </a></li>	
          <li class="dropdown">
              <a href="#" class="dropdown-toggle"  data-toggle="dropdown">Login </a>
=======
  <a class="nav btn btn-success pull-right" id="orange" href="register.php" > Register </a>
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435

						
         <ul class="nav navbar-nav pull-right"> 
		 
		 <li ><a   href="register.php" > Register </a></li>	
          <li class="dropdown">
<<<<<<< HEAD
              <a href="#" class="dropdown-toggle"  data-toggle="dropdown">Login </a>
=======
<<<<<<< HEAD
              <a href="#" class="dropdown-toggle"  data-toggle="dropdown">Login </a>
=======
            <a class="btn btn-success" id="orange" href="#" data-toggle="dropdown"> Login </a>
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
            <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
              <form method="post" action="#" accept-charset="UTF-8">
                <input style="margin-bottom: 15px;" type="text" placeholder="Username" id="username" name="username">
                <input style="margin-bottom: 15px;" type="password" placeholder="Password" id="password" name="password">
<<<<<<< HEAD
                <input class="btn btn-primary btn-block" name="login" type="submit" id="orange" value="Login"><br>
=======
<<<<<<< HEAD
                <input class="btn btn-primary btn-block" name="login" type="submit" id="orange" value="Login"><br>
=======
<<<<<<< HEAD
                <input class="btn btn-primary btn-block" name="login" type="submit" id="orange" value="Login"><br>
=======
                <input class="btn btn-primary btn-block" type="submit" id="orange" value="Sign In"><br>
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
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
      </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    


<<<<<<< HEAD
=======

<<<<<<< HEAD
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435

=======
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
          
		