<div class="content-wrapper" style="min-height: 353px;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Thêm Sản Phẩm</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                        <li class="breadcrumb-item active">Admin</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label>Tên Sản Phẩm</label>
                        <input type="text" required="required" name="name_product" class="form-control" placeholder="Tên Sản Phẩm">
                    </div>
                    <div class="form-group" >
                        <label>Danh mục</label>
                        <select name="category_id" class="form-control select2">
                            <?php foreach($categories as $cateItem){?>
                            <option value="<?=$cateItem['loaisanpham_id'] ?>" ><?=$cateItem['tenloaisanpham']?></option>
                            <?php }?>
                        </select>
                    </div> 
                    <?php  
                                    if (isset($_SESSION['thongbao'])) {?>
                                        <div class="form-group alert alert-primary">
                                            <?=$_SESSION['thongbao']?>
                                            <?php unset($_SESSION['thongbao']); ?>
                                        </div>
                                    <?php }
                                ?>
                    <div class="form-group">
                        <label style="width: 8%;">Giá:</label>
                        <input required="required" name="gia" placeholder="Giá"
                          style="width: 30%; height: 30px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></input>
                        <label>VND</label>
                    </div>
                    <div class="form-group">
                        <label style="width: 8%;">Cân nặng:</label>
                        <input required="required" name="weigth" placeholder="Cân nặng"
                          style="width: 30%; height: 30px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></input>
                        <label>Kg/Túi</label>
                    </div>
                    <div class="form-group">
                        <label style="width: 8%;">Số lượng:</label>
                        <input required="required" name="quantity" type="number" value="1" min="0"
                          style="width: 30%; height: 30px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></input>
                        <label>Túi</label>
                    </div>
                    <div class="form-group">
                        <label style="width: 8%;">Chọn Ảnh:</label>
                        <input required="required" id="upload" type="file" name="fileToUpload" onchange="ImagesFileAsURL()"
                          style="width: 30%; height: 50px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></input>
                          <div id="displayImg" style="margin-top:10px;padding-left:100px">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nhà cung cấp:</label>
                        <input name="nhacungcap" placeholder="Nhà cung cấp"
                          style="width: 100%; height: 50px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></input>
                    </div> 
                     <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="textarea" name="describe" placeholder="Place some text here"
                          style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Ghi chú</label>
                        <textarea name="note" class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>

                    <button type="submit" name="addProduct" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
        <?php 

        ?>
        <script type="text/javascript">
            function ImagesFileAsURL() {
                var fileSelected = document.getElementById('upload').files;
                if (fileSelected.length > 0) {
                    var fileToLoad = fileSelected[0];
                    var fileReader = new FileReader();
                    fileReader.onload = function(fileLoaderEvent) {
                        var srcData = fileLoaderEvent.target.result;
                        var newImage = document.createElement('img');
                        newImage.style.height="100px";
                        newImage.src = srcData;
                        document.getElementById('displayImg').innerHTML = newImage.outerHTML;
                    }
                    fileReader.readAsDataURL(fileToLoad);
                }
            }
        </script>

    </section>
</div>