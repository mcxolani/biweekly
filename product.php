<?php
	include 'includes/header.php';
	if(isset($_GET['message'])){
		$message .= $_GET['message'];
		}
	?>
<body>
<div class="container">
  	  <?php 
	  if(isset($message)){
	  ?>
		<div class="alert alert-success">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <strong>Thanks!</strong> <?php echo $message;?>
		</div>
		<?php
		}
		?>
	<h4>Shopping Cart</h4><hr>
</div>

<div class="container">
	<div class="row">
	   <section class="col-lg-3 ">
		   <ul class="nav affix hidden-sm hidden-md hidden-xs">
   <li id="orange"><span class="badge" id="orange">Categories</span></li>
  
   			    <?php
				$query = "SELECT * FROM categories where visible=1";
				$run_query = $db->query($query);
				
				while($row = mysql_fetch_assoc($run_query)){
				?>	
				<li><a href="products.php?cat_id=<?php echo $row['id'];?>" ><?php echo $row['name'];?></a></li>
				<ul class="">
				<?php
						$query1 = "SELECT * FROM sub_categories where visible=1 AND category='".$row['id']."' ";
						$run_query1 = $db->query($query1);
						while($row1 = mysql_fetch_assoc($run_query1)){
						?>	
						<li><a href="products.php?cat_id=<?php echo $row1['id'];?>" id="err"><?php echo $row1['name'];?></a></li>
					<?php } ?>
				</ul>
			<?php } ?>
   </ul>
     <ul class="nav nav-pills hidden-lg">
     	 <?php
				$query = "SELECT * FROM categories where visible=1";
				$run_query = $db->query($query);
				while($row = mysql_fetch_assoc($run_query)){
				?>
				
				<li><a href="products.php?cat_id=<?php echo $row['id'];?>" ><?php echo $row['name'];?></a></li>	
				<?php } ?>   
		   </ul>   
	   </section>
   
      <section class="col-lg-9 ">
	<?php	
	$id = $_GET['prodid'];
	$product = $core->get_product($id);
	foreach ($product as $p){
		echo '<div class="col-lg-12">';
		echo $p;
		echo '</div>';
		
	}
?>
<a href='product.php?add_to_cart=<?php echo $id; ?>&prodid=<?php echo $id;?>'>add to cart</a><br>
<a href="cart.php" >Go to Cart</a>
   </section>
</div>
</div>

<div class="container">
 <div class="col col-lg-10 pull-right">
 <h3>Whats New in Our Shop</h3><hr>

			 <?php
$core->new_products();
			?>
		</div>
			 <?php
if(isset($_GET['add_to_cart'])){
	$cart->addToCart($_GET['add_to_cart']);
}
			?>

</div>
<?php include 'includes/footer.php'; ?>