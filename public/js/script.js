// hamburger menu

function toggleMenu() {
    var navbar = document.getElementById("myNavbar");
    navbar.style.transform = navbar.style.transform === "translateX(0)" ? "translateX(-101%)" : "translateX(0)";
}

// Dodana obsługa zdarzenia na kliknięcie poza menu
document.addEventListener('click', function (event) {

    var navbar = document.getElementById("myNavbar");
    var button = document.querySelector('#navMenu');

    if (event.target !== navbar && event.target !== button) {
        // Jeśli kliknięto poza menu i przyciskiem, schowaj menu
        navbar.style.transform = "translateX(-101%)";
    }
});


// interkatywna mapa

// let map;
// let mouseX = 0;
// let mouseY = 0;

// function initMap() {
//     map = new google.maps.Map(document.getElementById('map'), {
//         center: {
//             lat: 0,
//             lng: 0
//         },
//         zoom: 2,
//         disableDefaultUI: true,
//         styles: [{
//             featureType: 'all',
//             elementType: 'geometry',
//             stylers: [{
//                 color: '#242f3e'
//             }]
//         }]
//     });

//     document.addEventListener('mousemove', handleMouseMove);
// }

// function handleMouseMove(event) {
//     mouseX = event.clientX / window.innerWidth - 0.5;
//     mouseY = event.clientY / window.innerHeight - 0.5;

//     updateMapPosition();
// }

// function updateMapPosition() {
//     if (map) {
//         const center = map.getCenter();
//         const newLat = center.lat() + mouseY * 30;
//         const newLng = center.lng() - mouseX * 60;
//         map.setCenter(new google.maps.LatLng(newLat, newLng));
//     }
// }

// google maps api

let map;

async function initMap() {
  const { Map } = await google.maps.importLibrary("maps");

  map = new Map(document.getElementById("map"), {
    center: { lat: -34.397, lng: 150.644 },
    zoom: 8,
  });
}

initMap();
