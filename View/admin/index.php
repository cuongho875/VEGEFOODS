<?php
    session_start();
	ob_start();
	require '../../Lib/function.php';
	require('../../Model/Database.php');
	require('../../Model/UserModel.php');

	require_once '../../lib/login.php';

	$db = new Database();

	if(isset($_SESSION['useradmin'])&&$_SESSION['useradmin']['user_group_id']=='1'){
		
		require('layouts/header.php');
		if (isset($_GET['controller'])) {
			require '../../Route/admin/web.php';
		} else {
			require('pages/home.php');
			
		}
		require('layouts/footer.php');
	}
	else {
		require('pages/login.php');
	}
