import { Loader } from "@googlemaps/js-api-loader";

const loader = new Loader({
    apiKey: google_api_key,
    version: "weekly"
});

$(document).ready(function() {
    var mapDiv = $('#map');

    var mapId = mapDiv.data('map-id');
    var center = {lat: mapDiv.data('center-lat'), lng: mapDiv.data('center-lng')};
    var zoom = mapDiv.data('zoom');
    var gestureHandling = mapDiv.data('controls-active') == 'Yes' ? 'cooperative' : 'none';
    var disableDefaultUI = mapDiv.data('zoom-active') == 'No' ? true : false;
    var markerCoords = {lat: mapDiv.data('marker-lat'), lng: mapDiv.data('marker-lng')};
    var markerIcon = mapDiv.data('marker-icon');
    var aspectRatioIcon = mapDiv.data('icon-aspect-ratio');
    var contentString = $('#data-content').prop('outerHTML');
    
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
        var map = new google.maps.Map(document.getElementById('map'), mapConfig);

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
            $('#data-content').remove();
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
        
    });
});