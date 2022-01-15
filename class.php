<?php 
$str1 = 'hiakashihiHihihi';
$str2 = 'hi';

echo countHi($str1,$str2);

function countHi($str1,$str2){
 $n1 = strlen($str1);
 $n2 = strlen($str2);
  
	 if($n2 == 0 || $n1 < $n2){
	  return 0;
	 }
  
	if(substr($str1,0,$n2) == $str2){
	    return countHi(substr($str1,$n2,$n1-$n2),$str2) + 1;
	 }
  
	return countHi(substr($str1,$n2,$n1-$n2),$str2);
}
?>  