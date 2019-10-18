var inputl = document.getElementById('inputleft').value;
var selectr = document.getElementById('swapperright').value;
var coindecimalr = selectr;
var calc = inputl * coindecimalr;
var inputr = document.getElementById('inputright').value = calc;
function swapcalcleft(){
    // Rigtht to Left
    var inputl = document.getElementById('inputleft').value;
    var selectr = document.getElementById('swapperright').value;
    var coindecimalr = selectr;
    var calc = inputl * coindecimalr;
    var inputr = document.getElementById('inputright').value = calc;
}
function swapcalcright(){
    // Rigtht to Left
    var inputr = document.getElementById('inputright').value;
    var selectl = document.getElementById('swapperleft').value;
    var coindecimall = selectl;
    var calc = inputr * coindecimall;
    var inputr = document.getElementById('inputleft').value = calc;
}