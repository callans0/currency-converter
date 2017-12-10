<?php

//php /users/clareallanson/sites/currency_converter/inc/functions.php

include "rates.php";


// Determines the correct conversion rate
function getConversionRate ( $currfrom, $currto )
{
  global $rates;

  //validate the rates provided
  if ( !array_key_exists( $currfrom, $rates ) && !array_key_exists( $currto, $rates ) ) {
    return "error: neither of the currency codes provided is valid";
    } elseif ( !array_key_exists( $currfrom, $rates ) ) {
        return "error: The currency 'from' is not valid";
      } elseif ( !array_key_exists( $currto, $rates ) ) {
          return "error: The currency 'to' is not valid";
  }

  foreach ($rates as $key => $value) {
    if ($key == $currfrom) {
      foreach ($value as $curr => $rate) {
        if ($curr == $currto) {
        $conversion_rate = $rate;
        return $conversion_rate;
       }
      }
    }
  }
}
//echo getConversionRate( "eur", "hhh");


//Perform conversion alls for the rate then converts the given amount
function performConversion( $amtfrom, $currfrom, $currto )
{
    $rate = getConversionRate( $currfrom, $currto );
    $amtto = $amtfrom * $rate;
    return $amtto;
}
//echo performConversion( 100, "aud", "eur" ) . "\n";
