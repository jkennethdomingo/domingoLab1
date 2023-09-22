
$(document).ready(function() {
    $("#errorModal").modal("show");
});

document.getElementById('closeErrorModal').addEventListener('click', function() {
var modal = document.getElementById('errorModal');

$(modal).modal('hide');
});