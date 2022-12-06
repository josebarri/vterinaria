<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Mascota{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar regiustro
public function insertar($idpropietario,$nombre,$fecha,$edad,$sexo,$especie, $raza, $color){
	$sql="INSERT INTO mascota (id_propietario,nombre,fecha,edad,sexo,especie,raza, color)
	 VALUES ('$idpropietario','$nombre','$fecha','$edad','$sexo','$especie','$raza','$color')";
	return ejecutarConsulta($sql);
}

public function editar($idmascota,$idpropietario,$nombre,$fecha,$edad,$sexo,$especie, $raza, $color){
$sql="UPDATE mascota SET id_propietario='$idpropietario', nombre='$nombre', fecha='$fecha',edad='$edad',sexo='$sexo', especie='$especie', raza='$raza', color='$color'
	WHERE id_mascota='$idmascota'";
	return ejecutarConsulta($sql);
}

public function eliminar($idmascota){
	$sql="DELETE FROM mascota WHERE id_mascota='$idmascota'";
	return ejecutarConsulta($sql);
}
//metodo para mostrar registros
public function mostrar($idmascota){
	$sql="SELECT * FROM mascota WHERE id_mascota='$idmascota'";
	return ejecutarConsultaSimpleFila($sql);
}

//listar registros 
public function listar(){ 
	$sql="SELECT m.id_mascota,m.id_propietario, p.nombre as propietario, m.nombre, m.fecha, m.edad, m.sexo, m.especie, m.raza, m.color FROM mascota m INNER JOIN propietario p ON m.id_propietario = p.id_propietario";
	return ejecutarConsulta($sql);
}

//listar registros activos
public function listarActivos(){
	
	return ejecutarConsulta($sql);
}

//implementar un metodo para listar los activos, su ultimo precio y el stock(vamos a unir con el ultimo registro de la tabla detalle_ingreso)
public function listarActivosVenta(){
	$sql="SELECT a.idarticulo,a.idcategoria,c.nombre as categoria,a.codigo, a.nombre,a.stock,(SELECT precio_venta FROM detalle_ingreso WHERE idarticulo=a.idarticulo ORDER BY iddetalle_ingreso DESC LIMIT 0,1) AS precio_venta,a.descripcion,a.imagen,a.condicion FROM articulo a INNER JOIN Categoria c ON a.idcategoria=c.idcategoria WHERE a.condicion='1'";
	return ejecutarConsulta($sql);
}

public function select(){
	$sql="SELECT mascota.id_mascota,  propietario.nombre as propietario, mascota.nombre FROM propietario, mascota WHERE propietario.id_propietario= mascota.id_propietario";
	return ejecutarConsulta($sql);
}

public function selectMascota(){
	
	return ejecutarConsulta($sql);
}


}
 ?>
