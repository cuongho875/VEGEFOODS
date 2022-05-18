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
.form-group {
    display: grid;
    margin-bottom: 30px;
}
.form-group label{
    font-weight: 600;
    letter-spacing: 1.5px;
    font-size: 12px;
    text-transform: uppercase;
    margin-bottom: 10px;
    align-items: center;
}
.form-group input[type="password"]{
    background: #fff !important;
    height: auto;
    padding: 0 15px;
    outline: none;
    box-shadow: none;
    border: 1px solid #e5e5e5;
    display: block;
    width: 100%;
    min-height: 40px;
    font-size: 1em;
    line-height: 1.5;
    color: #55595c;
    margin: 0;
}
.btn-address button {
    padding-top: 0;
    padding-bottom: 0;
    font-weight: 500;
    letter-spacing: 1.2px;
    font-size: 12px;
    height: 40px;
    width: 200px;
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
                  <a href="./?controller=account" class="title-info">Thông tin tài khoản</a>
                </li>
                <li>
                  <a href="./?controller=orders" class="title-info">Đơn hàng của bạn</a>
                </li>
                <li>
                  <a href="./?controller=changepw" class="title-info active">Đổi mật khẩu</a>
                </li>
                <li>
                  <a href="./?controller=sodiachi" class="title-info">Sổ địa chỉ (<?=$num_diachi?>)</a>
                </li>
            </ul>
            </div>
            <div class="col-lg-9 account__right">
              <h1 class="title-head">Đổi mật khẩu</h1>
                <form method="post" action="">
                <div class="name-account">
                    <?php 
                        $error=doimatkhau();
                          if (isset($error['password_cu'])) {?>
                              <div class="alert alert-danger" style="top: 0;position: relative; z-index: 5; width: auto; right: 0px;" role="alert">
                                  <?php echo $error['password_cu']?>
                              </div>
                          <?php } else if (isset($error['password_moi'])) {?>
                                            <div class="alert alert-danger" style="top: 0;position: relative; z-index: 5; width: auto; right: 0px;" role="alert">
                                  <?=$error['password_moi']?>
                                            </div>
                          <?php }
                          else if (isset($error['password_repeat'])) {?>
                                            <div class="alert alert-danger" style="top: 0;position: relative; z-index: 5; width: auto; right: 0px;" role="alert">
                                  <?=$error['password_repeat']?>
                              </div>
                          <?php } else if(isset($error['sucsess'])){
                              ?>
                              <div class="alert alert-danger" style="top: 0;position: relative; z-index: 5; width: auto; right: 0px;" role="alert">
                    <?=$error['sucsess']?>
                </div>
            <?php             }?>
                  </div>
                <p class="note">Để đảm bảo tính bảo mật vui lòng đặt mật khẩu với ít nhất 8 kí tự</p>
              <div class="form-group">
                <label>
                    MẬT KHẨU CŨ
                </label>
                <input name="password_cu" type="password" require placeholder="Mật khẩu cũ">
            </div>
            <div class="form-group">
                <label>
                    MẬT KHẨU MỚI
                </label>
                <input name="password_moi" type="password" required placeholder="Mật khẩu mới">
            </div>
            <div class="form-group">
                <label>
                    XÁC NHẬN LẠI MẬT KHẨU
                </label>
                <input name="password_repeat" type="password" require placeholder="Xác nhận lại mật khẩu">
            </div>  
            <div class="btn-address">
                  <button class="btn-checkout btn-addAddress" name="doimatkhau" type="submit">Đặt lại mật khẩu</button>
              </div>
        </form>
        <?php
                    // $error=doimatkhau();

                ?>
                
            </div>
            </div>
          </div>
        </div>
    </section>