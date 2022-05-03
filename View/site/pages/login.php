
    <section class="banner" style="height: 80px;border-bottom: 1px solid #000;">
      </section>
    <section class="login">
        <div class="container">
            <div class="row login">
                <div class="login--title col-12">
                    <h3>Đăng Nhập</h3>
                </div>
                <form action="" method="post" class="login--form col-8">
                    <fieldset style="margin-bottom: 20px;">
                        <label for="">Email</label>
                        <input type="email" class="" placeholder="Nhập Địa chỉ Email" name="email">
                    </fieldset>
                    <fieldset style="margin-bottom: 20px;">
                        <label for="">Mật Khẩu</label>
                        <input type="password" class="" placeholder="Nhập Mật Khẩu" name="password">
                    </fieldset>
                    <div class="login--form__btn">
                        <button class="btn-login" name="login" type="submit">Đăng nhập</button>
                    </div>
                    <div class="text-login">
                        <p>Bạn chưa có tài khoản. Đăng ký</p> 
                        <a href="./index.php?controller=register" title="Đăng ký">Tại đây</a>
                    </div>
                </form>
                <?php
                    $userModel = new UserModel();
                    $error=login($userModel);
                    if (isset($error['email'])) {?>
                        <div class="alert alert-danger" style="top: 155px; position: absolute; z-index: 5; width: auto; right: 0px;" role="alert">
                            <?php echo $error['email']?>
                        </div>
                    <?php } else if (isset($error['password'])) {?>
                        <div class="alert alert-danger" style="top: 155px; position: absolute; z-index: 5; width: auto; right: 0px;" role="alert">
                            <?=$error['password']?>
                        </div>
                    <?php }
                ?>
            </div>
        </div>
    </section>
