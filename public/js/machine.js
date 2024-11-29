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

})