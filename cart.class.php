<?php
session_start();
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
?>