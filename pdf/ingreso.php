<?php
require "../config/Conexion.php";
require_once 'fpdf/fpdf.php';

session_start();


$pdf = new FPDF('P', 'mm', 'letter');
$pdf->AddPage();
$pdf->SetMargins(10, 10, 10);
$pdf->SetTitle("Ventas");
$pdf->SetFont('Arial', 'B', 12);
$idsucursal=$_SESSION["idsucursal"];
$idcliente = $_GET['id'];
$config = mysqli_query($conexion, "SELECT * FROM sucursal where idsucursal='$idsucursal'");
$datos = mysqli_fetch_assoc($config);
$clientes = mysqli_query($conexion, "SELECT c.idcliente,c.nombre as cliente, c.cedula,c.direccion , c.telefono, c.email, u.nombre as usuario,
 g.soporte,g.idingreso,g.observacion,g.monto,g.fecha_hora,g.numero, s.idsucursal, g.pago, s.nombre as sucursal, u.nombre as usuario FROM ingresos g, sucursal s , usuario u , cliente c 
 WHERE s.idsucursal=g.idsucursal and g.idingreso='$idcliente' and u.idusuario=g.idusuario AND c.idcliente=g.idcliente;");
$datosC = mysqli_fetch_assoc($clientes);
$monto= number_format($datosC['monto']);
$monto2= $datosC['monto'];


$pdf->Cell(195, 5, utf8_decode($datos['nombre']), 0, 1, 'C');

$pdf->Image("../vistas/electromoda.png", 10, 9, 65, 25, 'PNG');
$pdf->Cell(190, 5, utf8_decode("RECIBO DE CAJA "), 0, 0, 'R');
$pdf->Ln();
$pdf->Cell(150, 5, utf8_decode(""), 0, 0, 'R');
$pdf->Cell(20, 5, utf8_decode("Nº"), 0, 0, 'R');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(30, 5, $datosC['numero'], 0, 1, 'L');


$pdf->SetFont('Arial', '', 10);
$pdf->Cell(190, 5, $datos['nit'], 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 10);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(190, 5, $datos['telefono'], 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 10);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(190, 5, utf8_decode($datos['direccion']), 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 10);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(190, 5, utf8_decode($datos['email']), 0, 1, 'C');
$pdf->Ln();



$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 5, utf8_decode('Recibimos de'), 1, 0, 'R');

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(110, 5, utf8_decode($datosC['cliente']), 1, 0, 'L');

$pdf->Cell(5, 5, utf8_decode(''),0, 0, 'R');
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 5, utf8_decode('Fecha de recibo'),1, 0, 'R');

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(30, 5, utf8_decode($datosC['fecha_hora']), 1, 0, 'L');
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 5, utf8_decode('Cedula:'), 1, 0, 'R');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(30, 5, utf8_decode($datosC['cedula']), 1, 0, 'L');


$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 5, utf8_decode('Direccion:'), 1, 0, 'R');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(60, 5, utf8_decode($datosC['direccion']), 1, 0, 'L');
$pdf->SetFont('Arial', 'B', 10);

$pdf->Cell(5, 5, utf8_decode(''),0, 0, 'R');

$pdf->Cell(30, 5, utf8_decode(''),0, 0, 'R');



$pdf->Ln();
$pdf->Cell(30, 5, utf8_decode('Telefono'),1, 0, 'R');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(30, 5, utf8_decode($datosC['telefono']), 1, 0, 'L');
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 5, utf8_decode('Correo:'), 1, 0, 'R');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(60, 5, utf8_decode($datosC['email']), 1, 0, 'L');
$pdf->Cell(5, 5, utf8_decode(''),0, 0, 'R');
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 5, utf8_decode('Medio de pago'),1, 0, 'R');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(30, 5, utf8_decode($datosC['pago']), 1, 1, 'L');
$pdf->SetFont('Arial', '', 10);


$pdf->Ln();
$pdf->Cell(30, 5, utf8_decode('El valor de'),1, 0, 'L');
$pdf->Cell(110, 5, utf8_decode('Medio de pago'),1, 0, 'R');
$pdf->Cell(60, 5, utf8_decode('$ '.$monto),1, 1, 'R');
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(196, 5, "Observaciones", 1, 1, 'C', 1);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(196, 10, utf8_decode($datosC['observacion']), 1, 1, 'L');

$pdf->Ln();
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 5, utf8_decode('Realizador por'),1, 0, 'L');
$pdf->SetFont('Arial', '', 10);

$pdf->Cell(90, 5, utf8_decode($datosC['usuario']),1, 0, 'L');



$pdf->Output("ventas.pdf", "I");

?>
<a href="">archivo abjunto</a>