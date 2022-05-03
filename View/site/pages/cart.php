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
</style>
    <section class="banner" style="background-image: url(/VEGEFOODS/public/site/img/bg_1.jpg);">
      <div class="banner--title">
        <div class="banner--title__content">
          <h1>Giỏ hàng
          </h1>
        </div>
      </div>
      <!-- <div class="overlay"></div> -->
    </section>
    <section class="cart">
      <div class="container">
        <div class="row ">
          

        <?php
          $quantity =0;
          $total = 0;
          if(isset($_SESSION['cart'])){
          foreach($_SESSION['cart'] as $item){
            $quantity += $item['quantity'];
           }}
           $_SESSION['quantity'] = $quantity;
            ?>
          <div class="col-lg-9 row">
          <div class="cart__title col-lg-12">
            <h2>Giỏ hàng </h2><span>( <?php echo $quantity?> sản phẩm)</span>
          </div>
<?php
            if($_SESSION['quantity']!=0){
              if(isset($_SESSION['cart'])){

            
          foreach($_SESSION['cart'] as $item){
            ?>

          <div class="cart--item col-lg-12" style="margin: 15px 0 !important;">
            <div style="margin-right: 40px;" class="item-cart cart--item__img">
              <img style="width: 150px;height:150px" src="<?php echo $item['image']?>" alt="">
            </div>
            <div style="margin-right: 40px; width:120px" class="item-cart cart--item__name"><?php echo $item['name']?></div>
            <div style="margin-right: 40px;; width:60px" class="item-cart cart--item__price"><?php echo $item['gia']?>đ</div>
            <div style="margin-right: 40px;" class="item-cart cart--item__quantity"><input class="quantity-cart-item" type="number" value="<?php echo $item['quantity']?>"></div>
            <form method="post" action="/VEGEFOODS/?controller=cart&action=add&sanpham_id=<?php echo $item['sanpham_id']?>"
            class="cart--item__update" style="margin-right: 10px;">
                <input type="hidden" class="quantity-update" value="" name="quantity">
                <button class="btn-update-cart" name="Update-cart">Cập nhật</button>
            </form>

            <form method="post" action="/VEGEFOODS/?controller=cart&action=delete&sanpham_id=<?php echo $item['sanpham_id']?> class="cart--item__delete">
            <input type="hidden" class="quantity-delete" value="" name="quantity">
            <button class="btn-delete-cart" type="submit">Xóa</button>
            </form>
            
          </div>
          <?php
            $total += $item['gia']*$item['quantity'];
          } } }else {
          ?>
            <div class="cart--item col-lg-12" style="margin: 15px 0 !important;display:flex;align-items:center;justify-content: center;">
              <?php echo "Giỏ hàng trống"?>
          </div>
          <?php
          }
          ?>
          </div>
          <div class="cart--total col-lg-3">
              <div class="cart--total__temp">
                  <span>Tạm tính:</span> <strong><?php echo number_format($total, 0, '', ',')?>đ</strong>
              </div>
              <div class="cart--total__mon">
                <span>Thành tiền:</span> <strong><?php echo number_format($total, 0, '', ',')?>đ</strong>
            </div>
            <form action="/VEGEFOODS/?controller=checkout" method="post">
            <button class="btn-checkout" type="submit" name="checkout-cart">Thanh toán ngay</button>
            </form>
            <button class="btn-checkout btn-contin" type="button" name="checkout-cart" onclick="window.location.href='/VEGEFOODS'">Tiếp tục mua hàng</button>
          </div>
        </div>
      </div>
    </section>
    <script>
              const quantityCarts=document.querySelectorAll('.quantity-cart-item')
              const quantityUpdates=document.querySelectorAll('.quantity-update')  
              const quantityDeletes=document.querySelectorAll('.quantity-delete')

              for (const quantityCart of quantityCarts){
                const quantityOld=quantityCart.value;
                quantityCart.addEventListener('change',setQuantity)
                function setQuantity(){
                for (const quantityUpdate of quantityUpdates){
                  quantityUpdate.value = quantityCart.value - quantityOld;

                 }
                 for (const quantityDelete of quantityDeletes){
                  quantityDelete.value = quantityCart.value - quantityOld;

                 }
              }

        }
            </script>