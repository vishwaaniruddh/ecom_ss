<?php 

for ($i=1; $i < 255; $i++) { 

	 $ip = 'http://192.168.31.'.$i ;  ?>
	 <a href="<?php echo $ip; ?>"><?php echo $ip; ?></a>
<?php 
	if($i%10==0){
echo '<br><br>';
	}
	echo '<br>';
}
 ?>