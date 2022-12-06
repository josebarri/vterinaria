<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class AtenderCita{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar registro
public function insertar($idcita,$fecha,$peso,$total_venta,$idservicio,$precio_venta,$descuento){
	$sql="INSERT INTO atender (id_cita,fecha,peso,total) VALUES ('$idcita','$fecha','$peso','$total_venta')";
	//return ejecutarConsulta($sql);
	 $idatendernew=ejecutarConsulta_retornarID($sql);
	 $num_elementos=0;
	 $sw=true;
	 while ($num_elementos < count($idservicio)) {

	 	$sql_detalle="INSERT INTO detalle (id_atender,id_servicio,precio,descuento) VALUES('$idatendernew','$idservicio[$num_elementos]','$precio_venta[$num_elementos]','$descuento[$num_elementos]')";

	 	ejecutarConsulta($sql_detalle) or $sw=false;

	 	$num_elementos=$num_elementos+1;
	 }
	 if($sw){
		$sql_detalle="UPDATE cita INNER JOIN atender ON atender.id_cita =cita.id_cita SET cita.estado=0 WHERE cita.id_cita=".$idcita ;
		ejecutarConsulta($sql_detalle) or $sw=false;

	}

	
	 return $sw;
}

public function anular($idcita){
	$sql="UPDATE cita INNER JOIN atender ON atender.id_cita =cita.id_cita SET cita.estado=0 WHERE cita.id_cita='$idcita'";
	return ejecutarConsulta($sql);
}

public function desactivar(){
	$sql="UPDATE cita INNER JOIN atender ON atender.id_cita =cita.id_cita SET cita.estado=0 WHERE cita.id_cita= atender.id_cita";
	return ejecutarConsulta($sql);
}


//listar registros



}

 ?>
