<?php
    class AddProduct{
        public function __construct()
        {
            require_once('../Model/admin/category.php');
            require_once('../Model/admin/ProductModel.php');
            $categoryModel = new CategoryModel();
            $addProductModel = new ProductModel();
            $name_product=$category_id=$gia=$weigth=$quantity=$image=$nhacungcap=$describe=$note=NULL;
            $categories = $categoryModel->categoryList(); /*lấy tất cả chuyên mục*/
            if (isset($_POST['addProduct'])) {
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
    			if ($name_product&&$image) {
                    if($addProductModel->checkEsxistName($name_product)->num_rows<1){
                        $addProductModel->addProduct($name_product, $category_id, $gia, $weigth, $quantity, $image,$describe,$note,$nhacungcap,$date);
                        $_SESSION['thongbao'] = '* Thêm thành công';
                        header('Location: ?controller=listProduct');
                    }
                    echo "<script>alert('Trùng tên sản phẩm')</script>";
                    
                }
            }
    
            require('../View/admin/pages/product/add.php');
        }
    }
?>