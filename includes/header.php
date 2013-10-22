<?php require_once 'core.php'; 
 require_once 'cart.class.php';
 require_once 'user.class.php';
require "dbconn.class.php";

$core = new Core;
$cart = new Cart;

$db = new DatabaseConnection;

$db = new DatabaseConnection;
$con = $db->establsh_con();
if(isset($_POST['login'])){
    if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $core->clear_string($_POST['username']);
    $pass = $core->clear_string($_POST['password']);
    $password = md5($pass);
    if(!empty($username) || !empty($password)){
      $query = "SELECT id FROM users WHERE username='$username' AND password='$password' AND access='1'";
      $run_query = $db->query($query);
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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
	<style type="text/css">
		#orange{
			background: #005;
		}
    #cola{
      color: #005;
    }
		#body{
			background: #f7f7f7; 

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

  <body id="body">

    <!--
	<div class="container">
		<p><img src="images/logo.jpg" width="10%"/></p>
</div>-->
 <div class="navbar-wrapper">
      <div class="container">
    <div class="navbar navbar-default navbar-fixed-top " >
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
            <?php if($core->loggedin()&&!$core->getuserfield('admin')||!$core->loggedin()){
              ?>
 
            <li><a href="products.php"></a></li>


<?php
         $query = "SELECT * FROM categories where visible=1";
        $run_query = $db->query($query);
        while($row = mysql_fetch_assoc($run_query)){
        ?>
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
		  
	
            if($core->loggedin()){
				if($core->getuserfield('admin')){
		?>
			   	<ul class="nav navbar-nav pull-right"> 
            <li><a href="categories.php"> Manage Categories </a></li>
					<li><a href="manage.php"> Manage Products </a></li>
					<li><a href="orders.php"> Manage Orders </a></li>
					<?php if($core->getuserfield('admin')<'3'){?>
					<li><a href="users.php"> Manage Users </a></li>
					
					<?php
					}
					?>
				  <li class="dropdown">
					  <a href="#" class="dropdown-toggle" id="orange"data-toggle="dropdown"><span class="badge " id="orange"><?php echo $core->getuserfield('username');?></span></a>
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
					  <a href="#" class="dropdown-toggle" id="orange" data-toggle="dropdown"><span class="badge " id="orange"><?php echo $core->getuserfield('username');?></span</a>
					<div class="dropdown-menu" >
					<a href="account.php" > MyAccount </a><br>
					<a href="logout.php"> Logout </a>
					</div>
				  </li>
				</ul>
			   <?php
			   }
            }
            else{

              ?>

  

						
         <ul class="nav navbar-nav pull-right"> 
		 
		 <li ><a   href="register.php" > Register </a></li>	
          <li class="dropdown">
              <a href="#" class="dropdown-toggle"  data-toggle="dropdown">Login </a>
            <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
              <form method="post" action="#" accept-charset="UTF-8">
                <input style="margin-bottom: 15px;" type="text" placeholder="Username" id="username" name="username">
                <input style="margin-bottom: 15px;" type="password" placeholder="Password" id="password" name="password">
                <input class="btn btn-primary btn-block" name="login" type="submit" id="orange" value="Login"><br>
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
    



          
		