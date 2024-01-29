
import { YOUR_MAPBOX_ACCESS_TOKEN1 } from './mapTokens.js';


mapboxgl.accessToken = YOUR_MAPBOX_ACCESS_TOKEN1;
//alert(YOUR_MAPBOX_ACCESS_TOKEN)


fetch("/Incidents", {
    method: "GET"
}).then(function (response) {
    return response.json();
}).then(function(Incidents) {

    Incidents.map(Incident => {
        Incident.location = JSON.parse(Incident.location).point
    });

    console.log(Incidents)
    placeMarkers(Incidents);
});

const map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/light-v11',
    center: [19.944544, 50.049683],
    zoom: 10
});

function placeMarkers(Incidents) {
    for (const feature of Incidents) {
        // create a HTML element for each feature
        const el = document.createElement('div');
        el.className = 'marker';

        // make a marker for each feature and add to the map
            new mapboxgl.Marker(el)
                .setLngLat(feature.location)
                .setPopup(
                    new mapboxgl.Popup({offset: 25}) // add popups
                        .setHTML(
                            `<h3>${feature.title}</h3>
                         <p>${feature.decription}</p>
                         <p>Gdzie: ${feature.location}</p>
                         <p>O godzinie: ${feature.time}</p>
                         <p>Autor: ${feature.author}</p>
                        `
                        )
                )
                .addTo(map);
    }
}