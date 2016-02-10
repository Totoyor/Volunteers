var geocoder;
var map;

function initMap() {
    var map = new google.maps.Map(document.getElementById("map"),
        {
            center: {lat: -34.397, lng: 150.644},
            zoom: 13
        });
    var geocoder = new google.maps.Geocoder();

    var latlng = new google.maps.LatLng(-34.397, 150.644);
    google.maps.event.addDomListener(document.getElementById('adress'), 'load', codeAddress(geocoder, map));

}

function codeAddress(geocoder, map) {
    var address = document.getElementById("adress").value;
    geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
            });
        }
    });
}
