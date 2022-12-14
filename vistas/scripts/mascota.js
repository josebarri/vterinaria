var tabla;

//funcion que se ejecuta al inicio
function init(){
   mostrarform(false);
   listar();

   $("#formulario").on("submit",function(e){
   	guardaryeditar(e);
   })
  
   //cargamos los items al celect categoria
   $.post("../ajax/mascota.php?op=selectCategoria", function(r){
   	$("#id_propietario").html(r);
   	$("#id_propietario").selectpicker('refresh');
   });
  


}

//funcion limpiar
function limpiar(){

	$("#nombre").val("");
	$("#fecha").val("");
	$("#edad").val("");
	$("#raza").val("");
	$("#color").val("");
	$("#id_mascota").val("");
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
			url:'../ajax/mascota.php?op=listar',
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
     	url: "../ajax/mascota.php?op=guardaryeditar",
     	type: "POST",
     	data: formData,
     	contentType: false,
     	processData: false,

     	success: function(datos){
     		mostrarform(false);
     		tabla.ajax.reload();
			 Swal.fire({
				position:'top',
				icon: 'success',
				title: 'Tu registro ha sido guardado',
				showConfirmButton: false,
				timer: 1900
			  })
     	}
     });

     limpiar();
}

function mostrar(id_mascota){
	$.post("../ajax/mascota.php?op=mostrar",{id_mascota : id_mascota},
		function(data,status)
		{
			data=JSON.parse(data);
			mostrarform(true);

			$("#id_propietario").val(data.id_propietario);
			$("#id_propietario").selectpicker('refresh');
			$("#nombre").val(data.nombre);
			$("#fecha").val(data.fecha);
			$("#edad").val(data.edad);
			$("#sexo").val(data.sexo);
			$("#sexo").selectpicker('refresh');
			$("#especie").val(data.especie);
			$("#especie").selectpicker('refresh');
			$("#raza").val(data.raza);
			$("#color").val(data.color);
			$("#id_mascota").val(data.id_mascota);
			
		})
}


//alerta de eliminar
function AlertarEliminacion(id_mascota) {
	Swal.fire({
		title: 'Está seguro?',
		text: "¡No podrás revertir esto!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: '¡Sí, bórralo!'
	}).then((result) => {
		if (result.isConfirmed) {
			eliminar(id_mascota);
		}
	})
}

function eliminar(id_mascota){
	    {

			$.post("../ajax/mascota.php?op=eliminar", {id_mascota : id_mascota }, function(e){
				
				tabla.ajax.reload();
				Swal.fire(
					'¡Eliminado!',
					'Su registro ha sido eliminado.',
					'success'
				)
			});
		}
	
}

init();