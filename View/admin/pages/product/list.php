<div class="content-wrapper" style="min-height: 1203.6px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách danh mục</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Danh sách danh mục</li>
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
                                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">STT</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Ảnh</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Tên sản phẩm</th>
                                            <!-- <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Ảnh</th> -->
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Danh mục</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Giá</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Số lượng</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Ngày thêm</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Sửa</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Xóa</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                            $stt = 0;
                                            foreach ($products as $product) {?>
                                                <tr>
                                                    <td><?=++$stt?></td>
                                                    <td>
                                                        <img width="100px" src="<?=$product['image']?>">
                                                    </td>
                                                    <td>
                                                        <?=$product['name']?>
                                                    </td>
                                                    <td>
                                                        <?=$category->getCategory($product['loaisanpham_id'])['tenloaisanpham']?>
                                                    </td>
                                                    <td>
                                                        <?=number_format($product['gia'], 0, '', ',')?><?='/'.$product['weigth'].'Kg'?>
                                                    </td>
                                                    <td>
                                                        <?=$product['soluong']*$product['weigth'].'Kg'?>
                                                    </td>
                                                    <td>
                                                        <?=$product['ngaythem']?>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <span class="badge bg-primary">
                                                            <a href="/VEGEFOODS/admin?controller=editProduct&productId=<?=$product['sanpham_id']?>">
                                                                <ion-icon name="create-outline"></ion-icon>
                                                            </a>
                                                        </span>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <span class="badge bg-danger">
                                                            <a href="/VEGEFOODS/admin?controller=deleteProduct&productId=<?=$product['sanpham_id']?>">
                                                                <ion-icon name="trash-outline"></ion-icon>
                                                            </a>
                                                        </span>
                                                    </td>
                                                </tr>
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