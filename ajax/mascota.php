<?php 
require_once "../modelos/Mascota.php";

$mascota=new Mascota();

$idmascota=isset($_POST["id_mascota"])? limpiarCadena($_POST["id_mascota"]):"";
$idpropietario=isset($_POST["id_propietario"])? limpiarCadena($_POST["id_propietario"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$fecha=isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]):"";
$edad=isset($_POST["edad"])? limpiarCadena($_POST["edad"]):"";
$sexo=isset($_POST["sexo"])? limpiarCadena($_POST["sexo"]):"";
$especie=isset($_POST["especie"])? limpiarCadena($_POST["especie"]):"";
$raza=isset($_POST["raza"])? limpiarCadena($_POST["raza"]):"";
$color=isset($_POST["color"])? limpiarCadena($_POST["color"]):"";
switch ($_GET["op"]) {
	case 'guardaryeditar':

	if (empty($idmascota)) {
		$rspta=$mascota->insertar($idpropietario,$nombre,$fecha,$edad,$sexo,$especie, $raza, $color);
		echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
	}else{
         $rspta=$mascota->editar($idmascota,$idpropietario,$nombre,$fecha,$edad,$sexo,$especie, $raza,$color) ;
		echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
	}
		break;
	
	case 'mostrar':
		$rspta=$mascota->mostrar($idmascota);
		echo json_encode($rspta);
		break;
		
		case 'eliminar':
			$rspta=$mascota->eliminar($idmascota);
			echo $rspta ? "Datos eliminados correctamente" : "No se pudo eliminar los datos";
			break; 


			case 'selectCategoria':
				require_once "../modelos/Propietario.php";
				$propietario=new Propietario();
	
				$rspta=$propietario->select();
	
				while ($reg=$rspta->fetch_object()) {
					echo '<option value=' . $reg->id_propietario.'>'.$reg->num_documento.' - ' .$reg->nombre.'</option>';
				}
				break;

    case 'listar':
		$rspta=$mascota->listar();
		$data=Array();

		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
            "0"=>'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->id_mascota.')"><i class="fa fa-pencil"></i></button>'.' '.'<button class="btn btn-danger btn-xs" onclick="eliminar('.$reg->id_mascota.')"><i class="fa fa-trash"></i></button>'  ,
            "1"=>$reg->propietario,
            "2"=>$reg->nombre,
            "3"=>$reg->fecha,
            "4"=>$reg->edad,
            "5"=>$reg->sexo,
            "6"=>$reg->especie,
            "7"=>$reg->raza,
            "8"=>$reg->color
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