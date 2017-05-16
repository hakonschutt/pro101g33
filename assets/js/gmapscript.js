var id = _CAMPUS_ID;
var markers = [];
var zoom = 15;
var centerPos;

var fjerdingen_locations = [
    ['Fjerdingen', 59.916049, 10.760024, 'campus'],
    ['Hausmanns gate', 59.916395, 10.757641, 'transport'],
    ['Rema 1000', 59.914244, 10.756892, 'matbutikker']
];

//Vulkan
var vulkan_locations = [
    ['Vulkan', 59.923341, 10.752494, 'campus'],
    ['Telthusbakken', 59.924503, 10.750547, 'transport']
];

//Brenneriveien
var brenneriveien_locations = [
    ['Brenneriveien', 59.920360, 10.752799, 'campus'],
    ['Møllerveien', 59.920611, 10.751407, 'transport']
];

var icons = [
    ["campus", 'img/campus/Fjerdingen.png'],
    ["bysykkel", 'img/aktivitet/bicycle.png'],
    ["transport", 'img/aktivitet/front-of-bus.png'],
    ["matbutikker", 'img/aktivitet/shopping-cart.png'],
    ["spisesteder", 'img/aktivitet/food2.png'],
    ["utesteder", 'img/aktivitet/food.png'],
    ["fritidsaktiviteter", 'img/aktivitet/puzzle.png']
];

var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var infoWindow;

switch(id) {
    case "1":
        centerPos = new google.maps.LatLng(59.916049, 10.760024);
        createMap(zoom, fjerdingen_locations, 0);
        break;
    case "2":
        centerPos = new google.maps.LatLng(59.923341, 10.752494);
        createMap(zoom, vulkan_locations, 0);
        break;
    case "3":
        centerPos = new google.maps.LatLng(59.920360, 10.752799);
        createMap(zoom, brenneriveien_locations, 0);
        break;
}

//Lager kart og fyller med markers fra -locations-
function createMap(zoom, locations, locId) {
    var i;
    directionsDisplay = new google.maps.DirectionsRenderer({
        preserveViewport: true,
        suppressMarkers: true,
        polylineOptions: { 
            strokeColor : "red"
        }
    });
    var map = new google.maps.Map(document.getElementById('campusmap'), {
        zoom: zoom,
        center: centerPos,
    });
    directionsDisplay.setMap(map);
    infoWindow = new google.maps.InfoWindow();
    
    if (locId > 0) {
        addMarker(locations[locId][0], locations[locId][1], locations[locId][2], locations[locId][3], map);
    } else {
        for(i = 0; i < locations.length; i++) {
            addMarker(locations[i][0], locations[i][1], locations[i][2], locations[i][3], map);
        }
    }
}

function addMarker(name, lat, lng, category, map) {
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(lat, lng),
        category: category,  
        map: map
    });
    markers.push(marker);
    marker.setIcon(new google.maps.MarkerImage(typeToIconPath(marker.category), null, null, null, new google.maps.Size(28, 28)));
    google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
            directionsDisplay.setMap(map);
            var div = document.getElementById('markercontent');
            infoWindow.setContent(name);
            infoWindow.open(map, marker);
            createRoute(map.getCenter(), marker.getPosition());
            div.innerHTML = name;
        }
    })(marker, i));
}

function typeToIconPath(type) {
    for(i = 0; i < icons.length; i++) {
        var iconType = icons[i][0]
        if (type == iconType) {
            return icons[i][1];
        }
    }
    return 'img/icons/pin.png';
}


function filterMarkersByType(type) {
    if(directionsDisplay != null) {
        directionsDisplay.setMap(null);
    }
    for(i = 0; i < markers.length; i++) {
        marker = markers[i];
        if(type == "all") {
            marker.setVisible(true);
        } else {
            if(marker.category == type || type.length === 0 || marker.category == "campus") {
                marker.setVisible(true);
            } else {
                marker.setVisible(false);
            }
        }
    }
}

function createRoute(origin, destination) {
    var request = {
        origin: origin,
        destination: destination,
        travelMode: google.maps.TravelMode["WALKING"]
    };
    directionsService.route(request, function(response, status) {
        if (status == 'OK') {
            directionsDisplay.setDirections(response);
        }
    });
}