var tabla;

//funcion que se ejecuta al inicio
function init(){
   mostrarform(false);
   listar();

   $("#formulario").on("submit",function(e){
   	guardaryeditar(e);
   })
  
   //cargamos los items al celect categoria
   $.post("../ajax/vacuna.php?op=selectMascota", function(r){
   	$("#id_mascota").html(r);
   	$("#id_mascota").selectpicker('refresh');
   });
  


}

//funcion limpiar
function limpiar(){


	$("#fecha").val("");
	$("#desparasitante").val("");
	$("#dosis").val("");
	$("#id_mascota").val("");
}

//funcion mostrar formulario
function mostrarform(flag){
	limpiar();
	if(flag){
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnGuardar").prop("disabled",false);
	
	}else{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
	
	}
}

//cancelar form
function cancelarform(){
	limpiar();
	mostrarform(false);
}


//funcion listar
function listar(id_mascota){
	tabla=$('#tbllistado').dataTable({
		
		"aServerSide": true,//paginacion y filrado realizados por el server
		dom: 'Bfrtip',//definimos los elementos del control de la tabla
		
		"ajax":
		{
			url:'../ajax/vacuna.php?op=listar',
			type: "get",
			dataType : "json",
			error:function(e){
				console.log(e.responseText);
			}
		},
		"bDestroy":true,
		"iDisplayLength":10,//paginacion
		"order":[[0,"desc"]]//ordenar (columna, orden)
	}).DataTable();
}
//funcion para guardaryeditar
function guardaryeditar(e){
     e.preventDefault();//no se activara la accion predeterminada 
     $("#btnGuardar").prop("disabled",true);
     var formData=new FormData($("#formulario")[0]);

     $.ajax({
     	url: "../ajax/vacuna.php?op=guardaryeditar",
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

function mostrar(id_mascota){
	$.post("../ajax/vacuna.php?op=mostrar",{id_mascota : id_mascota},
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
					//ocultar y mostrar los botones
		
		});

		$.post("../ajax/vacuna.php?op=listarDetalle&id="+id_mascota,function(r){
			$("#detallito").html(r);
		});
		$.post("../ajax/vacuna.php?op=mostrarHistorial&id="+id_mascota,function(r){
			$("#detalles").html(r);
		});
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