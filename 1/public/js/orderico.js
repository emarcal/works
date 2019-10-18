

window.valid = false;

$(document).ready(function() {

    $('#amount').numberField({
        ints: 9, 
        floats: 3, 
        separator: "."
    });
    
    $('form').on('submit', function(e){
      // validation code here
      if(!window.valid) {
        e.preventDefault();
      }
    });


  });

 function addinvalid() {

     $("#wallet").after('<div class="iwallet">Invalid Ethereum Wallet</div>');
 }

 function addinvalidamount() {
    $("#amount").after('<div class="iamount">Invalid Amount Value</div>');
}

    function calc(){
       
        var amount = parseFloat($("#amount").val());
        var wallet = $("#wallet").val();
        var trate = $("#trate").val()
        var tsym = $("#tsym").val()
        var au = parseFloat($("#au").val())

        $("#displaywallet").html(wallet);
        $(".iamount").remove();
        $(".iwallet").remove();
     
        if(amount <= 0){
            $("#btnsubmit").prop('disabled', true);
        }else{

            
            if(amount > au) {
                $("#btnsubmit").prop('disabled', true);
                addinvalidamount();
                return;
            }

            if(Web3.utils.isAddress(wallet)){
                $("#btnsubmit").prop('disabled', false);
                $(".iwallet").remove();
            }else{
                $("#btnsubmit").prop('disabled', true);
                addinvalid();
            }
        }
        var current_value = trate;
        var calc = amount * current_value;
        var num = calc;
        var n = num.toFixed(2);
        $("#display").html(n+tsym);
        $("#display2").html(amount);
        $("#display3").html(n+tsym);
       
    }

    function orderValidation(){
        $("#tokenorder").hide();
        $("#confirmorder").show();

    }

    function sendorder() {
        window.valid = true;
        $('#order').submit()
    }

    function orderCancel(){
        $("#tokenorder").show();
        $("#confirmorder").hide();
        window.valid = false;
    }
  
