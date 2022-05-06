<?php
          $vegetable = new ModelProduct();
          $category = $vegetable->getCategory($_GET['loaisanpham_id'])?>
<link rel="stylesheet" href="/VEGEFOODS/public/css/main.css" />
<style>
       .products {
     margin-top: 60px;
   }
   .product--category {
    display: flex;
    justify-content: center;
    margin-bottom: 20px;
}
  .product--category__item {
    margin-right: 10px;
  }
  .product--category__item a {
    color: #82ae46;
    padding: 5px 20px;
    border-radius: 5px;
  }
  .product--category li a.active {
    background: #82ae46;
    color: #fff;
}
  .product--category__item a:hover{
    text-decoration: none;
    color: #82ae46;
  }
</style>
<section class="banner" style="background-image: url(/VEGEFOODS/public/site/img/bg_1.jpg);">
      <div class="banner--title">
        <div class="banner--title__content">
          <h1>Danh mục Sản phẩm</h1>
        </div>
      </div>
      <div class="overlay"></div>
    </section>

    <section class="section products">
      <div class="container">
        <div class="product row">
          <div class="product--title col-md-12">
            <h3><?php echo $category['tenloaisanpham']?></h3>
            <div class="product--option">
              Sắp xếp theo
              <form id="#formSelect"  method="post">
              <select name="sort-select" id="SortPR" >
                <option value="NewProduct">Sản phẩm mới</option>
                <option value="SortUp">Giá: Từ thấp đến cao</option>
                <option value="SortDown">Giá: Từ cao đến thấp</option>
                <option value="SortAZ">Tên: Từ A đến Z</option>
                <option value="SortZA">Tên: Từ Z đến A</option>
                <input id="input-sort" name="input-sort" type="submit" value="Lọc">
              </select>
              </form>

            </div>
          </div>

          <?php
          if(isset($_POST['input-sort'])){
            if($_POST['sort-select']=="NewProduct"){
              $row = $vegetable->NewProduct($_GET['loaisanpham_id']);
            }
            if($_POST['sort-select']=="SortAZ"){
              $row = $vegetable->SortAZ($_GET['loaisanpham_id']);
            }
            if($_POST['sort-select']=="SortZA"){
              $row = $vegetable->SortZA($_GET['loaisanpham_id']);
            }
            if($_POST['sort-select']=="SortUp"){
              $row = $vegetable->SortUp($_GET['loaisanpham_id']);
            }
            if($_POST['sort-select']=="SortDown"){
              $row = $vegetable->SortDown($_GET['loaisanpham_id']);
            }
          }
          else{
            $row = $vegetable->NewProduct($_GET['loaisanpham_id']);
          }
          $i=0;
          foreach($row as $item){
            $i++;
            if($i>12){
              break;
            }
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