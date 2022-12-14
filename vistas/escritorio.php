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
                    <span class="info-box-icon bg-aqua"><i class="fa-solid fa-shield-dog"></i></span>

                    <div class="info-box-content">
                      <a href="mascota.php"><span class="info-box-text">Mascotas</span></a>
                      <span class="info-box-number">90<small>%</small></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-red"> <i class="fa-solid fa-user"></i> </span>

                    <div class="info-box-content">
                    <a href="propietario.php"><span class="info-box-text">Propietarios</span></a>
                       <span class="info-box-number">08</span>
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
                    <span class="info-box-icon bg-green"> <i class="fa-solid fa-calendar-days"></i> </span>

                    <div class="info-box-content">
                      <a href="cita.php"> <span class="info-box-text">Citas</span></a>
                      <span class="info-box-number">07</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    
                    <span class="info-box-icon bg-yellow"> <i class="fa-solid fa-staff-snake"></i> </span>

                    <div class="info-box-content">
                    <a href="servicio.php"> <span class="info-box-text">Servicios</span> </a>
                      <span class="info-box-number">05</span>
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