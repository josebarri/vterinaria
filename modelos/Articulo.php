<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Articulo{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar regiustro
public function insertar($codigo,$nombre,$stock,$precio,$descripcion,$imagen){
	$sql="INSERT INTO articulo (codigo,nombre,stock,precio,descripcion,imagen,condicion)
	 VALUES ('$codigo','$nombre','$stock','$precio','$descripcion','$imagen','1')";
	return ejecutarConsulta($sql);
}

public function editar($idarticulo,$codigo,$nombre,$stock,$precio,$descripcion,$imagen){
	$sql="UPDATE articulo SET codigo='$codigo', nombre='$nombre',stock='$stock',precio='$precio',descripcion='$descripcion',imagen='$imagen' 
	WHERE idarticulo='$idarticulo'";
	return ejecutarConsulta($sql);
}
public function desactivar($idarticulo){
	$sql="UPDATE articulo SET condicion='0' WHERE idarticulo='$idarticulo'";
	return ejecutarConsulta($sql);
}
public function activar($idarticulo){
	$sql="UPDATE articulo SET condicion='1' WHERE idarticulo='$idarticulo'";
	return ejecutarConsulta($sql);
}

//metodo para mostrar registros
public function mostrar($idarticulo){
	$sql="SELECT * FROM articulo WHERE idarticulo='$idarticulo'";
	return ejecutarConsultaSimpleFila($sql);
}

//listar registros 
public function listar(){
	$sql="SELECT articulo.idarticulo, articulo.codigo, articulo.nombre, articulo.descripcion, articulo.stock, articulo.precio, articulo.imagen, articulo.condicion FROM articulo";
	return ejecutarConsulta($sql);
}

//listar registros activos
public function listarActivos(){
	$sql="SELECT * FROM articulo WHERE a.condicion='1'";
	return ejecutarConsulta($sql);
}

//implementar un metodo para listar los activos, su ultimo precio y el stock(vamos a unir con el ultimo registro de la tabla detalle_ingreso)
public function listarActivosVenta(){
	$sql="SELECT *  from articulo WHERE condicion=1";
	return ejecutarConsulta($sql);
}
}
 ?>
