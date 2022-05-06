<?php

class EditOrder {
	public function __construct()
	{
		require_once('../Model/ModelOrder.php');
		$orderModel = new ModelOrder;
        if(isset($_POST['update-order'])){
            $order_id = $_POST['order_id'];
            $thanhtoan = $_POST['thanhtoan'];
            $trangthai = $_POST['trangthai'];
            $orderModel = new ModelOrder;
            $orderModel->EditOrder($order_id,$thanhtoan,$trangthai);
        }
        $orders = $orderModel->getAllOrder();
		require('../View/admin/pages/orders/list.php');
	}
}
      ?>