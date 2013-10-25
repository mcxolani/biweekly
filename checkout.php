<?php
session_start();
include 'cart.class.php';
include 'includes/header.php';
		if(!$core->loggedin()||$_SESSION['total']==0){
		header("Location: register.php?error=You must be logged in to checkout");
		die();
	}
?>
	  <?php
			  if(!$core->getuserfield('firstName')){ 
			  	header("Location: buy_details.php?error=Fill in Your lastName b4 checkout");
			  	die();
			  }
			  if(!$core->getuserfield('lastName')){
			  	header("Location: buy_details.php?error=Fill in Your lastName b4 checkout");
			  	die();
			  }
			  if(!$core->getuserfield('address')){
			  	header("Location: buy_details.php?error=Your Address is required to checkout");
			  	die(); 
			  }
<<<<<<< HEAD
			  if(!$core->getuserfield('account_holder')||!$core->getuserfield('account_number')||!$core->getuserfield('card_type')){ 
=======
			  if(!$core->getuserfield('account_holder')||!$core->getuserfield('account_number')){ 
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
			  	header("Location: buy_details.php?error=Your Billing info is Incomplete");
			  	die();
			  }
		?>
?>
<div class="container">
	<h4>Thank You Your Purchase Was Succesfull</h4><br>
	<h4>Thank Your Oder will be Proccessed </h4><hr>
</div>
<?php
$cust_id = $core->getuserfield('id');
$cust_name = $core->getuserfield('firstName').' '.$core->getuserfield('lastName');
$price = $_SESSION['total'];
$addr = $core->getuserfield('address');
$email = $core->getuserfield('email');
$time = strftime('%Y-%m-%d %H:%M:%S',time());
<<<<<<< HEAD
$pay_info = 'Account Holder: '.$core->getuserfield('account_holder').',\r\n '.$core->getuserfield('card_type').' Credit Card Number: '.$core->getuserfield('account_number');;
=======
$pay_info = 'Account Holder: '.$core->getuserfield('account_holder').'\r\n Credit Card Number: '.$core->getuserfield('account_number');;
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
$order_num = rand(11111,99999);
 $query2 = "insert into orders (order_num,customer_id,email,
 	shipping_address,time,price,customer_name,
 	pay_info) values('$order_num','$cust_id','$email','$addr','$time','$price','$cust_name','$pay_info')";					
	$run_query2 = $db->query($query2);
					
	foreach($_SESSION['cart'] as $cart_id => $quantity){
				if($quantity > 0){
					$id = $cart_id;
					$query = 'select * FROM product WHERE id='.$core->clear_string($id);
					$run_query = $db->query($query);
					while($row = mysql_fetch_assoc($run_query)){
					$cost = $row['unit_price'];
					$name = $row['name'];
					$num++;
						 $query1 = "insert into order_items (product_id,order_num,product_name,quantity,cost,customer_id) values('$id','$order_num','$name','$quantity','$cost','$cust_id')";
						$run_query1 = $db->query($query1);
						
					}
					}
					}
				
					unset($_SESSION['cart']);
					unset($_SESSION['total']);
?>
<p>View Your Order Detalts here</p>
<a href="invoice.php">Lapha</a>
<?php
		if(!$core->loggedin()||$_SESSION['total']==0){
		header("Location: invoice.php?message=Your Order Was Successfull");
		die();
	}
	?>
<?php include 'includes/footer.php'; ?>