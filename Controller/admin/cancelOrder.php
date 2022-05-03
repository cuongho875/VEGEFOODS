<?php
    class CancelOrder{
        public function __construct()
        {
            $ModelOrder = new ModelOrder;
            $order_id = $_GET['orderId'];
            $ModelOrder->CancelOrder($order_id);
            header('Location: ?controller=listOrder');
        }
    }
?>