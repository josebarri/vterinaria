<?php 
if (strlen(session_id())<1) 
  session_start();

  ?>
 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" href="img/veterinario.png">
  <title>Veterinaria | La Parcela </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../public/css/bootstrap.min.css">
  <!-- Font Awesome -->

  <link rel="stylesheet" href="../public/css/font-awesome.min.css">

  <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../public/css/_all-skins.min.css">
  <!-- Morris chart --><!-- Daterange picker -->
 <link rel="stylesheet" href="img/apple-touch-ico.png">
 <link rel="stylesheet" href="img/favicon.ico">
<!-- DATATABLES-->
<link rel="stylesheet" href="../public/datatables/jquery.dataTables.min.css">
<link rel="stylesheet" href="../public/datatables/buttons.dataTables.min.css">
<link rel="stylesheet" href="../public/datatables/responsive.dataTables.min.css">
<link rel="stylesheet" href="../public/css/bootstrap-select.min.css">
<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">

	<script src="librerias/jquery-3.2.1.min.js"></script>
  <script src="js/funciones.js"></script>
	<script src="librerias/bootstrap/js/bootstrap.js"></script>
	<script src="librerias/alertifyjs/alertify.js"></script>
  <script src="librerias/select2/js/select2.js"></script>
  <script src="https://kit.fontawesome.com/77d19e3e48.js" crossorigin="anonymous"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="escritorio.php" class="logo">
      
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b><img src="img/veterinario.png" width="40" height="40" alt=""></b> Parcela</span>
      <!-- logo for regular state and mobile devices -->
      
      <span class="logo-lg"> <b><img src="img/veterinario.png" width="45" height="45" alt=""></b> La Parcela</span>
      
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">NAVEGACIÓM</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['nombre']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="img-circle" alt="User Image">

                <p>
                
                  <small>2022</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="../ajax/usuario.php?op=salir" class="btn btn-default btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    
      <ul class="sidebar-menu" data-widget="tree">

<br>
       <?php 
{
  echo ' <li><a href="escritorio.php"><i class="fa  fa-dashboard "></i> <span>Escritorio</span></a>
        </li>';
}



{
  echo ' <li><a href="propietario.php"><i class="fa  fa-user "></i> <span>Propietarios</span></a>
        </li>';
}

{
  echo ' <li><a href="mascota.php"><i class="fa  fa-paw "></i> <span>Mascotas</span></a>
        </li>';
}


{
  echo ' <li><a href="cita.php"><i class="fa  fa-calendar "></i> <span>Citas</span></a>
        </li>';
}


{
  echo ' <li><a href="medicamento.php"><i class="fa fa-sharp fa-solid fa-capsules"></i> <span> Medicamentos</span></a>
        </li>';
}





{
  echo ' <li><a href="historial.php"><i class="fa  fa-address-book "></i> <span>Historias Clinicas</span></a>
        </li>';
}




{
  echo ' <li><a href="servicio.php"><i class="fa  fa-server "></i> <span>Servicios</span></a>
        </li>';
}





{
  echo ' <li><a href="usuario.php"><i class="fa  fa-group "></i> <span>Usuarios</span></a>
        </li>';
}

{
  echo ' <li><a href="cerrar.php"><i class="fa fa-brands fa-chrome"></i>  <span>sitio web</span></a>
        </li>';
}


        ?>

          
                           
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>