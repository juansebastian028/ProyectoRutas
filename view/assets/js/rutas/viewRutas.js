let arrRutas,
  totalPaginas,
  arrRutasPorPagina,
  cardTemplate = "";

const $containerCards = document.getElementById("cards-container"),
  $pagination = document.getElementById("rutas-pagination");

const drawCards = (arrData) => {
  arrRutasPorPagina = [];
  $containerCards.innerHTML = "";
  cardTemplate = "";

  let cont = 6;
  arrData.forEach((element, index) => {
    if (((index + 1) % cont) % 6 === 0) {
      cardTemplate += `<div class="col-xs-12 col-sm-6 col-lg-3 m-2">
          <a href="viewRuta.php?id=${element.RutaId}" class="btn d-block w-100 p-0">
              <div class="card">
                  <div class="container-fluid bg-gray text-center py-4">
                      <i class="fas fa-bus display-1"></i>
                  </div>
                  <div class="container-fluid bg-gray-dark text-center py-2">
                      <h5 class="card-title mb-0">${element.Numero}</h5>
                  </div>
              </div>
          </a>
      </div>`;
      arrRutasPorPagina.push(cardTemplate);
      cardTemplate = "";
      cont += 6;
    } else {
      cardTemplate += `<div class="col-xs-12 col-sm-6 col-lg-3 m-2">
          <a href="viewRuta.php?id=${element.RutaId}" class="btn d-block w-100 p-0">
              <div class="card">
                  <div class="container-fluid bg-gray text-center py-4">
                      <i class="fas fa-bus display-1"></i>
                  </div>
                  <div class="container-fluid bg-gray-dark text-center py-2">
                      <h5 class="card-title mb-0">${element.Numero}</h5>
                  </div>
              </div>
          </a>
      </div>`;
    }
  });
  arrRutasPorPagina.push(cardTemplate);
  let $nodes = document
    .createRange()
    .createContextualFragment(arrRutasPorPagina[0]);
  $containerCards.appendChild($nodes);
};

const drawPagination = (totalPaginas) => {
  const $fragment = document.createDocumentFragment();
  $pagination.innerHTML = "";
  let pagTemplate = "";
  let $nodesPagination = "";

  if (totalPaginas) {
    for (let i = 1; i <= totalPaginas; i++) {
      pagTemplate = `<li class="page-item">
                <button class="page-link" data-page='${i - 1}'>${i}</button>
          </li>`;

      $nodesPagination = document
        .createRange()
        .createContextualFragment(pagTemplate);
      $fragment.appendChild($nodesPagination);
    }
  }
  $pagination.appendChild($fragment);
  $($(".page-link")[0]).closest('li').addClass("disabled");
};

$(document).ready(function () {
  $.ajax({
    url: "../../controller/RutasController.php",
    type: "POST",
    data: {
      opcion: "obtener",
    },
    success: function (data) {
      const arr = JSON.parse(data);
      console.log(arr);
      arrRutas = arr.rutas;
      totalPaginas = arr.totalPaginas;
      drawCards(arrRutas);
      drawPagination(totalPaginas);
    },
    error: function (error) {
      console.log(error);
    },
  });
});

$("#rutas-pagination").on("click", ".page-link", function () {
  $("#cards-container").html(arrRutasPorPagina[$(this).data("page")]);
  $(".page-item").removeClass("disabled");
  $(this).closest('li').addClass("disabled");
});

$("[name=inputSearch]").keyup(function (e) {
  e.preventDefault();
  if (e.key === "Escape") {
    e.target.value = "";
  }
  let arrBusqueda = [];

  arrRutas.forEach((element) => {
    if (element.Numero.includes(e.target.value) || element.Ida.toLowerCase().includes(e.target.value.toLowerCase()) || element.Vuelta.toLowerCase().includes(e.target.value.toLowerCase()) ) {
      arrBusqueda.push({ RutaId: element.RutaId, Numero: element.Numero });
    }
  });
  drawCards(arrBusqueda);
  let totalPaginasConBusqueda = Math.ceil(arrBusqueda.length / 6);
  drawPagination(totalPaginasConBusqueda);
});
