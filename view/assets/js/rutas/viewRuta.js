const $tablaTrayectosIda = document.getElementById("tablaTrayectoIda"),
  $tablaTrayectosVuelta = document.getElementById("tablaTrayectoVuelta");

mapboxgl.accessToken =
  "pk.eyJ1IjoianVhbnNlYmFzdGlhbjI4IiwiYSI6ImNraDllZ3NpMDBpb2wyc3FpazE4dTl2bzAifQ.Hl0cvQVf_0jP-LEOFcGUWQ";

let map = new mapboxgl.Map({
  container: "map",
  style: "mapbox://styles/mapbox/streets-v11",
  center: [-75.6946, 4.81321],
  zoom: 12,
});

map.addControl(new mapboxgl.NavigationControl());
map.addControl(new mapboxgl.FullscreenControl());

let marker;
let popup;
let contentTablaIda = "";
let contentTablaVuelta = "";

arrTrayectos.forEach((element) => {
  popup = new mapboxgl.Popup({ offset: 25 }).setText(element.Trayecto);
  marker = new mapboxgl.Marker()
    .setLngLat([element.Longitud, element.Latitud])
    .setPopup(popup)
    .addTo(map);

  if (element.Tipo === "Ida") {
    contentTablaIda += `
      <tr>
        <td class="font-color">${element.Trayecto}</td>
      </tr>`;
  } else {
    contentTablaVuelta += `
    <tr>
      <td class="font-color">${element.Trayecto}</td>
    </tr>`;
  }
});

$tablaTrayectosIda.querySelector("tbody").innerHTML = contentTablaIda;
$tablaTrayectosVuelta.querySelector("tbody").innerHTML = contentTablaVuelta;
