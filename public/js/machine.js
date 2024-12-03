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
