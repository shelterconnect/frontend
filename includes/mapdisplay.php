    <script type="text/javascript">
    function loadScript() {
  var script = document.createElement('script');
  script.type = 'text/javascript';
  script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyD64CNF-3axucQHt6UPtR_-lA_yTf6J0oY&sensor=false&' + 'callback=load';
  document.body.appendChild(script);

}
window.onload = loadScript;

function load()
{
//alert("word")	
if (navigator.geolocation)
   {
   navigator.geolocation.getCurrentPosition(showPos);
   }
}   
    
    //<![CDATA[
var map;
    var customIcon = "img/map_marker_icon.png"

    function showPos(position) {
	//	alert(position)
	//	alert(position.coords.latitude)
      map = new google.maps.Map(document.getElementById("map"), {
          center: new google.maps.LatLng(position.coords.latitude, position.coords.longitude),
//          center: new google.maps.LatLng(33.963654, -118.408401),
        zoom: 11,
        mapTypeId: 'roadmap',
		panControl: false,
		mapTypeControl: false,
		rotateControl: false,
		streetViewControl: false
      });
      var infoWindow = new google.maps.InfoWindow;

      // Change this depending on the name of your PHP file
      downloadUrl("https://shelterconnect.ngrok.com/organizations", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var name = markers[i].getAttribute("name");
          var address = markers[i].getAttribute("address");
		  if (weburl) {
			  weburl = "<br /><a id='markerlink' href='" + weburl + "'>" + weburl + "</a>"
			  }
		  var lat = markers[i].location.getAttribute("latitude")
		  var lng = markers[i].location.getAttribute("longitude")
          var type = markers[i].getAttribute("type");
          var point = new google.maps.LatLng(
              parseFloat(markers[i].location.getAttribute("lat")),
              parseFloat(markers[i].location.getAttribute("lng")));
          var html = "<div id='markerdetails'><b id='markertitle'>" + name + "</b> <br/>" + "<a id='markerlink' href='http://maps.google.com/maps?q=description+(name)+%40" + lat + "," + lng + "'>" + address + "</div>";
          
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: customIcon
          });
          bindInfoWindow(marker, map, infoWindow, html);
        }
      });
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

    function doNothing() {}

    //]]>
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
  



