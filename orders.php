<?php
	//require 'db_con.php';
	include 'includes/header.php';
	
	if(!$core->loggedin()||!$core->getuserfield('admin')){
		header("Location: index.php");
		die();
	}
	
	
	?>
	<div class="container">
      <div class="row">	
	    <section class="col-lg-8 ">
	<?php
	////////////////////////////

			$query = "select * FROM orders";
					$run_query = $db->query($query);
					while($row = mysql_fetch_assoc($run_query)){
					
						echo 'Order Number:<a href="orders.php?order_num='.$row['order_num'].'">'.$row['order_num'].'</a>';
					
					}
	
	
?>
		</section >	
		  <section class="col-lg-4 ">
		  <?php
		 /*
				$query1 = 'select * FROM order_items WHERE order_num='.$order_num;
				$run_query1 = $db->query($query1);
						echo 'Order Number:'.$order_num.'<br>';
						while($row1 = mysql_fetch_assoc($run_query1)){
							echo 'Item Name:'.$row1['product_name'];
							echo ' Total:'.$row1['cost'];
							echo ' Quantity:'.$row1['quantity'].'<hr>';
						}
		}*/
		?>

		<?php
		 if(isset($_GET['order_num'])){
			$order_num = $_GET['order_num'];
		
	echo '<div class="thumbnail">';
				$query = 'select * FROM orders WHERE order_num='.$order_num;
					$run_query = $db->query($query);
					if(!mysql_num_rows($run_query) > 0){
						die('User Not Found');
					}
					while($row = mysql_fetch_assoc($run_query)){
						$output .= 'Order Number: '.$row['order_num'].'<br>';
						$output .= 'Purchased by: '.$row['customer_name'].' at '.$row['time'].'<br>';
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
				
	echo '</div>';
}
	?>
		  </section>
	</div>
</div>	
	    
<?php include 'includes/footer.php'; ?>	
	
