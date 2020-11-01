$('#ingresar').on('click', function(e){
    e.preventDefault();

	var form = $('#frm')[0];
	var formData = new FormData(form);

	$.ajax({
		url: '../controller/login.php',
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