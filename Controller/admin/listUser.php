<?php

class ListUser {
	public function __construct()
	{
		require_once('../Model/UserModel.php');
		$userModel = new UserModel;
		$users = $userModel->getAllUser();

		require('../View/admin/pages/users.php');
	}
}