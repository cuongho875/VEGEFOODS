<?php session_start();
	require('../../../Model/Database.php');
	require '../../../Model/ModelProduct.php';
	require('../../../Model/UserModel.php');
	require('../../../Model/ModelOrder.php');
    if($_SESSION['quantity']==0){
        ?>
        <script>
            alert("Giỏ hàng đang trống")
        </script>
        <?php
        header('Location: /VEGEFOODS?controller=cart');
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/VEGEFOODS/public/site/css/style.css" />
    <link rel="stylesheet" href="/VEGEFOODS/public/site/css/main.css" />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="/VEGEFOODS/public/site/css/flaticon.css"/>
    <link rel="stylesheet" href="/VEGEFOODS/public/site/css/icomoon.css"/>
    <link rel="stylesheet" href="/VEGEFOODS/public/site/css/owl.carousel.min.css"/>
    <title>VEGEFOODS</title>
  </head>
  <body>
    <div class="main-checkout">
        <form class="checkout-form" method="post" action="/VEGEFOODS/vnpay_php/vnpay_create_payment.php">
            <div class="main">
                <?php
                    if(isset($_SESSION['email_user'])){
                        $userModel = new UserModel();
                        $user = $userModel->getUser($_SESSION['email_user']);
                        $diachis = $userModel->getSoDiaChi($user['user_id']);
                        
                    }
                ?>
                    <div class="main__title ">
                        <h2>VEGEFOODS</h2>
                    </div>
                    <div class="main__content ">
                        <div class="info-customer">
                            <div class="info-customer__title">
                                <h6>Thông tin nhận hàng</h6>
                            </div>
                            <div class="field">
                                <label class="field__label" for="select-address">Sổ địa chỉ

                                </label>
                                <select name="select-address field__input" id="select-address" onchange="getSelect()">
                                    <?php
                                    $selectdc=$diachimacdinh=$userModel->getDiaChiMacDinh($user['user_id'])->fetch_array();
                                    if(isset($_POST['getSelected'])){
                                        $selectdc=$userModel->getDiaChi($_POST['getSelected'])->fetch_array();
                                        if($_POST['getSelected']=='khac'||$_POST['getSelected']==''){
                                            ?>
                                    <option value="khac">Địa chỉ khác...</option>
                                            <?php
                                        }
                                        ?>
                                        
                    <?php
                }?>
                                                         
                                            <option value="<?=$selectdc['diachi_id'];?>"><?=$selectdc['diachi'];?></option>
                                            <?php

                                        foreach($diachis as $diachi){
                                            $address_id=$diachi['diachi_id'];
                                            $address=$diachi['diachi'];

                                            if($address_id!=$selectdc['diachi_id']){

                                    ?>
    
                                    <option value="<?=$address_id?>"><?=$address ?></option>
                                    <?php  
                                        }}
                                        ?>
                                <?php
                                        if($_POST['getSelected']!='khac'){
                                            ?>
                                    <option value="khac">Địa chỉ khác...</option>
                                            <?php
                                        }                                    
                                    ?>                                        
                                </select>

                            </div>
                            <?php 
                                if($selectdc){
                                $hoten = $selectdc['hoten'];
                                $sdt = $selectdc['sdt'];
                                $diachi = $selectdc['diachi'];
                                } 
                                else if($diachimacdinh) {
                                    $hoten=$diachimacdinh['hoten'];
                                    $diachi=$diachimacdinh['diachi'];
                                    $sdt=$diachimacdinh['sdt'];
                                }
                                else {
                                    $hoten=$diachi=$sdt='';
                                }

                            ?>
                            <div class="field">
                                <label class="field__label" for="checkout-email">Email</label>
                                <input type="email" name="email" value="<?=$_SESSION['email_user']?>" id="checkout-email" class="checkout-email field__input ">                               
                            </div>
                            <div class="field">
                                <label class="field__label" for="checkout-hoten">Họ và tên</label>
                                <input type="text" name="hoten" value="<?=$hoten?>" id="" class="checkout-hoten field__input ">                                
                            </div>
                            <div class="field">
                                <label class="field__label" for="checkout-sdt">Số điện thoại</label>
                                <input type="tel" name="sdt" value="<?=$sdt?>" id="" class="checkout-sdt field__input ">                                
                            </div>
                            <div class="field">
                                <label class="field__label" for="checkout-address">Địa chỉ</label>
                                <input type="text" name="diachi" value="<?=$diachi?>" id="" class="checkout-address field__input ">
                            </div>
                            <div class="field">
                                <label class="field__label" for="checkout-ghichu">Ghi Chú</label>
                                <textarea name="ghichu" id="" cols="30" rows="10" class="checkout-ghichu field__input "></textarea>
                            </div>

                        </div>
                        <div class="main__content--right">
                            <div class="tranport">
                                <div class="tranport__title">
                                    <h6>Vận chuyển</h6>
                                </div>
                                <div class="radio-wrapper">
                                    <input checked type="radio" name="tranport" id="tranport" class="radio__input">
                                    <label for="tranport" class="radio__label">
                                        <span class="radio__label__primary">Giao hàng tận nơi</span>
                                        <span class="radio__label__accessory"><?php $phivanchuyen =40000;
                                        ?><?php echo number_format($phivanchuyen, 0, '', ',')?>đ</span>
                                    </label>
                                </div>
                            </div>
                            <div class="payment">
                                <div class="payment__title">
                                    <h6>Thanh toán</h6>
                                </div>
                                <div class="radio-wrapper">
                                    <input id="pay-cod" value="pay-cod" type="radio" name="pay" required="required" value="Chưa thanh toán" id="pay-cod" class="radio__input">
                                    <label for="pay" class="radio__label">
                                        <span class="radio__label__primary">Thanh toán khi giao hàng (COD)</span>
                                        <span class="radio__label__accessory"><i class="fa-solid fa-money-bill-1"></i></span>
                                    </label>
                                </div>
                                <div class="radio-wrapper">
                                    <input id="pay-vnpay" value="pay-bank" type="radio" class="pay-vnpay" name="pay" required="required" value="Chưa thanh toán" id="pay-cod" class="radio__input">
                                    <label for="pay" class="radio__label">
                                        <span class="radio__label__primary">Thanh toán VNPAY</span>
                                        <span class="radio__label__accessory"><i class="fa-solid fa-money-bill-1"></i></span>
                                    </label>
                                </div>
                                
                            </div>
                            <div id="bank" class="form-group payment" style="display: none;">
                        <label  class="payment__title" for="bank_code"><h6>Ngân hàng</h6></label>
                        <select name="bank_code" id="bank_code" class="form-control">
                            <option value="">Không chọn</option>
                            <option value="NCB"> Ngan hang NCB</option>
                            <option value="AGRIBANK"> Ngan hang Agribank</option>
                            <option value="SCB"> Ngan hang SCB</option>
                            <option value="SACOMBANK">Ngan hang SacomBank</option>
                            <option value="EXIMBANK"> Ngan hang EximBank</option>
                            <option value="MSBANK"> Ngan hang MSBANK</option>
                            <option value="NAMABANK"> Ngan hang NamABank</option>
                            <option value="VNMART"> Vi dien tu VnMart</option>
                            <option value="VIETINBANK">Ngan hang Vietinbank</option>
                            <option value="VIETCOMBANK"> Ngan hang VCB</option>
                            <option value="HDBANK">Ngan hang HDBank</option>
                            <option value="DONGABANK"> Ngan hang Dong A</option>
                            <option value="TPBANK"> Ngân hàng TPBank</option>
                            <option value="OJB"> Ngân hàng OceanBank</option>
                            <option value="BIDV"> Ngân hàng BIDV</option>
                            <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                            <option value="VPBANK"> Ngan hang VPBank</option>
                            <option value="MBBANK"> Ngan hang MBBank</option>
                            <option value="ACB"> Ngan hang ACB</option>
                            <option value="OCB"> Ngan hang OCB</option>
                            <option value="IVB"> Ngan hang IVB</option>
                            <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                        </select>
                    </div>
                        </div>
                    </div>
                    

                </div>
                <?php

$quantity =0;
          $total = 0;
          if(isset($_SESSION['cart'])){
          foreach($_SESSION['cart'] as $item){
            $quantity += $item['quantity'];
           }}
           $_SESSION['quantity'] = $quantity;
            ?>
                <div class="sidebar" style="overflow-y: scroll;">
                    <div class="sidebar__header">
                        <h6>Đơn hàng (<?=$quantity?> sản phẩm)</h6>
                    </div>
                    <div class="sidebar__content">
                        <?php          
                        if(isset($_SESSION['cart'])){
                        foreach($_SESSION['cart'] as $item){
                            ?>
                        <table class="product-table sidebar__content--item">
                        <tbody style="width: 100%;">
                            <tr>
                                <td class="product-img">
                                    <img src="<?=$item['image']?>" alt="">
                                    <span class="quantity-product"><?=$item['quantity']?></span>
                                </td>
                                <td class="product-name">
                                    <span><?=$item['name']?></span>
                                </td>
                                <td class="product-price">
                                <?php echo number_format($item['gia'], 0, '', ',')?>đ
                                </td>
                            </tr>
                        </tbody>
                        </table>
                        <?php 
                            $total += $item['gia']*$item['quantity'];
                    
                    }}?>
                        <div class="discourse sidebar__content--item">
                            <input type="text" name="discourse-input" class="discourse-input" placeholder="Nhập mã giảm giá">
                            <button type="submit" class="btn-discourse" name="btn-discourse">Áp dụng</button>
                        </div>
                        <table class="total-line-table">
                            <tbody class="total-line-table__tbody">
                                <tr class="total-line total-line--subtotal">
                                    <th class="total-line__name">Tạm tính</th>
                                    <td class="total-line__price"><?php echo number_format($total, 0, '', ',')?>đ</td>
                                </tr>
                                <tr class="total-line total-line--ship">
                                    <th class="total-line__name">Vận chuyển</th>
                                    <td class="total-line__price"><?php echo number_format($phivanchuyen, 0, '', ',')?></td>
                                </tr>
                            </tbody>
                            <tfoot class="total-line-table__footer">
                                <tr class="line-hide"><td></td></tr>
                                <tr class="total-line total-line--payment-due">
                                    <th class="total-line__name">Tổng cộng</th>
                                    <td class="total-line__price"><?php echo number_format($total+$phivanchuyen, 0, '', ',')?>đ</td>
                                    <input name="total" value="<?=$total+$phivanchuyen?>" type="hidden">
                                </tr>
                            </tfoot>
                        </table>
                        <div class="order-nav">
                            <a href="/VEGEFOODS/?controller=cart" class="previous-link">
                            <i class="fa-solid fa-angle-left"></i>
                                Quay về giỏ hàng
                            </a>
                            <button type="submit" name="redirect" class="btn-order" >Đặt hàng</button>
                        </div>
                    </div>
                </div>
        </form>
    </div>

    <form id="formSelected" method="post" action="">
                    <input id="getSelected" name="getSelected" type="hidden" value="" style="width: 0;height:0;background-color:#fff; outline:none;border:0px">
                    <input for="formSelected" name="submitSelected" type="submit" value="" style="width: 0;height:0;background-color:#fff; outline:none;border:0px">
                    </form>
                    <script>
     const  selectAddress = document.getElementById('select-address');
     const  selectInput = document.getElementById('getSelected')
     const  formSelected = document.getElementById('formSelected')

     function getSelect(){
        selectInput.value = selectAddress.value
        formSelected.submit();
     }

    const VnPay=document.getElementById('pay-vnpay')
    const Cod=document.getElementById('pay-cod')
    const Bank = document.getElementById('bank')

     function changeChecked(){
        if(VnPay.checked ==true){
         Bank.style.display="block";
     }
     else {
        Bank.style.display="none";
     }
    }
     VnPay.addEventListener('change',changeChecked);
     Cod.addEventListener('change',changeChecked);
 </script>
    <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
    <script src="/VEGEFOODS/public/site/js/main.js"></script>
  </body>
</html>
