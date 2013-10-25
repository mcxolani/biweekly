<?php
	//require 'db_con.php';
	include 'includes/header.php';
	
	if(!$core->loggedin()||!$core->getuserfield('admin')){
		header("Location: index.php");
		die();
	}
	
	if(isset($_GET['message'])){
		$message .= $_GET['message'];
		}

	?>
	<div class="container">
      <div class="row">	
	    <section class="col-lg-8 ">
 <?php 
		  //status success
	  if(isset($message)){
	  ?>
		<div class="alert alert-success">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <strong></strong> <?php echo $message;?>
		</div>
		<?php
		}
		?>
		
		<?php 
		//error
	  if(isset($error)){
	  ?>
		<div class="alert alert-danger">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <strong>Error!</strong> <?php echo $error;?>
		</div>
		<?php } ?>
	    	<div class="tabbable tabs" >
			<ul class="nav nav-tabs" >
				<li class="active"><a href="#cat1" data-toggle="tab">New</a></li>
				<li ><a href="#cat2" data-toggle="tab">Approved</a></li>
				<li ><a href="#cat3" data-toggle="tab">Rejected</a></li>
			</ul>
		</div>

		<section class="tab-content">
			<div class="tab-pane active" id="cat1">
				 <table class="table table-striped">
				  <th>Product Number</th>
				  <th>Date</th>
				  <th>Price</th>
				  <th>Approve</th>
				  <th>Reject</th>
	  <?php
		  
			$id = $core->getuserfield('id');
				$query = "select * FROM orders WHERE order_status='0' order by time";
				$run_query = $db->query($query);
						while($row = mysql_fetch_assoc($run_query)){
						?>
							<tr>
					<td><a href='orders.php?order_num=<?php echo $row['order_num']; ?>'><?php echo $row['order_num']; ?></a></td>
					<td><?php echo $row['time']; ?></td>
					<td><?php echo 'R'.number_format($row['price'],2); ?></td>
					<td><a class='btn btn-success' href='orders.php?approve=<?php echo $row['order_num']; ?>'>Approve</a></td>
					<td><a class='btn btn-info' href='orders.php?reject=<?php echo $row['order_num']; ?>'>Reject</a></td>
							</tr>
							<?php
							}
                    echo '</table>';
		?>
			</div>

				<div class="tab-pane " id="cat2">
				 <table class="table table-striped">
				  <th>Product Number</th>
				  <th>Date</th>
				  <th>Price</th>
	  <?php
		  
			$id = $core->getuserfield('id');
				$query = "select * FROM orders WHERE order_status='1' order by time";
				$run_query = $db->query($query);
						while($row = mysql_fetch_assoc($run_query)){
						?>
							<tr>
					<td><a href='orders.php?order_num=<?php echo $row['order_num']; ?>'><?php echo $row['order_num']; ?></a></td>
					<td><?php echo $row['time']; ?></td>
					<td><?php echo 'R'.number_format($row['price'],2); ?></td>
							</tr>
							<?php
							}
                    echo '</table>';
		?>
			</div>

				<div class="tab-pane " id="cat3">
				 <table class="table table-striped">
				  <th>Product Number</th>
				  <th>Date</th>
				  <th>Price</th>
	  <?php
		  
			$id = $core->getuserfield('id');
				$query = "select * FROM orders WHERE order_status='2' order by time";
				$run_query = $db->query($query);
						while($row = mysql_fetch_assoc($run_query)){
						?>
							<tr>
					<td><a href='orders.php?order_num=<?php echo $row['order_num']; ?>'><?php echo $row['order_num']; ?></a></td>
					<td><?php echo $row['time']; ?></td>
					<td><?php echo 'R'.number_format($row['price'],2); ?></td>
							</tr>
							<?php
							}
                    echo '</table>';
		?>
			</div>

		</section>

		</section >	
		  <section class="col-lg-4 ">

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
if(isset($_GET['approve'])){
$core->approve_order($_GET['approve']);
}
if(isset($_GET['reject'])){
$core->reject_order($_GET['reject']);
}

	?>
		  </section>
		  </section>
	</div>
</div>	
	    
<?php include 'includes/footer.php'; ?>	
	
