<?php

	require 'db_con.php';
	include 'includes/header.php';
	?>
	
<?php
		//Adding Products
		
		if(isset($_POST['update'])){
			$name = clear_string($_POST['name']);
			$price = $_POST['price'];
			$image = $_POST['image'];
			$descr = $_POST['descr'];
			$cat = $_POST['catagory'];
			if(!empty($name)&&!empty($price)&&!empty($image)&&!empty($descr)&&!empty($cat)){
			$id = $_GET['prodid'];
			$query = "UPDATE product set name='$name',unit_price='$price',image='$image',description='$descr',catagory='$cat' where id='$id'";
			mysql_query($query);
			if(mysql_affected_rows()==1){
					$message = 'Product Updated';
				}else{
					$message = 'Could not add product'.mysql_error();
				}
			}else{
				$message = 'must enter all fields';
			}
		}

?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" id="black">
      <div class="container">
        <h1>Update Products</h1>
        <p>Manage You Store here</p>
		<p id="error"><?php if(isset($message)){ echo $message;}?></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
	  <section class="col-lg-4 " id="orange">
			<form method="post" action="edit.php?prodid=<?php echo $_GET['prodid']; ?>">
				<fieldset>
					<legend>Update </legend>
					<div class="form-group">
							Product name: <input type="text" class="form-control" name="name">
					</div>
					<div class="form-group">
							Product Price: <input type="text" class="form-control" name="price">
					</div>
							Product Description: <input type="text" class="form-control" name="descr">
					<div class="form-group">
							Product Image: <input type="text" class="form-control" name="image">
					</div>
							Product Catagory: <select name="catagory" class="form-control">
											<option value="1">Piano</option>
											<option value="2">Guiters</option>
											<option value="3">Speakers</option>
											<option value="4">Microphone</option>
											<option value="5">Stands</option>
											</select><br>
											<button type="submit" class="btn btn-default" value="Update" name="update">Update</button>
					<fieldset>
				</form >
	
		</section>
		
	  <section class="col-lg-4 pull-right">
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
