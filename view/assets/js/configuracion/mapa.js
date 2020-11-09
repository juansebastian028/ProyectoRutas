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

let marker = new mapboxgl.Marker({
  draggable: true,
})
  .setLngLat([-75.6946, 4.81321])
  .addTo(map);

function onDragEnd() {
  var lngLat = marker.getLngLat();
  $("[name=longitud]").val(lngLat.lng);
  $("[name=latitud]").val(lngLat.lat);
  alertify.success("Coordenadas guardadas con éxito");
}

let geocoder = new MapboxGeocoder({
  accessToken: mapboxgl.accessToken,
  mapboxgl: mapboxgl,
  marker: false,
});

geocoder.on("result", (e) => {
  marker.setLngLat(e.result.center).addTo(map);
  marker.on("dragend", onDragEnd);
});

map.addControl(geocoder, "top-left");

marker.on("dragend", onDragEnd);

$("#modalMapa").on("shown.bs.modal", function () {
  map.resize();
  geocoder.clear();

  map.flyTo({
    center: [-75.6946, 4.81321],
    zoom: 12,
  });
  marker.setLngLat([-75.6946, 4.81321]).addTo(map);
});
