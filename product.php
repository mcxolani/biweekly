<?php
<<<<<<< HEAD
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
=======
			
<<<<<<< HEAD
	//require 'db_con.php';
	include 'includes/header.php';
	// if(isset($_GET['add_to_cart'])){
		// $item = $_GET['add_to_cart'];
		// $cart = new Cart;
		// $cart->add_to_cart($item);
	// }
=======
	require 'db_con.php';
	include 'cart.class.php';
	include 'includes/header.php';
	if(isset($_GET['add_to_cart'])){
		$item = $_GET['add_to_cart'];
		$cart = new Cart;
		$cart->add_to_cart($item);
	}
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
	?>
<body>
	

    <!-- Main jumbotron for a primary marketing message or call to action -->
<<<<<<< HEAD
<div class="container">

		<h4>Shopping Cart</h4><hr>

</div>
=======
    <div class="jumbotron" id="orange">
      <div class="container">
       
      </div>
    </div>
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
<<<<<<< HEAD
   <section class="col-lg-3 ">
   <table class="table ">
   <th>Categories</th>
				<tr><td><a href="products.php#cat1" >Pianos</a></td></tr>
				<tr><td ><a href="products.php#cat2" >Guitors</a></td></tr>
				<tr><td ><a href="products.php#cat3" >Speakers</a></td></tr>
				<tr><td ><a href="products.php#cat4" >Microphones</a></td></tr>
				<tr><td ><a href="products.php#cat5" >Stands</a></td></tr>
   
   </table>  
   </section>
   
      <section class="col-lg-9 ">
=======

>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
	<?php
	function get_product($id){	

			$query = "SELECT * FROM product WHERE id='$id'";
			$run_query = mysql_query($query);
			
			if(mysql_num_rows($run_query) > 0){
			
			while($row = mysql_fetch_assoc($run_query)){
				$name = $row['name'];
<<<<<<< HEAD
				$price = "R".number_format($row['unit_price'], 2);
=======
				$price = $row['unit_price'];
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
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
	
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
	$id = $_GET['prodid'];
	$product = $core->get_product($id);
	foreach ($product as $p){
		echo '<div class="col-lg-12">';
		echo $p;
		echo '</div>';
		
	}
?>
<<<<<<< HEAD
<a href='cart.class.php?add_to_cart=<?php echo $id; ?>&prodid=<?php echo $id;?>'>add to cart</a><br>
<a href="cart.php" id="orange">Go to Cart</a>
   </section>
</div>
</div>

<div class="container">
 <h2>Whats New in Our Shop</h2><hr>

			 <?php
				$query = "SELECT * FROM product order by id desc limit 4";
				$run_query = mysql_query($query);
			
				while($row = mysql_fetch_assoc($run_query)){
				echo '  <div class="col col-lg-3 col-md-3 col-sm-3">';
					echo '<div class="panel panel-default">';
					echo '<div class="panel-body">';
					echo "<a href='product.php?prodid=".$row['id']."'><img width='100%' src='".$row['image']."'/></a>";
					echo ' </div>';
					echo "<div class=\"panel-footer\"><a href='product.php?prodid=".$row['id']."'>".$row['name']."</a><span class=\"badge pull-right\">R".number_format($row['unit_price'], 2)."</span></div>";
					echo ' </div>';
					
					echo ' </div>';
				}

			?>

</div>
=======
<a href='product.php?add_to_cart=<?php echo $id; ?>&prodid=<?php echo $id;?>'>add to cart</a><br>
<a href="cart.php" >Go to Cart</a>
   </section>
</div>
</div>
<<<<<<< HEAD

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
=======
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
<?php
include 'includes/footer.php';
?>
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
