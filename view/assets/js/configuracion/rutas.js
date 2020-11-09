var dataTable;
$(document).ready(function () {
  var data = {
    opcion: "consulta",
  };
  dataTable = $("#tblRutas").DataTable({
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
    ajax: {
      url: "../../controller/RutasController.php",
      type: "POST",
      data: function (d) {
        return $.extend(d, data);
      },
    },
    columns: [
      { data: "RutaId" },
      { data: "Numero" },
      { data: "Placa" },
      { data: "Ida" },
      { data: "Vuelta" },
      { defaultContent: "" },
    ],
    columnDefs: [
      { visible: false, targets: [0, 2] },
      { width: "10%", targets: [1] },
      { width: "30%", targets: [3, 4] },
      { width: "10%", targets: [5] },
    ],
    createdRow: function (row, data, index) {
      $(row).find("td:eq(3)").html(`
                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalRegistro">Editar</button>
                <button class="btn btn-sm btn-danger">Eliminar</button>
            `);

      $(row)
        .find(".btn-warning")
        .on("click", function () {
          $("[name=id]").val(data.RutaId);
          $("[name=ruta]").val(data.Numero);
          $("[name=placa]").val(data.Placa);

          $("#tituloModal").text("Editar Ruta");

          $.ajax({
            url: "../../controller/RutasController.php",
            type: "POST",
            data: {
              id: data.RutaId,
              opcion: "trayectos",
            },
            success: function (resp) {
              try {
                var resp = JSON.parse(resp);
              } catch (error) {
                console.log(error);
              }

              if(resp.length > 0){
                cad = "";

                for(var i = 0; i < resp.length; i++){
                  cad += `
                    <tr>
                      <td>${resp[i].Trayecto}</td>
                      <td>${resp[i].Tipo}</td>
                      <td>
                        <center><button class="btn btn-sm btn-danger">X</button></center>
                      </td>
                    </tr>
                  `;
                }

                $('#tblTrayectos tbody').html('');
                $('#tblTrayectos tbody').append(cad);
              }
            },
            error: function (error) {
              console.log(error);
            },
          });

          $("#tituloModal").text("Editar Ruta");
        });

      $(row)
        .find(".btn-danger")
        .on("click", function () {
          alertify.confirm(
            "¡Advertencia!",
            "¿Está seguro de eliminar el registro?",
            function () {
              $.ajax({
                url: "../../controller/RutasController.php",
                type: "POST",
                data: {
                  id: data.RutaId,
                  opcion: "eliminar",
                },
                success: function (data) {
                  if (data) {
                    dataTable.ajax.reload();
                    alertify.success("Registro eliminado exitosamente");
                  } else {
                    alertify.error("Ocurrio un error al eliminar el registro");
                  }
                },
                error: function (error) {
                  alertify.error(error);
                },
              });
            },
            function () {}
          );
        });
    },
  });
});

$("#frm").on("submit", function (e) {
  e.preventDefault();
  var nRuta = $('[name=ruta]').val();
  var nPlaca = $('[name=placa]').val();

  if($('#tblTrayectos tbody').find('tr').length == 0){
    alertify.warning("Ingrese el trayecto de la ruta");
    return;
  }

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

  if($('[name=id').val() != ''){
    parametros.opcion = 'actualizar';
    parametros.id = $('[name=id]').val();
  }

  $.ajax({
    url: "../../controller/RutasController.php",
    type: "POST",
    data: parametros,
    success: function (data) {
      if (data == 1) {
        alertify.success("Registro guardado exitosamente");
        dataTable.ajax.reload();
        $("#frm").trigger("reset");
        $("#modalRegistro").modal("hide");
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


$("#modalRegistro").on("hide.bs.modal", function () {
  $("#frm").trigger("reset");
  $('#tblTrayectos tbody').html('');
  $("[name=id]").val("");
  $("#tituloModal").text("Registrar Ruta");
});

$('#btnAgregarTrayecto').on('click', function(e){
  e.preventDefault();
  
  if($('[name=trayecto]').val() == ""){
    alertify.warning("Ingrese el trayecto");
    return;
  }

  let cad = `
    <tr>
      <td>${$('[name=trayecto]').val()}</td>
      <td>${$('[name=tipo]').val()}</td>
      <td>
        <center><button class="btn btn-sm btn-danger">X</button></center>
      </td>
    </tr>
  `;

  $('#tblTrayectos tbody').append(cad);
  $('[name=trayecto]').val("");
});

$('#tblTrayectos').on('click', '.btn-danger', function(e){
  e.preventDefault();
  
  $(this).closest('tr').remove();
});