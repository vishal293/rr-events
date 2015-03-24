var map;
var geocoder;
var marker;
var markersArray = [];

/*========================================
=            Google-Maps Api             =
========================================*/

function initialize() {
    geocoder = new google.maps.Geocoder();

    var latlng = new google.maps.LatLng(21.1610859, 79.0725101); 
    var minZoomLevel = 12;
    var mapOptions = {
        zoom: 13,
        center: latlng,
        mapTypeId:google.maps.MapTypeId.ROADMAP
      };
      map = new google.maps.Map(document.getElementById('map-canvas'),
          mapOptions);
      var pos = document.getElementById('lat').value;

      if(pos){
        placeExtmarker(); 
      }
      var strictBounds = new google.maps.LatLngBounds(
        new google.maps.LatLng(20.587358362147373, 78.30793032705083),
        new google.maps.LatLng(21.612315118202158, 79.86798892080083)
      );
     var boundLimits = {
                maxLat : strictBounds.getNorthEast().lat(),
                maxLng : strictBounds.getNorthEast().lng(),
                minLat : strictBounds.getSouthWest().lat(),
                minLng : strictBounds.getSouthWest().lng()
      };

      var lastValidCenter = map.getCenter();
      var newLat, newLng;
      google.maps.event.addListener(map, 'center_changed', function() {
          center = map.getCenter();
          if (strictBounds.contains(center)) {
              // still within valid bounds, so save the last valid position
              lastValidCenter = map.getCenter();
              return;
          }
          newLat = lastValidCenter.lat();
          newLng = lastValidCenter.lng();
          if(center.lng() > boundLimits.minLng && center.lng() < boundLimits.maxLng){
              newLng = center.lng();
          }
          if(center.lat() > boundLimits.minLat && center.lat() < boundLimits.maxLat){
              newLat = center.lat();
          }
          map.panTo(new google.maps.LatLng(newLat, newLng));
      });
      google.maps.event.addListener(map, 'zoom_changed', function() {
        if (map.getZoom() < minZoomLevel) map.setZoom(minZoomLevel);
      });
      /*google.maps.event.addListener(map, 'idle', function(ev){
           var bounds = map.getBounds();
           var sw = bounds.getSouthWest(); 
           var ne = bounds.getNorthEast(); 
           console.log("sw"+sw);
           console.log("ne"+ne);
      });*/
      google.maps.event.addListener(map, 'click', function(event) {
        placeMarker(event.latLng);
        codeLatLng(event.latLng);
      });
}

/*==========  Place-Marker On Map  ==========*/
function placeMarker(location) {
  deleteOverlays();
  var marker = new google.maps.Marker({
    position: location,
    map: map,
    draggable:true,
  });
    updateLatlng(location);
    markersArray.push(marker); 
    draggedMarker(marker);

}
/*========== Place-Marker On Map From already present LatLng  ==========*/

function placeExtmarker() {
  var x = parseFloat(document.getElementById('lat').value);
  var y = parseFloat(document.getElementById('lng').value);
  var latlng2 = new google.maps.LatLng(x, y);
  map.setCenter(latlng2);
  placeMarker(latlng2);
}
/*==========  Update-LatLng In form  ==========*/
function updateLatlng(position){
  document.getElementById("lat").value = position.lat();
  document.getElementById("lng").value = position.lng();
}

/*==========  Function To Dragg Marker  ==========*/
function draggedMarker(marker){
  google.maps.event.addListener(marker, 'dragend', function() {
      updateLatlng(marker.getPosition());
      codeLatLng(marker.getPosition());
  });
}

/*==========  Delete Marker  ==========*/
function deleteOverlays(){
  if (markersArray) {
      for (i in markersArray) {
          markersArray[i].setMap(null);
      }
    markersArray.length = 0;
  }
}

/*==========  Geocode Address From Form  ==========*/
function codeAddress() {
  var address = document.getElementById('event_address').value;
     
  geocoder.geocode({ 'address': address}, function(results, status) {
      if(status == "ZERO_RESULTS"){
        $('#map').show();
      }
      if (status == google.maps.GeocoderStatus.OK) {
        console.log(results);
        updateLatlng(results[0].geometry.location);
        map.setCenter(results[0].geometry.location);
        placeMarker(results[0].geometry.location);
      }
  });
}

/*==========  Reverse Geocode-Get Add from LatLng  ==========*/
function codeLatLng(locations) {
  var lat = locations.lat();
  var lng = locations.lng();
  var latlng = new google.maps.LatLng(lat, lng);
  geocoder.geocode({'latLng': latlng}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
        document.getElementById("event_address").value = results[0].formatted_address;
    } else {
    }
  });
}
google.maps.event.addDomListener(window, 'load', initialize);

/*-----  End of Google-Maps Api   ------*/

















