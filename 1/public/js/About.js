var About = {

    init:function() {


        $("#readmore").click(function(){
            $("#more").hide();

            $("#regstep"+s).show();
            
            if(s>1) {
                $("#regbacktbt").show()
            }

            if(s>=3) {
                s = 3;
                $("#regsubmit").show();
                $("#regnextbt").hide();
            }else{
                $("#regsubmit").hide();
                $("#regnextbt").show();
            }
        });
        
    }
}
$(document).ready(function () {
    About.init();
});
