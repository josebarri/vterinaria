var tabla;

//funcion que se ejecuta al inicio
function init(){
   mostrarform(false);
   listar();

   $("#formulario").on("submit",function(e){
   	guardaryeditar(e);
   })
  
   //cargamos los items al celect categoria
   $.post("../ajax/cita.php?op=selectMascota", function(r){
   	$("#id_mascota").html(r);
   	$("#id_mascota").selectpicker('refresh');
   });
  


}

//funcion limpiar
function limpiar(){

	$("#motivo").val("");
	$("#fecha").val("");
	$("#hora").val("");
	$("#estado").val("");
	$("#id_cita").val("");
}

//funcion mostrar formulario
function mostrarform(flag){
	limpiar();
	if(flag){
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
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
			url:'../ajax/cita.php?op=listar',
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
//funcion para guardaryeditar
function guardaryeditar(e){
     e.preventDefault();//no se activara la accion predeterminada 
     $("#btnGuardar").prop("disabled",true);
     var formData=new FormData($("#formulario")[0]);

     $.ajax({
     	url: "../ajax/cita.php?op=guardaryeditar",
     	type: "POST",
     	data: formData,
     	contentType: false,
     	processData: false,

     	success: function(datos){
     		bootbox.alert(datos);
     		mostrarform(false);
     		tabla.ajax.reload();
     	}
     });

     limpiar();
}

function mostrar(id_cita){
	$.post("../ajax/cita.php?op=mostrar",{id_cita : id_cita},
		function(data,status)
		{
			data=JSON.parse(data);
			mostrarform(true);
			
			$("#id_mascota").val(data.id_mascota);
			$("#id_mascota").selectpicker('refresh');
			$("#motivo").val(data.motivo);
			$("#fecha").val(data.fecha);
			$("#hora").val(data.hora);
			$("#estado").val(data.estado);
			$("#id_cita").val(data.id_cita);
				
		})
}


function eliminar(id_cita){
	bootbox.confirm("¿Esta seguro de eliminar este dato?", function(result){
		if (result) {

			$.post("../ajax/cita.php?op=eliminar", {id_cita : id_cita }, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

init();