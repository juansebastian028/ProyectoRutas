$(document).ready(function(){

    $.ajax({
		url: '',
		type: 'get',
		processData: false,
		contentType: false,
		success: function(resp){
            console.log(resp);
		},
		error: function(error){
			console.log(error);
		}
	});
})