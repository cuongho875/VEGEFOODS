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
    margin: 0;
    margin-bottom: 10px;
    font-size: 15px;
    line-height: 1.5;
    font-family: Arial, Helvetica, sans-serif;

}
.btn-addAddress {
    width: 20%;
    height: 40px;
    font-size: 14px;
    font-weight: 600;
    line-height: 1.5;
}
.btn-address {
    padding: 30px 0;
}
.edit-address{
    align-self: center;

}
.btn-edit-address {
    display: block;
    text-align: center;
    font-size: 14px;
    width: 100%;
    background: transparent !important;
    border: 0 !important;
    color: #2D9CDB !important;
    margin-bottom: 10px;
}
.btn-delete-address{
    text-align: center;
    font-size: 14px;
    width: 100%;
    display: block;
    background: transparent !important;
    border: 0 !important;
    color: red !important;
}
.modals {
    position: fixed;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.4);
    align-items: center;
    justify-content: center;
    display: none;
}
.account button:focus,
.account input:focus{
  outline: none;
}
.account input{
  border-radius: 5px;
}
.modals.open {
    display: flex;
    z-index: 1000 !important;
}
.modals-container {
    width: 700px;
    max-width: calc(100%-32px);
    min-height: 200px;
    background: #fff;
    position: relative;
    border-radius: 5px;
    animation: showticket ease 0.5s;
}
.modals-header {
    height: 60px;
    color: #000;
    font-size: 15px;
    padding: 10px 20px;
    border-bottom: 1px solid #E0E0E0;
    /* display: flex;
    align-items: center;
    justify-content: center; */
}
.modals-header h2 {
  font-size: 18px;
}
.modals-heading-icon {
    margin-right: 16px;
}
.modals-close {
    position: absolute;
    right: 0;
    top: 0;
    color: #000;
    padding: 12px;
    cursor: pointer;
}
.modals-close:hover {
    color: blue;
}
.modals-group{
    width: 48%;
}
.modals-body {
    padding: 16px;
}
.label-modals {
    display: block;
    font-size: 15px;
    margin-bottom: 12px;
}
.modals-input {
    border: 1px solid #ccc;
    width: 100%;
    font-size: 15px;
    padding: 10px;
    margin-bottom: 24px;
}
.btn-modal-edit,
.btn-modal-add
 {
  width: 30%;
  height: 40px;
    font-size: 14px;
    font-weight: 500;
}
.btn-modal-close{
  width: 8%;
  background-color: #fff;
  color: #000;
  text-transform: capitalize;
  margin-right: 10px;
  height: 40px;
  border-color: #E0E0E0;
    font-size: 14px;
}
</style>
<?php 
  if(!isset($_SESSION['email_user'])){
  require('./?controller=login');
}else {
 $userModel = new UserModel();
 $user=$userModel->getUser($_SESSION['email_user']);
 $diachis = $userModel->getSoDiaChi($user['user_id']);
 $diachimacdinh=$userModel->getDiaChiMacDinh($user['user_id'])->fetch_array();
  $num_diachi = $diachis->num_rows;

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
                  <a href="./?controller=changepw" class="title-info">Đổi mật khẩu</a>
                </li>
                <li>
                  <a href="./?controller=sodiachi" class="title-info active">Sổ địa chỉ (<?=$num_diachi ?>)</a>
                </li>
            </ul>
            </div>
            <div class="col-lg-9 account__right" style="padding-bottom:30px ;">
              <h1 class="title-head">ĐỊA CHỈ CỦA BẠN</h1>
              <div class="btn-address">
                  <button class="btn-checkout btn-addAddress" type="button">Thêm địa chỉ</button>
              </div>

                 <div class="address-account" style="display: flex;border-top: 1px solid #e1e1e1;">
                <div class="name-account" style="width: 70%;">
                <p><strong>Họ tên: </strong><?php echo $diachimacdinh['hoten']?> 
                <span style="color: #27AE60;font-size: 10px;font-weight: 400;padding-left: 10px;">
                Địa chỉ mặc định</span></p>
                <p><strong>Số điện thoại: </strong><?php echo $diachimacdinh['sdt']?></p>
                <p><strong>Địa chỉ: </strong><?php echo $diachimacdinh['diachi']?></p>
              </div>
              <div class="edit-address">
                  <button class="btn-edit-address" value="<?=$diachimacdinh['diachi_id']?>" type="button">Chỉnh sửa địa chỉ</button>
              </div>
                </div>

              <?php $i =0;
               foreach($diachis as $item){
                   $diachi_id=$item['diachi_id'];
                   if($diachi_id!=$diachimacdinh['diachi_id']){

                   
                       ?>
                <div  class="address-account" style="display: flex;border-top: 1px solid #e1e1e1;">
                <div class="name-account" style="width: 70%;">
                <input type="hidden" name="diachi_id" value="<?=$item['diachi_id']?>">
                <p><strong>Họ tên: </strong><?php echo $item['hoten']?></p>
                <p><strong>Số điện thoại: </strong><?php echo $item['sdt']?></p>
                <p><strong>Địa chỉ: </strong><?php echo $item['diachi']?></p>
              </div>
              <div class="edit-address">
                <form  method="post" action="/VEGEFOODS/?controller=sodiachi">
                <button class="btn-edit-address" name="btn-edit-address" value="<?=$diachi_id?>" type="button">Chỉnh sửa địa chỉ</button>
                </form>
                    <form method="post" action="">
                    <input type="hidden" name="diachi_id-del" value="<?=$diachi_id?>">
                    <button class="btn-delete-address" name="DelDiachi" type="submit">Xoá</button>
                    </form>
              </div>
                   </div>
                <?php             }    }
                  ?>
            </div>
          </div>
        </div>
        <div id="model" class="modals js-modals">
        <div class="modals-container js-modals-container">
            <div class="modals-close js-modals-close">
                <i class="fas fa-times"></i>
            </div>
            <header class="modals-header">
                <h2>CHỈNH SỬA ĐỊA CHỈ</h2>
            </header>
            <form method="post" action="">
            <div class="modals-body">
                <div style="display: flex; justify-content: space-between;">
                    <div class="modals-group">
                      <label for="modals-hoten" class="label-modals">
                        Họ tên
                      </label>
                      <input id="modals-id" name="diachi_id" type="hidden" class="modals-input">
                         <input id="modals-hoten" name="hoten" type="text" class="modals-input">
                    </div>
                    <div class="modals-group">
                        <label for="modals-sdt" class="label-modals">
                            Số điện thoại
                        </label>
                        <input id="modals-sdt" name="sdt" type="tel" class="modals-input">
                    </div>
                </div>
                <div class="modals-group" style="width: 100%;">
                    <label for="modals-diachi" class="label-modals">
                        Địa chỉ
                    </label>
                    <input id="modals-diachi" name="diachi" type="text" class="modals-input">
                  </div>

                  <div class="btn-modals" style="display: flex;justify-content:flex-end">
                  <div class="modals-group" style="width: 100%;display:flex;align-items:center">
                    <label for="modals-macdinh" class="label-modals" style="width: 40%;">
                      Đặt là địa chỉ mặc định?
                    </label>
                    <input id="modals-macdinh" name="macdinh" value="1" style="margin-bottom: 12px;width:auto" type="checkbox" class="modals-input">
                  </div>
                    <button class="btn-checkout btn-modal-close" type="button">Hủy</button>
                    <button class="btn-checkout btn-modal-edit" name="edit-Address" type="submit">Cập nhật địa chỉ</button>
                </div>
            </div>
            </form>

        </div>
        </div>
        <div class="modals js-modals js-modals2" >
        <div class="modals-container js-modals-container2">
            <div class="modals-close js-modals-close2">
                <i class="fas fa-times"></i>
            </div>
            <header class="modals-header">
                <h2>THÊM ĐỊA CHỈ MỚI</h2>
            </header>
            <form method="post" action="">
            <div class="modals-body modals-body">
                <div style="display: flex; justify-content: space-between;">
                    <div class="modals-group">
                        <label for="modals-hoten" class="label-modals">
                            Họ tên
                         </label>
                      <input id="modals-id2" name="diachi_id" type="hidden" class="modals-input">
                         <input id="modals-hoten" name="hoten" type="text" class="modals-input">
                    </div>
                    <div class="modals-group">
                        <label for="modals-sdt" class="label-modals">
                            Số điện thoại
                        </label>
                        <input id="modals-sdt" name="sdt" type="tel" class="modals-input">
                    </div>
                </div>
                <div class="modals-group" style="width: 100%;">
                    <label for="modals-diachi" class="label-modals">
                        Địa chỉ
                    </label>
                    <input id="modals-diachi" name="diachi" type="text" class="modals-input">
                    <div class="btn-modals" style="display: flex;justify-content:flex-end">
                      <button class="btn-checkout btn-modal-close" type="button">Hủy</button>
                      <button class="btn-checkout btn-modal-add" name="add-Address" type="submit">Thêm địa chỉ</button>
                  </div>
                </div>
            </div>
            </form>
        </div>
        </div>
        <?php 
                if(isset($_POST['DelDiachi'])){
                  $diachi_id=$_POST['diachi_id-del'];
                  $userModel->DeleteDiachi($diachi_id);
                  header('Location: /VEGEFOODS/?controller=sodiachi');
                }
?>
    </section>
    <script>
        const addressIds=document.querySelectorAll('.btn-edit-address')
        
        const inputId = document.getElementById('modals-id')
          for (const addressId of addressIds){
            addressId.addEventListener('click',GetID)
            function GetID(){
              inputId.value=addressId.value;
            }
          }
        const buyBtns = document.querySelectorAll('.btn-edit-address')
        const modals = document.querySelector('.js-modals')
        const modalsClose = document.querySelector('.js-modals-close')
        const modalsContainer = document.querySelector('.js-modals-container')
        const buyBtns2 = document.querySelectorAll('.btn-addAddress')
        const modals2 = document.querySelector('.js-modals2')
        const modalsClose2 = document.querySelector('.js-modals-close2')
        const modalsContainer2 = document.querySelector('.js-modals-container2')
        const modalClose = document.querySelectorAll('.btn-modal-close');
        function showBuyTickets() {
            modals.classList.add('open')
        } 
        function HideBuyTickets() {
            modals.classList.remove('open')
        }
        function showBuyTickets2() {
            modals2.classList.add('open')
        } 
        function HideBuyTickets2() {
            modals2.classList.remove('open')
        }
        for (const buyBtn of buyBtns){
            buyBtn.addEventListener('click',showBuyTickets)
        }
        modalsClose.addEventListener('click',HideBuyTickets)
        modals.addEventListener('click',HideBuyTickets)
        modalsContainer.addEventListener('click',function(event){
            event.stopPropagation()
        })
        for (const buyBtn of buyBtns2){
            buyBtn.addEventListener('click',showBuyTickets2)
        }
        modalsClose2.addEventListener('click',HideBuyTickets2)
        modals2.addEventListener('click',HideBuyTickets2)
        modalsContainer2.addEventListener('click',function(event){
            event.stopPropagation()
        })
        for(const close of modalClose){
          close.addEventListener('click',HideBuyTickets2)
          close.addEventListener('click',HideBuyTickets)

        }


    </script>