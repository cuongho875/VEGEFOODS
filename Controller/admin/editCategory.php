<?php
    class EditCategory {
        public function __construct()
        {
            require_once('../Model/admin/category.php');
            $categoryModel = new CategoryModel();
            $name = NULL;
            if(isset($_GET['edit'])&&$_GET['edit']=='delete'){
                if (isset($_GET['categoryId'])) {
                    $categoryId = $_GET['categoryId'];
                    $categoryModel->delCategory($categoryId);
                    $categories = $categoryModel->categoryList();
                    $_SESSION['thongbao1']='* Xóa thành công';
                    require('../View/admin/pages/category/list.php');
            }}
            else
            {
            if (isset($_GET['categoryId'])) {
                $categoryId = $_GET['categoryId'];
                $categoryOld = $categoryModel->getCategory($categoryId);
    
                if (isset($_POST['editCategory'])) {
                    $name = $_POST['name_category'];
                    $check = $categoryModel->checkExists($name);
                    if ($check->num_rows > 0) {
                        $_SESSION['thongbao']='* Danh mục đã tồn tại';
                        // require('pages/category/edit.php');

                    } else {
                        $categoryModel->editCategory($categoryId,$name);
                        $_SESSION['thongbao1'] = '* Cập nhật thành công';
                        header('Location: ?controller=listCategory');
                    }

    
                }
                
                require_once('../View/admin/pages/category/edit.php');
            } }
            
        }
    } 