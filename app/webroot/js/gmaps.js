var placeSearch, autocomplete;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initialize() {
  // Create the autocomplete object, restricting the search
  // to geographical location types.
  var strictBounds = new google.maps.LatLngBounds(
      new google.maps.LatLng(21.083583962229397, 78.99474749624028),
      new google.maps.LatLng(21.2116644612005, 79.18975482045903)
  );
  var input = document.getElementById('event_address'); 
  var options = { 
        bounds: strictBounds,
        types: ['geocode','establishment'],
        componentRestrictions: {country: 'in'}
  };  
  autocomplete = new google.maps.places.Autocomplete(input,options);
 
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    
  });
}

