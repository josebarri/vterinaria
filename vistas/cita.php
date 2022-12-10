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
              <h1 class="box-title"> Gestion de Citas <button class="btn btn-success" onclick="mostrarform(true)" id="btnagregar"><i class="fa fa-plus-circle"></i>Agregar</button> </h1>
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
                  <th>Motivo </th>
                  <th>Fecha </th>
                  <th>Hora</th>
                  <th>Estado</th>

                </thead>
                <tbody>
                </tbody>
                <tfoot>
                  <th>Opciones</th>
                  <th>Propietario</th>
                  <th>Mascota</th>
                  <th>Motivo </th>
                  <th>Fecha </th>
                  <th>Hora</th>
                  <th>Estado</th>
                </tfoot>
              </table>
            </div>


            <div class="panel-body" id="formularioregistros">
              <form action="" name="formulario" id="formulario" method="POST">


                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                  <label for="">Propietario - Mascota(*):</label>
                  <input class="form-control" type="hidden" name="id_cita" id="id_cita">
                  <select name="id_mascota" id="id_mascota" class="form-control selectpicker" data-Live-search="true" required></select>
                </div>


                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                  <label for="">Motivo:</label>
                  <input class="form-control" type="text" name="motivo" id="motivo" maxlength="100" placeholder="motivo de la cita" required autocomplete="off">
                </div>

                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                  <label for="">Fecha </label>
                  <input class="form-control" type="date" name="fecha" id="fecha" required>
                </div>

                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                  <label for="">Hora</label>
                  <input class="form-control" type="time" name="hora" id="hora" required>
                </div>



                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                  <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
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
  <?php

  require 'footer.php'
  ?>
  <script src="../public/js/JsBarcode.all.min.js"></script>
  <script src="../public/js/jquery.PrintArea.js"></script>
  <script src="scripts/cita.js"></script>

<?php
}

ob_end_flush();
?>