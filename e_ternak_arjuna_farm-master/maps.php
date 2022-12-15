<!DOCTYPE html>
<html>
  <head>
    <style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 400px;
        width: 600px;
       }
    </style>
  </head>
  <body>
    <!--The div elements for the map and message -->
    <div id="map"></div>
    <div id="msg"></div>
    <script>
// Initialize and add the map
var map;
function haversine_distance(mk1, mk2) {
      var R = 3958.8; // Radius of the Earth in miles
      var rlat1 = mk1.position.lat() * (Math.PI/180); // Convert degrees to radians
      var rlat2 = mk2.position.lat() * (Math.PI/180); // Convert degrees to radians
      var difflat = rlat2-rlat1; // Radian difference (latitudes)
      var difflon = (mk2.position.lng()-mk1.position.lng()) * (Math.PI/180); // Radian difference (longitudes)

      var d = 2 * R * Math.asin(Math.sqrt(Math.sin(difflat/2)*Math.sin(difflat/2)+Math.cos(rlat1)*Math.cos(rlat2)*Math.sin(difflon/2)*Math.sin(difflon/2)));
      return d;
    }

function initMap() {
  // The map, centered on Central Park
  var lat_center;
  var lng_center;
  //3.5709493255052367, 98.9934684553021
  const dakota = {lat: 3.5677662215309924, lng: 98.97344358003262};
  const frick = {lat: 3.5709493255052367, lng: 98.9934684553021};
  
  lat_center = (dakota['lat']+frick['lat'])/2;
  lng_center = (dakota['lng']+frick['lng'])/2;
  
  const center = {lat: lat_center, lng: lng_center };
  const options = {zoom: 15, scaleControl: true, center: center};
  map = new google.maps.Map(
      document.getElementById('map'), options);
  // Locations of landmarks
//   3.5677662215309924, 98.97344358003262
///3.5655914154867383, 98.97611772823758
// 3.568189438903654, 98.97680616426337
  // The markers for The Dakota and The Frick Collection
  var mk1 = new google.maps.Marker({position: dakota, map: map});
  var mk2 = new google.maps.Marker({draggable: true,position: frick, map: map});
  // Draw a line showing the straight distance between the markers
  var line = new google.maps.Polyline({path: [dakota, frick], map: map,strokeColor: "#FF0000",
    strokeOpacity: 1.0,
    strokeWeight: 1,});
  // Calculate and display the distance between markers
  var distance = haversine_distance(mk1, mk2);
  document.getElementById('msg').innerHTML = "Distance between markers: " + distance.toFixed(2) * 1600 + " meter.";

}
    </script>
    <!--Load the API from the specified URL -- remember to replace YOUR_API_KEY-->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBy_lZc0g8Y34aJSrSgHQ448KfaXoRVuco&callback=initMap">
    </script>
  </body>
</html>