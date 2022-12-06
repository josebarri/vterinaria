<?php 
require_once "../modelos/Venta.php";
if (strlen(session_id())<1) 
	session_start();

$venta = new Venta();

$atender=isset($_POST["id_atender"])? limpiarCadena($_POST["id_atender"]):"";
$fecha=isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]):"";
$idcita=isset($_POST["id_cita"])? limpiarCadena($_POST["id_cita"]):"";
$peso=isset($_POST["peso"])? limpiarCadena($_POST["peso"]):"";
$total=isset($_POST["total"])? limpiarCadena($_POST["total"]):"";





switch ($_GET["op"]) {
	
	case 'mostrar':
		$rspta=$venta->mostrar($atender);
		echo json_encode($rspta);
		break;

		case 'mostrarHistorial':
			$id=$_GET['id'];

		
			$rspta=$venta->mostrarHistorial($id);
		

		echo ' 
		
		<thead style="background-color:#A9D554">
		<th></th>
        <th>PROPIETARIO</th>
        <th>MASCOTA</th>
		
		<th>PESO MASCOTA</th>
		<th>FECHA ATENCION</th>
       </thead>
	   ';
		while ($reg=$rspta->fetch_object()) {
			echo '<tr class="filas">
		<td></td>
			<td> <h4> '.$reg->propietario.' </h4></td>
			<td>  <h4> '.$reg->mascota.' </h4> </td>
			
			<td> <h4>  '.$reg->peso.'</h4>  </td>
			<td> <h4> '.$reg->fecha.'</h4> <br> </td>
			</tr>
			<td colspan="30"> <center> <h4> Descripción de los servicios prestado a la mascota  <strong>  '.$reg->mascota.' </strong> </h4> </center> </th>
			';
		}
		
	   
	  
	 
	 
        
	
	   $rspta=$venta->listarDetalle($id);
	   $total=0;
	  
		echo ' 
		
		<thead style="background-color:#A9D0F5">
        <th></th>
        <th>Servicios</th>
        <th>Precio Servicios</th>
        <th>Descuento</th>
        <th>Subtotal</th>
       </thead>';
		while ($reg=$rspta->fetch_object()) {
			echo '<tr class="filas">
			<td></td>
			<td>'.$reg->nombre.'</td>
			
			<td>'.$reg->precio.'</td>
			<td>'.$reg->descuento.'</td>
			<td>'.$reg->subtotal.'</td></tr>';
			$total=$total+($reg->precio-$reg->descuento);
		}
		echo '<tfoot>
         <th>TOTAL</th>
         <th></th>
         
         <th></th>
         <th></th>
         <th><h4 id="total"> $. '.$total.'</h4><input type="hidden" name="total" id="total"></th>
	   </tfoot>';
			break;







	case 'listarDetalle':
	

		$id=$_GET['id'];

		
		$rspta=$venta->listarDetalle($id);
		$total=0;

		echo ' 
		
		
		<thead style="background-color:#A9D0F5">
        <th>Opciones</th>
        <th>Servicios</th>
        <th></th>
        <th>Precio Servicios</th>
        <th>Descuento</th>
        <th>Subtotal</th>
       </thead>';
		while ($reg=$rspta->fetch_object()) {
			echo '<tr class="filas">
			<td></td>
			<td>'.$reg->nombre.'</td>
			<td>'.$reg->cantidad.'</td>
			<td>'.$reg->precio.'</td>
			<td>'.$reg->descuento.'</td>
			<td>'.$reg->subtotal.'</td></tr>';
			$total=$total+($reg->precio-$reg->descuento);
		}
		echo '<tfoot>
         <th>TOTAL</th>
         <th></th>
         <th></th>
         <th></th>
         <th></th>
         <th><h4 id="total"> $. '.$total.'</h4><input type="hidden" name="total" id="total"></th>
	   </tfoot>';
	   
	 
	 
	   
		break;


    case 'listar':
		$rspta=$venta->listar();
		$data=Array();

		while ($reg=$rspta->fetch_object()) {
                

			$data[]=array(
            "0"=>'<button class="btn btn-warning " onclick="mostrar('.$reg->id_atender.')"><i class="fa fa-eye"></i></button>' ,
            "1"=>$reg->propietario,
            "2"=>$reg->mascota,
            "3"=>$reg->motivo,
            "4"=>$reg->fecha. ' - '.$reg->hora ,
			
            "5"=>$reg->total
              );
		}
		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);
		break;

		case 'select':
			require_once "../modelos/Cita.php";
			$persona = new Cita();

			$rspta = $persona->select();

			while ($reg = $rspta->fetch_object()) {
				echo '<option value='.$reg->id_cita.'>'.$reg->propietario.'-'.$reg->mascota.'</option>';
			}
			break;

}
 ?>