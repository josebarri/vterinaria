<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";

class Cita{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar regiustro
public function insertar($idmascota,$motivo,$fecha,$hora){
	$sql="INSERT INTO cita (id_mascota,motivo,fecha,hora,estado)
	 VALUES ('$idmascota','$motivo','$fecha','$hora','1')";
	return ejecutarConsulta($sql);
}

public function editar($idcita,$idmascota,$motivo,$fecha,$hora){
	$sql="UPDATE cita SET id_mascota='$idmascota',motivo='$motivo', fecha='$fecha',hora='$hora'
	WHERE  estado= 1 and  id_cita='$idcita'";
	return ejecutarConsulta($sql);
}
public function eliminar($idcita){
	$sql="DELETE FROM cita WHERE id_cita='$idcita'";
	return ejecutarConsulta($sql);
}
//metodo para mostrar registros
public function mostrar($idcita){
	$sql="SELECT * FROM cita WHERE id_cita='$idcita'";
	return ejecutarConsultaSimpleFila($sql);
}

public function desactivar($idcita){
	$sql="UPDATE cita INNER JOIN atender ON atender.id_cita =cita.id_cita SET cita.estado=0 WHERE cita.id_cita='$idcita'";
	return ejecutarConsulta($sql);
}

//listar registros 
public function listar(){ 
	$sql = "SELECT cita.id_cita, propietario.nombre as propietario, mascota.nombre as mascota, cita.motivo,cita.fecha, cita.hora,cita.estado FROM propietario,mascota,cita WHERE propietario.id_propietario= mascota.id_propietario AND mascota.id_mascota=cita.id_mascota";
	return ejecutarConsulta($sql);
}


public function select(){
	$sql="SELECT cita.id_cita, propietario.nombre as propietario, mascota.nombre as mascota FROM cita, mascota, propietario WHERE cita.id_mascota= mascota.id_mascota and mascota.id_propietario = propietario.id_propietario";
	return ejecutarConsulta($sql);
}

//listar registros activos


//implementar un metodo para listar los activos, su ultimo precio y el stock(vamos a unir con el ultimo registro de la tabla detalle_ingreso)

}
 ?>
