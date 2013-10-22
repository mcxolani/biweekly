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

		
		function addToCart($item){
			$_SESSION['cart'][$item]+='1';
			header("Location: product.php?prodid=$item&message=Item added<a href=\"cart.php\" >Go to Cart</a>");
		}
		function getItem(){
			echo number_format($_SESSION['total'],2);
		}
		
		function getTotal($sub){
			return $total += $sub;
		}
		
		function plusItem($item){
			$_SESSION['cart'][$item]+='1';
		}
		
		function removeToCart($item){
			$_SESSION['cart'][$item]--;
		}
		
		function deleteItem($item){
			$_SESSION['cart'][$item]=0;
		}
	}
>>>>>>> 35c9b6c4b0404b12bdc7feab73f8669bab831540
?>