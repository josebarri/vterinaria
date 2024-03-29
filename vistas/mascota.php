<?php 
//activamos almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
  header("Location: login.html");
}else{

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
  <h1 class="box-title">Gestion de Mascotas <button class="btn btn-success" onclick="mostrarform(true)" id="btnagregar"><i class="fa fa-plus-circle"></i> Agregar</button> </h1>
  <div class="box-tools pull-right">
  <img src="logo.ico" align="right" width="40" height="40" >
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
      <th>Fecha Nac</th>
      <th>Edad</th>
      <th>Sexo</th>
      <th>Especie</th>
      <th>Raza</th>
      <th>Color</th>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
     <th>Opciones</th>
      <th>Propietario</th>
      <th>Mascota</th>
      <th>Fecha Nac</th>
      <th>Edad</th>
      <th>Sexo</th>
      <th>Especie</th>
      <th>Raza</th>
      <th>Color</th>
    </tfoot>   
  </table>
</div>


<div class="panel-body" id="formularioregistros">
  <form action="" name="formulario" id="formulario" method="POST">

  <div class="form-group col-lg-6 col-md-6 col-xs-12">
    <label for="">Nombre(*):</label>
    <input class="form-control" type="hidden" name="id_mascota" id="id_mascota">
    <input class="form-control" type="text" name="nombre" id="nombre" maxlength="100" placeholder="Nombre de la mascota" required>
    </div>

    <div class="form-group col-lg-6 col-md-6 col-xs-12">
    <label for="">Propietario(*):</label>
    <select name="id_propietario" id="id_propietario" class="form-control selectpicker" data-Live-search="true"></select>
    </div>

  
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
    <label for="">Fecha de Nacimiento</label>
    <input class="form-control" type="date" name="fecha" id="fecha" require >
    </div>


    <div class="form-group col-lg-6 col-md-6 col-xs-12">
    <label for="">Edad </label>
      <input class="form-control" type="text" name="edad" id="edad" placeholder="Edad de la mascota" required >
    </div>


    <div class="form-group col-lg-6 col-md-6 col-xs-12">
    <label for="">Especie</label>
     <select class="form-control select-picker" name="especie" id="especie"    required>
       <option value="PERRO">PERRO</option>
       <option value="GATO">GATO</option>
    
     </select>
    </div>


    <div class="form-group col-lg-6 col-md-6 col-xs-12">
    <label for="">Raza</label>
      <input class="form-control" type="text" name="raza" id="raza"  placeholder="Raza de la mascota" required>
    </div>


    <div class="form-group col-lg-6 col-md-6 col-xs-12">
    <label for="">Color</label>
    <input class="form-control" type="text" name="color" id="color"  placeholder="Color de la mascota" required>
    </div>

    <div class="form-group col-lg-6 col-md-6 col-xs-12">
    <label for="">Sexo</label>
    <select class="form-control select-picker" name="sexo" id="sexo" required>
       <option value="Macho">MACHO</option>
       <option value="Hembra">HEMBRA</option>
       
     </select>
    </div>

    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i>  Guardar</button>
      
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
 <script src="scripts/mascota.js"></script>

 <?php 
}

ob_end_flush();
  ?>