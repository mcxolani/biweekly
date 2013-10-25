<?php
	include 'includes/header.php';
	if(!$core->loggedin()||!$core->getuserfield('admin')){
		header("Location: index.php");
		die();
	}

		if(isset($_GET['message'])){
		$message .= $_GET['message'];
		}
		if(isset($_GET['error'])){
		$error .= $_GET['error'];
		}

		//add cat
		if(isset($_POST['add_sub_cat'])){
			$name = $_POST['name'];
			$cat = $_POST['catagory'];
			$visible = $_POST['visible'];
			
			if(!empty($name)){
			///
			if(!$val1 = preg_match("%[a-zA-Z0-9_\.-]{3,}%", $name)){
					$error .= "* Sub Category name too short<br>";
			}
			if($val1){
				//registration goes here if all validations pass		
			$query = "INSERT into sub_categories values('','$name','$cat','$visible')";
						
					if($run_query = mysql_query($query)){
							$message .= 'Sub Category Added';
						}else{
							$error .= 'Could not add Sub Category';
						}
			}
			
			}else{
				$error .= 'must enter Sub Category name';
			}
		}
		//
		//add category
			if(isset($_POST['add_cat'])){
			$name = $_POST['name'];
			$visible = $_POST['visible'];
			
			if(!empty($name)){
			///
			if(!$val1 = preg_match("%[a-zA-Z0-9_\.-]{3,}%", $name)){
					$error .= "* Category name too short<br>";
			}
			if($val1){
				//registration goes here if all validations pass		
			$query = "INSERT into categories values('','$name','$visible')";
						
					if($run_query = mysql_query($query)){
							$message .= 'Category Added';
						}else{
							$error .= 'Could not add Sub Category';
						}
			}
			
			}else{
				$error .= 'must enter Category name';
			}
		}
	?>

    <div class="container">
      <div class="row">
	  <section class="col-lg-4 pull-right">

	  		  	


	  	<h4 id="err">Category Structure</h4>
	<ul class="nav ">
   <li id="orange"><span class="badge" id="orange">Categories</span></li>
  
   			    <?php
				$query = "SELECT * FROM categories";
				$run_query = $db->query($query);
				while($row = mysql_fetch_assoc($run_query)){
				?>	
				<li><a href="edit_category.php?cat_id=<?php echo $row['id'];?>" ><?php echo $row['name'];?></a></li>
				<ul class="">
				<?php
						$query1 = "SELECT * FROM sub_categories where category='".$row['id']."' ";
						$run_query1 = $db->query($query1);
						while($row1 = mysql_fetch_assoc($run_query1)){
						?>	
						<li ><a href="edit_sub_category.php?sub_cat_id=<?php echo $row1['id'];?>" ><?php echo $row1['name'];?></a></li>
					<?php } ?>
				</ul>
			<?php } ?>
   </ul>
	</section>

		<section class="col-lg-4 ">
				<br><br>

				<?php /////////display errors
	  if(isset($message)){
	  ?>
		<div class="alert alert-success">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <strong></strong> <?php echo $message;?>
		</div>
		<?php } ?>
	
		<?php 
		//error
	  if(isset($error)){
	  ?>
		<div class="alert alert-danger">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <strong>Error!</strong> <?php echo $error;?>
		</div>
		<?php } /////////////?>
				<h4 id="err">Add Categories</h4>
				

			<div class="col-lg-6" >

				<form method="post"  action="categories.php">
							Category Name: <input type="text" class="form-control" name="name"><br>
							<input type="checkbox" name="visible" value="1">Visible<br>
							<button class="btn btn-success" type="submit" name="add_cat">Add Category</button>
						</form >

			</div>
		</section>
		<section class="col-lg-4 ">
				<br><br>
				<h4 id="err">Add Sub Categories</h4>
				

			<div class="col-lg-6" >

				<form method="post"  action="categories.php">
							Sub Category Name: <input type="text" class="form-control" name="name"><br>
							Catagory: <select class="form-control" name="catagory">
							  <?php
						$query = "SELECT * FROM categories";
						$run_query = $db->query($query);
						while($row = mysql_fetch_assoc($run_query)){
						?>
						<option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
							<?php
							}
								?>
						</select><br>
							<input type="checkbox" name="visible" value="1">Visible<br>
									
											<button class="btn btn-success" type="submit" name="add_sub_cat">Add Sub Category</button>
						</form >

			</div>
		</section>
	 
		
		</div>


		<div class="row">
	 <section class="col-lg-4 ">
  


	  	<h4 id="err">Edit Categories</h4>
 <table class="table table-striped">
				  <th>Name</th>
				  <th>Status</th>
				  <th>Delete</th>
					    <?php
				$query = "SELECT * FROM categories";
				$run_query = $db->query($query);
				while($row = mysql_fetch_assoc($run_query)){
				?> <tr>
					<td><a href='edit_category.php?cat_id=<?php echo $row['id'];?>'><?php echo $row['name']; ?></a></td>
					<td><?php echo $row['visible'] ? 'visible' : 'hidden'; ?></a></td>
					<td><a class='btn btn-danger' href='categories.php?delete_cat=<?php echo $row['id'];?>' onclick="return confirm('Are You Sure?');">Delete</a></td>
					
					</tr>
					<?php } ?>
			</table>


		</section>

			


		</section>
<section class="col-lg-4 pull-right">
	  	<h4 id="err">Edit Sub Categories</h4>
 <table class="table table-striped">
				  <th>Name</th>
				  <th>Status</th>
				  <th>Delete</th>
					    <?php
				$query = "SELECT * FROM sub_categories";
				$run_query = $db->query($query);
				while($row = mysql_fetch_assoc($run_query)){
				?> <tr>
					<td><a href='edit_sub_category.php?sub_cat_id=<?php echo $row['id'];?>'><?php echo $row['name']; ?></a></td>
					<td><?php echo $row['visible'] ? 'visible' : 'hidden'; ?></a></td>
					<td><a class='btn btn-danger' href='categories.php?delete_sub_cat=<?php echo $row['id'];?>' onclick="return confirm('Are You Sure?');">Delete</a></td>
					
					</tr>
					<?php } ?>
			</table>


		</section>
		</div>
	</div>
	<?php 
			if(isset($_GET['delete_cat'])){
				$core->delete_cat($core->clear_string($_GET['delete_cat']));
			}
			if(isset($_GET['delete_sub_cat'])){
				$core->delete_sub_cat($core->clear_string($_GET['delete_sub_cat']));
			}
			

	?>		
<?php include 'includes/footer.php'; ?>