<?php
require "../config/Conexion.php";
require_once 'fpdf/fpdf.php';

session_start();


$pdf = new FPDF('P', 'mm', 'letter');
$pdf->AddPage();
$pdf->SetMargins(25, 10, 20);
$pdf->SetTitle("Historial Clinco");
$pdf->SetFont('Arial', 'B', 12);

$idcliente = $_GET['id'];
$clientes = mysqli_query($conexion, "SELECT p.id_propietario, p.num_documento, p.nombre as propietario, p.telefono, p.direccion, p.email, m.id_mascota, 
m.nombre, m.fecha, m.edad, m.sexo, m.especie, m.raza, m.color FROM mascota m, propietario p WHERE m.id_propietario = p.id_propietario and m.id_mascota = $idcliente ");
$datosC = mysqli_fetch_assoc($clientes);

$citas = mysqli_query($conexion, "SELECT c.id_cita, c.motivo, c.motivo, c.fecha, c.hora, 
c.estado, a.peso, a.total, a.fecha as fechaatencion,
m.nombre,a.id_atender FROM atender a, cita c, mascota m WHERE c.id_mascota = m.id_mascota 
AND m.id_mascota = $idcliente and c.estado = 0 and a.id_cita=c.id_cita");


$pdf->Image("img/veterinario.png", 10, 9, 65, 25, 'PNG');




$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(50, 5, utf8_decode(""), 0, 0, 'L');
$pdf->Cell(90, 5, utf8_decode("CONSULTORIO VETERINARIO LA PARCELA"), 0, 0, 'C');
$pdf->Cell(35, 5, utf8_decode("ID MASCOTA "), 0, 1, 'C');

$pdf->Cell(50, 5, utf8_decode(""), 0, 0, 'L');
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(70, 5,  utf8_decode("NIT: 10043434257"), 0, 0, 'C');
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(15, 5, utf8_decode("Nº "),  0, 0, 'R');
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(15, 5, utf8_decode($datosC['id_mascota'] ),  0, 1, 'C');
$pdf->Cell(50, 5, utf8_decode(""), 0, 0, 'C');
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(70, 5, utf8_decode("Carrera 19 #3-37"), 0, 1, 'C');
$pdf->Cell(50, 5, utf8_decode(""), 0, 0, 'L');
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(70, 5,"Tel: 3243498735 ", 0, 1, 'C');
$pdf->Cell(50, 5, utf8_decode(""), 0, 0, 'C');
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(70, 5, utf8_decode("laparcelaconsultorio@gmail.com"), 0, 1, 'C');
$pdf->Ln();
$pdf->SetFillColor(233, 243, 238);
$pdf->SetDrawColor(233, 243, 238);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(160, 5, utf8_decode("INFORMACION DEL PROPIETARIO"), 1, 1, 'C','true');
$pdf->SetFillColor(233, 243, 238);
$pdf->SetDrawColor(233, 243, 238);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', 'b', 9);
$pdf->Cell(30, 5, utf8_decode('Propietario'),1 , 0, 'R','true');
$pdf->SetFillColor(0,0,0);

$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(130, 5, utf8_decode($datosC['propietario']), 1, 0, 'L');


$pdf->Ln();

$pdf->SetFont('Arial', 'B', 9);
$pdf->SetFillColor(233, 243, 238);
$pdf->SetDrawColor(233, 243, 238);
$pdf->Cell(30, 5, utf8_decode('Cedula:'), 1, 0, 'R', true);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(30, 5, utf8_decode($datosC['num_documento']),1, 0, 'L');


$pdf->SetFont('Arial', 'B', 9);
$pdf->SetFillColor(233, 243, 238);
$pdf->SetDrawColor(233, 243, 238);
$pdf->Cell(20, 5, utf8_decode('Direccion:'), 1, 0, 'R', true);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(80, 5, utf8_decode($datosC['direccion']),1, 0, 'L');
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(5, 5, utf8_decode(''),0, 0, 'R');
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 9);
$pdf->SetFillColor(233, 243, 238);
$pdf->SetDrawColor(233, 243, 238);
$pdf->Cell(30, 5, utf8_decode('Telefono'),1, 0, 'R' , true);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(30, 5, utf8_decode($datosC['telefono']), 1, 0, 'L');
$pdf->SetFont('Arial', 'B', 9);
$pdf->SetFillColor(233, 243, 238);
$pdf->SetDrawColor(233, 243, 238);
$pdf->Cell(20, 5, utf8_decode('Correo:'), 1, 0, 'R', true);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(80, 5, utf8_decode($datosC['email']), 1, 1, 'L');

$pdf->Ln();
$pdf->Cell(160, 5, utf8_decode("INFORMACION DE LA MASCOTA"), 1, 1, 'C','true');
$pdf->SetFillColor(233, 243, 238);
$pdf->SetDrawColor(233, 243, 238);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', 'b', 9);
$pdf->Cell(30, 5, utf8_decode('Nombre'),1 , 0, 'R','true');
$pdf->SetFillColor(0,0,0);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(60, 5, utf8_decode($datosC['nombre']), 1, 0, 'L');
$pdf->SetFont('Arial', 'B', 9);
$pdf->SetFillColor(233, 243, 238);
$pdf->SetDrawColor(233, 243, 238);
$pdf->Cell(30, 5, utf8_decode('Fecha Nac:'), 1, 0, 'R', true);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(40, 5, utf8_decode($datosC['fecha']),1, 0, 'L');
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 9);
$pdf->SetFillColor(233, 243, 238);
$pdf->SetDrawColor(233, 243, 238);
$pdf->Cell(30, 5, utf8_decode('Raza:'), 1, 0, 'R', true);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(60, 5, utf8_decode($datosC['raza']),1, 0, 'L');
$pdf->SetFont('Arial', 'B', 9);
$pdf->SetFillColor(233, 243, 238);
$pdf->SetDrawColor(233, 243, 238);
$pdf->Cell(30, 5, utf8_decode('Edad:'), 1, 0, 'R', true);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(40, 5, utf8_decode($datosC['edad']),1, 0, 'L');
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(5, 5, utf8_decode(''),0, 0, 'R');
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 9);
$pdf->SetFillColor(233, 243, 238);
$pdf->SetDrawColor(233, 243, 238);
$pdf->Cell(30, 5, utf8_decode('Color'),1, 0, 'R' , true);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(60, 5, utf8_decode($datosC['color']), 1, 0, 'L');
$pdf->SetFont('Arial', 'B', 9);
$pdf->SetFillColor(233, 243, 238);
$pdf->SetDrawColor(233, 243, 238);
$pdf->Cell(30, 5, utf8_decode('Especie:'), 1, 0, 'R', true);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(40, 5, utf8_decode($datosC['especie']), 1, 1, 'L');
$pdf->Ln();



