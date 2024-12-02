$(document).ready(function() {
    $(document).on('click', '#eliminarMaquina', function(e){
        e.preventDefault();
        console.log("Clic en eliminar");
        var machineId = $(this).data("id");
        console.log("ID a eliminar:", machineId);
        
        let confirmation = "¿De verdad quieres eliminar la máquina?";

        if(confirm(confirmation)){
            console.log("Enviando petición a /inventario/eliminar/" + machineId);
            $.ajax({
                url: '/inventario/eliminar/' + machineId,
                type: 'POST',
                success: function(response) {
                    console.log("Éxito - Respuesta:", response);
                    $("#machine"+machineId).remove();
                },
                error: function(xhr, status, error) {
                    console.error("Error al eliminar:", error);
                    console.error("Estado:", status);
                    console.error("Respuesta:", xhr.responseText);
                }
            });
        }
    });

})

// Inicializar el mapa
var map = L.map('map').setView([51.505, -0.09], 13);

// // // Añadir la capa de mosaico de OpenStreetMap
// // L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
// //     maxZoom: 19,
// //     attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
// // }).addTo(map);

// // // Añadir un marcador (opcional)
// // var marker = L.marker([51.505, -0.09]).addTo(map);
// // marker.bindPopup("<b>Mi vida sin ti!</b><br>Es como una vista del gerard").openPopup();
// //  del gerard").openPopup();
