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

map.addControl(
  new MapboxGeocoder({
    accessToken: mapboxgl.accessToken,
    mapboxgl: mapboxgl,
  }), "top-left"
);

/*map.on("click", (e) => {
  console.log(e.lngLat.toString());
  alertify.success("Coordenas agregadas con éxito");
});*/

let marker = new mapboxgl.Marker({
  draggable: true,
})
  .setLngLat([-75.6946, 4.81321])
  .addTo(map);

function onDragEnd() {
  var lngLat = marker.getLngLat();
  coordinates.style.display = "block";
  coordinates.innerHTML =
    "Longitude: " + lngLat.lng + "<br />Latitude: " + lngLat.lat;
}

marker.on("dragend", onDragEnd);
