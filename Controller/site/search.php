<?php
class Search {
    public function __construct()
    {
        $productModel = new ModelProduct;
        if(isset($_GET['btn-search'])){
            $key = $_GET['text-search'];
            $result = $productModel->searchProduct($key);
        }
        require('./View/site/pages/search.php');
    }
 }