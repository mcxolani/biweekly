<?php
session_start();
	class Cart{
		public function add_to_cart($item){
			$_SESSION['item'][] = $item;
		}
		public function getItem(){
			return $_SESSION['item'];
		}
	}
?>