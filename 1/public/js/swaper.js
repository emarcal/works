var Swaper = {

    init:function() {

        var s = 1;

        $(document).ready(function() {
            $("#btnswap").on('click', function (ev) {swaper();
        });
        });

        function swaper () {
            var co=$("#swapperleft").val();
            $("#swapperleft").val($("#swapperright").val());
            $("#swapperright").val(co);
        }
    }
}
$(document).ready(function () {
    Swaper.init();
});
