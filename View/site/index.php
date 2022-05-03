<?php
	require('../../Model/Database.php');

	$db = new Database();
    session_start();


	if (isset($_GET['controller'])) {
		require '../../Route/site/web.php'; /*xử lý các request trong Route/web.php*/
	} else {
	require '../../Model/ModelProduct.php';
	
    require('../../View/site/layouts/header.php');

		require '../../View/site/pages/home.php'; /*require giao diện trang chủ*/
	}
	require '../../View/site/layouts/footer.php'; /*giao diện footer*/

	$db->closeDatabase();