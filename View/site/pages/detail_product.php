<link rel="stylesheet" href="/VEGEFOODS/public/site/css/main.css" />
<?php         
          // require '../../Model/ModelProduct.php';
          $vegetable = new ModelProduct();
          $detail = $vegetable->getProductByID($_GET['sanpham_id'])?>
   <section class="banner" style="background-image: url(/VEGEFOODS/public/site/img/bg_1.jpg);">
      <div class="banner--title">
        <div class="banner--title__content">
          <h1>Chi tiết sản phẩm</h1>
        </div>
      </div>
      <!-- <div class="overlay"></div> -->
    </section>

    <form class="section detail" action="/VEGEFOODS/?controller=cart&action=add&sanpham_id=<?php echo $detail['sanpham_id']?>" method="post">
      <div class="container">
        <div class="row detail_pro">
          <div class="col-lg-8 detail__img">
            <img id="product_detail_img" src="<?php echo $detail['image']?>" alt="">
            <!-- The Modal -->
            <div id="myModal" class="modal">

              <!-- The Close Button -->
              <span class="close">&times;</span>

              <!-- Modal Content (The Image) -->
              <img class="modal-content" id="img01">

              <!-- Modal Caption (Image Text) -->
              <div id="caption"></div>
            </div>
          </div>
          <div class="col-lg-4 product-detail">
            <div class="product-detail__name">
              <h3><?php echo $detail['name']?></h3>
            </div>
            <div class="product-detail__price">
              <h6><?php echo number_format($detail['gia'], 0, '', ',')?><u>đ</u><?='/'.$detail['weigth'].'Kg'?></h6>
            </div>
            <div class="product-detail__rest-quantity">
              <?php $wdetail=$detail['soluong']*$detail['weigth']?>
            Còn lại:<?php
            if($wdetail>0){
              echo $detail['soluong']*$detail['weigth'].'kg';
            }
            else {
              echo 'Hết hàng' ;
            }
             ?> 
            </div>
            <div class="product-detail__quantity">
              <label for="quantity">Số lượng: </label>
              <input type="number" name="quantity" value="1" min="0">
            </div>
            <?php if($wdetail>0){
              ?>
            <button class="product-detail__btn" name="addtocart" type="submit">Thêm vào giỏ</button>
              <?php
            } else {
              ?>
            <button disabled class="product-detail__btn" name="addtocart" type="submit">Thêm vào giỏ</button>
              
              <?php }?>
            <div class="product-detail__info">
              <div class="info--title">
                Thông tin chi tiết sản phẩm
              </div>
              <div class="info--body">
                Cân nặng: <?php echo $detail['weigth']?> kg
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
    <section class="section ">
      <div class="container">
        <div class="product row">
          <div class="product--title col-md-12">
            <h1>Sản phẩm liên quan</h1>
          </div>
        <?php
                  $row = $vegetable->getAllProduct();
                  $i=0;
                  foreach($row as $item){
                    $i++;
                    if($i>4){
                      break;
                    }
                      ?>
                  <div class="product--item col-md-6 col-sm-12 col-lg-3">
                    <a href="../../View/site/?controller=detailProduct&id=<?php echo $item['sanpham_id']?>">
                      <div class="product--item__img">
                        <img src="<?php echo $item['image']?>" alt="">
                      </div>
                      <div class="product--item__title">
                        <h6><?php echo $item['name']?></h6>
                      </div>
                      <div class="product--item__price">
                        <h5><?php echo number_format($item['gia'], 0, '', ',')?><u>đ</u></h5>
                      </div>
                    </a>
                  </div>
        
                  <?php
                  }
                    ?>
          
      </div>
    </section>

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
