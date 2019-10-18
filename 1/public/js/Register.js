var Register = {
    s: 1,
    next: false,
    ajax:false,
    username: false,
    email: false,
    submit: false,

    isEmail: function (email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,6})+$/;
        return regex.test(email);
    },

    validateForm: function () {

        console.log(Register.s);

        $("#regnextbt").hide();
        Register.next = false;

        Register.clearLineAlerts();


        if (Register.s == 1) {
            var s1 = true;
            $(".ri1").removeClass("redborder");

            $(".ri1").each(function (index) {

                if ($(this).val() == "") {
                    $(this).addClass("redborder");
                    Register.addLineAlert($(this),"Empty Value!");
                    s1 = false;
                }

            });

            if(!s1) {
                $("#regnextbt").show();
                return false;
            }

            $("#name").val(toTitleCase($("#name").val()));
            $("#lastname").val(toTitleCase($("#lastname").val()));

            if (!Register.isEmail($("#email").val())) {
                $("#email").addClass("redborder");
                Register.addLineAlert($("#email"),"Invalid Email!");
                $("#regnextbt").show();
                s1 = false;
                return false;
            }

     

            Register.checkuser($("#email").val(),"e",function(v){
                Register.next = true;
                Register.email = true;
                s1 = true;
                $("#regnextbt").show();
                if(v=="1") {
                    Register.addLineAlert($("#email"),"Email already registed!");
                    s1 = false;
                    Register.next = false;
                    Register.email = false;
                    return false;
                }
                


                Register.checkuser($("#username").val(),"u",function(v){
                    Register.next = true;
                    Register.username = true;
                    s1 = true;
                    $("#regnextbt").show();
                    if(v=="1") {
                        Register.addLineAlert($("#username"),"CPF already registed!");
                        s1 = false;
                        Register.next = false;
                        Register.username = false;
                        return false;
                    }

                    
                    if(Register.username == true || Register.email == true) {
                        $("#regnextbt").click();
                    }
                    
    
                });
            });

            if(!s1) {
                Register.next = false;
                $("#regnextbt").show();
                return false;
            }

            

        }

        if (Register.s == 2) {
            var s2 = true;
            $(".ri2").removeClass("redborder");

            $(".ri2").each(function (index) {

                if ($(this).val() == "") {
                    $(this).addClass("redborder");
                    Register.addLineAlert($(this),"Empty Value!");
                    s2 = false;
                }

            });

            if(!s2) {
                $("#regnextbt").show();
                return false;
            }

            Register.next = true;

            $(".ri2").removeClass("redborder");

            $(".ri2").each(function (index) {

                if ($(this).val() == "") {
                    $(this).addClass("redborder");
                    Register.addLineAlert($(this),"Empty Value!");
                    s2 = false;
                }



            });

            if(!s2) {
                return false;
            }

            $(".ri2").each(function (index) {

                if ($(this).val().length < 6) {
                    $(this).addClass("redborder");
                    Register.addLineAlert($(this),"Password must be bigger than 6 chars!");
                    s2 = false;
                }          

            });

            if(!s2) {
                return false;
            }

            if($("#password").val() != $("#password-confirm").val()) {
                $("#password").addClass("redborder");
                    Register.addLineAlert($("#password"),"Password and Confirm not match!");
                    s2 = false;
            }

            if(!s2) {
                return false;
            }

            Register.submit = true;
            $("#regform").submit();
            

        }
    },

    addLineAlert: function(el,msg) {
        var html = '<span class="lalert invalid-feedback ared" role="alert">'+msg+'</span>';  
        el.parent().append(html);
    },

    clearLineAlerts: function() {
        $(".lalert").remove();
    },

    checkuser: function (v, t, _cb) {
        $("#regnextbt").hide();
        $.get("/cu", {
            v: v,
            t: t
        }).done(function (data) {
            _cb(data);
        });
    },

    btnext: function() {


        if(Register.next) {
            $(".regsteps").hide();
            Register.s++;

            $("#regstep" + Register.s).show();

            if (Register.s > 1) {
                $("#regbacktbt").show()
            }

            if (Register.s >= 2) {
                Register.s = 2;
                $("#regsubmit").show();
                $("#regnextbt").hide();
            } else {
                $("#regsubmit").hide();
                $("#regnextbt").show();
            }
            Register.next = false;
        }

    },

    init: function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#regform").submit(function(e){
            if(!Register.submit) {
                e.preventDefault();   
            }
            
        });

        $("#regsubmit").click(function () {
            $("#regnextbt").click();
        });

        


        $(".ri1").keydown(function (e) {
            $(this).removeClass("redborder");
            $(this).parent().find(".lalert").remove();
        });

        $('#username').keydown(function (e) {
            if (e.shiftKey || e.ctrlKey || e.altKey) {
                e.preventDefault();
            } else {
                var key = e.keyCode;
                if (!((key == 8) || (key == 46) || (key >= 25 && key <= 40) || (key >= 65 && key <= 90) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) {
                    e.preventDefault();
                }
            }
        });

        $("#regnextbt").click(function () {
            console.log(Register.next);

            if(Register.username == false || Register.email == false) {
                Register.next = false;
            }

            if(!Register.next) {
            Register.validateForm();
            }
            Register.btnext();    
            
        });

        $("#regbacktbt").click(function () {
            $(".regsteps").hide();
            Register.s--;
            $("#regstep" + Register.s).show();

            if (Register.s <= 1) {
             
            }

            if (Register.s <= 0) {
                Register.s = 1;
            }
            
        });
    }
}

function toTitleCase(str) {
    return str.replace(/\w\S*/g, function (txt) {
        return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
    });
}

$(document).ready(function () {
    Register.init();
});