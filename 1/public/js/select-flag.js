var Selectflag = {

    init:function() {

     
        $("#swapperleft").chosen({width:"100%"});
		$("#swapperright").chosen({width:"100%"});
        $(".my-select-border").chosen({
            width:"100%",
            html_template: '{text} <img style="border:3px solid #ff703d;padding:0px;margin-right:4px"  class="{class_name}" src="{url}" />'
        });
    }
}
$(document).ready(function () {
    Selectflag.init();
});
