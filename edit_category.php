<?php
	include 'includes/header.php';
	if(!$core->loggedin()||!$core->getuserfield('admin')){
		header("Location: index.php");
		die();
	}

	if(isset($_GET['message'])){
		$message .= $_GET['message'];
		}
		$id = $_GET['cat_id'];
	//update category
	if(isset($_POST['update_cat'])){
			$name = $_POST['name'];
			$visible = $_POST['visible'];
			
			if(!empty($name)){
			///
			if(!$val1 = preg_match("%[a-zA-Z0-9_\.-]{3,}%", $name)){
					$error .= "* Category name is too short<br>";
			}
			if($val1){
			
			$query = "UPDATE categories set name='$name', visible='$visible' where id='$id' ";
			mysql_query($query);
			if(mysql_affected_rows()==1){
					$message = 'Changes Saved';
				}else{
					$message = 'No Changes Made'.mysql_error();
				}
			}
			}else{
				$message = 'must enter all fields';
			}
		}
	?>

    <div class="container">
      <div class="row">
	  <section class="col-lg-4 ">

	  	 <?php 
	  if(isset($message)){
	  ?>
		<div class="alert alert-success">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <strong></strong> <?php echo $message;?>
		</div>
		<?php
		}
		?>

		  	 <?php 
	  if(isset($error)){
	  ?>
		<div class="alert alert-danger">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <strong></strong> <?php echo $error;?>
		</div>
		<?php
		}
		?>
	  	

  <form method="post"  action="edit_category.php?cat_id=<?php echo $id; ?>">

  	    <?php
   			    $id = $_GET['cat_id'];
				$query = "SELECT * FROM categories where id='$id'";
				$run_query = $db->query($query);
				while($row = mysql_fetch_assoc($run_query)){
					
			?> 
				Category Name: <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>"><br>
				Visible: <select class="form-control" name="visible">
		
			<option value="1">Yes</option>
			<option value="0">No</option>
			
			</select><br>
					<?php	} ?>
								<button class="btn btn-succes" type="submit" name="update_cat">Update Category</button>
			</form >

	</section>
		
	  <section class="col-lg-4">



		</section>
		</div>
	</div>		
<?php include 'includes/footer.php'; ?>