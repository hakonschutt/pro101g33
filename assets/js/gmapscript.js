var id;
var markers = [];
var zoom = 15;
var centerPos;
var map;
var dblocations = [];

var campuses = [
    ['Fjerdingen', 59.916049, 10.760024, 0],
    ['Vulkan', 59.923341, 10.752494, 0],
    ['Brenneriveien', 59.920360, 10.752799, 0]
];

var icons = [
    [0, 'img/campus/Fjerdingen.png'],
    [1, 'img/aktivitet/bicycle.png'],
    [2, 'img/aktivitet/front-of-bus.png'],
    [3, 'img/aktivitet/shopping-cart.png'],
    [4, 'img/aktivitet/2food.png'],
    [5, 'img/aktivitet/food.png'],
    [6, 'img/aktivitet/puzzle.png']
];

var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var infoWindow;
var mapStyle = [ 
    {
        featureType: "poi",
        elementType: "labels",
        stylers: [
            { visibility: "off" }
        ]
    },
    {
         featureType: "transit",
         elementType: "labels",
         stylers: [
            { visibility: "off" }
         ]
    }
];


fillLocations();

//Lager kart og fyller med markers fra xmlfil
function createMap() {
    switch(id) {
        case "1":
            centerPos = new google.maps.LatLng(59.916049, 10.760024);
            break;
        case "2":
            centerPos = new google.maps.LatLng(59.923341, 10.752494);
            break;
        case "3":
            centerPos = new google.maps.LatLng(59.920360, 10.752799);
            break;
    }
    directionsDisplay = new google.maps.DirectionsRenderer({
        preserveViewport: true,
        suppressMarkers: true,
        polylineOptions: { 
            strokeColor : "red"
        }
    });
    map = new google.maps.Map(document.getElementById('campusmap'), {
        mapTypeControlOptions: {
            mapTypeIds: ['mapStyle', google.maps.MapTypeId.ROADMAP]
        },
        zoom: zoom,
        center: centerPos,
        mapTypeId: 'mapStyle'
    });
    map.mapTypes.set('mapStyle', new google.maps.StyledMapType(mapStyle, { name: '@Campus' }));
    directionsDisplay.setMap(map);
    infoWindow = new google.maps.InfoWindow();
    addMarkers();
}

//Fyller kartet med markers
function addMarkers() {
    addMarker(campuses[id-1][0],campuses[id-1][1],campuses[id-1][2], campuses[id-1][3]);
    for(var i = 0; i < dblocations.length; i++) {
        addMarker(dblocations[i][0], dblocations[i][1], dblocations[i][2], dblocations[i][3], dblocations[i][4], dblocations[i][5]);
    }
}

//Legger til marker og legger til eventhandling
function addMarker(name, lat, lng, category, add, time) {
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
            var titleDiv = document.getElementById('markertitle');
            var contentDiv = document.getElementById('markercontent');
            infoWindow.setContent(name);
            infoWindow.open(map, marker);
            createRoute(marker.getPosition());
            titleDiv.innerHTML = name;
            if(marker.getPosition() == centerPos) {
                contentDiv.innerHTML = "Campus!";
            } else {
                contentDiv.innerHTML = "Adresse:<br> " + add + "<br><br>" + "Reisetid: " + time + " min";
            }
        }
    })(marker, i));
}

//Hjelpemetode for å få markericon basert på type
function typeToIconPath(type) {
    if(type == 0) {
        switch(id)  {
            case "1":
                return 'img/campus/Fjerdingen.png';
            case "2":
                return 'img/campus/vulkan.png';
            case "3":
                return 'img/campus/brenneriveien.png';
        }
    }
    for(i = 0; i < icons.length; i++) {
        var iconType = icons[i][0]
        if (type == iconType) {
            return icons[i][1];
        }
    }
    return 'img/icons/pin.png';
}

//Metode for å filtrere etter aktivitetstype
function filterMarkersByType(type) {
    if(directionsDisplay != null) {
        directionsDisplay.setMap(null);
    }
    for(i = 0; i < markers.length; i++) {
        marker = markers[i];
        if(type == "all") {
            marker.setVisible(true);
        } else {
            if(marker.category == type || marker.category == 0) {
                marker.setVisible(true);
            } else {
                marker.setVisible(false);
            }
        }
    }
}

function filterMarkersById(id) {
    for(i = 0; i < markers.length; i++) {
        marker = markers[i];
        if (marker) {}
    }
}

//Tegner rute mellom campus og valgt marker
function createRoute(destination) {
    var request = {
        origin: centerPos,
        destination: destination,
        travelMode: google.maps.TravelMode["WALKING"]
    };
    directionsService.route(request, function(response, status) {
        if (status == 'OK') {
            directionsDisplay.setDirections(response);
        }
    });
}

//To metoder for å hente databaseverdier fra xmlfil
function fillLocations() {
    var xhttp;
    if(window.XMLHttpRequest) {
        xhttp = new XMLHttpRequest();
    } else {
        xhttp = new ActiveXObject("microsoft.XMLHTTP"); 
    }
    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            fillhelper(this);
        }
    };
    xhttp.open("GET", "./assets/xml/map_locations.xml", true);
    xhttp.send();
    
    
}


function fillhelper(xml) {
    var xmlDoc = xml.responseXML;
    id = xmlDoc.getElementsByTagName("data")[0].getAttribute("id");
    var x = xmlDoc.getElementsByTagName("location");
    for(i = 0; i < x.length; i++) {
        try {
            dblocations.push([x[i].getElementsByTagName("name")[0].childNodes[0].nodeValue, parseFloat(x[i].getElementsByTagName("lat")[0].childNodes[0].nodeValue), parseFloat(x[i].getElementsByTagName("lng")[0].childNodes[0].nodeValue), parseInt(x[i].getElementsByTagName("type")[0].childNodes[0].nodeValue), x[i].getElementsByTagName("address")[0].childNodes[0].nodeValue, parseInt(x[i].getElementsByTagName("time")[0].childNodes[0].nodeValue)]);
        } catch(e) {
            console.log("Det mangler vitale dbverdier!" + e);
        }
    }
    console.log(dblocations[0][0]);
    createMap();
}