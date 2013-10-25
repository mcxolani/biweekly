<?php
	//require 'db_con.php';
	include 'includes/header.php';
	
	if(!$core->loggedin()||$core->getuserfield('admin')=='1'){
		header("Location: register.php?error=Login first");
		die();
	}
	
	?>

	<div class="container">
	    <div class="row">
	  <section class="col-lg-8 ">
	  	  <?php 
	  if(isset($message)){
	  ?>
		<div class="alert alert-success">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <strong></strong> <?php echo $message; ?>
		</div>
		<?php
		}
		?>
		  	  <?php 
	  if(isset($error)){
	  ?>
		<div class="alert alert-danger">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <strong></strong> <?php  echo $error;?>
		</div>
		<?php
		}
		?>
		<h4>Welcome Your Account <?php echo $core->getuserfield('username');?></h4><hr>
</div>
</div>
	</div>
	<div class="container">
      <div class="row">	
	    <section class="col-lg-3 ">


	
	
		</section >	
		<div class="row">
			  <section class="col-lg-4 ">
		
		  </section>
		  <section class="col-lg-4">
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
					echo 'xolani';
				
	echo '</div>';
}
	?>
		  </section>
		</div>
	</div>
</div>	
	    
<?php include 'includes/footer.php'; ?>	