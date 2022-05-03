<?php

class ListOrder {
	public function __construct()
	{
		require_once('../Model/ModelOrder.php');
		$orderModel = new ModelOrder;
		$orders = $orderModel->getAllOrder();

		require('../View/admin/pages/orders/list.php');
	}
}