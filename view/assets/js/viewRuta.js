// var map;
// function initMap() {
//   map = new google.maps.Map(document.getElementById('map'), {
//     center: {lat: 43.5293101, lng: -5.6773233},
//     zoom: 13
//   });
// }

// var map;
// function initMap() {
//     map = new google.maps.Map(document.getElementById('map'), {
//         center: {
//             lat: 4.8117403, lng: -75.6930379
//         },
//         zoom: 14,
//     });
//     var marker = new google.maps.Marker({
//         position: {
//             lat: 4.8117403, lng: -75.6930379
//         },
//         map: map
//     });
// }










function initMap() {
    const directionsRenderer = new google.maps.DirectionsRenderer();
    const directionsService = new google.maps.DirectionsService();
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 14,
      center: { lat: 37.77, lng: -122.447 },
    });
    directionsRenderer.setMap(map);
    calculateAndDisplayRoute(directionsService, directionsRenderer);
    document.getElementById("mode").addEventListener("change", () => {
      calculateAndDisplayRoute(directionsService, directionsRenderer);
    });
  }
  
  function calculateAndDisplayRoute(directionsService, directionsRenderer) {
    const selectedMode = document.getElementById("mode").value;
    directionsService.route(
      {
        origin: { lat: 37.77, lng: -122.447 },
        destination: { lat: 37.768, lng: -122.511 },
        // Note that Javascript allows us to access the constant
        // using square brackets and a string value as its
        // "property."
        travelMode: google.maps.TravelMode[selectedMode],
      },
      (response, status) => {
        if (status == "OK") {
          directionsRenderer.setDirections(response);
        } else {
          window.alert("Directions request failed due to " + status);
        }
      }
    );
  }
  