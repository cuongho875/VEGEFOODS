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
          <h1> Giới Thiệu
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
                    <h1>Chào mừng bạn đến với Vegefoods, một trang web Thương mại điện tử</h1>
                    <p>Những sản phẩm được bán trên Vegefoods là những thực phẩm đã qua kiểm duyệt an toàn vệ sinh thực phẩm, bảo đảm thân thiện môi trường và mang lại giá trị dinh dưỡng cao cho người tiêu dùng. Hiện tại, chúng tôi đang là đại lý phân phối chính thức của các hãng thực phẩm nổi tiếng tại Việt Nam: CP, Vissan, Ba Huân, Vifon, Vina Acecook, Green Choice, Vinh Phú Food…</p>
                    <p>Giá bán trên Vegefoods luôn rẻ hơn giá bán lẻ thị trường bên ngoài. Và được vận chuyển tận nơi trong nội thành TPHCM. Chúng tôi cam kết luôn mang đúng thời gian và đúng chất lượng của thực phẩm. Nếu không hài lòng về chất lượng dịch vụ, Quý khách có quyền từ chối nhận hàng chuyển đến.</p>
                    <p>Với những giá trị cam kết mang lại, Vegefoods sẽ dần phát triển và cung cấp 1 dịch vụ hoàn hảo và giá bán tốt nhất cho người tiêu dùng trong tương lai.</p>

                    </div>
                    <div class="about__btn">
                    <a href="/VEGEFOODS">Xem Cửa hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
  