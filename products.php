<?php
include 'includes/header.php';
	//require 'db_con.php';
	if($core->loggedin()&&$core->getuserfield('admin')){
		header("Location: manage.php?error=You are not allowed to buy!");
		die();
	}
	?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
<div class="container ">

		<h4 id="err">Musical Instruments</h4><hr>

</div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
   <section class="col-lg-2  ">
   <ul class="nav affix hidden-sm hidden-md hidden-xs">
   <li id="orange"><span class="badge" id="orange">Categories</span></li>
  
   			    <?php
				$query = "SELECT * FROM categories where visible=1";
				$run_query = $db->query($query);
				while($row = mysql_fetch_assoc($run_query)){
				?>	
				<li ><a href="products.php?cat_id=<?php echo $row['id'];?>" ><?php echo $row['name'];?></a></li>
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
   
   <section class="col-lg-8">
	
			
					    <?php
				$cat_id = '1';
				if(isset($_GET['cat_id'])){
				$cat_id = $_GET['cat_id'];
				}
				$query = "SELECT * FROM product where catagory='$cat_id'";
				$run_query = $db->query($query);
				$count = 1;
				while($row = mysql_fetch_assoc($run_query)){
				if($count%3==0){
					echo '  <div class="row">';
				}
					echo '  <div class="col col-lg-4 col-md-4 col-sm-4">';
					echo '<div class="panel panel-default">';
					echo '<div class="panel-body">';
					echo "<a href='product.php?prodid=".$row['id']."'><img width='100%' height='150px' src='".$row['image']."'/></a>";
					echo "<h4><a href='product.php?prodid=".$row['id']."'>".$row['name']."</a></h4>";
					echo "<p>".$row['model']."</p>";
					echo ' </div>';
					echo "<div class=\"panel-footer\"><a href='product.php?prodid=".$row['id']."'><span class=\"badge\">View</span></a><span class=\"badge pull-right\" id=\"error\">R".number_format($row['unit_price'], 2)."</span></div>";
					echo ' </div>';
					
					echo ' </div>';
				if($count%3==0){
					echo '  </div>';
				}
				$count++;
				}
			
			?>

		</section>
		   <section class="col-lg-2 ">
   
   <h4>Advertisment</h4><hr>
  
	
   </section>
</div>
</div>

<div class="container">
	<div class="row">
		<div class="col col-lg-10 pull-right">
 <h3>Whats New in Our Shop</h3><hr>

			 <?php
$core->new_products();
			?>
		</div>
	</div>
</div>
			<?php
include 'includes/footer.php';
?>
