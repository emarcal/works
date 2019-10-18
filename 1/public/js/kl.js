function kl() {
    console.log("kl")
    $.get("/me/kl", function (data) {});
}


$(document).ready(function () {

    kl();

    setInterval(function () {
        kl();

    }, 30000);


});
