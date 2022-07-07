import { Loader } from "@googlemaps/js-api-loader";

const loader = new Loader({
    apiKey: google_api_key,
    version: "weekly"
});

$(document).ready(function() {
    $('.rocketpager-google-maps .map').each(function() {
        var mapElement = $(this);
        var mapDiv = mapElement[0]

        var mapId = mapElement.data('map-id');
        var center = {lat: mapElement.data('center-lat'), lng: mapElement.data('center-lng')};
        var zoom = mapElement.data('zoom');
        var gestureHandling = mapElement.data('controls-active') == 'Yes' ? 'cooperative' : 'none';
        var disableDefaultUI = mapElement.data('zoom-active') == 'No' ? true : false;

        var mapConfig = {
            center,
            zoom,
            gestureHandling,
            disableDefaultUI,
        }

        if(mapId){
            mapConfig = {mapId,...mapConfig}
        }

        loader.load().then(() => {
            var map = new google.maps.Map(mapDiv, mapConfig);

            mapElement.siblings('.marker').each(function() {
                var markerElement = $(this);
                setMarker(map, markerElement);
            });

        });
    })
});

function setMarker(map, markerElement){
    var markerCoords = {lat: markerElement.data('marker-lat'), lng: markerElement.data('marker-lng')};
    var markerIcon = markerElement.data('marker-icon');
    var aspectRatioIcon = markerElement.data('icon-aspect-ratio');
    var contentString = markerElement.children('.data-content').first().prop('outerHTML');

    const marker = new google.maps.Marker({
        position: markerCoords,
        map: map,
    });

    var icon = {
        url: markerIcon,
        scaledSize: new google.maps.Size(40*aspectRatioIcon,40),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(20*aspectRatioIcon, 40),
    }

    if(markerIcon){
        marker.setIcon(icon);
    }


    if(contentString) {
        markerElement.children('.data-content').first().remove();
        const infowindow = new google.maps.InfoWindow({
            content: contentString,
        });

        marker.addListener('click', () => {
            infowindow.open({
                anchor: marker,
                map,
                shouldFocus: false,
            });
        });
    }
}