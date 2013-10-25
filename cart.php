<?php
session_start();
include 'cart.class.php';
include 'includes/header.php';
		if($core->loggedin()&&$core->getuserfield('admin')){
		header("Location: manage.php?error=You are not allowed to buy!");
		die();
	}
	//add quantity
if(isset($_GET['plus'])){
	$cart->plusItem($core->clear_string((int)$_GET['plus']));
}//remove quantity
if(isset($_GET['remove'])){
	$cart->removeToCart($core->clear_string((int)$_GET['remove']));
}//remove product from cart
if(isset($_GET['delete'])){
	$cart->deleteItem($core->clear_string((int)$_GET['delete']));
	//cart used here is from phpacedemy but i changed few things
}	
?>

<div class="container">
	<h4 id="err">Shopping Cart</h4><hr>
</div>

<div class="container">
      <div class="row">

   
    <section class="col-lg-12">
	  <?php if($_SESSION['cart']>0){?>
	  <table class="table table-striped ">
	  <th>Name</th>
	  <th>Image</th>
	  <th>Quantity</th>
	  <th>Price</th>
	  <th>SubTotal</th>
	
      	<?php
		foreach($_SESSION['cart'] as $cart_id => $quantity){
				if($quantity > 0){
					$id = $cart_id;
					$query = 'select * FROM product WHERE id='.$core->clear_string($id);
					$run_query = $db->query($query);
					while($row = mysql_fetch_assoc($run_query)){
					$sub = $row['unit_price']*$quantity;
						$count++;
						$_SESSION['numitems'] = $count;
					?>
					
					<tr>
	  <td><a href="product.php?prodid=<?php echo $id;?>"><?php echo $row['name']; ?></a></td>
	  <td><a href="product.php?prodid=<?php echo $id;?>"><?php echo "<img width='30px' height='30px' src='".$row['image']."'"; ?></a></td>
	  <td><a href="cart.php?remove=<?php echo $id;?>"><span class="badge success" id="error"> - </a></span >
				<?php echo $quantity; ?>
						<a href="cart.php?plus=<?php echo $id;?>"><span class="badge success" id="error"> + </a></span >
						</td>
	  <td><?php echo 'R'.number_format($row['unit_price'],2); ?></td>
	  <td><?php echo 'R'.number_format($sub,2); ?> 
	  <a href="cart.php?delete=<?php echo $id;?>"><span class="badge badge-success" id="error"> DELETE </a></span ></td>
	  </tr>
	  <?php
					}
				}
				$total += $sub;
				 
			}
			}
				echo '</table>';
				if($total==0){
					$_SESSION['total'] =0;
					echo "<h3>your cart is empty</h3>";
					
				}else{
					$_SESSION['total']=$total;
					$tot = $total;
					echo "<p class='pull-right'>Total: R".number_format($tot,2)."  ";
					echo "<a class=\"btn btn-success \" href=\"buy_details.php\"> Checkout </a></p>";
				}
?>
 </section>
</div>
</div>

<div class="container">
 <h2>Whats New in Our Shop</h2><hr>
 <?php $core->new_products(); ?>
</div>
<?php include 'includes/footer.php'; ?>