<?php
    class Orders {
        public function __construct()
        {
            if(isset($_SESSION['user'])){

                require './View/site/pages/account/orders.php';
            }
            else {
                require './View/site/pages/login.php';
            }
        }
    }