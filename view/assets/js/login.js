$('#ingresar').on('click', function(e){
    e.preventDefault();

	var form = $('#form')[0];
	var formData = new FormData(form);
	formData.append('opcion', 'login');

	$.ajax({
		url: '../controller/loginController.php',
		type: 'post',
		data: formData,
		processData: false,
		contentType: false,
		success: function(resp){
            console.log(resp);
		},
		error: function(error){
			console.log(error);
		}
	});
});