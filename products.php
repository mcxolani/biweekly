<?php
include 'includes/header.php';
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
	//require 'db_con.php';
	if($core->loggedin()&&$core->getuserfield('admin')){
		header("Location: manage.php?error=You are not allowed to buy!");
		die();
	}
<<<<<<< HEAD
	?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
<div class="container ">
	
		<h4 id="err">Musical Instruments</h4><hr>
				
</div>
=======
=======
<<<<<<< HEAD
	//require 'db_con.php';
	if(loggedin()&&getuserfield('admin')){
		header("Location: manage.php");
		die();
	}
	?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
<div class="container">

		<h4>Musical Instruments</h4><hr>

</div>
=======
	require 'db_con.php';
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
	?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
<<<<<<< HEAD
<div class="container ">

		<h4 id="err">Musical Instruments</h4><hr>

</div>
=======
    <div class="jumbotron" id="orange">
      <div class="container">
        <h1>Products here</h1>
        <p>These are the products we have</p>
      </div>
    </div>
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
   <section class="col-lg-2  ">
   <ul class="nav affix hidden-sm hidden-md hidden-xs">
   <li id="orange"><span class="badge" id="orange">Categories</span></li>
  
   			    <?php
				$query = "SELECT * FROM categories where visible=1";
				$run_query = $db->query($query);
				while($row = mysql_fetch_assoc($run_query)){
				?>	
<<<<<<< HEAD

				<li ><a href="#" ><?php echo $row['name'];?></a></li>
				<ul>
=======
				<li ><a href="products.php?cat_id=<?php echo $row['id'];?>" ><?php echo $row['name'];?></a></li>
				<ul class="">
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
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
	
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
   <section class="col-lg-2 ">
   <table class="table table-striped">
   <th>Categories</th>
				<tr><td><a href="#cat1" >Pianos</a></td></tr>
				<tr><td ><a href="#cat2" >Guitors</a></td></tr>
				<tr><td ><a href="#cat3" >Speakers</a></td></tr>
				<tr><td ><a href="#cat4" >Microphones</a></td></tr>
				<tr><td ><a href="#cat5" >Stands</a></td></tr>
   
   </table>  
   </section>
   
   <section class="col-lg-8 ">
	
			<div class="panel" id="cat1">
			<div class="panel-heading"><span class="badge">Pianos</span></div>
			 <div class="panel-body">
			
					    <?php
				$query = "SELECT * FROM product where catagory=1";
				$run_query = mysql_query($query);
			
				while($row = mysql_fetch_assoc($run_query)){
					echo '  <div class="col col-lg-4 col-md-4 col-sm-4">';
					echo '<div class="panel panel-default">';
					echo '<div class="panel-body">';
					echo "<a href='product.php?prodid=".$row['id']."'><img width='100%' src='".$row['image']."'/></a>";
					echo "<li>".$row['description']."</li>";
					echo ' </div>';
					echo "<div class=\"panel-footer\"><a href='product.php?prodid=".$row['id']."'>".$row['name']."</a><span class=\"badge pull-right\">R".number_format($row['unit_price'], 2)."</span></div>";
					echo ' </div>';
					
					echo ' </div>';
				}

			?>
			</div>
			</div>
			<br>
			<br>
			<br>
			<div class="panel" id="cat2">
			<div class="panel-heading">Guitors</div>
			 <div class="panel-body">
				    <?php
				$query = "SELECT * FROM product where catagory=2";
				$run_query = mysql_query($query);
			
				while($row = mysql_fetch_assoc($run_query)){
					echo '  <div class="col col-lg-4 col-md-4 col-sm-4">';
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
			</div>
			<div class="panel" id="cat3">
			<div class="panel-heading">Speakers</div>
			 <div class="panel-body">
						    <?php
				$query = "SELECT * FROM product where catagory=3";
				$run_query = mysql_query($query);
			
				while($row = mysql_fetch_assoc($run_query)){
					echo '  <div class="col col-lg-4 col-md-4 col-sm-4">';
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
			</div>
			<div class="panel" id="cat4">
			<div class="panel-heading">Microphones</div>
			 <div class="panel-body">
						     <?php
				$query = "SELECT * FROM product where catagory=4";
				$run_query = mysql_query($query);
			
				while($row = mysql_fetch_assoc($run_query)){
					echo '  <div class="col col-lg-4 col-md-4 col-sm-4">';
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
			</div>
			<div class="panel" id="cat5">
			<div class="panel-heading">Stands</div>
			 <div class="panel-body">
						     <?php
				$query = "SELECT * FROM product where catagory=5";
				$run_query = mysql_query($query);
			
				while($row = mysql_fetch_assoc($run_query)){
					echo '  <div class="col col-lg-4 col-md-4 col-sm-4">';
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
			</div>

		</section>
		   <section class="col-lg-2 ">
   <table class="affix">
   <th>Advertisment<hr></th>
				<tr><td><a href="#cat1" >Pianos<hr id="error"></a></td></tr>
				<tr><td ><a href="#cat2" >Guitors<hr></a></td></tr>
				<tr><td ><a href="#cat3" >Speakers<hr></a></td></tr>
				<tr><td ><a href="#cat4" >Microphones<hr></a></td></tr>
				<tr><td ><a href="#cat5" >Stands<hr></a></td></tr>
   
   </table>  
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
      
    <?php
	$query = "SELECT * FROM product";
			$run_query = mysql_query($query);
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
			
					    <?php
				$cat_id = '1';
				if(isset($_GET['cat_id'])){
<<<<<<< HEAD
				$cat_id = $core->clear_string((int)$_GET['cat_id']);
				}
				$query = "SELECT * FROM product where catagory='$cat_id'";
				$run_query = $db->query($query);
					if(mysql_num_rows($run_query)<1){
						echo '<h3>No Item in this category</h3>';
					}
=======
				$cat_id = $_GET['cat_id'];
				}
				$query = "SELECT * FROM product where catagory='$cat_id'";
				$run_query = $db->query($query);
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
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
<<<<<<< HEAD
					echo ' </div>';
					echo "<div class=\"panel-footer\"><a href='product.php?prodid=".$row['id']."'><span class=\"badge\">View</span></a><span class=\"badge pull-right\" id=\"error\">R".number_format($row['unit_price'], 2)."</span></div>";
					echo ' </div>';
=======
					echo ' </div>';
					echo "<div class=\"panel-footer\"><a href='product.php?prodid=".$row['id']."'><span class=\"badge\">View</span></a><span class=\"badge pull-right\" id=\"error\">R".number_format($row['unit_price'], 2)."</span></div>";
					echo ' </div>';
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
					
					echo ' </div>';
				if($count%3==0){
					echo '  </div>';
				}
				$count++;
				}
			
			?>

		</section>
		   <section class="col-lg-2 ">
   
<<<<<<< HEAD
   <h4 id="err">Search</h4><hr>
  <form class="form" action="search.php">
			<input class="form-control" type="text" name="search">
			Catagory: <select class="form-control" name="catagory">
			<option value="">All</option>
							  <?php
						$query = "SELECT * FROM sub_categories where visible=1";
						$run_query = $db->query($query);
						while($row = mysql_fetch_assoc($run_query)){
						?>
						<option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
							<?php
							}
								?>
						</select><br>
			
			<button class="btn form-control" id="orange"><span class="badge" id="orange">Search</span></button>
		</form>

=======
   <h4>Advertisment</h4><hr>
  
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
	
   </section>
</div>
</div>

<div class="container">
	<div class="row">
		<div class="col col-lg-10 pull-right">
 <h3>Whats New in Our Shop</h3><hr>

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
			 <?php
$core->new_products();
			?>
		</div>
	</div>
</div>
<<<<<<< HEAD
=======
=======
     ?>
</body>			
			//iveri.co.za
			//iverilite.co.za
			//NSA bullrun
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
>>>>>>> cea68d6ce8007100813cb65530d7fcbf03d314ce
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
			<?php
include 'includes/footer.php';
?>
