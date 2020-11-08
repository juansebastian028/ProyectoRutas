$("#ingresar").on("click", function (e) {
  e.preventDefault();
  console.log("click")
  var form = $("#form")[0];
  console.log(form);
  var formData = new FormData(form);
  console.log(formData);
  formData.append("opcion", "login");
  $.ajax({
    url: "../../controller/UsuarioController.php",
    type: "post",
    data: formData,
    processData: false,
    contentType: false,
    success: function (resp) {
      if (resp) {
        location.href = "../../view/rutas/viewRutas.php";
      } else {
        alertify.error("Usuario o contraseña incorrecta");
      }
    },
    error: function (error) {
      console.log(error);
    },
  });
});

$("#eyePassword").click(function(e) {

  e.preventDefault();

  if($("#inputPassword").attr("type") === "text"){

    $("#inputPassword").attr("type","password");
    $("#eyePassword i").removeClass( "fa-eye-slash" );
    $("#eyePassword i").addClass( "fa-eye" );
  }else{
    $("#inputPassword").attr("type","text");
    $("#eyePassword i").addClass( "fa-eye-slash" );
    $("#eyePassword i").removeClass( "fa-eye");
  }
});




