$("#frmAcceso").on('submit', function(e)
{
	e.preventDefault();
	logina=$("#logina").val();
	clavea=$("#clavea").val();

	$.post("../ajax/usuario.php?op=verificar",
        {"logina":logina, "clavea":clavea},
        function(data)
        {
           if (data != "null")
            {
                Swal.fire({
                    position: 'top',
                    icon: 'success',
                    title: '¡Bienvenido!',
                    showConfirmButton: false,
                    timer: 2000
                  })
                $(location).attr("href","escritorio.php");
            }else{
            	Swal.fire({
                    position: 'top',
                    icon: 'warning',
                    title: 'Usuario o contraseña incorrectos',
                    showConfirmButton: false,
                    timer: 2100
                  })
            }
        });
})