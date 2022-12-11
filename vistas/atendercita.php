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



              <div class="box-tools pull-right">

              </div>


              <h1>Esta Cita ya fue Atendida</h1>
              <!--box-header-->
              
              <!--centro-->
              <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      
                        <a href="cita.php" class="btn btn-danger" type="button" id="btnCancelar"><i class="fa fa-arrow-circle-left"></i> Regresar</a>

                      </div>

              <?php
              if (!isset($_GET["id_cita"])) {
                header("location: index.php?error=eliminar_no_id");
                exit;
              } else {
                require_once("../config/Conexion.php");

                $sql = "SELECT cita.id_cita, propietario.nombre as propietario, mascota.nombre AS mascota FROM cita, propietario,mascota WHERE propietario.id_propietario= mascota.id_propietario AND mascota.id_mascota=cita.id_mascota  and cita.estado=1   AND cita.id_cita= " . $_GET["id_cita"];

                $resultado = $conexion->query($sql);

                if ($conexion->errno) {
                }

                if ($resultado->num_rows > 0) {
                  $registro = $resultado->fetch_assoc();

              ?>

                  <div class="panel-body" style="height: 400px;" id="formularioros">
                    <form action="" name="formulario" id="formulario" method="POST">
                      <div class="form-group col-lg-6 col-md-6 col-xs-12">
                        <label for="">Propietario - Mascota</label>
                        <input class="form-control" type="hidden" name="id_atender" id="id_atender">
                        <select name="id_cita" id="id_cita" class="form-control selectpicker" required>
                          <option value="<?php echo $registro["id_cita"]; ?>"> <?php echo $registro["propietario"]; ?> - <?php echo $registro["mascota"]; ?> </option>

                        </select>
                      </div>

                      <div class="form-group col-lg-3 col-md-3 col-xs-6">
                        <label for="">Peso: </label>
                        <input class="form-control" type="text" name="peso" id="peso" maxlength="7" placeholder="peso actual de la mascota">
                      </div>
                      <div class="form-group col-lg-3 col-md-3 col-xs-12">
                        <label for="">Fecha de Atencion: </label>
                        <input class="form-control" type="date" name="fecha" id="fecha" required>
                      </div>

                      <br>
                      <br> <br> <br>
                      <br> <br>

                      <div></div>
                      <div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
                        <a data-toggle="modal" href="#myModal">
                          <button id="btnAgregarArt" type="button" class="btn btn-primary"><span class="fa fa-plus"></span>Agregar servicios</button>
                        </a>
                      </div>
                      <div class="form-group col-lg-12 col-md-12 col-xs-12">
                        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                          <thead style="background-color:#A9D0F5">
                            <th>Opciones</th>
                            <th>Servicio</th>
                            <th></th>
                            <th>Valor del Servicio</th>
                            <th>descuento</th>
                            <th>Subtotal</th>
                          </thead>
                          <tfoot>
                            <th>TOTAL</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>
                              <h4 id="totales"> $ 0.00</h4><input type="hidden" name="total" id="total">
                            </th>
                          </tfoot>
                          <tbody>

                          </tbody>
                        </table>
                      </div>


                      <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                        <a href="cita.php" class="btn btn-danger" type="button" id="btnCancelar"><i class="fa fa-arrow-circle-left"></i> Regresar</a>

                      </div>
                    </form>

                <?php
                }
              }
                ?>
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
  <div class="modal fade" id="myModal" tabindex="-12" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 65% !important;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Seleccione los servicios</h4>
        </div>
        <div class="modal-body">
          <table id="tblarticulos" class="table table-striped table-bordered table-condensed table-hover">
            <thead>
              <th>Opciones</th>
              <th>Servicio</th>
              <th>Descripcion</th>
              <th>Precio</th>
              <th>Estado</th>

            </thead>
            <tbody>

            </tbody>
            <tfoot>
              <th>Opciones</th>
              <th>Servicio</th>
              <th>Descripcion</th>
              <th>Precio</th>
              <th>Estado</th>
            </tfoot>
          </table>
        </div>
        <div class="modal-footer">
          <button class="btn btn-default" type="button" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>


  <!-- fin Modal-->
  <?php

  require 'footer.php';
  ?>
  <script src="scripts/atendercita.js"></script>
<?php
}

ob_end_flush();
?>