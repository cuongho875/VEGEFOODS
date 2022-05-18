<?php

class Print_order {
	public function __construct()
	{
		require_once('../Model/ModelOrder.php');
		$orderModel = new ModelOrder;
        if(isset($_GET['order_id'])){
            $order_id=$_GET['order_id'];
            $detail_orders = $orderModel->getDetailOrder($_GET['order_id']);
        }

		require('../View/admin/pages/orders/print_order.php');
	}
}