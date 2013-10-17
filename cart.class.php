<?php
session_start();
<<<<<<< HEAD
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
=======
	class Cart{
		public function add_to_cart($item){
			$_SESSION['item'][] = $item;
		}
		public function getItem(){
			return $_SESSION['item'];
		}
	}
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
?>