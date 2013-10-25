<?php
include 'includes/header.php';
	$checkout = 'http://localhost/byweekly2/buy_details.php';
	$prev_page = $_SERVER['HTTP_REFERER'];
		if(!$core->loggedin()||$prev_page!=$checkout){
		header("Location: register.php?error=You must be logged in to checkout");
		die();
	}
?>

<div class="container">


<div class="row">
	<div class="col-lg-4">
	</div>
		<div class="col-lg-4">
<?php
	$cust_id = $core->getuserfield('id');
	echo '<div class="thumbnail">';
	
				$query = "select * FROM orders WHERE customer_id='$cust_id' order by id desc limit 1";
					$run_query = mysql_query($query);
					while($row = mysql_fetch_assoc($run_query)){
						$output .= 'Order Number: '.$row['order_num'].'<br>';
<<<<<<< HEAD
						$output .= 'Purchased by: '.$row['pay_info'].', at '.$row['time'].'<br>';
=======
						$output .= 'Purchased by: '.$row['customer_name'].' at '.$row['time'].'<br>';
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
						$email = $row['email'];
						$output .= 'Email: '.$row['email'].' <br>';
						$output .= 'Shipping Address: '.$row['shipping_address'].'<hr>';
						$output .= '<b>Products</b> <hr> ';
						$query1 = 'select * FROM order_items WHERE order_num='.$row['order_num'];
						$run_query1 = mysql_query($query1);
						
						while($row1 = mysql_fetch_assoc($run_query1)){
							$output .= 'Item Name: '.$row1['product_name'].'<br>';
							$output .= ' Price: R'.number_format($row1['cost'],2).'<br>';
							$output .= ' Quantity: '.$row1['quantity'].'<hr>';
						}
						$output .= 'Total Price: R'.number_format($row['price'],2).' ';
					}
					echo $output;

				//write order to text file
echo '</div>';
<<<<<<< HEAD
	$query = "select * FROM orders WHERE customer_id='$cust_id' order by id desc limit 1";
					$run_query = mysql_query($query);
					while($row = mysql_fetch_assoc($run_query)){
						$output .= 'Order Number: '.$row['order_num'].'<br>';
						$output .= 'Purchased by: '.$row['pay_info'].', at '.$row['time'].'<br>';
						$email = $row['email'];
						$output .= 'Email: '.$row['email'].' <br>';
						$output .= 'Shipping Address: '.$row['shipping_address'].'<hr>';
						$output .= '<b>Products</b> <hr> ';
						$query1 = 'select * FROM order_items WHERE order_num='.$row['order_num'];
						$run_query1 = mysql_query($query1);
						
						while($row1 = mysql_fetch_assoc($run_query1)){
							$output .= 'Item Name: '.$row1['product_name'].'<br>';
							$output .= ' Price: R'.number_format($row1['cost'],2).'<br>';
							$output .= ' Quantity: '.$row1['quantity'].'<hr>';
						}
						$output .= 'Total Price: R'.number_format($row['price'],2).' ';
					}
					
//appending orders to a order.txt file
=======

$query = "select * FROM orders WHERE customer_id='$cust_id' order by id desc limit 1";
					$run_query = mysql_query($query);
					while($row = mysql_fetch_assoc($run_query)){
						$output1 .= 'Order Number: '.$row['order_num'].'\n';
						$output1 .= 'Purchased by: '.$row['customer_name'].' at '.$row['time'].'\n';
						$email = $row['email'];
						$output1 .= 'Email: '.$row['email'].' \n';
						$output1 .= 'Shipping Address: '.$row['shipping_address'].'\n';
						$output1 .= 'Products\n\n ';
						$query2 = 'select * FROM order_items WHERE order_num='.$row['order_num'];
						$run_query2 = mysql_query($query2);
						
						while($row1 = mysql_fetch_assoc($run_query2)){
							$output1 .= 'Item Name: '.$row1['product_name'].'\n';
							$output1 .= ' Price: R'.number_format($row1['cost'],2).'\n';
							$output1 .= ' Quantity: '.$row1['quantity'].'\n';
						}
						$output1 .= 'Total Price: R'.number_format($row['price'],2).'\n\n\n ';
					}

>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
					$file = fopen('orders.txt', 'a');
					fwrite($file, $output1);

					fclose($file);
//sending email
			$to = 'mcxolani@gmail.com';	
			$subject = 'Order Confirmation';	
			$from = 'mcxolani@gmail.com';
			$headers = 'From: '.$from;
			$message = $output1;
			$result = mail($to, $subject, $message, $headers);
			






















			if(!$result){
				?>
					 
						<div class="alert alert-danger">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						  <strong></strong> Order successful but could not send email
						</div>
			<?php		
			}else{
				?>
					<div class="alert alert-success">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						  <strong></strong> Order successful Check your mail
						</div>
						<?php
			}
			?>

	

<a href="logout.php">sharp</a>
</div>
</div>
</div>
<?php include 'includes/footer.php'; ?>