<?php

class Delete_order {
	public function __construct()
	{
		require_once('../Model/ModelOrder.php');
		
		$orderModel = new ModelOrder();
		
		if (isset($_GET['order_id'])) {
			$order_id = $_GET['order_id'];
			$delete=$orderModel->deleteOrder($order_id);
            if($delete){
                $_SESSION['thongbao']='Xóa thành công';
                header('Location: ?controller=listOrder');
            }
		}
		require('../View/admin/pages/orders/detail_order.php');
	}
}