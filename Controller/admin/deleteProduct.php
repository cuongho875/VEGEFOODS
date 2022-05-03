<?php

class DeleteProduct {
	public function __construct()
	{
		require_once('../Model/ModelProduct.php');
		
		$productModel = new ModelProduct();
		
		if (isset($_GET['productId'])) {
			$productId = $_GET['productId'];
			$productModel->deleteProduct($productId);
			$_SESSION['thongbao']='Xóa thành công';
			header('Location: ?controller=listProduct');
		}
		require('../View/admin/pages/category/list.php');
	}
}