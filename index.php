<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="apple-touch-icon-precomposed" href="ICON HERE"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" 
      type="image/png" 
      href="includes/favicon_bread_trans.png">
<LINK href="includes/main.css" rel="stylesheet" type="text/css">
<title>Shelter Connect Home</title>
</head>
<div class="navbar">
    
    <?php require_once("includes/navbar.php") ?>
    
</div>

<div class="contents">
    
This is a test.
<div id="map" style="height: 200px; width: 500px;"></div>
</div>

<script type="text/javascript">
    function loadScript() {
  var script = document.createElement('script');
  script.type = 'text/javascript';
  script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyD64CNF-3axucQHt6UPtR_-lA_yTf6J0oY&sensor=false&' + 'callback=load';
  document.body.appendChild(script);

}
window.onload = loadScript;
    
    //<![CDATA[
var map;
    var customIcons = {
      green: {
        icon: 'includes/marker_outlined_sized_green.png'
      },
      yellow: {
        icon: 'includes/marker_outlined_sized_yellow.png'
      },
	  red: {
        icon: 'includes/marker_outlined_sized_red.png'
      }
    };

    function load() {
      map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(33.963654, -118.408401),
        zoom: 11,
        mapTypeId: 'roadmap',
		panControl: false,
		mapTypeControl: false,
		rotateControl: false,
		streetViewControl: true
      });
      var infoWindow = new google.maps.InfoWindow;

      // Change this depending on the name of your PHP file
      downloadUrl("engine.php", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var name = markers[i].getAttribute("name");
          var address = markers[i].getAttribute("address");
		  var description = markers[i].getAttribute("description");
		  var weburl = markers[i].getAttribute("weburl");
		  if (weburl) {
			  weburl = "<br /><a id='markerlink' href='" + weburl + "'>" + weburl + "</a>"
			  }
		  var freshicon = markers[i].getAttribute("freshicon");
		  var freshnesstext
		  if (freshicon === "green"){
			  freshnesstext = "Fresh within 90 Minutes";
		  } else if (freshicon === "yellow"){
			  freshnesstext = "Fresh within 150 Minutes";
		  } else {
			  freshnesstext = "Not fresh. Still good food!";
		  }
		  var lat = markers[i].getAttribute("lat")
		  var lng = markers[i].getAttribute("lng")
          var type = markers[i].getAttribute("type");
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
          var html = "<div id='markerdetails'><b id='markertitle'>" + name + "</b> <br/>" + "<a id='markerlink' href='http://maps.google.com/maps?q=description+(name)+%40" + lat + "," + lng + "'>" + address + "</a>" + weburl + "<br /><br />" + description + "<br /><br /><b>"+ freshnesstext + "</b></div>";
		  var icon = customIcons[freshicon] || {};
          
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: icon.icon
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
  





<body>
</body>
</html>
