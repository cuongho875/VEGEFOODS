
    <section class="banner" style="background-image: url(/VEGEFOODS/public/site/img/bg_1.jpg);">
      <div class="banner--title">
        <div class="banner--title__content">
          <h1>Bán rau củ quả sạch</h1>
        </div>
      </div>
      <div class="overlay"></div>
    </section>
    <section class="section">
      <div class="container">
        <div class="row category">
        <a href="/VEGEFOODS/?controller=product&loaisanpham_id=1" class="category-link category-link_left col-md-6 col-sm-12">
        <div class="category--item">
          <div class="category--item__left item-cat" style="background-image: url(/VEGEFOODS/public/site/img/category1.jpg);">
        <div class="overlay"></div>
        <div class="category--item__content">
          <h5>Rau,củ</h5>
        </div>
        </div>
      </div>
      </a>
      <a href="/VEGEFOODS/?controller=product&loaisanpham_id=2" class="category-link col-md-6 col-sm-12">
        <div class="category--item">
          <div class="category--item__right item-cat" style="background-image: url(/VEGEFOODS/public/site/img/category2.jpg);">
        <div class="overlay"></div>
        <div class="category--item__content">
          <h5>Trái cây</h5>
        </div>
      </div>
        </div>
      </a>
        </div>
      </div>
    </section>
    <section class="section ">
      <div class="container">
        <div class="product row">
          <div class="product--title col-md-12">
            <h1>Sản phẩm nổi bật</h1>
          </div>
          <?php
          $thongkeModel = new ThongkeModel();
          $sanphambanchay=$thongkeModel->SanPhamBanChay(date('m'));
          $row = $sanphambanchay;
          $productModel = new ModelProduct;
          $i=0;
          foreach($row as $item){
            $product=$productModel->getProductByID($item['sanpham_id']);
            $i++;
            if($i>12){
              break;
            }
              ?>
          <div class="product--item col-md-6 col-sm-12 col-lg-3">
            <a href="/VEGEFOODS?controller=detailProduct&sanpham_id=<?php echo $product['sanpham_id']?>">
              <div class="product--item__img">
                <img src="<?php echo $product['image']?>" alt="">
              </div>
              <div class="product--item__title">
                <h6><?php echo $product['name']?></h6>
              </div>
              <div class="product--item__price">
                <h5><?php echo number_format($product['gia'], 0, '', ',')?><u>đ</u></h5>
              </div>
            </a>
          </div>

          <?php
          }
            ?>

          
      </div>
    </section>
    <section class="section">
      <div class="container">
        <div class="service row">
          <div class="service__item col-md-3">
            <div class="service__item--bg">
              <div class="service__item--icon bg-shipped">
                <img src="/VEGEFOODS/public/site/img/shipped.png" alt="">
              </div>
            </div>
            <div class="service__item--body">
              <h3 class="heading">Free Shipping</h3>
              <span>On order over $100</span>
            </div>
          </div>
          <div class="service__item col-md-3">
            <div class="service__item--bg">
              <div class="service__item--icon bg-diet">
                <img src="/VEGEFOODS/public/site/img/diet.png" alt="">
              </div>
            </div>
            <div class="service__item--body">
              <h3 class="heading">ALWAYS FRESH</h3>
              <span>PRODUCT WELL PACKAGE</span>
            </div>
          </div>
          <div class="service__item col-md-3">
            <div class="service__item--bg">
              <div class="service__item--icon bg-award">
                <img src="/VEGEFOODS/public/site/img/award.png" alt="">
              </div>
            </div>
            <div class="service__item--body">
              <h3 class="heading">SUPERIOR QUALITY</h3>
              <span>QUALITY PRODUCTS</span>
            </div>
          </div>
          <div class="service__item col-md-3">
            <div class="service__item--bg">
              <div class="service__item--icon bg-customer-service">
                <img src="/VEGEFOODS/public/site/img/customer-service.png" alt="">
              </div>
            </div>
            <div class="service__item--body">
              <h3 class="heading">SUPPORT</h3>
              <span>24/7 SUPPORT</span>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- <section class="section">
      <div class="container">
        <div class="blog row">
          <div class="blog__header col-md-12">
            <h2>Blog</h2>
          </div>
          <div class="blog__body col-md-12">
            <div class="container">
              <div class="row">
                <div class="blog__img col-md-5">
                  <img src="/VEGEFOODS/public/site/img/image_1.jpg" alt="">
                </div>
                <div class="blog__content col-md-7">
                  <div class="blog__content--post_day">
                    <p>19 Tháng 1 2022 Admin</p>
                  </div>
                  <div class="blog__content--title">
                    <strong>Lưu trữ và bảo quản rau củ cũng là một “nghệ thuật”</strong>
                  </div>
                  <div class="blog__content--body">
                    <p>1. Tuyệt đối không rửa rau, củ, quả trước khi mang đi cất trữ.
                       Điều đó sẽ khiến rau, củ, quả dễ bị ủng, thối. Bạn chỉ cần lau qua bằng giấy ăn hoặc khăn... </p>
                  </div>
                  <a class="read_more" href="">Xem thêm</a>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <section class="section notic-bg">
      <div class="container">
        <div class="notic row">
          <div class="notic__left col-md-6">
              <div class="notic__left--title">
                <h4>Đăng ký bản tin của chúng tôi</h4>
              </div>
              <div class="notic__left--body">
                <p>Nhận thông tin cập nhật qua e-mail về các cửa hàng mới nhất của chúng tôi và các ưu đãi đặc biệt</p>
              </div>
          </div>
          <div class="notic__right col-md-6">
            <form action="" method="post" class="notic__right--form">
                <input class="form_control" type="email" placeholder="Nhập địa chỉ email">
                <input class="submit" type="submit" value="Đăng ký">
            </form>
          </div>
        </div>
      </div>
    </section>