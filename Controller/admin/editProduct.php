<?php

class EditProduct {
	public function __construct()
	{
		require_once('../../Model/admin/category.php');
		require_once('../../Model/ModelProduct.php');

		$categoryModel = new categoryModel;
		$productModel = new ModelProduct();

		if (isset($_GET['productId'])) {
			$productId = $_GET['productId'];
			$categories = $categoryModel->categoryList(); /*lấy toàn bộ danh mục trong bảng categories*/
			$productOld = $productModel->getProductByID($productId);
			if (isset($_POST['editProduct'])) {

			/**
	        * Nếu không chọn ảnh thì lấy tên ảnh trong input có name là image_old
	        * Ngược lại thì lấy tên ảnh theo $slug và lưu vào Public/upload/post
	        * Tiến hành sửa bài viết bằng hàm editPost bên Model
	        * @var array
	        */
				if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] > 0) {
					$image = $_POST['image_old'];
				} else {
					$ext = pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION);
					$target_dir    =  $_SERVER['DOCUMENT_ROOT'] . "/VEGEFOODS/public/uploads/";
					//Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
					$target_file   = $target_dir . basename($_FILES["fileToUpload"]["name"]);
					move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
					$target_file="/VEGEFOODS/public/uploads/" . basename($_FILES["fileToUpload"]["name"]);;
				}
                $name_product = $_POST['name_product'];
                $category_id = $_POST['category_id'];
                $gia = $_POST['gia'];
                $weigth = $_POST['weigth'];
                $quantity = $_POST['quantity'];
                $image = $target_file;
                $nhacungcap = $_POST['nhacungcap'];
                $describe = $_POST['describe'];
                $note = $_POST['note'];
                $date = date('Y-m-d');
				$productModel->editProduct($productId,$name_product, $category_id, $gia, $weigth, $quantity, $image,$describe,$note,$nhacungcap,$date);
			}
			require('../View/admin/pages/product/edit.php');
		}
        }
}