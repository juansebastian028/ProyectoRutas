const $containerCards = document.getElementById("cards-container"),
  $pagination = document.getElementById("rutas-pagination"),
  $fragment = document.createDocumentFragment(),
  $fragmentPagination = document.createDocumentFragment();
$(document).ready(function () {
  $.ajax({
    url: "../../../../controller/RutasController.php",
    type: "POST",
    data: {
      opcion: "obtener",
    },
    success: function (data) {
      const arr = JSON.parse(data);
      console.log(arr);
      let template = "";
      arr.rutas.forEach((element) => {
        template = `<div class="col-xs-12 col-sm-6 col-lg-3 m-2">
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
        $nodes = document.createRange().createContextualFragment(template);
        $fragment.appendChild($nodes);
      });

      $containerCards.appendChild($fragment);

      let pagTemplate = "";
      let templatePrevious = "";
      let templateNext = "";

      if (arr.totalPaginas) {
        for (let i = 1; i <= arr.totalPaginas; i++) {
          pagTemplate = `<li class="page-item">
                <a class="page-link" href="?page=${i}">${i}</a>
          </li>`;

          $nodesPagination = document.createRange().createContextualFragment(pagTemplate);
          $fragmentPagination.appendChild($nodesPagination);
        }
      }

      $pagination.appendChild($fragmentPagination);
    },
    error: function (error) {
      console.log(error);
    },
  });
});
