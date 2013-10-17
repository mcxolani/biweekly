<?php
session_start();
	// class Cart{
		// public function add_to_cart($item){
		// $_SESSION['cart'][clear_string((int)$_GET['prodid'])]+='1';
		// }
		// public function getItem(){
			// return $_SESSION['cart'];
		// }
			if(isset($_GET['add_to_cart'])){
		$_SESSION['cart'][(int)$_GET['add_to_cart']]+='1';
		header("Location: cart.php");
	}
	
	if(isset($_GET['remove'])){
		$_SESSION['cart'][$_GET['remove']]--;
		header("Location: cart.php");
	}
	if(isset($_GET['delete'])){
		$_SESSION['cart'][$_GET['delete']]='0';
		header("Location: cart.php");
	}
		
		
		
	//}
?>