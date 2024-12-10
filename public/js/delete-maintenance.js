$(document).ready(function() {
    $(document).on('click', '#eliminarMantenimiento', function(e) {
        e.preventDefault(); // Previene el comportamiento predeterminado del enlace
        console.log("Clic en eliminar");
        var maintenanceId = $(this).data("id");
        console.log("ID a eliminar:", maintenanceId);
        
        let confirmation = "¿De verdad quieres eliminar el mantenimiento?";
        
        if (confirm(confirmation)) {
            console.log("Enviando petición a /mantenimiento/eliminar/" + maintenanceId);
            // Redirige al usuario a la URL para eliminar el mantenimiento
            window.location.href = "/mantenimiento/eliminar/" + maintenanceId;
        }
    });
});