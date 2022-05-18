<?php
    // require '../../Model/UserModel.php';
function login($userModel)
{
    $email = $password = $ten = NULL;
    $error = array();
    $error['email'] = $error['password']=$error['login'] = NULL;

    if (isset($_POST['login'])) {
        if (empty($_POST['email'])) {
            $error['email'] = '* Cần điền Email';
        } else {
            $email = $_POST['email'];
        }
        if (empty($_POST['password'])) {
            $error['password'] = '* Cần điền mật khẩu';
        } else {
            $password = md5(md5($_POST['password']));
        }

        if ($email && $password) {
            $result = $userModel->login($email, $password);
            $check = $result->num_rows; /*đếm số dòng trong database*/
        /**
        * Nếu số dòng trong database > 0 => lưu session + lấy dữ liệu + chuyển hướng
        * Ngược lại thông báo alert bằng script
        * @var array
        */
            if ($check > 0) {
                $data = $result->fetch_array(); /*lấy dữ liệu tương ứng với email và password nhập*/
                
                $_SESSION['user'] =$data['ten']; /*lưu session*/
                $_SESSION['email_user']=$data['email'];
                header('Location: ./');
            } else {
                $error['login']='Sai mật khẩu hoặc tên đăng nhập';
            }
        }
    }

    return $error;
}
function loginAdmin($userModel)
    {
        $email = $password = NULL;
        $error = array();
        $error['email_admin'] = $error['password_admin'] = NULL;

        if (isset($_POST['login_admin'])) {
            if (empty($_POST['email_admin'])) {
                $error['email_admin'] = '* Cần điền Email';
            } else {
                $email = $_POST['email_admin'];
            }
            if (empty($_POST['password_admin'])) {
                $error['password_admin'] = '* Cần điền mật khẩu';
            } else {
                $password = md5(md5($_POST['password_admin']));
            }

            if ($email && $password) {
                $result = $userModel->login($email, $password);
                $check = $result->num_rows; /*đếm số dòng trong database*/
            /**
            * Nếu số dòng trong database > 0 => lưu session + lấy dữ liệu + chuyển hướng
            * Ngược lại thông báo alert bằng script
            * @var array
            */
                if ($check > 0) {
                    $data = $result->fetch_array(); /*lấy dữ liệu tương ứng với email và password nhập*/
                    $_SESSION['useradmin'] = $data; /*lưu session*/
                /**
                * Nếu user_group_id = 1 thì chuyển hướng đến trang quản trị viên
                * Ngược lại thì thông báo đăng nhập lại
                * @var array
                */
                    if ($data['user_group_id'] == '1') {
                        header('Location: /VEGEFOODS/admin');
                    } else {
                        echo "<script>alert('Vui lòng đăng nhập lại')</script>";
                    }
                } else {
                    echo "<script>alert('Sai mật khẩu hoặc tên đăng nhập')</script>";
                }
            }
        }

        return $error;
    }
?>