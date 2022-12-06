<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Vacuna{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar registro
public function insertar($idmascota,$fecha,$desparasitante,$dosis){
	$sql="INSERT INTO vacuna (id_mascota,fecha,desparasitante,dosis)
	 VALUES ('$idmascota','$fecha','$desparasitante','$dosis')";
	return ejecutarConsulta($sql);

}
//implementar un metodopara mostrar los datos de unregistro a modificar
public function mostrar($idmascota){
	$sql = "SELECT mascota.id_mascota, mascota.nombre, propietario.nombre as propietario FROM  mascota, propietario WHERE mascota.id_propietario=propietario.id_propietario AND mascota.id_mascota=" ;
	return ejecutarConsulta($sql);
}


public function mostrarHistorial($idmascota){
	$sql = "SELECT mascota.id_mascota, propietario.nombre as propietario, mascota.nombre as mascota, mascota.fecha, mascota.sexo, mascota.especie, mascota.raza FROM propietario,mascota WHERE mascota.id_propietario= propietario.id_propietario AND mascota.id_mascota='$idmascota'";
	return ejecutarConsulta($sql);
}
public function listarDetalle($idmascota){
	$sql = "SELECT vacuna.id, vacuna.fecha, vacuna.desparasitante, vacuna.dosis FROM vacuna INNER JOIN mascota ON vacuna.id_mascota= mascota.id_mascota WHERE mascota.id_mascota= '$idmascota'";
	return ejecutarConsulta($sql);
}




//listar registros
public function listar(){
    $sql = "SELECT  mascota.id_mascota, propietario.nombre as propietario, mascota.nombre as mascota, mascota.fecha, mascota.sexo, mascota.especie, mascota.raza FROM propietario,mascota WHERE mascota.id_propietario= propietario.id_propietario";
	return ejecutarConsulta($sql);
}

public function totalventahoy(){
	$sql="SELECT IFNULL(SUM(total),0) as total_venta FROM atender WHERE DATE(fecha)=curdate()";
	return ejecutarConsulta($sql);
}


}

 ?>
