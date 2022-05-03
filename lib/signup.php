<?php   
    // require './Model/UserModel.php';

 function signUp($userModel) {
		$email = $password = $ho = $ten = $sdt = NULL;
		$error = array();
		$error['email'] = $error['password'] = $error['ho'] = $error['ten'] = $error['sdt'] = $error['email_exist'] = NULL;

		if (isset($_POST['signup'])) {
			if (empty($_POST['email'])) {
				$error['email'] = '* Cần điền địa chỉ email';
			} else {
				$email = $_POST['email'];
			}
			if (empty($_POST['password'])) {
				$error['password'] = '* Cần điền mật khẩu';
			} else {
				$password = md5(md5($_POST['password']));
			}
			if (empty($_POST['ho'])) {
				$error['ho'] = '* Cần điền Họ ';
			} else {
				$ho = $_POST['ho'];
			}
			if (empty($_POST['ten'])) {
				$error['ten'] = '* Cần điền Tên ';
			} else {
				$ten = $_POST['ten'];
			}
            if (empty($_POST['sdt'])) {
				$error['sdt'] = '* Cần điền Số điện thoại ';
			} else {
				$sdt = $_POST['sdt'];
			}
			if ($email && $password && $ho && $ten && $sdt) {
				$check = $userModel->checkExists($email);

				if ($check->num_rows > 0) {
					$error['email_exist'] = '* Địa chỉ email đã bị trùng';
				} else {
					$userModel->register($email, $password, $ho,$ten,$sdt);
					echo "<script>alert('đăng ký thành công')</script>";
				}
			}
			
		}
		return $error;
	}
