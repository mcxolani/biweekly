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
					echo $output;

				//write order to text file
echo '</div>';
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