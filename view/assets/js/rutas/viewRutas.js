let arrRutas,
  arrData,
  cardTemplate = "";
const $containerCards = document.getElementById("cards-container");

const drawSearch = (arrBusqueda) => {
  $containerCards.innerHTML = "";
  const $fragment = document.createDocumentFragment();
  let $nodes = "";
  arrBusqueda.forEach((element) => {
    cardTemplate = `<div class="col-xs-12 col-sm-6 col-lg-3 m-2">
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
    $nodes = document.createRange().createContextualFragment(cardTemplate);
    $fragment.appendChild($nodes);
  });

  $containerCards.appendChild($fragment);
};

const drawCards = (arrRutas) => {
  arrData = [];
  let cont = 6;
  arrRutas.forEach((element, index) => {
    if ((index + (1 % cont)) % 6 == 0) {
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
      arrData.push(cardTemplate);
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
  arrData.push(cardTemplate);
  let $nodes = document.createRange().createContextualFragment(arrData[0]);
  $containerCards.appendChild($nodes);
};

const drawPagination = (totalPaginas) => {
  const $pagination = document.getElementById("rutas-pagination"),
    $fragment = document.createDocumentFragment();
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
      arrRutas = arr.rutas;
      drawCards(arrRutas);
      drawPagination(arr.totalPaginas);
    },
    error: function (error) {
      console.log(error);
    },
  });
});

$("#rutas-pagination").on("click", ".page-link", function () {
  $("#cards-container").html(arrData[$(this).data("page")]);
  $(".page-link").removeAttr("disabled");
  $(this).attr("disabled", true);
});

$("[name=inputSearch]").keyup(function (e) {
  //console.log(e.key);
  //console.log(e.target.value);

  if (e.key === "Escape") {
    e.target.value = "";
  }
  let arrBusqueda = [];

  arrRutas.forEach((element) => {
    if (element.Numero.includes(e.target.value)) {
      arrBusqueda.push({ RutaId: element.RutaId, Numero: element.Numero });
    }
  });

  drawSearch(arrBusqueda);
});
