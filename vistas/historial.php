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
              <h4 class="">HISTORIA CLINICA</h4>
              <div class="box-tools pull-right">
                <img src="img/veterinario.png" width="45" height="45" alt="">
              </div>
            </div>
            <!--box-header-->
            <!--centro-->
            <div class="panel-body table-responsive" id="listadoregistros">
              <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                  <th>Opciones</th>
                  <th>Propietario</th>
                  <th>Mascota</th>
                  <th>Motivo Consulta</th>
                  <th>Fecha Cita</th>

                  <th>Total consulta</th>

                </thead>
                <tbody>
                </tbody>
                <tfoot>
                  <th>Opciones</th>
                  <th>Propietario</th>
                  <th>Mascota</th>
                  <th>motivo</th>
                  <th>Fecha Cita</th>

                  <th>Total consulta</th>

                </tfoot>
              </table>
            </div>
            <div class="panel-body" style="height: 400px;" id="formularioregistros">
              <form action="" name="formulario" id="formulario" method="POST">

                <div class="form-group col-lg-12 col-md-12 col-xs-12">

                  <table id="detallito" class="table table-striped table-bordered table-condensed table-hover">

                    <thead style="background-color:#A9D554">

                      <th>

                        </tbody>

                  </table>
                </div>

                <div> </div>

                <div> </div>

                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">

                  <button class="btn btn-danger" onclick="cancelarform()" type="button" id="btnCancelar"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                </div>
              </form>
            </div>
            <!--fin centro-->
          </div>
        </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

  <!--Modal-->

  <!-- fin Modal-->
  <?php

  require 'footer.php';
  ?>
  <script src="scripts/venta.js"></script>
<?php
}

ob_end_flush();
?>