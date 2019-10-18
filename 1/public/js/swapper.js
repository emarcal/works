var Swaper = {

    init:function() {

        var status = 0;

        $(document).ready(function() {
            $("#btnswap").on('click', function swaper(){
                if(status==0){
                    $("#row-sel-left").css("float","right");
                    $("#row-sel-right").css("float","left");
                    $("#row-btn").css("float","right");

                    $("#amountl").hide();
                    $("#amountr").show();
                    $("#tol").show();
                    $("#tor").hide();
                    
                    status = 1;
                }else{
                    $("#row-sel-left").css("float","left");
                    $("#row-sel-right").css("float","right");
                    $("#row-btn").css("float","left");

                    $("#amountl").show();
                    $("#amountr").hide();
                    $("#tol").hide();
                    $("#tor").show();
                    status = 0;
                }
               
          
        });
        });


      
    }
}
$(document).ready(function () {
    Swaper.init();
});
