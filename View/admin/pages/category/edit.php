<div class="content-wrapper" style="min-height: 353px;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Sửa danh mục</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Danh mục mục</a></li>
                        <li class="breadcrumb-item active">Admin</li>
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
                                    if (isset($_SESSION['thongbao'])) {?>
                                        <div class="form-group alert alert-primary">
                                            <?=$_SESSION['thongbao']?>
                                            <?php unset($_SESSION['thongbao']); ?>
                                        </div>
                                    <?php }
                                ?>
                    <div class="form-group">
                        <label>Tên danh mục</label>
                        <input type="text" name="name_category" value="<?=$categoryOld['tenloaisanpham']?>" class="form-control" placeholder="Tên danh mục">
                    </div>
                    <button type="submit" name="editCategory" class="btn btn-primary">Hoàn thành</button>
                </div>
            </form>
        </div>
        <?php
        if(isset($_POST['editCategory'])){
            new EditCategory();
        }
        ?>
    </section>
</div>