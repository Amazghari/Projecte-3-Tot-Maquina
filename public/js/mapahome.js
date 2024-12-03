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

  

    addButtonControl.addTo(map);
});





    // Inicializa el mapa
    var map = L.map('map').setView([51.505, -0.09], 13); // Cambia las coordenadas a las que necesites

    // Capa de los tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap'
    }).addTo(map);

    // Agregar un marcador
    var marker = L.marker([51.505, -0.09]).addTo(map); // Cambia las coordenadas del marcador
    marker.bindPopup('¡Hola! Soy un marcador.').openPopup();
