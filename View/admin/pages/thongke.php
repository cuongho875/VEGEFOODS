<?php 
            $month=date('m');  

        if(isset($_POST['submit'])){
            $month=$_POST['month'];
        }
        $thongke = $thongkeModel->TkDoanhThu($month);
        $tinhtrangs = $thongkeModel->TkTinhTrangDonHang($month);
		$sanphambanchay=$thongkeModel->SanPhamBanChay($month);

    ?>
<div class="content-wrapper" style="min-height: 1203.6px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thống kê doanh thu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Thống kê doanh thu</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6>Thống kê theo tháng</h6>
                    <form method="post" style="display: flex;">
                 
                        <div class="form-group" style="width:auto;display:block;margin-right: 60px; ">
                        <label style="width: auto;" for="date-begin" >Tháng</label>
                            <input min="1" max="12" name="month" type="number" value="<?php echo $month?>">
                        </div>

                        <div class="form-group" style="width: auto;display:block;margin-right: 60px;">
                        <input style="width: auto;display:block" id="submit" name="submit" type="submit" value="Áp dụng">
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
          </div>
        </div> 
    </section>
        <!-- Main content -->
        <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <!-- AREA CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Biểu đồ thống kê doanh thu tháng <?php echo $month?></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- DONUT CHART -->
            <!-- <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Donut Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div> -->
              <div class="card-body" style="display:none">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            <!-- </div> -->
            <!-- /.card -->
            <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Danh sách đơn hàng mới</h3>
            </div>
            <div class="card-body">
            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">STT</th>            
                                             <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Đơn hàng</th>
                                            <!-- <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Ảnh</th> -->
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Thông tin</th>
                                            <!-- <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Địa chỉ</th> -->
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Ngày đặt</th>
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Giá trị đơn hàng</th>
                                            <!-- <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">TT thanh toán</th> -->
                                            <th style="text-align: center;" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Tình trạng</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <form method="post">
                                    <?php
                                            $stt = 0;
                                            foreach ($orders as $order) {?>
                                                <tr>
                                                    <td><?=++$stt?></td>
                                                    <td>
                                                        <?=$order['order_id']?>
                                                        <input type="hidden" name="order_id" value="<?=$order['order_id']?>">
                                                    </td>
                                                    <td>
                                                        Tên: <?=$order['hoten'] ?><br>
                                                        Địa chỉ: <?=$order['diachi']?><br>
                                                        Tên: <?=$order['sdt'] ?>
                                                    </td>
                                                    <td>
                                                        <?=$order['ngaydat']?>
                                                    </td>
                                                    <td>
                                                        <?=number_format($order['total'], 0, '', ',')?>đ
                                                    </td>

                                                    <td>
                                                    <?=$order['trangthai'] ?>
                                                    </td>
                                                </tr>
                                            <?php }
                                        ?>
                                        </form>
                                    </tbody>
                                </table>
            </div>
            </div>
          </div>
          <!-- /.col (LEFT) -->
          <div class="col-md-4">
                          <!-- PIE CHART -->

            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title"> Thống kê tình trạng đơn hàng</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Top sản phẩm bán chạy</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <tbody>
                    <?php foreach($sanphambanchay as $item){
                        $product=$productModel->getProductByID($item['sanpham_id']);
                        ?>
                            <tr>
                            <td>
                            <img src="<?php echo $product['image']?>" style="wight:50px;height:50px;">
                        </td>  
                        <td>
                            <?php echo $item['luotmua']?> lượt mua
                        </td>
                        <td>
                            <?php echo $product['name']?>
                        </td>
                        <td>
                            <?php echo $item['luotmua']*$product['gia']?>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
                </table>
            </div>
            </div>
            <!-- /.card -->
            <!-- LINE CHART -->
            <!-- <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Line Chart</h3> -->

                <!-- <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div> -->
              <!-- <div class="card-body">
                <div class="chart">
                  <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div> -->
              <!-- /.card-body -->
            <!-- </div> -->
            <!-- /.card -->

            <!-- BAR CHART -->
            <!-- <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Bar Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            <!-- </div>  -->
            <!-- /.card -->

            <!-- STACKED BAR CHART -->
            <!-- <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Stacked Bar Chart <?php $day=array('1')?></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            <!-- </div>  -->
            <!-- /.card -->

          </div>
          <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Add Content Here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/VEGEFOODS/public/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/VEGEFOODS/public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/VEGEFOODS/public/admin/plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="/VEGEFOODS/public/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- Page specific script -->
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  :    [<?php

    foreach($thongke as $date){

        ?>'<?php echo $date['ngaydat'] ?>',<?php }?>],
      datasets: [
        {
          label               : 'Digital Goods',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php
    
    foreach($thongke as $data){

        ?>'<?php echo $data['total'] ?>',<?php }?>]
        },
        {
          label               : 'Electronics',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })

    //-------------
    //- LINE CHART -
    //--------------
    // var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    // var lineChartOptions = $.extend(true, {}, areaChartOptions)
    // var lineChartData = $.extend(true, {}, areaChartData)
    // lineChartData.datasets[0].fill = false;
    // lineChartData.datasets[1].fill = false;
    // lineChartOptions.datasetFill = false

    // var lineChart = new Chart(lineChartCanvas, {
    //   type: 'line',
    //   data: lineChartData,
    //   options: lineChartOptions
    // })

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [<?php

foreach($tinhtrangs as $tinhtrang){

    ?>'<?php echo $tinhtrang['trangthai'] ?>',<?php }?>],
      datasets: [
        {
          data: [<?php

foreach($tinhtrangs as $tinhtrang){

    ?>'<?php echo $tinhtrang['soluong'] ?>',<?php }?>],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  })
</script>
</div>
