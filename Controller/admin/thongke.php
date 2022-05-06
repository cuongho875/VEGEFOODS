<?php

class Thongke {
	public function __construct()
	{
		require_once('../Model/ModelOrder.php');
		require_once('../Model/ModelProduct.php');
        $thongkeModel = new ThongkeModel;
        $productModel = new ModelProduct;
		$orderModel = new ModelOrder;
		$orders=$orderModel->getOrderNew();
		$sanphambanchay=$thongkeModel->SanPhamBanChay();
		
		require('../View/admin/pages/thongke.php');
	}
}