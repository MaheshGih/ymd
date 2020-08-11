$(document).ready(function () {
    var res = location.search;
    res = res.split("=");
    displayNotification(res[1], res[2]);
});
function displayNotification(result, type) {
    if (result == "failure") {
        Swal.fire({
            type: "error",
            title: "Oops...",
            text: "Something went wrong!",
            confirmButtonClass: "btn btn-confirm mt-2",
            footer: 'Activation failed. Try again later.'
        });
    }
    if (result == 'success') {
        Swal.fire({
            title: "Good job!",
            text: getUserMessages(result, type),
            type: "success",
            confirmButtonClass: "btn btn-confirm mt-2"
        });
    }
}
function getUserMessages(result, type) {
    var successInsertMsg = "Hurray : User is Activated Successfully.";
    if (result == "success" && type == "insert") {
        return successInsertMsg;
    }
}