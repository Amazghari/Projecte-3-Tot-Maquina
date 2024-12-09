// $(document).ready(function () {
//     $("#passwordUser").on("keyup", function () {
//         var password = $(this).val();
//         var exp = "/(?=^.{6,13})(?=\w)/";

//         if (!password.match(exp)) {
//             console.log("no concuerda");
//             $("#saveUserButton").prop("disabled", true);
//         } else {
//             $("#saveUserButton").prop("disabled", false);
//         }
//     });
// });

$(document).ready(function () {
    $("#passwordUser").on("keyup", function () {
        var password = $(this).val();
        // Expresión regular para validar una contraseña entre 6 y 13 caracteres alfanuméricos
        var exp = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z0-9\-]{6,13}$/;

        // Validación de la contraseña
        if (!password.match(exp)) {
            console.log("La contraseña no concuerda");
            // Deshabilitar el botón de guardar si la contraseña no es válida
            $("#saveUserButton").prop("disabled", true);
        } else {
            console.log("La contraseña concuerda");
            // Habilitar el botón de guardar si la contraseña es válida
            $("#saveUserButton").prop("disabled", false);
        }
    });

    // Prevenir el envío del formulario si el botón está deshabilitado
    $("#incident-form").on("submit", function (event) {
        if ($("#saveUserButton").prop("disabled")) {
            event.preventDefault(); // Prevenir el envío del formulario si el botón está deshabilitado
            console.log("El formulario no se envió porque el botón está deshabilitado.");
        }
    });
});