<div class="content-wrapper" style="min-height: 353px;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Thêm Danh mục sản phẩm</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Danh mục sản phẩm</li>
                        
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <form method="post">
                <div class="card-body">
                <?php  
                                    if (isset($_SESSION['thongbao2'])) {?>
                                        <div class="form-group alert alert-primary">
                                            <?=$_SESSION['thongbao2']?>
                                            <?php unset($_SESSION['thongbao2']); ?>
                                        </div>
                                    <?php }
                                ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên Danh mục sản phẩm</label>
                        <input type="text" name="name_category" class="form-control" placeholder="Tên Danh mục sản phẩm">
                    </div>
                    <button type="submit" name="addCategory" class="btn btn-primary">Thêm</button>
                </div>
            </form>
            <?php
                if(isset($_POST['addCategory'])){
                    new AddCategory();
                }
            ?>  
        </div>
    </section>
</div>