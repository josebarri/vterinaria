<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Servicio{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar regiustro
public function insertar($nombre,$descripcion,$precio){
	$sql="INSERT INTO servicio (nombre,descripcion,precio,condicion)
	 VALUES ('$nombre','$descripcion','$precio','1')";
	return ejecutarConsulta($sql);
}

public function editar($idservicio,$nombre,$descripcion,$precio){
	$sql="UPDATE servicio SET  nombre='$nombre',descripcion='$descripcion',precio='$precio' 
	WHERE id_servicio='$idservicio'";
	return ejecutarConsulta($sql);
}
public function desactivar($idservicio){
	$sql="UPDATE servicio SET condicion='0' WHERE id_servicio='$idservicio'";
	return ejecutarConsulta($sql);
}
public function activar($idservicio){
	$sql="UPDATE servicio SET condicion='1' WHERE id_servicio='$idservicio'";
	return ejecutarConsulta($sql);
}

//metodo para mostrar registros
public function mostrar($idservicio){
	$sql="SELECT * FROM servicio WHERE id_servicio='$idservicio'";
	return ejecutarConsultaSimpleFila($sql);
}

//listar registros 
public function listar(){
	$sql="SELECT * FROM servicio"; 
	return ejecutarConsulta($sql);
}

//listar registros activos
public function listarActivos(){
	$sql="SELECT * from servicio SET condicion='1' WHERE id_servicio='$idservicio'";
	return ejecutarConsulta($sql);
}

//implementar un metodo para listar los activos, su ultimo precio y el stock(vamos a unir con el ultimo registro de la tabla detalle_ingreso)
public function listarServiciosActivos(){
	$sql="SELECT id_servicio, nombre, descripcion, precio,condicion from servicio where condicion = 1";
	return ejecutarConsulta($sql);
}
}
 ?>
