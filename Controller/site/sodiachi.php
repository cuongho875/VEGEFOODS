<?php
    class Sodiachi {
        public function __construct()
        {
            if(isset($_SESSION['user'])){
                $userModel = new UserModel();
                $user=$userModel->getUser($_SESSION['email_user']);
                $user_id = $user['user_id'];
                $hoten=$sdt=$diachi=NULL;
                if(isset($_POST['add-Address'])){
                    $hoten = $_POST['hoten'];
                    $sdt = $_POST['sdt'];
                    $diachi = $_POST['diachi'];
                    if($hoten||$sdt||$diachi){
                      $userModel->addDiachi($user_id ,$hoten,$sdt,$diachi);
                header('Location: /VEGEFOODS/?controller=sodiachi');

                    }
                }


                  if(isset($_POST['edit-Address'])){
                    $diachimacdinh=$userModel->getDiaChiMacDinh($user['user_id'])->fetch_array();
                    $diachi_id = $_POST['diachi_id'];
                    $hoten = $_POST['hoten'];
                    $sdt = $_POST['sdt'];
                    $diachi = $_POST['diachi'];
                    if(isset($_POST['macdinh'])){
                        $macdinh=$_POST['macdinh'];
                        $userModel->EdiMacDinh($diachimacdinh['diachi_id'],'0');
                        $userModel->EdiMacDinh($diachi_id,'1');
                    }
                    if($hoten||$sdt||$diachi){
                        $userModel->editDiachi($diachi_id,$hoten,$sdt,$diachi);
                    }



                header('Location: /VEGEFOODS/?controller=sodiachi');

                }
                require './View/site/pages/account/sodiachi.php';
            }
            else {
                require './View/site/pages/login.php';
            }
        }
    }