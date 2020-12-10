let dataTable;
$(document).ready(function () {
  let data = {
    opcion: "consulta",
  };
  dataTable = $("#tblUsuarios").DataTable({
    autoWidth: true,
    responsive: true,
    scrollX: true,
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
      url: "../../controller/UsuarioController.php",
      type: "POST",
      data: function (d) {
        return $.extend(d, data);
      },
    },
    columns: [
      { data: "Usuarioid" },
      { data: "Nombre" },
      { data: "Apellido" },
      { data: "Usuario" },
      { data: "Perfil" },
      { data: "Perfilid" },
      {
        defaultContent: `<button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalRegistro">Editar</button>
      <button class="btn btn-sm btn-danger">Eliminar</button>`,
      },
    ],
    columnDefs: [{ visible: false, targets: [0, 2, 5] }],
    createdRow: function (row, data, index) {
      $(row).addClass("font-color");
      $(".dataTables_filter input").addClass("font-color");

      $(row)
        .find(".btn-warning")
        .on("click", function () {
          $("[name=usuarioId]").val(data.Usuarioid);
          $("[name=nombre]").val(data.Nombre);
          $("[name=apellido]").val(data.Apellido);
          $("[name=usuario]").val(data.Usuario).prop("disabled", true);
          $("[name=perfilId]").val(data.Perfilid);

          $("#tituloModal").text("Editar Usuario");
        });

      $(row)
        .find(".btn-danger")
        .on("click", function () {
          alertify.confirm(
            "¡Advertencia!",
            "¿Está seguro de eliminar el registro?",
            function () {
              $.ajax({
                url: "../../controller/UsuarioController.php",
                type: "POST",
                data: {
                  id: data.Usuarioid,
                  opcion: "eliminar",
                },
                success: function (data) {
                  if (data == 1) {
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
  $(".dataTables_length label").addClass("font-color");
  $(".dataTables_filter label").addClass("font-color");
  $(".dataTables_empty").addClass("font-color");
  $("input[type='search']")
    .removeClass("font-color")
    .addClass("font-color--black");
  $(".dataTables_info").addClass("font-color");
  $(".dataTables_length").addClass("bs-select");
});

$("#frm").on("submit", function (e) {
  e.preventDefault();
  let form = $("#frm")[0];
  let datos = new FormData(form);

  if (!$("[name=usuarioId]").val()) {
    datos.append("opcion", "registrarse");
    $.ajax({
      data: datos,
      url: "../../controller/UsuarioController.php",
      type: "POST",
      processData: false,
      contentType: false,
      success: function (data) {
        if (data == 1) {
          alertify.success("Registro guardado exitosamente");
          dataTable.ajax.reload();
          $("#frm").trigger("reset");
          $("#modalRegistro").modal("hide");
        } else if (data == 2) {
          alertify.warning("El nombre de usuario ya existe");
        } else {
          alertify.error("Ocurrio un error al guardar el registro");
        }
      },
      error: function (error) {
        console.log(error);
      },
    });
  } else {
    datos.append("opcion", "actualizar");
    datos.append("usuarioId", $("[name=usuarioId]").val());
    $.ajax({
      data: datos,
      url: "../../controller/UsuarioController.php",
      type: "POST",
      processData: false,
      contentType: false,
      success: function (data) {
        if (data == 1) {
          alertify.success("Registro actualizado exitosamente");
          dataTable.ajax.reload();
          $("#frm").trigger("reset");
          $("#modalRegistro").modal("hide");
        } else {
          alertify.error("Ocurrio un error al actualizar el registro");
        }
      },
      error: function (error) {
        console.log(error);
      },
    });
  }
});

$("#modalRegistro").on("hide.bs.modal", function () {
  $("#frm").trigger("reset");
  $("[name=usuarioId]").val("");
  $("[name=usuario]").prop("disabled", false);

  $("#tituloModal").text("Registrar Usuario");
});

$('a[data-toggle="tab"]').on("shown.bs.tab", function (e) {
  $($.fn.dataTable.tables({ visible: true, api: true }))
    .DataTable()
    .columns.adjust()
    .responsive.recalc();
});
