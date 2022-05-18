<?php

class Detail_order {
	public function __construct()
	{
		require_once('../Model/ModelOrder.php');
		$orderModel = new ModelOrder;
        if(isset($_GET['orderId'])){
            $order_id=$_GET['orderId'];
            $detail_orders = $orderModel->getDetailOrder($_GET['orderId']);
        }

		require('../View/admin/pages/orders/detail_order.php');
	}
}