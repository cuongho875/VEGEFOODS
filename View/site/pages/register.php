
    <section class="banner" style="height: 80px;border-bottom: 1px solid #000;">
      </section>
    <section class="login">
        <div class="container">
            <div class="row login">
                <div class="login--title col-12">
                    <h3>Đăng ký tài khoản</h3>
                    <p>Nếu chưa có tài khoản vui lòng đăng ký tại đây</p>
                </div>
                <form method="post" class="login--form col-8">
                <?php  

$userModel = new UserModel();
if(isset($_POST['signup'])){
    $error = signUp($userModel);
}
if (isset($error['email'])) {?>
    <div class="alert alert-danger" style="top: 0; position:relative; z-index: 5; width: auto; right: 0px;" role="alert">
        <?php echo $error['email']?>
    </div>
<?php } else if (isset($error['password'])) {?>
    <div class="alert alert-danger" style="top: 0; position:relative; z-index: 5; width: auto; right: 0px;" role="alert">
        <?=$error['password']?>
    </div>
<?php } else if (isset($error['ho'])) {?>
    <div class="alert alert-danger" style="top: 0; position:relative; z-index: 5; width: auto; right: 0px;" role="alert">
        <?=$error['ho']?>
    </div>
<?php } else if (isset($error['ten'])) {?>
    <div class="alert alert-danger" style="top: 0; position:relative; z-index: 5; width: auto; right: 0px;" role="alert">
        <?=$error['ten']?>
    </div>
<?php } else if (isset($error['sdt'])) {?>
    <div class="alert alert-danger" style="top: 0; position:relative; z-index: 5; width: auto; right: 0px;" role="alert">
        <?=$error['sdt']?>
    </div>
<?php } else if (isset($error['email_exist'])) {?>
    <div class="alert alert-danger" style="top: 0; position:relative; z-index: 5; width: auto; right: 0px;" role="alert">
        <?=$error['email_exist']?>
    </div>
<?php } 
else if (isset($error['sucsess'])) {?>
    <div class="alert alert-danger" style="top: 0; position:relative; z-index: 5; width: auto; right: 0px;" role="alert">
        <?=$error['sucsess']?>
    </div>
<?php } 
?>
                    <fieldset style="margin-bottom: 20px;">
                        <label for="">Họ</label>
                        <input type="text" class="" placeholder="Nhập Họ" name="ho" >
                    </fieldset>
                    <fieldset style="margin-bottom: 20px;">
                        <label for="">Tên</label>
                        <input type="text" class="" placeholder="Nhập Tên" name="ten" >
                    </fieldset>
                    <fieldset style="margin-bottom: 20px;">
                        <label for="">Số điện thoại</label>
                        <input type="tel" class="" placeholder="Nhập Số Điện thoại" name="sdt" >
                    </fieldset>
                    <fieldset style="margin-bottom: 20px;">
                        <label for="">Email</label>
                        <input type="email" class="" placeholder="Nhập Địa chỉ Email" name="email" >
                    </fieldset>
                    <fieldset style="margin-bottom: 20px;">
                        <label for="">Mật Khẩu</label>
                        <input type="password" class="" placeholder="Nhập Mật Khẩu" name="password" >
                    </fieldset>
                    <div class="login--form__btn">
                        <button class="btn-login" name="signup" type="submit">Tạo tài khoản</button>
                    </div>
                    <div class="text-login">
                        <a href="./index.php?controller=login" title="Đăng nhập">Đăng nhập</a>
                    </div>
                </form>

        
            </div>
        </div>
    </section>
