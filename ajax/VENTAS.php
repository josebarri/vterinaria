<?php 
require_once "../modelos/VENTAS.php";
if (strlen(session_id())<1) 
	session_start();

$venta = new VENTAS();

$idventa=isset($_POST["idventa"])? limpiarCadena($_POST["idventa"]):"";
$idcliente=isset($_POST["id_propietario"])? limpiarCadena($_POST["id_propietario"]):"";

$fecha_hora=isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]):"";

$total_venta=isset($_POST["total_venta"])? limpiarCadena($_POST["total_venta"]):"";





switch ($_GET["op"]) {
	case 'guardaryeditar':
	if (empty($idventa)) {
		$rspta=$venta->insertar($idcliente,$fecha_hora,$total_venta,$_POST["idarticulo"],$_POST["cantidad"],$_POST["precio"],$_POST["descuento"]); 
		echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
	}else{
        
	}
		break;
	

	case 'anular':
		$rspta=$venta->anular($idventa);
		echo $rspta ? "Ingreso anulado correctamente" : "No se pudo anular el ingreso";
		break;
	


	case 'mostrar':
		$rspta=$venta->mostrar($idventa);
		echo json_encode($rspta);
		break;



	case 'listarDetalles':
		//recibimos el idventa
		$id=$_GET['id'];

		$rspta=$venta->listarDetalles($id);
		$total=0;
		echo ' <thead style="background-color:#A9D0F5">
        <th>Opciones</th>
        <th>Articulo</th>
        <th>Cantidad</th>
        <th>Precio Venta</th>
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
			$total=$total+($reg->precio*$reg->cantidad-$reg->descuento);
		}
		echo '<tfoot>
         <th>TOTAL</th>
         <th></th>
         <th></th>
         <th></th>
         <th></th>
         <th><h4 id="total">$. '.$total.'</h4><input type="hidden" name="total_venta" id="total_venta"></th>
       </tfoot>';
		break;



		case 'listar':
			$rspta=$venta->listar();
			$data=Array();
	
			while ($reg=$rspta->fetch_object()) {
					
	
				$data[]=array(
				"0"=>(($reg->estado=='Aceptado')?'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idventa.')"><i class="fa fa-eye"></i></button>'.' '.'<button class="btn btn-danger btn-xs" onclick="anular('.$reg->idventa.')"><i class="fa fa-close"></i></button>':'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idventa.')"><i class="fa fa-eye"></i></button>'),
				"1"=>$reg->num_documento,
				"2"=>$reg->propietario,
				"3"=>$reg->fecha,
				"4"=>$reg->total_venta,
				"5"=>($reg->estado=='Aceptado')?'<span class="label bg-green">Aceptado</span>':'<span class="label bg-red">Anulado</span>'
            
				  );
			}
			$results=array(
				 "sEcho"=>1,//info para datatables
				 "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
				 "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
				 "aaData"=>$data); 
			echo json_encode($results);
			break;



		case 'selectCliente':
			require_once "../modelos/Propietario.php";
			$propietario=new Propietario();

			$rspta=$propietario->select();

			while ($reg=$rspta->fetch_object()) {
				echo '<option value=' . $reg->id_propietario.'>'.$reg->num_documento.' - ' .$reg->nombre.'</option>';
			}
			break;



			case 'listarArticulos':
			require_once "../modelos/Articulo.php";
			$articulo=new Articulo();

				$rspta=$articulo->listarActivosVenta();
		$data=Array();

		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
            "0"=>'<button class="btn btn-warning" onclick="agregarDetalle('.$reg->idarticulo.',\''.$reg->nombre.'\','.$reg->precio.')"><span class="fa fa-plus"></span></button>',
            "1"=>$reg->codigo,
            "2"=>$reg->nombre,
            "3"=>$reg->stock,
            "4"=>$reg->precio,
            "5"=>"<img src='../files/articulos/".$reg->imagen."' height='50px' width='50px'>"
          
              );
		}
		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);

				break;
}
 ?>