$pdf->SetFont('Arial', 'B', 9);
$pdf->SetFillColor(233, 243, 238);
$pdf->SetDrawColor(233, 243, 238);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(160, 5, utf8_decode("HISTORIA CLINICA "), 1, 1, 'C','true');
$pdf->Ln();
while ($row = mysqli_fetch_assoc($citas)) {
    $pdf->SetFillColor(233, 243, 238);
    $pdf->SetDrawColor(233, 243, 238);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial', 'b', 9);
    $pdf->Cell(30, 5, utf8_decode('Id cita  '),1 , 0, 'R','true');
    $pdf->SetFillColor(0,0,0);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial', '', 9);
    $pdf->Cell(60, 5, utf8_decode($row['id_cita']), 1, 0, 'L');
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->SetFillColor(233, 243, 238);
    $pdf->SetDrawColor(233, 243, 238);
    $pdf->Cell(30, 5, utf8_decode('Fecha cita:'), 1, 0, 'R', true);
    $pdf->SetFont('Arial', '', 9);
    $pdf->Cell(40, 5, utf8_decode($row['fecha']),1, 0, 'L');
    $pdf->Ln();
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->SetFillColor(233, 243, 238);
    $pdf->SetDrawColor(233, 243, 238);
    $pdf->Cell(30, 5, utf8_decode('Hora Cita:'), 1, 0, 'R', true);
    $pdf->SetFont('Arial', '', 9);
    $pdf->Cell(60, 5, utf8_decode($row['hora']),1, 0, 'L');
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->SetFillColor(233, 243, 238);
    $pdf->SetDrawColor(233, 243, 238);
    $pdf->Cell(30, 5, utf8_decode('Motivo Cita:'), 1, 0, 'R', true);
    $pdf->SetFont('Arial', '', 9);
    $pdf->Cell(40, 5, utf8_decode($row['motivo']),1, 0, 'L');
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(5, 5, utf8_decode(''),0, 0, 'R');
    $pdf->Ln();
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->SetFillColor(233, 243, 238);
    $pdf->SetDrawColor(233, 243, 238);
    $pdf->Cell(30, 5, utf8_decode('Peso Mascota(Kg)'),1, 0, 'R' , true);
    $pdf->SetFont('Arial', '', 9);
    $pdf->Cell(60, 5, utf8_decode($row['peso'] ), 1, 0, 'L');
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->SetFillColor(233, 243, 238);
    $pdf->SetDrawColor(233, 243, 238);
    $pdf->Cell(30, 5, utf8_decode('Total Consulta:'), 1, 0, 'R', true);
    $pdf->SetFont('Arial', '', 9);
    $pdf->Cell(40, 5, utf8_decode($row['total']), 1, 1, 'L');
    $pdf->SetFillColor(233, 243, 238);
    $pdf->SetDrawColor(233, 243, 238);
    $pdf->SetTextColor(0,0,0);
    $pdf->Ln();
    $pdf->Cell(160, 5, utf8_decode("DETALLE DE ATENCION"), 1, 1, 'C','true');
    $detalle = mysqli_query($conexion, "SELECT a.id_atender, s.nombre, s.descripcion, s.precio, d.descuento FROM atender a, servicio s, detalle d WHERE a.id_atender=d.id_atender and d.id_servicio=s.id_servicio and a.id_atender=".$row['id_atender']);
  
  
    $pdf->Cell(30, 5, utf8_decode('Nombre'), 1, 0, 'C');
    $pdf->Cell(70, 5, 'Descripcion', 1, 0, 'C');
    $pdf->Cell(20, 5, 'Precio', 1, 0, 'C');
   
    $pdf->Cell(20, 5, 'Descuento.', 1, 0, 'C');
    
    $pdf->Cell(20, 5, 'Subtotal.', 1, 1, 'C');
    $pdf->SetFont('Arial', '', 9);
    while ($row1 = mysqli_fetch_assoc($detalle)) {
        $subtotal=  $row1['precio']-$row1['descuento'];
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(30, 5,( $row1['nombre']), 1, 0, 'C');
        $pdf->Cell(70, 5, $row1['descripcion'], 1, 0, 'C');
        $pdf->Cell(20, 5, number_format( $row1['precio']), 1, 0, 'C');
        $pdf->Cell(20, 5, number_format( $row1['descuento']), 1, 0, 'C');
        $pdf->Cell(20, 5, number_format( $subtotal), 1, 1, 'C');
    
      
    }
    $pdf->SetFillColor(233, 243, 238);
    $pdf->SetDrawColor(233, 243, 238);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial', 'b', 9);
    $pdf->Cell(140, 5, 'Total Pagado por la consulta', 1, 0, 'R', true);
    $pdf->Cell(20, 5, utf8_decode(number_format( $row['total'])), 1, 1, 'C', true);
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Cell(160, 5, utf8_decode("----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------"), 1, 1, 'C');
     $pdf->Ln();

}



$pdf->Output("Historial clinicos.pdf", "I");

?>
