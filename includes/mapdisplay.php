<script type="text/javascript">
function loadScript() {
  var script = document.createElement('script');
  script.type = 'text/javascript';
  script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyD64CNF-3axucQHt6UPtR_-lA_yTf6J0oY&sensor=false&' + 'callback=load';
  document.body.appendChild(script);
}

window.onload = loadScript;
    
function load() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPos);
  }
}

//<![CDATA[
var map;
var customIcon = "img/map_marker_icon.png"

function showPos(position) {
  map = new google.maps.Map(document.getElementById("map"), {
    center: new google.maps.LatLng(position.coords.latitude, position.coords.longitude),
    zoom: 11,
    mapTypeId: 'roadmap',
    panControl: false,
    mapTypeControl: false,
    rotateControl: false,
    streetViewControl: false
  });

  var infoWindow = new google.maps.InfoWindow;

  var array = <?php
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, "https://shelterconnect.ngrok.com/organizations");
  curl_setopt($ch, CURLOPT_HEADER, 0);

  curl_exec($ch);

  curl_close($ch);
  ?>

  for (var i = 0; i < array.length; i++) {
    var org = array[i];

    var html = "<div id='markerdetails'><b id='markertitle'>" + org.name + "</b> <br/>" + "<a id='markerlink' href='http://maps.google.com/maps?q=description+(name)+%40" + org.location.latitude + "," + org.location.longitude + "'>" + org.address + "</div>";

    var marker = new google.maps.Marker({
      map: map,
      position: new google.maps.LatLng(org.location.latitude, org.location.longitude),
      icon: customIcon
    });
    bindInfoWindow(marker, map, infoWindow, html);
  }

  loadSearch();
}

function bindInfoWindow(marker, map, infoWindow, html) {
  google.maps.event.addListener(marker, 'click', function() {
    infoWindow.setContent(html);
    infoWindow.open(map, marker);
  });
}

function downloadUrl(url, callback) {
  var request = window.ActiveXObject ?
      new ActiveXObject('Microsoft.XMLHTTP') :
      new XMLHttpRequest;

  request.onreadystatechange = function() {
    if (request.readyState == 4) {
      request.onreadystatechange = doNothing;
      callback(request, request.status);
    }
  };

  request.open('GET', url, true);
  request.send(null);
}

var addressField;
var geocoder;
function loadSearch(){
  addressField = document.getElementById('search_address');
  geocoder = new google.maps.Geocoder();
}

function search() {
  geocoder.geocode(
      {'address': addressField.value}, 
      function(results, status) { 
          if (status == google.maps.GeocoderStatus.OK) { 
              var loc = results[0].geometry.location;
              // use loc.lat(), loc.lng()
			map.setCenter(loc);
           } 
          else {
              alert("Not found: " + status); 
          } 
      }
  );
};

</script>