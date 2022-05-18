<?php
    function doimatkhau(){
        $userModel = new UserModel;
        $email = $password_cu=$password_moi=$password_repeat = NULL;
        $error = array();
        $error['password_cu']=$error['password_moi'] = $error['password_repeat'] = $error['sucsess'] = NULL;
        $email = $_SESSION['email_user'];
        if(isset($_POST['doimatkhau'])){
            if(empty($_POST['password_cu'])){
                $error['password_cu'] = '* Cần điền Mật khẩu cũ';
            }
            else{
                $password_cu = $_POST['password_cu'];
            }
            if(empty($_POST['password_moi'])){
                $error['password_moi'] = '* Cần điền Mật khẩu mới';
            }
            else{
                $password_moi = $_POST['password_moi'];
            }
            if(empty($_POST['password_repeat'])){
                $error['password_repeat'] = '* Cần điền Mật khẩu';
            }
            else{
                $password_repeat = $_POST['password_repeat'];
            }
            if($password_cu&&$password_moi&&$password_repeat){
                $check = $userModel->checkPass($email,$password_cu);
                if ($check->num_rows <1) {
                    $error['password_cu'] = '* Mật khẩu không đúng';
                } else {
                    if($password_moi==$password_repeat){
                        $doimatkhaucheck=$userModel->ChangePW($email,$password_moi);
                        if($doimatkhaucheck){
                            $error['sucsess']='Đổi thành công';                        }
                    }
                    else {
                        $error['password_repeat'] = '* Xác nhận mật khẩu không khớp'; 
                    }
                }
            }
        }
        return $error;
    }