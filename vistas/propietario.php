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
              <h1 class="box-title">Gestion de Propietarios <button class="btn btn-success" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
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
                  <th>Documento</th>
                  <th>Nombre</th>
                  <th>Telefono</th>
                  <th>Direccion</th>
                  <th>Email</th>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                  <th>Opciones</th>
                  <th>Documento</th>
                  <th>Nombre</th>
                  <th>Telefono</th>
                  <th>Direccion</th>
                  <th>Email</th>
                </tfoot>
              </table>
            </div>

            <!--formulario de registro-->

            <div class="panel-body" style="height: 400px;" id="formularioregistros">
              <form action="" name="formulario" id="formulario" method="POST">
                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                  <label for="">Número Documento</label>
                  <input class="form-control" type="hidden" name="id_propietario" id="id_propietario">
                  <input class="form-control" type="text" name="num_documento" id="num_documento" placeholder="Número de Documento" require>
                </div>

                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                  <label for="">Nombres</label>
                  <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre del propietario" require>
                </div>


                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                  <label for="">Telefono</label>
                  <input class="form-control" type="text" name="telefono" id="telefono" placeholder="Número de Telefono" require>
                </div>


                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                  <label for="">Direccion</label>
                  <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Direccion" require>

                </div>
                <div class="form-group col-lg-6 col-md-6 col-xs-12">
                  <label for="">Email</label>
                  <input class="form-control" type="email" name="email" id="email" placeholder="Email" require>
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

  require 'footer.php';
  ?>
  <script src="scripts/propietario.js"></script>
<?php
}

ob_end_flush();
?>