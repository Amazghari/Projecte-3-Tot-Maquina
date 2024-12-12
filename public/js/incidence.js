$(document).ready(function() {
    $(document).on('click', '#eliminarIncidencia', function(e) {
        e.preventDefault(); // Previene el comportamiento predeterminado del enlace
        console.log("Clic en eliminar");
        var incidenceId = $(this).data("id");
        console.log("ID a eliminar:", incidenceId);
        
        let confirmation = "¿De verdad quieres eliminar la máquina?";
        
        if (confirm(confirmation)) {
            console.log("Enviando petición a /incidencia/eliminar/" + incidenceId);
            // Redirige al usuario a la URL para eliminar la incidencia
            window.location.href = "/incidencia/eliminar/" + incidenceId;
        }
    });
});


function allowDrop(ev){
    ev.preventDefault();
    console.log("asjhdkjahdkas");
}
function drag(ev){
    ev.dataTransfer.setData("text", ev.target.innerText);
}
function drop(ev){
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.value = data;
}
