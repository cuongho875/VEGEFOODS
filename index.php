<?php
	require('./Model/Database.php');
	require('./Model/UserModel.php');
	require './lib/signup.php';
	require './lib/login.php';
	require './lib/doimatkhau.php';
	require './Model/ModelProduct.php';
	require './Model/ModelCart.php';
	require './Model/ModelOrder.php';
	require './Model/ThongkeModel.php';


	$db = new Database();
    session_start();
	ob_start();
    require('./View/site/layouts/header.php');

	if (isset($_GET['controller'])) {
		require './Route/site/web.php'; /*xử lý các request trong Route/web.php*/
	} else {	

		require './View/site/pages/home.php'; /*require giao diện trang chủ*/
	}
	require './View/site/layouts/footer.php'; /*giao diện footer*/

	$db->closeDatabase();