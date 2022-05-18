<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>VNPAY RESPONSE</title>
        <!-- Bootstrap core CSS -->
        <link href="/vnpay_php/assets/bootstrap.min.css" rel="stylesheet"/>
        <!-- Custom styles for this template -->
        <link href="/vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">         
        <script src="/vnpay_php/assets/jquery-1.11.3.min.js"></script>
    </head>
    <body>
        <?php
        require_once("./config.php");
        session_start();
require '../Model/Database.php';
require '../Model/ModelOrder.php';
require '../Model/ModelProduct.php';
require '../Model/UserModel.php';
$userModel= new UserModel();
$orderModel= new ModelOrder;
$productModel= new ModelProduct;
        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        ?>
        <!--Begin display -->
        <div class="container">
            <div class="header clearfix">
                <h3 class="text-muted">VNPAY RESPONSE</h3>
            </div>
            <div class="table-responsive">
                <div class="form-group">
                    <label >Mã đơn hàng:</label>

                    <label><?php echo $_GET['vnp_TxnRef'] ?></label>
                </div>    
                <div class="form-group">

                    <label >Số tiền:</label>
                    <label><?php echo $_GET['vnp_Amount']/100 ?>đ</label>
                </div>  
                <div class="form-group">
                    <label >Nội dung thanh toán:</label>
                    <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã phản hồi (vnp_ResponseCode):</label>
                    <label><?php echo $_GET['vnp_ResponseCode'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã GD Tại VNPAY:</label>
                    <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã Ngân hàng:</label>
                    <label><?php echo $_GET['vnp_BankCode'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Thời gian thanh toán:</label>
                    <label><?php echo $_GET['vnp_PayDate'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Kết quả:</label>
                    <label>
                        <?php
                        if ($secureHash == $vnp_SecureHash) {
                            if ($_GET['vnp_ResponseCode'] == '00') {
                                $user_id = $_SESSION['order']['user_id'];
                                $hoten = $_SESSION['order']['hoten'];
                                $sdt = $_SESSION['order']['sdt'];
                                $diachi = $_SESSION['order']['diachi'];
                                $ghichu =$_SESSION['order']['ghichu'];
                                $email = $_SESSION['order']['email'];
                                $thanhtoan = "Đã thanh toán";
                                $trangthai = "Đang xử lý";
                                $total = $_SESSION['order']['total'];
                                $ngaydat = date('Y-m-d');
                                $order=$orderModel->addOrder($user_id, $hoten, $sdt, $diachi, $ghichu, $email,$thanhtoan,$trangthai,$total,$ngaydat);
                                $order_id =$orderModel->getOrder_id_Max()['MAX(order_id)'];
                                unset($_SESSION['order']);
                                foreach($_SESSION['cart'] as $item){
                                    $sanpham_id=$item['sanpham_id'];
                                    $soluong=$item['quantity'];
                                    $gia=$item['gia'];
                                    $detailOrder=$orderModel->addDetailOrder($order_id,$sanpham_id,$soluong,$gia);
                                    $soluongcu = $productModel->getProductByID($sanpham_id)['soluong'];
                                    $productModel->setQuantity($sanpham_id,$soluongcu-$soluong);
                                }
                                unset($_SESSION['cart']);
                                unset($_SESSION['quantity']);
                                echo "<span style='color:blue'>GD Thanh cong</span>";
                                ?>
                                 <a href="/VEGEFOODS">Tiếp tục mua hàng</a>

                                <?php
                            } else {
                                unset($_SESSION['order']);
                                echo "<span style='color:red'>GD Khong thanh cong</span>";
                                ?>
                                 <a href="/VEGEFOODS/?controller=checkout">Thử lại lần nữa</a>
                                <?php
                            }
                        } else {
                            unset($_SESSION['order']);
                            echo "<span style='color:red'>Chu ky khong hop le</span>";
                        }
                        ?>

                    </label>
                </div> 
            </div>
            <p>
                &nbsp;
            </p>
            <footer class="footer">
                   <p>&copy; VNPAY <?php echo date('Y')?></p>
            </footer>
        </div>  
    </body>
</html>
