Vorder = {

    init: function () {
        this.setUI();
    },

    setUI: function () {

        $("#btcord").click(function () {
            var r = confirm("Confirm Cancel Order?");
            if (r == true) {
                var oid = $("#btcord").attr("oid");
                window.location.replace("/me/tokenico/"+oid+"/cancel");
            }
        });

        $("#capay").click(function () {
            var r = confirm("Confirm Cancel Payment?");
            if (r == true) {
                var oid = $("#capay").attr("oid");
                window.location.replace("/me/tokenico/"+oid+"/paycancel");
            }
        });

        
    }

}

$(document).ready(function () {
    Vorder.init();
});
