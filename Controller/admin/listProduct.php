<?php

class ListProduct {
	public function __construct()
	{
		require_once('../Model/admin/ProductModel.php');
		require_once('../Model/admin/category.php');
		$ProductModel = new ProductModel;
		$products = $ProductModel->getList();
		$category = new CategoryModel();

		require('../View/admin/pages/product/list.php');
	}
}