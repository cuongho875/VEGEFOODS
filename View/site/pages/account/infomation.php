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

</style>
<?php 
  if(!isset($_SESSION['email_user'])){
  require('./?controller=login');
}else {
 $userModel = new UserModel();
 $user=$userModel->getUser($_SESSION['email_user']);
 $diachi = $userModel->getSoDiaChi($user['user_id'])->fetch_array();
 $num_diachi = $userModel->getSoDiaChi($user['user_id'])->num_rows;
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
                  <a href="./?controller=account" class="title-info active">Thông tin tài khoản</a>
                </li>
                <li>
                  <a href="./?controller=orders" class="title-info">Đơn hàng của bạn</a>
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
              <h1 class="title-head">Thông tin tài khoản</h1>
              <div class="name-account">
                <p><strong>Họ tên: </strong><?php echo $user['ho'].' '.$user['ten']?></p>
                <p><strong>Email: </strong><?php echo $user['email']?></p>
                <p><strong>Số điện thoại: </strong><?php echo $user['sdt']?></p>
                <p><strong>Địa chỉ: </strong><?php echo $diachi['diachi']?></p>

              </div>
            </div>
          </div>
        </div>
    </section>