<?php         

          $vegetable = new ModelProduct();
          $cart = new ModelCart();
          if(isset($_GET['action']) && $_GET['action']=="add"){ 
            $id=intval($_GET['sanpham_id']); 
            if(isset($_SESSION['cart'][$id])){ 
              $_SESSION['cart'][$id]['quantity']+=$_POST['quantity']; 
          }else{
              $cart->AddToCart($id);      
          }
          }
          else {
            $id=intval($_GET['sanpham_id']); 
						unset($_SESSION['cart'][$id]);
          }
          ?>
          
<link rel="stylesheet" href="/VEGEFOODS/public/site/css/main.css" />
<style>
  .btn-update-cart{
    display: block;
    text-align: center;
    font-size: 16px;
    width: 100%;
    background: transparent !important;
    border: 0 !important;
    color: #2D9CDB !important;
  }
  .btn-delete-cart{
    display: block;
    text-align: center;
    font-size: 16px;
    width: 100%;
    background: transparent !important;
    border: 0 !important;
    color: red !important;
  }
  .btn-update-cart:focus,
  .btn-delete-cart:focus{
    outline: none;
  }
  .about__img {
      position: relative;
  }
  .about__img::after {
      content: "";
      position: absolute;
      width: 300px;
      height: 700px;
      background-color: #fff;
      right: 352px;
  }
  .about__img img {
      position: absolute;
      left: -469px;
  }
  .about__content{
      background-color: #fff;
  }
  .about_body h1 {
    color: rgba(85,142,74,1);
    font-family: 'Playfair Display', serif;
    font-size: 29pt;
    font-weight: 500;
    letter-spacing: -0.6px;
  }
  .about_body p{
    color: rgba(33,33,33,1);
    font-family: 'Open Sans', sans-serif;
    font-size: 12pt;
    font-weight: 400;
    line-height: 1.75;
    margin-top: 15px;
}
.about__btn{
    margin-top: 220px;
    background-color: rgba(68,114,59,1);
    border-color: rgba(248,248,248,1);
    text-align: center;
    height: 30px;
    display: flex;
    align-items: center;

  }
  .about__btn a {
    width: 100%;
    color: rgba(248,248,248,1);
    font-family: 'Open Sans', sans-serif;
    font-size: 12pt;
    line-height: 22px;
    text-decoration: none;
  }
</style>
    <section class="banner" style="background-image: url(/VEGEFOODS/public/site/img/bg_1.jpg);">
      <div class="banner--title">
        <div class="banner--title__content">
          <h1> Gi???i Thi???u
          </h1>
        </div>
      </div>
      <!-- <div class="overlay"></div> -->
    </section>
    <section class="section about">
        <div class="container" >
            <div class="row" style="height: 700px;">
                <div class="about__img col-lg-4">
                    <img src="/VEGEFOODS/public/site/img/about.jpg">
                </div>
                <div class="about__content col-lg-8">
                    <div class="about_body">
                    <h1>Ch??o m???ng b???n ?????n v???i Vegefoods, m???t trang web Th????ng m???i ??i???n t???</h1>
                    <p>Nh???ng s???n ph???m ???????c b??n tr??n Vegefoods l?? nh???ng th???c ph???m ???? qua ki???m duy???t an to??n v??? sinh th???c ph???m, b???o ?????m th??n thi???n m??i tr?????ng v?? mang l???i gi?? tr??? dinh d?????ng cao cho ng?????i ti??u d??ng. Hi???n t???i, ch??ng t??i ??ang l?? ?????i l?? ph??n ph???i ch??nh th???c c???a c??c h??ng th???c ph???m n???i ti???ng t???i Vi???t Nam: CP, Vissan, Ba Hu??n, Vifon, Vina Acecook, Green Choice, Vinh Ph?? Food???</p>
                    <p>Gi?? b??n tr??n Vegefoods lu??n r??? h??n gi?? b??n l??? th??? tr?????ng b??n ngo??i. V?? ???????c v???n chuy???n t???n n??i trong n???i th??nh TPHCM. Ch??ng t??i cam k???t lu??n mang ????ng th???i gian v?? ????ng ch???t l?????ng c???a th???c ph???m. N???u kh??ng h??i l??ng v??? ch???t l?????ng d???ch v???, Qu?? kh??ch c?? quy???n t??? ch???i nh???n h??ng chuy???n ?????n.</p>
                    <p>V???i nh???ng gi?? tr??? cam k???t mang l???i, Vegefoods s??? d???n ph??t tri???n v?? cung c???p 1 d???ch v??? ho??n h???o v?? gi?? b??n t???t nh???t cho ng?????i ti??u d??ng trong t????ng lai.</p>

                    </div>
                    <div class="about__btn">
                    <a href="/VEGEFOODS">Xem C???a h??ng</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
  