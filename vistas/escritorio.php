<?php
//activamos almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
  header("Location: login.html");
} else {


  require 'header.php';



?>
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h4>Escritorio</h4>
              <div class="box-tools pull-right">
              <img src="img/veterinario.png" width="45" height="45" alt="">
              </div>
            </div>
            <!--box-header-->
            <!--centro-->
            <div class="panel-body">

              <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">CPU Traffic</span>
                      <span class="info-box-number">90<small>%</small></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Likesdjfk</span>
                      <span class="info-box-number">41,410</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix visible-sm-block"></div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Sales</span>
                      <span class="info-box-number">760</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">New Members</span>
                      <span class="info-box-number">2,000</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
              </div>
            </div>
          </div>
          <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <?php


  require 'footer.php';
  ?>
  <script src="../public/js/Chart.bundle.min.js"></script>
  <script src="../public/js/Chart.min.js"></script>


<?php
}

ob_end_flush();
?>