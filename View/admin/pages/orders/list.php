
<div class="content-wrapper" style="min-height: 1203.6px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách đơn hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Danh sách đơn hàng</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"></div>
                            <div class="col-sm-12 col-md-6"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <?php  
                                    if (isset($_SESSION['thongbao'])) {?>
                                        <div class="form-group alert alert-primary">
                                            <?=$_SESSION['thongbao']?>
                                            <?php unset($_SESSION['thongbao']); ?>
                                        </div>
                                    <?php }
                                ?>
                                <select>
                                    <option>
                                        
                                    </option>
                                </select>
                                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">STT</th>                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Đơn hàng</th>
                                            <!-- <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Ảnh</th> -->
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Họ tên</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Địa chỉ</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Ngày đặt</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Giá trị đơn hàng</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">TT thanh toán</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">TT vận chuyển</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Cập nhật</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Chi tiết</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Hủy</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $stt = 0;
                                            foreach ($orders as $order) {?>
                                        <form method="post" action="/VEGEFOODS/admin/?controller=editOrder">

                                                <tr>
                                                    <td><?=++$stt?></td>
                                                    <td>
                                                        <?=$order['order_id']?>
                                                        <input type="hidden" name="order_id" value="<?=$order['order_id']?>">
                                                    </td>
                                                    <td>
                                                        <?=$order['hoten']?>
                                                    </td>
                                                    <td>
                                                    <?=$order['diachi']?>
                                                    </td>
                                                    <td>
                                                        <?=$order['ngaydat']?>
                                                    </td>
                                                    <td>
                                                        <?=number_format($order['total'], 0, '', ',')?>đ
                                                    </td>
                                                    <td>
                                                        
                                                        <select name="thanhtoan">
                                                            <?php 
                                                                if($order['thanhtoan']=="Chưa thanh toán"){
                                                                    ?>
                                                            <option value="<?=$order['thanhtoan']?>"><?=$order['thanhtoan']?></option>
                                                            <option value="Đã thanh toán">Đã thanh toán</option>
                                                                <?php } else {
                                                                    ?>
                                                            <option value="Đã thanh toán">Đã thanh toán</option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="trangthai">
                                                        <?php 
                                                                if($order['trangthai']=="Đang xử lý"){
                                                                    ?>
                                                            <option value="<?=$order['trangthai']?>"><?=$order['trangthai']?></option>
                                                            <option value="Đang vận chuyển">Đang vận chuyển</option>
                                                                <?php } else if($order['trangthai']=="Đang vận chuyển") {
                                                                    ?>
                                                            <option value="<?=$order['trangthai']?>"><?=$order['trangthai']?></option>
                                                            <option value="Đã giao">Đã giao</option>
                                                                    <?php
                                                                } else if($order['trangthai']=="Đã hủy"){ ?>
                                                            <option value="Đã hủy">Đã hủy</option>
                                                                <?php } else { ?>

                                                            <option value="Đã giao">Đã giao</option>
                                                                <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <span class="badge bg-primary">
                                                            <button type="submit" name="update-order" style="color:#fff;display:contents;background: transparent !important;border: 0 !important;">
                                                            <ion-icon name="checkmark-outline"></ion-icon>
                                                            </button>
                                                        </span>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <span class="badge bg-primary">
                                                            <a href="/VEGEFOODS/admin?controller=detail_order&orderId=<?=$order['order_id']?>">
                                                                <ion-icon name="eye-outline"></ion-icon>
                                                            </a>
                                                        </span>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <span class="badge bg-danger">
                                                            <a href="/VEGEFOODS/admin?controller=cancelOrder&orderId=<?=$order['order_id']?>">
                                                                <ion-icon name="trash-outline"></ion-icon>
                                                            </a>
                                                        </span>
                                                    </td>
                                                    
                                                </tr>
                                        </form>

                                            <?php }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
</div>