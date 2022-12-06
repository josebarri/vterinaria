<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Venta{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar registro

//implementar un metodopara mostrar los datos de unregistro a modificar
public function mostrar($atender){
	$sql = "SELECT atender.id_atender, cita.id_cita, DATE(atender.fecha) as fecha,  atender.peso FROM atender, cita WHERE atender.id_cita = cita.id_cita  AND atender.id_atender='$atender'";
	return ejecutarConsulta($sql);
}


public function mostrarHistorial($atender){
	$sql = "SELECT atender.id_atender, mascota.nombre as mascota, propietario.nombre as propietario, cita.motivo, cita.fecha, cita.hora,atender.peso, atender.total FROM mascota,propietario,cita,atender WHERE propietario.id_propietario=mascota.id_propietario AND mascota.id_mascota= cita.id_mascota AND atender.id_cita=cita.id_cita AND atender.id_atender='$atender'";
	return ejecutarConsulta($sql);
}
public function listarDetalle($atender){
	$sql = "SELECT detalle.id_atender, detalle.id_servicio, servicio.nombre, detalle.precio, detalle.descuento,(detalle.precio - detalle.descuento) as subtotal FROM detalle INNER JOIN servicio ON detalle.id_servicio = servicio.id_servicio WHERE detalle.id_atender='$atender'";
	return ejecutarConsulta($sql);
}




//listar registros
public function listar(){
$sql = "SELECT atender.id_atender, mascota.nombre as mascota, propietario.nombre as propietario, cita.motivo, cita.fecha, cita.hora,atender.peso, atender.total FROM mascota,propietario,cita,atender WHERE propietario.id_propietario=mascota.id_propietario AND mascota.id_mascota= cita.id_mascota AND atender.id_cita=cita.id_cita";
	return ejecutarConsulta($sql);
}

public function totalventahoy(){
	$sql="SELECT IFNULL(SUM(total),0) as total_venta FROM atender WHERE DATE(fecha)=curdate()";
	return ejecutarConsulta($sql);
}


}

 ?>
