<?php
 function WrongGuessedProducts( $strProducts, $strGuessedPrices ) { 

		$strProducts_arr = explode(" ", $strProducts);
		$strGuessedPrices_arr = explode(" ", $strGuessedPrices);
		sort($strGuessedPrices_arr);
		$combine = array_combine($strProducts_arr, $strGuessedPrices_arr);
		ksort($combine);
		
		return implode(' ', array_map( function ($value, $key) { return $key ; }, $combine, array_keys($combine) ));
	 
 } 



	$strProducts = 'code job foo bar jar' ; 
	$strGuessedPrices = '20 15 30 50 60' ; 

echo  WrongGuessedProducts( $strProducts, $strGuessedPrices ) ;

 ?>