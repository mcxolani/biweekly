<?php
session_start();

require 'db_con.php';
	include 'cart.class.php';

include 'includes/header.php';
	$cart = new Cart;
	$items = $cart->getItem();
	$count = 1;
?>
 <body>
	

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" id="orange">
      <div class="container">
        <h1>Your Cart</h1>
        <p>These are the products we have</p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
      	<?php
	if(isset($items)){
	foreach($items as $item){
		$query = "SELECT * FROM product WHERE id='$item'";
			$run_query = mysql_query($query);
	

		if(mysql_num_rows($run_query)>0){
			while($row = mysql_fetch_assoc($run_query)){
			$count++;
		}
		}else{
			echo '<p id="orange">Your cart is empty</p>';
		}
			
		}
		
	}
	//session_destroy();
	echo $count;
?>
</div>
</div>
			<?php
include 'includes/footer.php';
?>