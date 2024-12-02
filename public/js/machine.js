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
<script>
$(document).ready(function () {
    $("#search").on("keyup", function () {
        var searchValue = $(this).val();
        if (searchValue.length >= 3) {
            $.ajax({
                type: "GET",
                url: "/inventario/buscar", // Cambia esta URL según tu ruta
                data: { query: searchValue },
                success: function (data) {
                    // Limpiar la tabla actual
                    $("#DataSearching").html("");
                    // Agregar los resultados a la tabla
                    if (data.length > 0) {
                        $.each(data, function (index, machine) {
                            var row = "<tr class='hover:bg-gray-50'>" +
                                "<td class='px-6 py-4 text-sm text-gray-900'>#MAQ-" + machine.id + "</td>" +
                                "<td class='px-6 py-4 text-sm text-gray-900'><p class='truncate max-w-[200px]'>" + machine.name + "</p></td>" +
                                "<td class='px-6 py-4'>" + machine.serial_num + "</td>" +
                                "<td class='px-6 py-4 text-sm text-gray-900'>USR-123</td>" +
                                "<td class='px-6 py-4 text-sm text-gray-900'>Miguelito</td>" +
                                "<td class='px-6 py-4 text-sm'>" +
                                "<div class='flex space-x-3'>" +
                                "<a href='/inventario/editar/" + machine.id + "' class='cursor-pointer text-blue-600 hover:text-blue-800'>" +
                                "<svg class='w-5 h-5' fill='none' stroke='currentColor' viewBox='0 0 24 24'>" +
                                "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z'/>" +
                                "</svg></a>" +
                                "<button class='text-red-600 hover:text-red-800' data-id='" + machine.id + "'>" +
                                "<svg class='w-5 h-5' fill='none' stroke='currentColor' viewBox='0 0 24 24'>" +
                                "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16' />" +
                                "</svg></button>" +
                                "</div></td></tr>";
                            $("#DataSearching").append(row);
                        });
                    } else {
                        $("#DataSearching").html('<tr style="color:red"><td colspan="6">No se encontraron resultados</td></tr>');
                    }
                }
            });
        }
    });
});
</script>


//buscador maquinas
$("#search").on("keyup", function() {


    $.ajax({
        url: '/inventario/buscar/' + $(this).val(),
        type: 'GET',
        success: function(response) {
            console.log(response);
        }
    });
});

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
