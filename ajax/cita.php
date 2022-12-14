<?php
require_once "../modelos/Cita.php";

$cita = new Cita();

$idcita = isset($_POST["id_cita"]) ? limpiarCadena($_POST["id_cita"]) : "";
$idmascota = isset($_POST["id_mascota"]) ? limpiarCadena($_POST["id_mascota"]) : "";
$motivo = isset($_POST["motivo"]) ? limpiarCadena($_POST["motivo"]) : "";
$fecha = isset($_POST["fecha"]) ? limpiarCadena($_POST["fecha"]) : "";
$hora = isset($_POST["hora"]) ? limpiarCadena($_POST["hora"]) : "";

switch ($_GET["op"]) {
	case 'guardaryeditar':

		if (empty($idcita)) {
			$rspta = $cita->insertar($idmascota, $motivo, $fecha, $hora);
			echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
		} else {
			$rspta = $cita->editar($idcita, $idmascota, $motivo, $fecha, $hora);
			echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
		}
		break;

	case 'mostrar':
		$rspta = $cita->mostrar($idcita);
		echo json_encode($rspta);
		break;

	case 'atender':
		$rspta = $cita->atender($idcita);
		echo json_encode($rspta);

		break;

	case 'desactivar':
		$rspta = $servicio->desactivar();

		break;
	case 'eliminar':
		$rspta = $cita->eliminar($idcita);
		echo $rspta ? "Datos eliminados correctamente" : "No se pudo eliminar los datos";
		break;


	case 'selectMascota':
		require_once "../modelos/Mascota.php";
		$mascota = new Mascota();

		$rspta = $mascota->select();

		echo '<option value="">seleccione</option>';
		while ($reg = $rspta->fetch_object()) {
			echo '<option value=' . $reg->id_mascota . '>' . $reg->propietario . ' - ' . $reg->nombre . '</option>';
		}
		break;

	case 'listar':
		$rspta = $cita->listar();
		$data = array();

		while ($reg = $rspta->fetch_object()) {
			$data[] = array(
				"0" =>   '<button class="btn btn-warning btn-xs" onclick="mostrar(' . $reg->id_cita . ')"><i class="fa fa-pencil"></i></button>' . ' ' . '<button class="btn btn-danger btn-xs" onclick="AlertarEliminacion(' . $reg->id_cita . ')"><i class="fa fa-trash"></i></button>' . ' '   .           '<a href="../vistas/atendercita.php?id_cita=(' . $reg->id_cita . ')  "class="btn btn-primary btn-xs">  <i class="fa fa-wrench"></i> </a> ',
				"1" => $reg->propietario,
				"2" => $reg->mascota,
				"3" => $reg->motivo,
				"4" => $reg->fecha,
				"5" => $reg->hora,
				"6" => ($reg->estado) ? '<span class="label bg-blue">Pendiente</span>' : '<span class="label bg-green">Atendido</span>'

			);
		}
		$results = array(
			"sEcho" => 1, //info para datatables
			"iTotalRecords" => count($data), //enviamos el total de registros al datatable
			"iTotalDisplayRecords" => count($data), //enviamos el total de registros a visualizar
			"aaData" => $data
		);
		echo json_encode($results);
		break;
}
