<?php

class DeleteUser {
	public function __construct()
	{
		
		$userModel = new UserModel();
		
		if (isset($_GET['userId'])) {
			$userId = $_GET['userId'];
			$userModel->DeleteUser($userId);
			$_SESSION['thongbao1']='Xóa thành công';
			header('Location: ?controller=listUser');
		}
		require('../View/admin/pages/users.php');
	}
}