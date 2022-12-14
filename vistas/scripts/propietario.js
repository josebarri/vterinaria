var tabla;

//funcion que se ejecuta al inicio
function init() {
	mostrarform(false);
	listar();

	$("#formulario").on("submit", function (e) {
		guardaryeditar(e);
	});


}

//funcion limpiar
function limpiar() {

	$("#num_documento").val("");
	$("#nombre").val("");
	$("#telefono").val("");
	$("#direccion").val("");
	$("#email").val("");
	$("#id_propietario").val("");
}

//funcion mostrar formulario 
function mostrarform(flag) {
	limpiar();
	if (flag) {
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#formularioregistros2").show();
		$("#btnGuardar").prop("disabled", false);
		$("#btnagregar").hide();
	} else {
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#formularioregistros2").hide();
		$("#btnagregar").show();
	}
}


function mostrarforMAscota(flag) {
	limpiar();
	if (flag) {

		$("#formularioregistroMascota").show();

		$("#btnGuardar").prop("disabled", false);
		$("#btnagregar").hide();
	} else {

		$("#formularioregistroMascota").hide();
		$("#btnagregar").show();
	}
}

//cancelar form
function cancelarform() {
	limpiar();
	mostrarform(false);
}

//funcion listar
function listar() {
	tabla = $('#tbllistado').dataTable({
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
			url: '../ajax/propietario.php?op=listarc',
			type: "get",
			dataType: "json",
			error: function (e) {
				console.log(e.responseText);
			}
		},
		"bDestroy": true,
		"iDisplayLength": 5,//paginacion
		"order": [[0, "desc"]]//ordenar (columna, orden)
	}).DataTable();
}
//funcion para guardaryeditar
function guardaryeditar(e) {
	e.preventDefault();//no se activara la accion predeterminada 
	$("#btnGuardar").prop("disabled", true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/propietario.php?op=guardaryeditar",
		type: "POST",
		data: formData,
		contentType: false,
		processData: false,

		success: function (data) {
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

function mostrar(id_propietario) {
	$.post("../ajax/propietario.php?op=mostrar", { id_propietario: id_propietario },
		function (data, status) {
			data = JSON.parse(data);
			mostrarform(true);
			$("#num_documento").val(data.num_documento);
			$("#nombre").val(data.nombre);
			$("#telefono").val(data.telefono);
			$("#direccion").val(data.direccion);
			$("#email").val(data.email);
			$("#id_propietario").val(data.id_propietario);
		})
}
//alerta de guardar







//alerta de eliminar
function AlertarEliminacion(id_propietario) {
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
			eliminar(id_propietario);
		}
	})
}

//funcion para desactivar
function eliminar(id_propietario) {
	
		{

			$.post("../ajax/propietario.php?op=eliminar", { id_propietario: id_propietario }, function (e) {
				
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