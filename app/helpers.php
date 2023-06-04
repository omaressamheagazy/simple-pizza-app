<?php
/**
 * 
 *
 * @param float $money
 * @param integer $decimalPlaces, it depends on country, like in USA it's 2
 * @return integer
 */
function calculateMoneyInCents($money, int $decimalPlaces = 2):int { //
    $multiplicationFactor = pow(10, $decimalPlaces); 
    return ($money * $multiplicationFactor);
}

function convertMoneyFromCents($centsValue, int $decimalPlaces = 2): float  {
    $divisionFactor = pow(10, $decimalPlaces);
    $currencyValue = $centsValue / $divisionFactor;
    return $currencyValue;
}
?>