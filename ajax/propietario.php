<?php 
require_once "../modelos/Propietario.php";

$persona=new Propietario();

$idpropietario=isset($_POST["id_propietario"])? limpiarCadena($_POST["id_propietario"]):"";
$num_documento=isset($_POST["num_documento"])? limpiarCadena($_POST["num_documento"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$telefono=isset($_POST["telefono"])? limpiarCadena($_POST["telefono"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$email=isset($_POST["email"])? limpiarCadena($_POST["email"]):"";

switch ($_GET["op"]) {
	case 'guardaryeditar':
		if (empty($idpropietario)) {
			$rspta=$persona->insertar($num_documento,$nombre,$telefono,$direccion,$email);
			echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
		}else{
			 $rspta=$persona->editar($idpropietario,$num_documento,$nombre,$telefono,$direccion,$email);
			echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
		}
			break;
	

	case 'eliminar':
		$rspta=$persona->eliminar($idpropietario);
		echo $rspta ? "Datos eliminados correctamente" : "No se pudo eliminar los datos";
		break;
	
	case 'mostrar':
		$rspta=$persona->mostrar($idpropietario);
		echo json_encode($rspta);
		break;

    case 'listarp':
		$rspta=$persona->listarp();
		$data=Array();

		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
            "0"=>'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->id_propietario.')"><i class="fa fa-pencil"></i></button>'.' '.'<button class="btn btn-danger btn-xs" onclick="eliminar('.$reg->id_.')"><i class="fa fa-trash"></i></button>',
            "1"=>$reg->nombre,
            "2"=>$reg->tipo_documento,
            "3"=>$reg->num_documento,
            "4"=>$reg->telefono,
            "5"=>$reg->email
              );
		}
		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);
		break;

		  case 'listarc':
		$rspta=$persona->listarc();
		$data=Array();

		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
				"0"=>'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->id_propietario.')"><i class="fa fa-pencil"></i></button>'.' '.'<button class="btn btn-danger btn-xs" onclick="AlertarEliminacion('.$reg->id_propietario.')"><i class="fa fa-trash"></i></button>',
            "1"=>$reg->num_documento,
            "2"=>$reg->nombre,
            "3"=>$reg->telefono,
            "4"=>$reg->direccion,
            "5"=>$reg->email
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