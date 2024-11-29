$(document).ready(function() {
    $(document).on('click', '#eliminarMaquina', function(){
        console.log("+++");
        var machineId = $(this).data("id");
        console.log(machineId);
        const formData = {
            id: machineId,
        }
        let confirmation= "De verdad que quieres eliminar la maquina?";

        if(confirm(confirmation)){

            $.ajax({
                url: '/inventario/eliminar',
                type: 'POST',
                data: formData,
                success: function () {
                        console.log(machineId);
                        $("#machine"+machineId).remove();
              }
        
            });
    }
    });

})// Inicializar el mapa
var map = L.map('map').setView([51.505, -0.09], 13);

// Añadir la capa de mosaico de OpenStreetMap
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

// Añadir un marcador (opcional)
var marker = L.marker([51.505, -0.09]).addTo(map);
marker.bindPopup("<b>Mi vida sin ti!</b><br>Es como una vista del gerard").openPopup();
