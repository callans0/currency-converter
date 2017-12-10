<?php

//php /users/clareallanson/sites/currency_converter/currencyconverter.php

include "inc/functions.php";


echo "---------------------------------------------\n";
echo "          Welcome To My Currency Converter\n";
echo "---------------------------------------------\n";

echo "Please enter the amount you wish to convert: ";
$amtfrom = trim(fgets(STDIN));

if ( !is_numeric($amtfrom) || empty($amtfrom)){
  echo "Please start again, this time entering a numeric value";
  exit;
}

echo "What currency is this in?: ";
$currfrom = trim(strtolower(fgets(STDIN)));

if ( is_numeric($currfrom) || empty($currfrom) || strlen($currfrom) != 3 ) {
  echo "You need to enter a 3 digit currency code. Please try again\n";
  exit;
}

echo "Please enter the currency you wish to convert to: ";
$currto = trim(strtolower(fgets(STDIN)));

if ( is_numeric($currto) || empty($currto) || strlen($currto) != 3 ) {
  echo "You need to enter a 3 digit currency code. Please try again\n";
  exit;
}

$return = getConversionRate( $currfrom, $currto );
if ( strpos( $return, 'error') !== FALSE ) {
  echo "Oops, there's been an " . $return . ". Please try again.";
} else {
    echo "The rate is: " . getConversionRate( $currfrom, $currto ) . "\n";
    echo "Your converted amount is: " . performConversion( $amtfrom, $currfrom, $currto ) . trim(strtoupper($currto)) . "\n";
}

echo "---------------------------------------------\n";
