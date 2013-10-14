<?php

	require 'db_con.php';
	include 'includes/header.php';
	?>
	
<?php
		//Adding Products
		if(isset($_POST['add'])){
			$name = $_POST['name'];
			$price = $_POST['price'];
			$image = $_POST['image'];
			$descr = $_POST['descr'];
			$cat = $_POST['catagory'];
			if(!empty($name)&&!empty($price)&&!empty($image)&&!empty($descr)&&!empty($cat)){
			$query = "INSERT into product values('','$name','$price','$image','$descr','$cat')";
			
			if($run_query = mysql_query($query)){
					$massage = 'Product Added';
				}else{
					$massage = 'Could not add product';
				}
			}else{
				$message = 'must enter all fields';
			}
		}

?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" id="black">
      <div class="container">
        <h1>Welcome To Administration</h1>
        <p>Manage You Store here</p>
		<p><?php if(isset($message)){ echo $message;}?></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
	  <section class="col-lg-8 ">
	  	<div class="tabbable tabs" >
			<ul class="nav nav-tabs" id="orange">
				<li class="active"><a href="#cat1" data-toggle="tab">Piano</a></li>
				<li ><a href="#cat2" data-toggle="tab">Guitor</a></li>
				<li ><a href="#cat3" data-toggle="tab">Speakers</a></li>
				<li ><a href="#cat4" data-toggle="tab">Microphones</a></li>
				<li ><a href="#cat5" data-toggle="tab">Stands</a></li>
			</ul>
		</div>
	  
	  <section class="tab-content">
			<div class="tab-pane active" id="cat1">
					    <?php
				$query = "SELECT * FROM product where catagory=1";
				$run_query = mysql_query($query);
			
				while($row = mysql_fetch_assoc($run_query)){
					echo '  <div class="col col-lg-4 col-md-4 col-sm-4">';
					echo "<a href='edit.php?prodid=".$row['id']."'><img width='100%' src='".$row['image']."'/></a><br>";
					echo "<a href='edit.php?prodid=".$row['id']."'>".$row['name']."</a><br>";
					echo ' </div>';
				}

			?>
			</div>
			<div class="tab-pane" id="cat2">
				    <?php
				$query = "SELECT * FROM product where catagory=2";
				$run_query = mysql_query($query);
			
				while($row = mysql_fetch_assoc($run_query)){
					echo '  <div class="col col-lg-4 col-md-4 col-sm-4">';
					echo "<a href='edit.php?prodid=".$row['id']."'><img width='100%' src='".$row['image']."'/></a><br>";
					echo "<a href='edit.php?prodid=".$row['id']."'>".$row['name']."</a><br>";
					echo ' </div>';
				}

			?>
			</div>
			<div class="tab-pane" id="cat3">
						    <?php
				$query = "SELECT * FROM product where catagory=3";
				$run_query = mysql_query($query);
			
				while($row = mysql_fetch_assoc($run_query)){
					echo '  <div class="col col-lg-4 col-md-4 col-sm-4">';
					echo "<a href='edit.php?prodid=".$row['id']."'><img width='100%' src='".$row['image']."'/></a><br>";
					echo "<a href='edit.php?prodid=".$row['id']."'>".$row['name']."</a><br>";
					echo ' </div>';
				}

			?>
			</div>
			<div class="tab-pane" id="cat4">
						    <?php
				$query = "SELECT * FROM product where catagory=4";
				$run_query = mysql_query($query);
			
				while($row = mysql_fetch_assoc($run_query)){
					echo '  <div class="col col-lg-4 col-md-4 col-sm-4">';
					echo "<a href='edit.php?prodid=".$row['id']."'><img width='100%' src='".$row['image']."'/></a><br>";
					echo "<a href='edit.php?prodid=".$row['id']."'>".$row['name']."</a><br>";
					echo ' </div>';
				}

			?>
			</div>
			<div class="tab-pane" id="cat5">
						    <?php
				$query = "SELECT * FROM product where catagory=5";
				$run_query = mysql_query($query);
			
				while($row = mysql_fetch_assoc($run_query)){
					echo '  <div class="col col-lg-4 col-md-4 col-sm-4">';
					echo "<a href='edit.php?prodid=".$row['id']."'><img width='100%' src='".$row['image']."'/></a><br>";
					echo "<a href='edit.php?prodid=".$row['id']."'>".$row['name']."</a><br>";
					echo ' </div>';
				}

			?>
			</div>
		</section>
		</section>
		
	  <section class="col-lg-4">
		<div class="accordion" id="manage"  >
		<!--Add users-->
			<section class="accordion-group" id="black">
				<div class="accordion-heading" >
					<a href="#add" class="accordion-toggle" data-toggle="collapse" data-parent="#manage"><h2>Add Product</h2><a/>
				</div>
			</section>
			<div id="add" class="accordion-body collapse">
				<section class="accordion-inner">
					
						<form method="post" action="manage.php">
							Product name: <input type="text" name="name"><br>
							Product Price: <input type="text" name="price"><br>
							Product Description: <input type="text" name="descr"><br>
							Product Image: <input type="text" name="image"><br>
							Product Catagory: <select name="catagory">
											<option value="1">Piano</option>
											<option value="2">Guiters</option>
											<option value="3">Speakers</option>
											<option value="4">Microphone</option>
											<option value="5">Stands</option>
											</select><br>
											<input type="submit" value="Add" name="add">
						</form >
				
				</section>
			</div>	<!--Add users-->
			<section class="accordion-group" id="orange">
				<div class="accordion-heading" >
					<a href="#edit" class="accordion-toggle" data-toggle="collapse" data-parent="#manage"><h2>Wola</h2><a/>
				</div>
			</section>
			<div id="edit" class="accordion-body collapse">
				<section class="accordion-inner">
					<p> Add Users here
						<form >
							<input type="text">
						</form >
					</p>
				</section>
			</div>	<!--Add users-->
			<section class="accordion-group" id="black">
				<div class="accordion-heading">
					<a href="#new" class="accordion-toggle" data-toggle="collapse" data-parent="#manage"><h2>Wola</h2><a/>
				</div>
			</section>
			<div id="new" class="accordion-body collapse">
				<section class="accordion-inner">
					<p> Add Users here
						<form >
							<input type="text">
						</form >
					</p>
				</section>
			</div>	<!--Add users-->
			<section class="accordion-group" id="orange">
				<div class="accordion-heading">
					<a href="#hey" class="accordion-toggle" data-toggle="collapse" data-parent="#manage"><h2>Wola</h2><a/>
				</div>
			</section>
			<div id="hey" class="accordion-body collapse">
				<section class="accordion-inner">
					<p> Add Users here
						<form >
							<input type="text">
						</form >
					</p>
				</section>
			</div>	<!--Add users-->
			<section class="accordion-group" id="black">
				<div class="accordion-heading">
					<a href="#wola" class="accordion-toggle" data-toggle="collapse" data-parent="#manage"><h2>Wola</h2><a/>
				</div>
			</section>
			<div id="wola" class="accordion-body collapse">
				<section class="accordion-inner">
					<p> Add Users here
						<form >
							<input type="text">
						</form >
					</p>
				</section>
			</div>
		</div>
		</section>
		</div>
	</div>
	
			
			<?php
			//iveri.co.za
			//iverilite.co.za
			//NSA bullrun
include 'includes/footer.php';
?>
