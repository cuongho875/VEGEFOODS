
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
                                <div class="action" style="text-align: end;margin-bottom:10px;padding:10px">
                                        <a href="/VEGEFOODS/admin/?controller=print_order&order_id=<?=$order_id?>" style="margin-right: 40px;font-size:18px">In hóa đơn</a>
                                        <a href="/VEGEFOODS/admin/?controller=delete_order&order_id=<?=$order_id?>"style="margin-right: 10px;color:red;font-size:18px">Xóa</a>
                                </div>
                                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">STT</th>                                            
                                            <!-- <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Đơn hàng</th> -->
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Ảnh</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Tên sản phẩm</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Số lượng</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Giá</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Tổng tiền</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                               $productModel = new ModelProduct;
                                             if($detail_orders){
                                                     $stt=1;
                                               foreach($detail_orders as $detail_order){
                                                  $product=$productModel->getProductByID($detail_order['sanpham_id']);
                                                    ?>
                                                            <tr>
                                                                <td >
                                                                <p><?php echo $stt; $stt++;?></p>
                                                                </td>
                                                                <td >
                                                                <img style="width: 100px;" src="<?=$product['image']?>" alt="<?=$product['name']?>">
                                                                </td>
                                                                <td >
                                                                <p><?=$product['name']?></p>
                                                                </td>
                                                                <td >
                                                                <p><?=$detail_order['soluong']*$product['weigth'].'Kg'?></p>
                                                                </td>
                                                                <td >
                                                                <p><?=number_format($detail_order['gia'], 0, '', ',')?>đ<?='/'.$product['weigth'].'Kg'?></p>
                                                                </td>
                                                                <td >
                                                                <p><?=number_format($detail_order['gia']*$detail_order['soluong'], 0, '', ',').'đ'?></p>
                                                                </td>
                                                            </tr>
                                                    <?php }}?>
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