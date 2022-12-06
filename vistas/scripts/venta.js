var tabla;


//funcion que se ejecuta al inicio
function init(){
   mostrarform(false);
   listar();

  
   //cargamos los items al select cliente
 
   $.post("../ajax/venta.php?op=select", function(r){
	$("#id_cita").html(r);
	$('#id_cita').selectpicker('refresh');
});
}

//funcion limpiar
function limpiar(){

	$("#peso").val("")
	$("#total").val("");
	$(".filas").remove();
	$("#totales").html("0");

	//obtenemos la fecha actual
	var now = new Date();
	var day =("0"+now.getDate()).slice(-2);
	var month=("0"+(now.getMonth()+1)).slice(-2);
	var today=now.getFullYear()+"-"+(month)+"-"+(day);
	$("#fecha").val(today);

	

}

//funcion mostrar formulario
function mostrarform(flag){
	limpiar();
	if(flag){
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		//$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
		listarArticulos();

		$("#btnGuardar").hide();
		$("#btnCancelar").show();
		detalles=0;
		$("#btnAgregarArt").show();


	}else{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

//cancelar form
function cancelarform(){
	limpiar();
	mostrarform(false);
}

//funcion listar
function listar(){
	tabla=$('#tbllistado').dataTable({
		"aProcessing": true,//activamos el procedimiento del datatable
		"aServerSide": true,//paginacion y filrado realizados por el server
		dom: 'Bfrtip',//definimos los elementos del control de la tabla
		buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdf'
		],
		"ajax":
		{
			url:'../ajax/venta.php?op=listar',
			type: "get",
			dataType : "json",
			error:function(e){
				console.log(e.responseText);
			}
		},
		"bDestroy":true,
		"iDisplayLength":5,//paginacion
		"order":[[0,"desc"]]//ordenar (columna, orden)
	}).DataTable();
}



function mostrar(id_atender){
	$.post("../ajax/venta.php?op=mostrar",{id_atender : id_atender},
		function(data,status)
		{
			data=JSON.parse(data);
            mostrarform(true);
			
			$("#id_cita").val(data.id_cita);
			$("#id_cita").selectpicker('refresh');
			$("#fecha").val(data.fecha);
			$("#peso").val(data.peso);
			$("#id_atender").val(data.id_atender);
			
			//ocultar y mostrar los botones
			$("#btnGuardar").hide();
			$("#btnCancelar").show();
			$("#btnAgregarArt").hide();
		});

			

	$.post("../ajax/venta.php?op=mostrarHistorial&id="+id_atender,function(r){
		$("#detallito").html(r);
		
	});

}


//funcion para desactivar


init();