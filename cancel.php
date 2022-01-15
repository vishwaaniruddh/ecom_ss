<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function counthi($string,$word){

$count = 0; 

if(strpos($string, $word) !== false){
	$count++;
	echo	$count;
	counthi($string,$word) ; 

} else{
	return $count ;
}

return $count ; 
}




$string = 'this is grgaete ! '; 

$word = 'is';
echo counthi($string,$word) ; 

 ?>