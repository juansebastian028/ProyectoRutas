$(document).ready(function () {
  $("#tblRutas").DataTable({
    language: {
      decimal: "",
      emptyTable: "No hay información",
      info: "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
      infoEmpty: "Mostrando 0 to 0 of 0 Entradas",
      infoFiltered: "(Filtrado de _MAX_ total entradas)",
      infoPostFix: "",
      thousands: ",",
      lengthMenu: "Mostrar _MENU_ Entradas",
      loadingRecords: "Cargando...",
      processing: "Procesando...",
      search: "Buscar:",
      zeroRecords: "Sin resultados encontrados",
      paginate: {
        first: "Primero",
        last: "Ultimo",
        next: "Siguiente",
        previous: "Anterior",
      },
    },
    columnDefs: [
      { width: "25%", targets: [0, 1, 2] },
      { width: "20%", targets: 3 },
    ],
    createdRow: function (row, data, index) {
      $(row)
        .find(".btn-danger")
        .on("click", function () {
          alertify.confirm(
            "¡Advertencia!",
            "¿Está seguro de eliminar el registro?",
            function () {
              alertify.success("Registro eliminado exitosamente");
            },
            function () {}
          );
        });
    },
  });
});

$("#frm").on("submit", function (e) {
  e.preventDefault();
  var nRuta = document.getElementById("nRuta").value;
  var nPlaca = document.getElementById("nPlaca").value;

  var parametros = {
    nRuta: nRuta,
    nPlaca: nPlaca,
    opcion: "registrar",
  };

  var trayectos = [];
  $("#tblTrayectos tbody")
    .find("tr")
    .each(function () {
      trayectos.push({
        trayecto: $(this).find("td:eq(0)").text(),
        tipo: $(this).find("td:eq(1)").text(),
      });
    });

  parametros.trayectos = trayectos;

  $.ajax({
    url: "../../controller/RutasController.php",
    type: "POST",
    data: parametros,
    success: function (data) {
      if (data == 1) {
        alertify.success("Registro guardado exitosamente");
      } else {
        alertify.error("Ocurrio un error al guardar el registro");
        console.log(data);
      }
    },
    error: function (error) {
      console.log(error);
    },
  });
});
