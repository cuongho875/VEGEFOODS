<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/VEGEFOODS/public/site/css/style.css" />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="/VEGEFOODS/public/site/css/flaticon.css"/>
    <link rel="stylesheet" href="/VEGEFOODS/public/site/css/icomoon.css"/>
    <link rel="stylesheet" href="/VEGEFOODS/public/site/css/owl.carousel.min.css"/>
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

  </head>

  <body>
  <?php  
	if(!isset($_SESSION['quantity'])){
			$_SESSION['quantity']=0;
		
		}
            if (isset($error['email'])) {?>
                <div class="alert alert-danger" style="top: 155px; position: absolute; z-index: 5; width: auto; right: 0px;" role="alert">
                    <?php echo $error['email']?>
                </div>
            <?php } else if (isset($error['password'])) {?>
                <div class="alert alert-danger" style="top: 155px; position: absolute; z-index: 5; width: auto; right: 0px;" role="alert">
                    <?=$error['password']?>
                </div>
            <?php } else if (isset($error['full_name'])) {?>
                <div class="alert alert-danger" style="top: 155px; position: absolute; z-index: 5; width: auto; right: 0px;" role="alert">
                    <?=$error['full_name']?>
                </div>
            <?php } else if (isset($error['email_exist'])) {?>
                <div class="alert alert-danger" style="top: 155px; position: absolute; z-index: 5; width: auto; right: 0px;" role="alert">
                    <?=$error['email_exist']?>
                </div>
            <?php }
        ?>


<!-- The Modal -->
<form method="get" action="/VEGEFOODS/?controller=search">
<div class="modal  fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tìm kiếm</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <input type="hidden" name="controller" value="search">

        <input type="text" name="text-search" style="width: 80%;" required placeholder="Nhập tìm kiếm...">
        <button class="btn btn-primary" type="submit" name="btn-search" style="background: #fff;border: 0px;">
        <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</form>
    <header id="header" class="header">
      <div class="container">
        <div class=" row">
          <div class="header--title col-md-3">
            <a href="./" style="text-decoration:none">
            <h3 class="header--title__content">VEGEFOODS</h3>
            </a>
        </div>
          <div class="header--nav col-md-9" style="display: flex;justify-content: space-between;">
              <ul class="header--nav__list">
                  <li class="header--nav__item">
                      <a href="/VEGEFOODS" class="nav__link">Trang chủ</a>
                </li>
                  <li class="header--nav__item">
                      <a href="/VEGEFOODS?controller=about" class="nav__link">Giới thiệu</a>
                </li>
                  <li class="header--nav__item">
                      <a href="/VEGEFOODS?controller=product&loaisanpham_id=0" class="nav__link">Sản phẩm</a>
                </li>
                  <li class="header--nav__item">
                      <a href="/VEGEFOODS?controller=contact" class="nav__link">Liên hệ</a>
                </li>
                  <li class="header--nav__item">
                      <a href="/VEGEFOODS?controller=cart" class="nav__link">Giỏ hàng <span>(<?php
                        echo $_SESSION['quantity'];
                      ?>)</span></a>
                </li>
                <?php
                  if(isset($_SESSION['user'])){
                    ?>
                    <li class="header--nav__item">
                    <a href="/VEGEFOODS?controller=account" class="nav__link"><?php echo $_SESSION['user']?></a>
              </li>
              <li class="header--nav__item">
                    <a href="/VEGEFOODS/lib/logout.php" class="nav__link">Đăng Xuất</a>
              </li>
                    <?php
                  } else { ?>
                    <li class="header--nav__item">
                    <a href="/VEGEFOODS?controller=login" class="nav__link">Đăng Nhập</a>
              </li>
              <li class="header--nav__item">
                    <a href="/VEGEFOODS?controller=register" class="nav__link">Đăng Ký</a>
              </li>
                <?php
                  } ?>

              </ul>
              <!-- Button to Open the Modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="background: #fff;border: 0px;">
                <i class="fa-solid fa-magnifying-glass"></i>
                </button>
          </div>
        </div>
      </div>
    </header>