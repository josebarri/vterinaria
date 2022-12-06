<?php 
require_once "../modelos/Vacuna.php";
if (strlen(session_id())<1) 
	session_start();

$venta = new Vacuna();

$id=isset($_POST["id"])? limpiarCadena($_POST["id"]):"";
$idmascota=isset($_POST["id_mascota"])? limpiarCadena($_POST["id_mascota"]):"";
$fecha=isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]):"";

$desparasitante=isset($_POST["desparasitante"])? limpiarCadena($_POST["desparasitante"]):"";
$dosis=isset($_POST["dosis"])? limpiarCadena($_POST["dosis"]):"";





switch ($_GET["op"]) {
	case 'guardaryeditar':
		if (empty($id)) {
			$rspta=$venta->insertar($idmascota,$fecha,$desparasitante,$dosis);
			echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
		}else{
			 $rspta=$cita->editar($idcita,$idmascota,$motivo,$fecha,$hora) ;
			echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
		}
			break;




	case 'mostrar':
		$rspta=$venta->mostrar($idmascota);
		echo json_encode($rspta);
		break;

		


	case 'listarDetalle':
	

		$id=$_GET['id'];

		
		$rspta=$venta->listarDetalle($id);
		$total=0;

		echo ' 
		<thead style="background-color:#A9D0F5">
      
        <th>Fecha</th>
        <th>Desparasitante</th>
        <th>Dosis</th>
     
       </thead>';
		while ($reg=$rspta->fetch_object()) {
			echo '<tr class="filas">
		
			<td>'.$reg->fecha.'</td>
			<td>'.$reg->desparasitante.'</td>
			<td>'.$reg->dosis.'</td></tr>';
			
		}
		echo '<tfoot>
        
        
	   </tfoot>';
	   
	 
	 echo '
	 <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
	 <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i>  Guardar</button>
	 <button class="btn btn-danger" onclick="cancelarform()" type="button" id="btnCancelar"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
   </div>';
	 
	 
	   
		break;

		case 'mostrarHistorial':
			$id=$_GET['id'];

		
			$rspta=$venta->mostrarHistorial($id);
		

		echo ' 
		
		<thead style="background-color:#A9D554">
		
        <th>PROPIETARIO</th>
        <th>MASCOTA</th>
		<th>FECHA NACIMIENTO</th>
		<th>SEXO</th>
		<th>ESPECIE</th>
		<th>RAZA</th>
       </thead>
	   ';
		while ($reg=$rspta->fetch_object()) {
			echo '<tr class="filas">
	
			<td>  '.$reg->propietario.' </td>
			<td>   '.$reg->mascota.'  </td>
			<td>   '.$reg->fecha.' </td>
			<td>  '.$reg->sexo.'<br> </td>
			<td>   '.$reg->especie.' </td>
			<td>  '.$reg->raza.'<br> </td>

			</tr>
			
			';
		}
		
	   
	  
	 
			break;








    case 'listar':
		$rspta=$venta->listar();
		$data=Array();

		while ($reg=$rspta->fetch_object()) {
                

			$data[]=array(
            "0"=>'<button class="btn btn-success btn-xs " onclick="mostrar('.$reg->id_mascota.')"> Carnet de Vacunacion </button>' ,
            "1"=>$reg->propietario,
            "2"=>$reg->mascota,
            "3"=>$reg->fecha,
            "4"=>$reg->sexo,
            "5"=>$reg->especie,
            "6"=>$reg->raza
              );
		}
		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);
		break;




		

		case 'selectMascota':
			require_once "../modelos/Mascota.php";
			$mascota=new Mascota();

			$rspta=$mascota->select();

			while ($reg=$rspta->fetch_object()) {
				echo '<option value=' . $reg->id_mascota.'>'.$reg->propietario.' - '.$reg->nombre.'</option>';
			}
			break;

}
 ?>