<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Propietario{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar regiustro
public function insertar($num_documento,$nombre,$telefono,$direccion,$email){
	$sql="INSERT INTO propietario (num_documento,nombre,telefono,direccion,email) VALUES 
    ('$num_documento','$nombre','$telefono','$direccion','$email')";
	return ejecutarConsulta($sql);
}



public function editar($idpropietario,$num_documento,$nombre,$telefono,$direccion,$email){
	$sql="UPDATE propietario SET num_documento='$num_documento', nombre='$nombre',telefono='$telefono',direccion='$direccion',email='$email' 
	WHERE id_propietario='$idpropietario'";
	return ejecutarConsulta($sql);
}
//funcion para eliminar datos
public function eliminar($idpropietario){
	$sql="DELETE FROM propietario WHERE id_propietario='$idpropietario'";
	return ejecutarConsulta($sql);
}

//metodo para mostrar registros
public function mostrar($idpropietario){
	$sql="SELECT * FROM propietario WHERE id_propietario='$idpropietario'";
	return ejecutarConsultaSimpleFila($sql);
}

//listar registros

public function listarc(){
	$sql="SELECT * FROM propietario ";
	return ejecutarConsulta($sql);
}


public function select(){
	$sql="SELECT * FROM propietario ";
	return ejecutarConsulta($sql);
}
}

 ?>
