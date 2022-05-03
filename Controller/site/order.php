<?php
    class Order {
        public function __construct()
        {
            $userModel= new UserModel();
            $orderModel= new ModelOrder;
            $productModel= new ModelProduct;
            $user = $userModel->getUser($_SESSION['email_user']);
            if(isset($_POST['btn-order'])){
                $user_id = $user['user_id'];
                $hoten = $_POST['hoten'];
                $sdt = $_POST['sdt'];
                $diachi = $_POST['diachi'];
                $ghichu =$_POST['ghichu'];
                $email = $_POST['email'];
                $thanhtoan = $_POST['pay-cod'];
                $trangthai = "Đang xử lý";
                $total = $_POST['total'];
                $ngaydat = date('Y-m-d');
                $order=$orderModel->addOrder($user_id, $hoten, $sdt, $diachi, $ghichu, $email,$thanhtoan,$trangthai,$total,$ngaydat);
                $order_id =$order->fetch_array()['MAX(order_id)'];
                foreach($_SESSION['cart'] as $item){
                    $sanpham_id=$item['sanpham_id'];

                    $soluong=$item['quantity'];
                    $gia=$item['gia'];
                    $detailOrder=$orderModel->addDetalOrder($order_id,$sanpham_id,$soluong,$gia);
                    $soluongcu = $productModel->getProductByID($sanpham_id)['soluong'];
                    $productModel->setQuantity($sanpham_id,$soluongcu-$soluong);
                    unset($_SESSION['cart']);
                    unset($_SESSION['quantity']);
                    ?><script>
                        alert("Đặt hàng thành công")
                        </script>
                    
                        <?php
                        header('Location: /VEGEFOODS');
                }
            }
            else {
                ?>
                <script>
                        alert("Đặt hàng không thành công")
                        </script>
                        <?php
                        header('Location: /VEGEFOODS?controller=checkout');
            }
        }
    }