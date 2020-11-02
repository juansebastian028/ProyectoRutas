const $template = document.getElementById("crud-template").content,
$fragment = document.createDocumentFragment();
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