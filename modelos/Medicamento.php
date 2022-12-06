<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Medicamento{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar regiustro
public function insertar($nombre,$descripcion,$precio,$fechaV){
	$sql="INSERT INTO medicamento (nombre,descripcion,precio,fechaV, estado)
	 VALUES ('$nombre','$descripcion','$precio','$fechaV','1')";
	return ejecutarConsulta($sql);
}

public function editar($idmedicamento,$nombre,$descripcion,$precio,$fechaV){
	$sql="UPDATE medicamento SET  nombre='$nombre',descripcion='$descripcion',precio='$precio' ,fechaV='$fechaV' 
	WHERE id_medicamento='$idmedicamento'";
	return ejecutarConsulta($sql);
}
public function desactivar($idmedicamento){
	$sql="UPDATE medicamento SET estado='0' WHERE id_medicamento='$idmedicamento'";
	return ejecutarConsulta($sql);
}
public function activar($idmedicamento){
	$sql="UPDATE medicamento SET estado='1' WHERE id_medicamento='$idmedicamento'";
	return ejecutarConsulta($sql);
}

//metodo para mostrar registros
public function mostrar($idmedicamento){
	$sql="SELECT * FROM medicamento WHERE id_medicamento='$idmedicamento'";
	return ejecutarConsultaSimpleFila($sql);
}

//listar registros 
public function listar(){
	$sql="SELECT * FROM medicamento"; 
	return ejecutarConsulta($sql);
}

//listar registros activos
public function listarActivos(){
	$sql="SELECT * from medicamento SET estado='1' WHERE id_servicio='$idservicio'";
	return ejecutarConsulta($sql);
}

//implementar un metodo para listar los activos, su ultimo precio y el stock(vamos a unir con el ultimo registro de la tabla detalle_ingreso)
public function listarActivosVenta(){
	$sql="SELECT * from medicamento SET estado='0' WHERE id_servicio='$idservicio'";
	return ejecutarConsulta($sql);
}
}
 ?>
