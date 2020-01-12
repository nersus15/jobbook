$(document).ready(function () {
    data = $("#modals").html();
    $("#drop").append(
        data
    );
    $("#dropdownMenu").removeAttr('style');
    $("#modals").remove();
})

