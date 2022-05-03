<?php

class Cart {
	public function __construct()
	{
		if(isset($_GET['action'])&&$_GET['action']=="add"){
			if(isset($_SESSION['quantity'])){
					$_SESSION['quantity']+=$_POST['quantity'];
					header('Location: /VEGEFOODS/?controller=cart');
				}
			}
			if(isset($_GET['action'])&&$_GET['action']=="delete"){
				if(isset($_SESSION['quantity'])){
						$_SESSION['quantity']-=$_POST['quantity'];
						header('Location: /VEGEFOODS/?controller=cart');
					}
				}
		require('./View/site/layouts/header.php');
		require('./View/site/pages/cart.php');
	}


}