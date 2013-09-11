<?php
			
	require 'db_con.php';
	include 'cart.class.php';
	include 'includes/header.php';
	if(isset($_GET['add_to_cart'])){
		$item = $_GET['add_to_cart'];
		$cart = new Cart;
		$cart->add_to_cart($item);
	}
	?>
<body>
	

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" id="orange">
      <div class="container">
       
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">

	<?php
	function get_product($id){	

			$query = "SELECT * FROM product WHERE id='$id'";
			$run_query = mysql_query($query);
			
			if(mysql_num_rows($run_query) > 0){
			
			while($row = mysql_fetch_assoc($run_query)){
				$name = $row['name'];
				$price = $row['unit_price'];
				$image = "<img width='10%' src='".$row['image']."'";
				$descrp = $row['description'];
			}
			$product = array($name,$price,$image,$descrp);
			
		return $product;
		}	
		else{
				die('Item not found');
			}
	}
	
	$id = $_GET['prodid'];
	$product = get_product($id);
	foreach ($product as $p){
		echo '<div class="col-lg-12">';
		echo $p;
		echo '</div>';
		
	}

?>
<a href='product.php?add_to_cart=<?php echo $id; ?>&prodid=<?php echo $id;?>'>add to cart</a><br>
<a href="cart.php" id="orange">Go to Cart</a>

</div>
</div>
<?php
include 'includes/footer.php';
?>