<?php
	//require 'db_con.php';
	include 'includes/header.php';
	
		if(!$core->loggedin()||$_SESSION['total']==0){
		header("Location: register.php?error=You must be logged in to checkout");
		die();
	}
	if(isset($_GET['error'])){
		$error = $_GET['error'];
	}
	if(isset($_POST['update'])){
	
		$phone = $_POST['phone'];
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$address = $_POST['address'];
		$account_holder = $_POST['account_holder'];
		$account_number = $_POST['account_number'];
		$email = $_POST['email'];
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
			//if($var2&&$var3&&$var1&&$var5&&$var6&&$password == $password1){
			
				
			$id = $core->getuserfield('id');
			$query  = "UPDATE users set ";
			if($var2){$query .= "firstName='$firstName', ";}
			
			if($var3){$query .= "email='$email', ";}
			if($var6){$query .= "lastName='$lastName', ";}
			$query .= "phone='$phone',";
			if($var1){$query .= "account_holder='$account_holder', ";}
			
			if($var5){$query .= "account_number='$account_number', ";}
			$query .= "phone='$phone', ";
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
		<h4>Welcome Your Account <?php echo $core->getuserfield('username');?></h4><hr>
</div>
</div>
	</div>
	<div class="container">
      <div class="row">	
	    <section class="col-lg-3 ">


	
	<form method="post" action="buy_details.php">
				<fieldset>
					<?php
	$id = $core->getuserfield('id');
			$query = "select * FROM users where id='$id'";
					$run_query = $db->query($query);
					while($row = mysql_fetch_assoc($run_query)){
					?>
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
							Credit Card Number: <input type="text" class="form-control" name="account_number" value="<?php echo $row['account_number']; ?>">
					<?php
					}
	
	
?>
		<button type="submit" class="btn btn-default" value="Update" name="update">Save Changes</button>
					<fieldset>
				</form >
				
				
		</section >	
		  <section class="col-lg-4 ">
		  <?php
			  if(!$core->getuserfield('firstName')){
			  	$error .= 'Fill in Your fisrtName b4 checkout'; 
			  }
			  elseif(!$core->getuserfield('lastName')){
			  	$error .= 'Fill in Your lastName b4 checkout'; 
			  }
			  elseif(!$core->getuserfield('address')){
			  	$error .= 'Your Address is required to checkout'; 
			  }
			  elseif(!$core->getuserfield('account_holder')||!$core->getuserfield('account_number')){
			  	$error .= 'Your Billing info is Incomplete'; 
			  }else{



			  }
		?>
		  </section>
		  <section class="col-lg-3 ">
		  		<button class="btn btn-success"><a href="checkout.php">Buy</a></button>
		   </section>
	</div>
</div>	
	    
<?php include 'includes/footer.php'; ?>	