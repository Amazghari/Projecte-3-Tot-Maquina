$(document).ready(function() {
    $('#preventive_time_div').hide();
    $('#type').change(function (e) { 
        e.preventDefault();
        var value = $(this).val();
        console.log(value);
        if (value == "Preventivo") {
            $('#preventive_time_div').show();
        } else {
            $('#preventive_time_div').hide();
        }
    });
});