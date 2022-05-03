<?php
	require('../Model/Database.php');
	require('../Model/UserModel.php');
	require('../Model/ModelProduct.php');
	require('../Model/ModelOrder.php');

	require '../Lib/function.php';
	require_once '../lib/login.php';
	$db = new Database();
    session_start();
	ob_start();

	if(isset($_SESSION['useradmin'])&&$_SESSION['useradmin']['user_group_id']=='1'){
		require_once('../View/admin/layouts/header.php');

	if (isset($_GET['controller'])) {
		require '../Route/admin/web.php';		/*xử lý các request trong Route/web.php*/
		require '../View/admin/layouts/footer.php'; /*giao diện footer*/

	} else {
		require('../View/admin/pages/home.php');

		require '../View/admin/layouts/footer.php'; /*giao diện footer*/
	}
	}
	else  {
		require_once('../View/admin/pages/login.php');

	}
	$db->closeDatabase();