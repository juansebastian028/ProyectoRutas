$("#form").submit(function (e) {
  e.preventDefault();
  let form = $("#form")[0];
  let formData = new FormData(form);
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
      alertify.error(error);
    },
  });
});

$("#eyePassword").click(function (e) {
  e.preventDefault();

  if ($("#inputPassword").attr("type") === "text") {
    $("#inputPassword").attr("type", "password");
    $("#eyePassword i").removeClass("fa-eye-slash");
    $("#eyePassword i").addClass("fa-eye");
  } else {
    $("#inputPassword").attr("type", "text");
    $("#eyePassword i").addClass("fa-eye-slash");
    $("#eyePassword i").removeClass("fa-eye");
  }
});
