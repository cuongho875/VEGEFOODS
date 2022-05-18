
    <section class="banner" style="height: 80px;border-bottom: 1px solid #000;">
      </section>
      <section class="section products">
      <div class="container">
        <div class="product row">
          <div class="product--title col-md-12">
            <h3><?php    
    echo 'Kết quả tìm kiếm:'.$key;
            ?></h3>
          </div>

          <?php
          foreach($result as $item){   
              ?>
          <div class="product--item col-md-6 col-sm-12 col-lg-3">
            <a href="/VEGEFOODS/?controller=detailProduct&sanpham_id=<?php echo $item['sanpham_id']?>">
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
      </div>
    </section>
