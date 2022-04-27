$(document).ready(function () {
    "use strict";
    $('#years').change(function (e) {
        e.preventDefault();
        $('#months').prop("disabled", false);
    })
});