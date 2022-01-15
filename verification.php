<?php
include('config.php');
$email=$_POST['email'];
$cd=$_POST['cd'];

$qrymail=mysql_query("select id from verification where email='".$email."' and code='".$cd."'");
//echo "select id from verification where email='".$email."' and code='".$cd."'";
$fetch=mysql_num_rows($qrymail);

if($fetch>0)
{
echo 1;
}
else
{
echo 0;
}
?>