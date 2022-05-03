<?php
    class Checkout{

        public function __construct()
        {           
             if(isset($_SESSION['user'])){
                header('Location: ./View/site/pages/checkout.php') ;

            }
            else {
                require './View/site/pages/login.php';
            }
        }
    }