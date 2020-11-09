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

/*map.on("click", (e)=>{
  console.log(e.lngLat.toString());
});*/

let popup = new mapboxgl.Popup({ offset: 25 }).setText("Universidad CIAF.");

let marker = new mapboxgl.Marker()
  .setLngLat([-75.7052442, 4.8127867])
  .setPopup(popup)
  .addTo(map);

let popup2 = new mapboxgl.Popup({ offset: 25 }).setText("UTP.");

let marker2 = new mapboxgl.Marker()
  .setLngLat([-75.6905709, 4.7950488])
  .setPopup(popup2)
  .addTo(map);