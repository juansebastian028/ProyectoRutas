const $containerCards = document.getElementById("cards-container"),
$fragment = document.createDocumentFragment();
$(document).ready(function () {
  $.ajax({
    url: "../../controller/RutasController.php",
    type: "POST",
    data: {
      opcion: "obtener",
    },
    success: function (data) {
      const arrRutas = JSON.parse(data);
      let template = "";
      arrRutas.forEach((element) => {
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
    },
    error: function (error) {
      console.log(error);
    },
  });
});
