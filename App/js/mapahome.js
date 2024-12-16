
document.addEventListener('DOMContentLoaded', function() {

    const map = L.map('mapid').setView([42.2674, 2.9556], 13);

    // Add OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
    }).addTo(map);
    var maquina=JSON.parse(document.getElementById("machinesmap").value);
    console.log(maquina);
    console.log(Array.isArray(maquina));

    maquina.forEach(function(maq) {
        console.log(maq.id);
        console.log(maq);
        if(maq.latitude!=null && maq.longitude!=null){
        L.marker([maq.latitude, maq.longitude]).addTo(map)
        .bindPopup(maq.name)
        .openPopup();
        }
    });

    // Initialize the map
  

    // Inicial location
    // L.marker([42.2674, 2.9556]).addTo(map)
    //     .bindPopup('Ubicació inicial.')
    //     .openPopup();

    // Function for add locations
    window.addMarker = function(lat, lng) {
        L.marker([lat, lng]).addTo(map)
            .bindPopup(`Nueva ubicación: ${lat.toFixed(4)}, ${lng.toFixed(4)}`)
            .openPopup();
    }

    // Add a personalized button for the map
    const addButtonControl = L.control({ position: 'topright' });

  

    addButtonControl.addTo(map);
});