<?php
session_start();
include 'cart.class.php';
include 'includes/header.php';
	if(!$core->loggedin()||!$core->getuserfield('admin')){
		header("Location: index.php");
		die();
	}
	
?>

<div class="container">
	<h4 id="err">Statistics</h4><hr>
</div>

<div class="container">
      <div class="row">
    <section class="col-lg-12">
    	<table class="table table-striped">
				  <th>Product Name</th>
				  <th>Product Quantity</th>
				  <th>Product Cost</th>
				  <th>In Order</th>
				  <th>Bought by</th>
					    <?php
				$query = "SELECT * FROM order_items";
				$run_query = mysql_query($query);
				while($row = mysql_fetch_assoc($run_query)){
					$total += $row['cost'];
				?> <tr>
					<td><a href='edit.php?prodid=<?php echo $row['product_id'];?>'><?php echo $row['product_name']; ?></a></td>
					<td><?php echo $row['quantity']; ?></td>
					<td><?php echo 'R'.number_format($row['cost'],2); ?></td>
					<td><a href='orders.php?order_num=<?php echo $row['order_num'];?>'><?php echo $row['order_num']; ?></a></td>
					<td><a href='user_status.php?user_id=<?php echo $row['customer_id'];?>'><?php echo $row['customer_id']; ?></a></td>
					</tr>
					<?php } ?>
			</table>
			<p>Total Cost: R<?php echo number_format($total,2); ?></p>
 	</section>
		</div>
</div>


<?php include 'includes/footer.php'; ?>