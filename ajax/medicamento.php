<?php 
require_once "../modelos/Medicamento.php";

$medicamento=new Medicamento();

$idmedicamento=isset($_POST["id_medicamento"])? limpiarCadena($_POST["id_medicamento"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$precio=isset($_POST["precio"])? limpiarCadena($_POST["precio"]):"";
$fechav=isset($_POST["fechaV"])? limpiarCadena($_POST["fechaV"]):"";

switch ($_GET["op"]) {
	case 'guardaryeditar':
	if (empty($idmedicamento)) {
		$rspta=$medicamento->insertar($nombre,$descripcion,$precio,$fechav);
		echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
	}else{
         $rspta=$medicamento->editar($idmedicamento,$nombre,$descripcion,$precio,$fechav);
		echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
	}
		break;
	

	case 'desactivar':
		$rspta=$medicamento->desactivar($idmedicamento);
		echo $rspta ? "Datos desactivados correctamente" : "No se pudo desactivar los datos";
		break;
	case 'activar':
		$rspta=$medicamento->activar($idmedicamento);
		echo $rspta ? "Datos activados correctamente" : "No se pudo activar los datos";
		break;
	
	case 'mostrar':
		$rspta=$medicamento->mostrar($idmedicamento);
		echo json_encode($rspta);
		break;

    case 'listar':
		$rspta=$medicamento->listar();
		$data=Array();

		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
            "0"=>($reg->estado)?'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->id_medicamento.')"><i class="fa fa-pencil"></i></button>'.' '.'<button class="btn btn-danger btn-xs" onclick="desactivar('.$reg->id_medicamento.')"><i class="fa fa-close"></i></button>':'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->id_medicamento.')"><i class="fa fa-pencil"></i></button>'.' '.'<button class="btn btn-primary btn-xs" onclick="activar('.$reg->id_medicamento.')"><i class="fa fa-check"></i></button>',
            "1"=>$reg->nombre,
            "2"=>$reg->descripcion,
			"3"=>$reg->precio,
			"4"=>$reg->fechaV,
            "5"=>($reg->estado)?'<span class="label bg-green">Activado</span>':'<span class="label bg-red">Desactivado</span>'
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