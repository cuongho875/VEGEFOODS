<?php
    class Detail_order {
        public function __construct()
        {
            $orderModel = new ModelOrder();
            if(isset($_GET['order_id'])){
                $order_id=$_GET['order_id'];
                $detail_orders = $orderModel->getDetailOrder($_GET['order_id']);
            }
            require('./View/site/pages/account/detail_order.php');
            
        }
    }