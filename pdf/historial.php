<?php
require "../config/Conexion.php";
require_once 'fpdf/fpdf.php';

session_start();


$pdf = new FPDF('P', 'mm', 'letter');
$pdf->AddPage();
$pdf->SetMargins(10, 10, 10);
$pdf->SetTitle("Ventas");
$pdf->SetFont('Arial', 'B', 12);
$idcliente = $_GET['id'];


$clientes = mysqli_query($conexion, "SELECT p.id_propietario, p.num_documento, p.nombre, p.telefono, p.direccion, p.email, m.id_mascota, m.nombre, m.fecha, m.edad, m.sexo, m.especie, m.raza, m.color FROM mascota m, propietario p WHERE m.id_propietario = p.id_propietario and m.id_mascota = $idcliente ");
$datosC = mysqli_fetch_assoc($clientes);
$citas = mysqli_query($conexion, "SELECT c.id_cita, c.motivo, c.motivo, c.fecha, c.hora, c.estado, m.nombre FROM cita c, mascota m WHERE c.id_mascota = m.id_mascota AND m.id_mascota = $idcliente and c.estado = 0");
$datocita = mysqli_fetch_assoc($citas);
$detalle = mysqli_fetch_assoc($clientes);

$pdf->Cell(195, 5, utf8_decode("La Parcela"), 0, 1, 'C');

// $pdf->Image("", 10, 9, 65, 25, 'PNG');
$pdf->Cell(190, 5, utf8_decode("Id Mascota "), 0, 0, 'R');
$pdf->Ln();
$pdf->Cell(150, 5, utf8_decode(""), 0, 0, 'R');
$pdf->Cell(20, 5, utf8_decode("Nº"), 0, 0, 'R');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(30, 5, $datosC['id_mascota'], 0, 1, 'L');


$pdf->SetFont('Arial', '', 10);
$pdf->Cell(190, 5, "48998", 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 10);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(190, 5, "3156659884", 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 10);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(190, 5, "Cr19 3-37", 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 10);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(190, 5, "laparcela@gmail.com", 0, 1, 'C');
$pdf->Ln();



$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 5, utf8_decode('Recibimos de'), 1, 0, 'R');

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(110, 5, utf8_decode($datosC['nombre']), 1, 0, 'L');

$pdf->Cell(5, 5, utf8_decode(''),0, 0, 'R');
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 5, utf8_decode('Fecha de recibo'),1, 0, 'R');

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(30, 5, utf8_decode($datosC['fecha']), 1, 0, 'L');
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 5, utf8_decode('Cedula:'), 1, 0, 'R');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(30, 5, utf8_decode($datosC['nombre']), 1, 0, 'L');


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
$pdf->Cell(30, 5, utf8_decode($datosC['nombre']), 1, 0, 'L');
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 5, utf8_decode('Correo:'), 1, 0, 'R');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(60, 5, utf8_decode($datosC['nombre']), 1, 0, 'L');
$pdf->Cell(5, 5, utf8_decode(''),0, 0, 'R');
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 5, utf8_decode('Medio de pago'),1, 0, 'R');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(30, 5, utf8_decode($datosC['nombre']), 1, 1, 'L');
$pdf->SetFont('Arial', '', 10);


$pdf->Ln();
$pdf->Cell(30, 5, utf8_decode('El valor de'),1, 0, 'L');
$pdf->Cell(110, 5, utf8_decode('Medio de pago'),1, 0, 'R');
$pdf->Cell(60, 5, utf8_decode("ujhu"),1, 1, 'R');
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(196, 5, "Observaciones", 1, 1, 'C', 1);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(196, 10, utf8_decode($datosC['nombre']), 1, 1, 'L');

$pdf->Ln();
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 5, utf8_decode('Realizador por'),1, 0, 'L');
$pdf->SetFont('Arial', '', 10);

$pdf->Cell(90, 5, utf8_decode($datosC['edad']),1, 0, 'L');



$pdf->Output("ventas.pdf", "I");

?>
<a href="">archivo abjunto</a>