<?php
 
if (!function_exists('numberFormat')) {
    
    function numberFormat($number, $decimals = 2, $sep = ".", $k = ","){
        $number = bcdiv($number, 1, $decimals); // Truncate decimals without rounding
        return number_format($number, $decimals, $sep, $k); // Format the number
    }
}