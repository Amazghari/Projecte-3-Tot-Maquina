$(document).ready(function() {
    // Initialize the map
    const map = L.map('mapid').setView([42.2674, 2.9556], 13);

    // Add OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
    }).addTo(map);

    // Inicial location
    L.marker([42.2674, 2.9556]).addTo(map)
        .bindPopup('Ubicació inicial.')
        .openPopup();

    // Function for add locations
    function addMarker(lat, lng) {
        L.marker([lat, lng]).addTo(map)
            .bindPopup(`Nueva ubicación: ${lat.toFixed(4)}, ${lng.toFixed(4)}`)
            .openPopup();
    }

    // Add a personalized button for the map
    const addButtonControl = L.control({ position: 'topright' });

    addButtonControl.onAdd = function() {
        const buttonDiv = L.DomUtil.create('div', 'leaflet-bar leaflet-control leaflet-control-custom');
        buttonDiv.innerHTML = '<button id="addLocationBtn" style="padding:5px;">Añadir Ubicación</button>';
        return buttonDiv;
    };

    addButtonControl.addTo(map);
});
