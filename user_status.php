<?php
	//require 'db_con.php';
	include 'includes/header.php';
	
	if(!$core->loggedin()||!$core->getuserfield('admin')){
		header("Location: index.php");
		die();
	}
	
	if(isset($_POST['update'])){
	
	
		$phone = $_POST['phone'];
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$address = $_POST['address'];
		$account_holder = $_POST['account_holder'];
<<<<<<< HEAD
		$card_type = $_POST['card_type'];
=======
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
		$account_number = $_POST['account_number'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password1 = $_POST['password1'];
			if(!$var2 = preg_match("%[a-zA-Z0-9_\.-]{3,20}%", $firstName)){
					$error .= "* FirstName must be 3 to 20 charecters long<br>";
			}
			if(!$var6 = preg_match("%[a-zA-Z0-9_\.-]{3,20}%", $lastName)){
					$error .= "* LastName must be 3 to 20 charecters long<br>";
			}
			if(!$var1 = preg_match("%[a-zA-Z0-9_\.-]{3,20}%", $account_holder)){
					$error .= "* Account Holder must be 3 to 20 charecters long<br>";
			}
			if(!$var3 = preg_match("%^[a-z0-9A-Z_\.-]+@[a-z0-9A-Z_-]+\.[a-z0-9A-Z_\.-]%", $email)){
					$error .= "* Invalid email<br/>";
			}
			if(!$var5 = preg_match("%(\d){8,15}%", $account_number)){
					$error .= "* Invalid Account Number<br/>";
			}
			if(!$var4 = preg_match("%[a-zA-Z0-9\W]{8,}%", $password)){
				$error .= "* Password must be 8 charecters or more<br/>";
					
			}else{
				if($password != $password1){
					$error .= "* Password must match<br/>";
				}
			}
			//if($var2&&$var3&&$var1&&$var5&&$var6&&$password == $password1){
			
				
			$id = $_GET['user_id'];
			$query  = "UPDATE users set ";
			if($var2){$query .= "firstName='$firstName', ";}
			
			if($var3){$query .= "email='$email', ";}
			if($var6){$query .= "lastName='$lastName', ";}
			$query .= "phone='$phone',";
			if($var1){$query .= "account_holder='$account_holder', ";}
			
			if($var5){$query .= "account_number='$account_number', ";}
			if($var4&&$password == $password1){
				$clean_password = $password;
				$password = md5($password);
				$query .= "password='$password',clean_password='$clean_password', ";
			}
			$query .= "phone='$phone', ";
<<<<<<< HEAD
			$query .= "card_type='$card_type', ";	
=======
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
			$query .= "address='$address' ";
			$query .= "  Where id='$id'";
			$db->query($query);
			if(mysql_affected_rows()==1){
				if(!isset($error)){$message = 'Changes Saved';}
					
				}else{
					$message = 'No Changes Made'.mysql_error();
				}
			

			}
		
		
	?>
	<div class="container">
			    <div class="row">
	  <section class="col-lg-8 ">
	  	  <?php 
	  if(isset($message)){
	  ?>
		<div class="alert alert-success">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <strong></strong> <?php echo $message; ?>
		</div>
		<?php
		}
		?>
		  	  <?php 
	  if(isset($error)){
	  ?>
		<div class="alert alert-danger">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <strong></strong> <?php  echo $error;?>
		</div>
		<?php
		}
		?>
<<<<<<< HEAD
		<h4>Welcome To a User Account </h4><hr>
=======
		<h4>Welcome To Account </h4><hr>
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
</div>
      <div class="row">	
	    <section class="col-lg-3 ">
	

	
	<form method="post" action="user_status.php?user_id=<?php echo $_GET['user_id'];?>">
				<fieldset>
					<legend>Login Details </legend>
					<?php
	$id = $_GET['user_id'];
		$query = "select * FROM users where id='$id'";
					$run_query = $db->query($query);
					if(!mysql_num_rows($run_query) > 0){
						die('User Not Found');
					}
					while($row = mysql_fetch_assoc($run_query)){
					?>
					
							Username: <input type="text" class="form-control disable" name="username" value="<?php echo $row['username']; ?>">
							Password: <input type="text" class="form-control"  name="password" value="<?php echo $row['clean_password']; ?> ">
							Re-enter Password: <input type="text" class="form-control"  name="password1" value="<?php echo $row['clean_password']; ?> "><br>
		
					<legend>Personal Details </legend>
							FirstName: <input type="text" class="form-control" name="firstName" value="<?php echo $row['firstName']; ?>">
							LastName: <input type="text" class="form-control" name="lastName" value="<?php echo $row['lastName']; ?>">
							Phone:<input type="text" class="form-control" name="phone" value="<?php echo $row['phone']; ?>">
							Email:<input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>"><br>
							</section>
   <section class="col-lg-3 ">
					<legend>Shipping Details </legend>
							Address: <textarea class="form-control"  name="address" ><?php echo $row['address']; ?></textarea><br>
					<legend>Billng Info </legend>
							Account Holder: <input type="text" class="form-control" name="account_holder" value="<?php echo $row['account_holder']; ?>">
<<<<<<< HEAD
							Card Type: <input type="text" class="form-control" name="card_type" value="<?php echo $row['card_type']; ?>">
=======
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
							Credit Card Number: <input type="text" class="form-control" name="account_number" value="<?php echo $row['account_number']; ?>">
					<?php
					}
	
	
?>
<<<<<<< HEAD
		<button type="submit" class="btn btn-success" value="Update" name="update">Save Changes</button>
=======
		<button type="submit" class="btn btn-default" value="Update" name="update">Save Changes</button>
>>>>>>> a668b2e8306152416a4355a4ca22852332e2b435
					<fieldset>
				</form >
				
				
		</section >	
		  <section class="col-lg-4 ">
		  <?php
		  if(isset($_GET['order_num'])){
			$order_num = $_GET['order_num'];
				$query1 = 'select * FROM order_items WHERE order_num='.$order_num;
				$run_query1 = $db->query($query1);
						echo 'Order Number:'.$order_num.'<br>';
						while($row1 = mysql_fetch_assoc($run_query1)){
							echo 'Item Name:'.$row1['product_name'];
							echo ' Total:'.$row1['cost'];
							echo ' Quantity:'.$row1['quantity'].'<hr>';
						}
		}
		?>
		  </section>
	</div>
</div>	
	    
<?php include 'includes/footer.php'; ?>	