<?php
require "../config/Conexion.php";
require_once 'fpdf/fpdf.php';
$pdf = new FPDF('P', 'mm', 'letter');
$pdf->AddPage();
$pdf->SetMargins(10, 10, 10);
$pdf->SetTitle("Ventas");
$pdf->SetFont('Arial', 'B', 12);
$id = $_GET['v'];
$idcliente = $_GET['cl'];
$config = mysqli_query($conexion, "SELECT * FROM sucursal");
$datos = mysqli_fetch_assoc($config);
$clientes = mysqli_query($conexion, "SELECT c.idcliente,c.nombre as cliente, c.cedula,c.direccion , c.telefono, c.email, u.nombre as usuario, g.soporte,g.idingreso,g.observacion,g.monto,g.fecha_hora, s.idsucursal, g.pago, s.nombre as sucursal, u.nombre as usuario FROM ingresos g, sucursal s , usuario u , cliente c WHERE s.idsucursal=g.idsucursal and g.idingreso='$idcliente' and u.idusuario=g.idusuario AND c.idcliente=g.idcliente;");
$datosC = mysqli_fetch_assoc($clientes);


$pdf->Cell(195, 5, utf8_decode($datos['nombre']), 0, 1, 'C');

$pdf->Image("../vistas/electromoda.png", 10, 9, 65, 25, 'PNG');
$pdf->Cell(190, 5, utf8_decode("RECIBO DE CAJA "), 0, 0, 'R');
$pdf->Ln();
$pdf->Cell(150, 5, utf8_decode(""), 0, 0, 'R');
$pdf->Cell(20, 5, utf8_decode("Nº"), 0, 0, 'R');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(30, 5, $datos['nit'], 0, 1, 'L');


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
$pdf->Cell(110, 5, utf8_decode($datosC['nombre']), 1, 0, 'L');

$pdf->Cell(5, 5, utf8_decode(''),0, 0, 'R');
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 5, utf8_decode('Fecha de recibo'),1, 0, 'R');

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(30, 5, utf8_decode($datosC['telefono']), 1, 0, 'L');
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

$pdf->Cell(30, 5, utf8_decode('Hora elaboracion'),1, 0, 'R');

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(30, 5, utf8_decode($datosC['telefono']), 1, 0, 'L');

$pdf->Ln();
$pdf->Cell(30, 5, utf8_decode('Telefono'),1, 0, 'R');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(30, 5, utf8_decode($datosC['telefono']), 1, 0, 'L');
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 5, utf8_decode('Correo:'), 1, 0, 'R');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(60, 5, utf8_decode($datosC['email']), 1, 0, 'L');
$pdf->Cell(5, 5, utf8_decode(''),0, 0, 'R');

$pdf->Cell(30, 5, utf8_decode('Medio de pago'),1, 0, 'R');

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(30, 5, utf8_decode($datosC['telefono']), 1, 1, 'L');

$pdf->Ln();

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(196, 5, "Detalle de Producto", 1, 1, 'C', 1);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(14, 5, utf8_decode('N°'), 0, 0, 'L');
$pdf->Cell(90, 5, utf8_decode('Descripción'), 0, 0, 'L');
$pdf->Cell(25, 5, 'Cantidad', 0, 0, 'L');
$pdf->Cell(32, 5, 'Precio', 0, 0, 'L');
$pdf->Cell(35, 5, 'Sub Total.', 0, 1, 'L');
$pdf->SetFont('Arial', '', 10);
$contador = 1;
while ($row = mysqli_fetch_assoc($ventas)) {
    $pdf->Cell(14, 5, $contador, 0, 0, 'L');
    $pdf->Cell(90, 5, $row['idarticulo'], 0, 0, 'L');
    $pdf->Cell(25, 5, $row['cantidad'], 0, 0, 'L');
    $pdf->Cell(32, 5, $row['precio_venta'], 0, 0, 'L');
    $pdf->Cell(35, 5, number_format($row['cantidad'] * $row['precio_venta'], 2, '.', ','), 0, 1, 'L');
    $contador++;
}
$pdf->Output("ventas.pdf", "I");

?>
