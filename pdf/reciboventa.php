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
$clientes = mysqli_query($conexion, " SELECT v.observacion,v.pago, v.estado2,v.estado, v.idventa, v.idcliente, p.nombre AS cliente, p.direccion,
   p.cedula, p.email, p.telefono, v.idusuario, u.nombre AS usuario, v.tipo,  v.numero, DATE(v.fecha_hora) AS fecha, 
    v.total_venta FROM venta v INNER JOIN cliente p ON v.idcliente=p.idcliente INNER JOIN usuario u 
    ON v.idusuario=u.idusuario WHERE v.idventa='$idcliente' ");
$datosC = mysqli_fetch_assoc($clientes);
$ventas = mysqli_query($conexion, "SELECT  a.nombre AS articulo, c.nombre as categoria, a.codigo, d.cantidad, d.precio_venta, 
(d.cantidad*d.precio_venta-d.cuota) AS subtotal, d.cuota,d.descuento FROM detalle_venta d INNER JOIN articulo a ON d.idarticulo=a.idarticulo 
INNER JOIN categoria c on a.idcategoria=c.idcategoria INNER JOIN venta v ON v.idventa=d.idventa INNER JOIN sucursal s ON s.idsucursal=v.idsucursal
 WHERE d.idventa='$idcliente' AND s.idsucursal='$idsucursal' ");
$tipo='';
if ($datosC['estado2']=='Pendiente') {
    $tipo='Credito';
}elseif ($datosC['estado2']=='Pagada') {
    $tipo='Contado';
}



$pdf->Image("../vistas/electro.png", 13, 9, 46, 19, 'PNG');




$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(50, 5, utf8_decode(""), 0, 0, 'L');
$pdf->Cell(100, 5, utf8_decode($datos['nombre']), 0, 0, 'C');
$pdf->Cell(35, 5, utf8_decode("RECIBO DE VENTA "), 0, 1, 'L');

$pdf->Cell(50, 5, utf8_decode(""), 0, 0, 'L');
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(100, 5,  utf8_decode("NIT: ".$datos['nit']), 0, 0, 'C');
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(15, 5, utf8_decode("Nº "),  0, 0, 'R');
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(15, 5, utf8_decode($datosC['numero'] ),  0, 1, 'L');
$pdf->Cell(50, 5, utf8_decode(""), 0, 0, 'C');
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(100, 5, utf8_decode($datos['direccion']), 0, 1, 'C');
$pdf->Cell(50, 5, utf8_decode(""), 0, 0, 'L');
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(100, 5,"Tel: ".$datos['telefono'], 0, 1, 'C');
$pdf->Cell(50, 5, utf8_decode(""), 0, 0, 'L');
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(100, 5, utf8_decode($datos['email']), 0, 1, 'C');
$pdf->Ln();

$pdf->SetFillColor(233, 243, 238);
$pdf->SetDrawColor(233, 243, 238);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', 'b', 9);
$pdf->Cell(30, 5, utf8_decode('Nombre Cliente'),1 , 0, 'R','true');
$pdf->SetFillColor(0,0,0);

$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(110, 5, utf8_decode($datosC['cliente']), 1, 0, 'L');

$pdf->Cell(5, 5, utf8_decode(''),0, 0, 'R');
$pdf->SetFont('Arial', 'B', 9);
$pdf->SetFillColor(233, 243, 238);
$pdf->SetDrawColor(233, 243, 238);
$pdf->Cell(30, 5, utf8_decode('Fecha de venta'),1, 0, 'R', true);
$pdf->SetFillColor(0,0,0);

$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(30, 5, utf8_decode($datosC['fecha']), 1, 0, 'L');
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 9);
$pdf->SetFillColor(233, 243, 238);
$pdf->SetDrawColor(233, 243, 238);
$pdf->Cell(30, 5, utf8_decode('Cedula:'), 1, 0, 'R', true);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(30, 5, utf8_decode($datosC['cedula']),1, 0, 'L');


$pdf->SetFont('Arial', 'B', 9);
$pdf->SetFillColor(233, 243, 238);
$pdf->SetDrawColor(233, 243, 238);
$pdf->Cell(20, 5, utf8_decode('Direccion:'), 1, 0, 'R', true);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(60, 5, utf8_decode($datosC['direccion']),1, 0, 'L');
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(5, 5, utf8_decode(''),0, 0, 'R');
$pdf->SetFillColor(233, 243, 238);
$pdf->SetDrawColor(233, 243, 238);
$pdf->Cell(30, 5, utf8_decode('Tipo Venta'),1, 0, 'R', true);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(30, 5, utf8_decode($tipo), 1, 0, 'L');
$pdf->SetFont('Arial', '', 9);



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
$pdf->Cell(60, 5, utf8_decode($datosC['email']), 1, 0, 'L');
$pdf->Cell(5, 5, utf8_decode(''),0, 0, 'R');
$pdf->SetFont('Arial', 'B', 9);
$pdf->SetFillColor(233, 243, 238);
$pdf->SetDrawColor(233, 243, 238);
$pdf->Cell(30, 5, utf8_decode('Forma de pago'),1, 0, 'R' , true);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(30, 5, utf8_decode($datosC['pago']), 1, 1, 'L');
$pdf->SetFont('Arial', '', 9);
$pdf->Ln();

$pdf->SetFont('Arial', 'B', 9);
$pdf->SetFillColor(233, 243, 238);
$pdf->SetDrawColor(233, 243, 238);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(196, 5, "Observaciones", 1, 1, 'C', 1);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(196, 10, utf8_decode($datosC['observacion']), 1, 1, 'L');


$pdf->Ln();

if ($datosC['estado2']=='Pendiente') {
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->SetFillColor(233, 243, 238);
    $pdf->SetDrawColor(233, 243, 238);
    $pdf->Cell(196, 5, "Detalle de Venta", 1, 1, 'C', 1);
    $pdf->SetTextColor(0, 0, 0);
  
    $pdf->Cell(92, 5, utf8_decode('Descripción'), 1, 0, 'C');
    $pdf->Cell(16, 5, 'Cant', 1, 0, 'L');
    $pdf->Cell(22, 5, 'Precio', 1, 0, 'L');
    $pdf->Cell(22, 5, 'C. incial', 1, 0, 'L');
    $pdf->Cell(22, 5, 'Descuento', 1, 0, 'L');
    $pdf->Cell(22, 5, 'Sub Total.', 1, 1, 'L');
    $pdf->SetFont('Arial', '', 10);

    while ($row = mysqli_fetch_assoc($ventas)) {
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(92, 5,$row['categoria'].' '.$row['articulo'], 1, 0, 'L');
        $pdf->Cell(16, 5, $row['cantidad'], 1, 0, 'C');
        $pdf->Cell(22, 5, number_format( $row['precio_venta']), 1, 0, 'C');
        $pdf->Cell(22, 5, number_format( $row['cuota']), 1, 0, 'C');
        $pdf->Cell(22, 5, number_format( $row['descuento']), 1, 0, 'C');
        $pdf->Cell(22, 5, number_format(($row['cantidad'] * $row['precio_venta'])-$row['cuota']), 1, 1, 'L');
      
    }
    $pdf->Cell(152, 5, '', 0, 0, 'L');
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(22, 5, 'Total', 1, 0, 'L');
    $pdf->Cell(22, 5, utf8_decode(number_format( $datosC['total_venta'])), 1, 1, 'L');

}elseif ($datosC['estado2']=='Pagada') {
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->SetFillColor(233, 243, 238);
    $pdf->SetDrawColor(233, 243, 238);
    $pdf->Cell(196, 5, "DETALLE DE LA VENTA", 1, 1, 'C', 1);
    $pdf->SetTextColor(0, 0, 0);
  
    $pdf->Cell(100, 5, utf8_decode('Descripción'), 1, 0, 'C');
    $pdf->Cell(32, 5, 'Cantidad', 1, 0, 'C');
    $pdf->Cell(32, 5, 'Precio', 1, 0, 'C');
   
    $pdf->Cell(32, 5, 'Sub Total.', 1, 1, 'C');
    $pdf->SetFont('Arial', '', 9);

    while ($row = mysqli_fetch_assoc($ventas)) {
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(100, 5,$row['categoria'].' '.$row['articulo'], 1, 0, 'L');
        $pdf->Cell(32, 5, $row['cantidad'], 1, 0, 'C');
        $pdf->Cell(32, 5, number_format( $row['precio_venta']), 1, 0, 'C');

        $pdf->Cell(32, 5, number_format(($row['cantidad'] * $row['precio_venta'])-$row['cuota']), 1, 1, 'C');
      
    }
    $pdf->Cell(132, 5, '', 0, 0, 'L');
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(32, 5, 'Total', 1, 0, 'L');
    $pdf->Cell(32, 5, utf8_decode(number_format( $datosC['total_venta'])), 1, 1, 'C');

}

$pdf->Ln();
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(50, 5, utf8_decode('Venta Realizada Por'),0, 0, 'R');
$pdf->SetFont('Arial', '', 9);

$pdf->Cell(90, 5, utf8_decode($datosC['usuario']),0, 0, 'L');



$pdf->Output("ventas.pdf", "I");

?>
