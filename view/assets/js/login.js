$('#ingresar').on('click', function(e){
    e.preventDefault();

	var form = $('#form')[0];
	var formData = new FormData(form);
	formData.append('opcion', 'login');

	$.ajax({
		url: $URL+'/ProyectoRutas/controller/usuarioController.php',
		type: 'post',
		data: formData,
		processData: false,
		contentType: false,
		success: function(resp){
			if (resp) {
				location.href = $URL+"/ProyectoRutas/view/rutas/viewRutas.php";
            }else{
                alertify.error("Usuario o contraseña incorrecta");
            }
		},
		error: function(error){
			console.log(error);
		}
	});
});