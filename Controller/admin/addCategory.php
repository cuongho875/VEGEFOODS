<?php
class AddCategory {
	public function __construct()
	{
		require_once('../Model/admin/category.php');
		$categoryModel = new CategoryModel();
		$name = NULL;
		// $alert = array();

		if (isset($_POST['addCategory'])) {
			$name = $_POST['name_category'];

			if ($name) {
                $check = $categoryModel->checkExists($name);
				if ($check->num_rows > 0) {
					$_SESSION['thongbao2']='* Danh mục đã tồn tại';
					
				} else {
					$categoryModel->addCategory($name);
					$_SESSION['thongbao1'] = '* Thêm thành công';
					header('Location: ?controller=listCategory');

				}
			}
			
		}
		require_once('../View/admin/pages/category/add.php');

	}

}