//Oppretter for øyeblikket kun et ufullstending kart over fjerdingen

var fjerdingen_locations = [
    ['Fjerdingen', 59.916049, 10.760024, 'campus'],
    ['Hausmanns gate', 59.916395, 10.757641, 'transport'],
    ['Rema 1000', 59.914244, 10.756892, 'mat']
];
var fjerdingen_infoContent = [
    ['<div class="f_info_content">' + '<h3>Fjerdingen</h3>' + '<p>INFO OM FJERDINGEN</p>' + '</div>'],
    ['<div class="b_info_content">' + '<h3>Hausmanns gate</h3>' + '<p>BUSS OG GREIER</p>' + '</div>'],
    ['<div class="f_info_content">' + '<h3>Rema 1000</h3>' + '<p>MAT</p>' + '</div>']
];

//Vulkan
var vulkan_locations = [
    ['Vulkan', 59.923341, 10.752494],
    ['Telthusbakken', 59.924503, 10.750547]
];
var vulkan_infoContent = [
    ['<div class="v_info_content">' + '<h3>Vulkan</h3>' + '<p>INFO OM VULKAN</p>' + '</div>'],
    ['<div class="v_info_content">' + '<h3>Telthusbakken</h3>' + '<p>BUUSSSS</p>' + '</div>']
];

//Brenneriveien
var brenneriveien_locations = [
    ['Brenneriveien', 59.920360, 10.752799],
    ['Møllerveien', 59.920611, 10.751407]
];
var brenneriveien_infoContent = [
    ['<div class="b_info_content">' + '<h3>Brenneriveien</h3>' + '<p>INFO OM BRENNERIVEIEN</p>' + '</div>'],
    ['<div class="b_info_content">' + '<h3>Møllerveien</h3>' + '<p>BUSS!?</p>' + '</div>']
];
/*  
var iconBasePath = 'C:/Users/Håvard/Documents/Skole/WebProsjekt2/png/';
var icons = {
    campus: {
        icon: iconBasePath + '005-puzzle.png'
    },
    transport: {
        icon: iconBasePath + '008-front-of-bus.png'
    },
    mat: {
        icon: iconBasePath + '007-food.png'
    }
}*/
createMap('fjerdingenMap', 14, fjerdingen_locations, fjerdingen_infoContent);
//createMap('vulkanMap', 14, vulkan_locations, vulkan_infoContent);
//createMap('brenneriveienMap', 14, brenneriveien_locations, brenneriveien_infoContent);

var directionsDisplay;
var directionsService = new google.maps.DirectionsService();


//Lager kart og fyller med markers fra -locations- med info fra -infoContent-
function createMap(targetDiv, zoom, locations, infoContent) {
    directionsDisplay = new google.maps.DirectionsRenderer({
        preserveViewport: true,
        suppressMarkers: true,
        polylineOptions: { 
            strokeColor : "red"
        }
    });
    var map = new google.maps.Map(document.getElementById(targetDiv), {
        zoom: zoom,
        center: new google.maps.LatLng(locations[0][1], locations[0][2]),
    });
    directionsDisplay.setMap(map);
    
    var infoWindow = new google.maps.InfoWindow();
    var marker, i;
        
    for(i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map
        });
    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoContent[i][0]);
                infoWindow.open(map, marker);
                createRoute(new google.maps.LatLng(locations[0][1], locations[0][2]), marker.getPosition());
            }
        })(marker, i));
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