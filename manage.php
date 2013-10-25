<?php
	//require 'db_con.php';
	include 'includes/header.php';
	if(!$core->loggedin()||!$core->getuserfield('admin')){
		header("Location: index.php");
		die();
	}
	?>
<?php
		//Adding Products
		if(isset($_GET['message'])){
		$message .= $_GET['message'];
		}
		if(isset($_GET['error'])){
		$error .= $_GET['error'];
		}
	
?>
    <div class="container">
      <div class="row">
	  <section class="col-lg-12 ">
	  	  <?php 
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
		<?php } ?>
		
		<div class="panel panel-primary" >
			 <div class="panel-body ">
			 <p>Welcome to Your Shop Manager <?php echo $core->getuserfield('username');?></p>
			 <p class=""><a class='btn btn-info' href="add_product.php">Add Product</a></p>
			 </div>
		</div>
	  	<div class="tabbable tabs" >
		<ul class="nav nav-tabs" >
			
		    <?php
			
				$query = "SELECT * FROM sub_categories";
				$run_query = $db->query($query);			
				while($row = mysql_fetch_assoc($run_query)){
				?>
			
				<li ><a  href="manage.php?cat_id=<?php echo $row['id'];?>#cat" ><?php echo $row['name'];?></a></li>
				<?php }
			?>
			</ul>
		</div>
	  <section class="tab-content">
			<div class="tab-pane active" id="cat">
			
					    <?php
						$cat_id = '1';
						if(isset($_GET['cat_id'])){
							$cat_id = $_GET['cat_id'];
						} 
						?>
			 <table class="table table-striped">
				  <th>Name</th>
				  <th>Image</th>
				  <th>Price</th>
				  <th>Delete</th>
				  <?php
				$query = "SELECT * FROM product where catagory='$cat_id'";
				$run_query = $db->query($query);
					
				while($row = mysql_fetch_assoc($run_query)){
			//
				?>
				 <tr>
					<td><a href='edit.php?prodid=<?php echo $row['id']; ?>'><?php echo $row['name']; ?></a></td>
					<td><a href='edit.php?prodid=<?php echo $row['id']; ?>'><img width='50px' height='50px' src='<?php echo $row['image']; ?>'/></td>
					<td><?php echo $row['unit_price']; ?></td>
					<td><a class='btn btn-danger' href='manage.php?delete=<?php echo $row['id']; ?>' onclick="return confirm('Are You Sure?');">Delete</a></td>
					</tr>
					<?php } ?>
			</table>

			</div>
			
		</section>
		</section>
				<?php
			if(isset($_GET['delete'])){
	$core->delete_product($_GET['delete']);
}
		?>
		</div>
	</div>		
<?php include 'includes/footer.php'; ?>