<link rel="stylesheet" href="/VEGEFOODS/public/site/css/main.css" />
<style>
  .account{
    margin: 30px 0;
    font-family: Arial, Helvetica, sans-serif;

  }
  .account__left .title-info {
    font-weight: 400;
    font-size: 14px;
    color: #333;
    margin-bottom: 10px;
    display: block;
    text-decoration: none;

  }
  .account__left .active{
    color: #916841;
  }
  .title-account {
    font-size: 19px;
    font-weight: 400;
    color: #212B25;
    margin-bottom: 7px;
    text-transform: uppercase;
  }
  .account__left li {
    margin-bottom: 20px;
  }
  .title-head {
    font-size: 19px;
    line-height: 22px;
    font-weight: 400;
    color: #212B25;
    text-transform: uppercase;
    margin-bottom: 27px;
  }
  .name-account{
    padding-top: 20px;
  }
  .name-account p {
    padding: 0;
    font-size: 16px;
    line-height: 1.5;
    font-family: Arial, Helvetica, sans-serif;
    
}
.thead-default {
  border-top: 1px solid #e1e1e1;

}
.table_order {
  border: 1px solid #e1e1e1;
}
.table_order>thead>tr>th{
  font-weight: 600;
    font-size: 12px;
    letter-spacing: 0.5px;
    color: #1c1c1c;
    padding: 8px;
    line-height: 1.42857143;  
    text-align: left;
    vertical-align: bottom;
    border: 2px solid #ddd;
}
.table_order>tbody>tr>td{
  font-size: 14px;
    letter-spacing: 0.5px;
    color: #1c1c1c;
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border: 1px solid #ddd;
}
.table_order>tbody>tr>td p {
  font-family: Arial, Helvetica, sans-serif;
}


</style>
<?php 
  if(!isset($_SESSION['email_user'])){
  require('./?controller=login');
}else {
 $userModel = new UserModel();
 $user=$userModel->getUser($_SESSION['email_user']);
 $diachi = $userModel->getSoDiaChi($user['user_id']);
 $num_diachi =  $diachi->num_rows;
}
?>
    <section class="banner" style="background-image: url(/VEGEFOODS/public/site/img/bg_1.jpg);">
      <div class="banner--title">
        <div class="banner--title__content">
          <h1>Tài khoản</h1>
        </div>
      </div>
      <!-- <div class="overlay"></div> -->
    </section>
    <section class="account">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 account__left">
              <div class="account__left--title">
                <h5 class="title-account">TRANG TÀI KHOẢN</h5>
                <p>Xin chào <?php echo $user['ten']?></p>
              </div>
              <ul>
                <li>
                  <a href="./?controller=account" class="title-info">Thông tin tài khoản</a>
                </li>
                <li>
                  <a href="./?controller=orders" class="title-info active">Đơn hàng của bạn</a>
                </li>
                <li>
                  <a href="./?controller=changepw" class="title-info">Đổi mật khẩu</a>
                </li>
                <li>
                  <a href="./?controller=sodiachi" class="title-info">Sổ địa chỉ (<?=$num_diachi?>)</a>
                </li>
            </ul>
            </div>
            <div class="col-lg-9 account__right">
              <h1 class="title-head">Chi tiết đơn hàng: <?=$order_id?></h1>
                <div class="table_orders">
                  <table style="width: 100%; max-width: 100%;margin-bottom: 20px;" class="table_order">
                    <thead class="thead-default">
                      <tr>
                        <th>STT</th>
                        <th>Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Tổng tiền</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $productModel = new ModelProduct;
                      $detail_orders;
                      if($detail_orders){
                          $stt=1;
                       foreach($detail_orders as $detail_order){
                           $product=$productModel->getProductByID($detail_order['sanpham_id']);
                         ?>
                      <tr>
                        <td >
                          <p><?php echo $stt; $stt++;?></p>
                        </td>
                        <td >
                          <img style="width: 100px;" src="<?=$product['image']?>" alt="<?=$product['name']?>">
                        </td>
                        <td >
                          <p><?=$product['name']?></p>
                        </td>
                        <td >
                          <p><?=$detail_order['soluong']*$product['weigth'].'Kg'?></p>
                        </td>
                        <td >
                          <p><?=number_format($detail_order['gia'], 0, '', ',')?>đ<?='/'.$product['weigth'].'Kg'?></p>
                        </td>
                        <td >
                          <p><?=number_format($detail_order['gia']*$detail_order['soluong'], 0, '', ',').'đ'?></p>
                        </td>
                      </tr>
                      <?php }} else {
                        ?>
                          <tr>
                            <td colspan="6">
                              <p>Không có đơn hàng nào.</p>
                        </td>
                      </tr><?php }?>
                    </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>
    </section>