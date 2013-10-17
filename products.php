<?php
include 'includes/header.php';
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

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
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
			<?php
include 'includes/footer.php';
?>
