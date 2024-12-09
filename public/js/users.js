$(document).ready(function () {
    $("#passwordUser").on("keyup", function () {
        var password = $(this).val();
        var exp = "/(?=^.{6,13})(?=\w)/";

        if (!password.match(exp)) {
            console.log("no concuerda");
            $("#saveUserButton").prop("disabled", true);
        } else {
            $("#saveUserButton").prop("disabled", false);
        }
    });
});