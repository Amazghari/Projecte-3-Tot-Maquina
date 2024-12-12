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
