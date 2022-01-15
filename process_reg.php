<?php session_start();
include('config.php');

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$rd=$_POST['rd'];
$mob=$_POST['mob'];
//echo $mob;

$gender=$_POST['radio'];
$pass=$_POST['pass'];
$errs=0;

if(isset($_SESSION['gid']) & $_SESSION['gid']!="")
{

mysql_query("BEGIN");
mysqli_autocommit($con3, FALSE);

//echo $_SESSION['gid'];

//echo "radio ".$rd;

/*$qryuser=mysql_query("select max(user_id) from generate_userid");
$fetchuser=mysql_fetch_array($qryuser);
$fetchid=mysql_num_rows($qryuser);

if($fetchid>0)
{
$uid=$fetchuser[1]+1;
}
else
{
$uid=1;
}
$qryid=mysql_query("INSERT INTO `generate_userid`(user_id) values ('".$uid."');*/

$chkqry=mysql_query("select * from customer_login where email='".$email."' ");
$fetch1=mysql_num_rows($chkqry);


//$chkqry2=mysql_query("select * from Registration where Mobile='".$mob."' ");
//$fetch12=mysql_num_rows($chkqry2);


$qrylogin233=mysql_query("select login_id from `customer_login` where `login_id`='".$_SESSION['gid']."'");
$sesidrws=mysql_num_rows($qrylogin233);

if($fetch1 > 0)
{

echo 2;

}
else if($sesidrws > 0)
{
    echo 3;
}
else
{
$qry=mysql_query("update Registration set `Firstname`='".mysql_real_escape_string($fname)."',`Lastname`='".mysql_real_escape_string($lname)."',`email`='".mysql_real_escape_string($email)."',`Mobile`='".mysql_real_escape_string($mob)."',`Gender`='".$rd."',`password`='".mysql_real_escape_string($pass)."' where registration_id='".$_SESSION['gid']."'");
if(!$qry)
{
  // echo "update Registration set `Firstname`='".mysql_real_escape_string($fname)."',`Lastname`='".$lname."',`email`='".mysql_real_escape_string($email)."',`Mobile`='".mysql_real_escape_string($mob)."',`Gender`='".$rd."',`password`='".mysql_real_escape_string($pass)."' where registration_id='".$_SESSION['gid']."'";
$errs++;
}

$qrylogin=mysql_query("INSERT INTO `customer_login`(`email`, `password`, `login_id`) VALUES ('".mysql_real_escape_string($email)."','".mysql_real_escape_string($pass)."','".$_SESSION['gid']."')");
if(!$qrylogin)
{
  
$errs++;
}

$qrylogin2=mysqli_query($con3,"UPDATE `phppos_people` SET `first_name`='".mysql_real_escape_string($fname)."',`last_name`='".mysql_real_escape_string($lname)."',`phone_number`='".mysql_real_escape_string($mob)."',`email`='".mysql_real_escape_string($email)."' WHERE person_id='".$_SESSION['gid']."'");
if($qrylogin2=="")
{
    $errs++;
}
if($errs==0)
{
$qrymail=mysql_query("select id from verification where email='".$email."'");
//echo "select * from verification where email='".$email."'";
$fetchem=mysql_fetch_array($qrymail);
$fetch=mysql_num_rows($qrymail);

function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}
  $string=random_string(7);
       $email = strip_tags($email);





$str="";


  if($fetchem[0]!="")
  {   
  	$str="update verification  set code='".mysql_real_escape_string($string)."' where EMAIL='".$email."' ";
  
   }
   else
   {
if($_SESSION['gid']!="")
{
 	$str="INSERT INTO verification(email,code,reg_id) VALUES ('".mysql_real_escape_string($email)."','".mysql_real_escape_string($string) ."','".$_SESSION['gid']."')";
}
else
{
$str="INSERT INTO verification(email,code,reg_id) VALUES ('".mysql_real_escape_string($email)."','".mysql_real_escape_string($string)."','".$_SESSION['gid']."')";
}
 	//echo $str;
 }
 
//echo $str;
$qry1 = mysql_query($str);
//print_r($qry1 );
//die;
//echo $qry1;
echo mysql_error();
//echo $email;

if($qry1)
{
$subject="Verification Code e-commerce";
$headers = "From: sales@yosshitaneha.com \r\n";
//$headers .= "Cc: <info@designbigideas.com>\r\n";
			//$headers .= "Reply-To: ".dfdf . "\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			//$headers .= "Cc: ".$this->ccm."\r\n";
			//echo $tbl."<br>";
			//echo $this->ccm;
			$message="Your verification code is ".$string;
			
			//$send = mail('rahull.1612@gmail.com', 'Test Subject', $message);
			$result = mail($email, $subject, $message, $headers);
                       // $result = mail('secretary@ipua.in', $subject, $message, $headers);
			//$result = mail('rahull.1612@gmail.com', 'Test Subject', $message);


}

}

if($errs==0)
{
    echo mysql_error();
      mysql_query("COMMIT");
     mysqli_commit($con3);
echo $email;
//$_SESSION['gid']="";
}
else
{
     mysqli_rollback($con3) ;
    mysql_query("ROLLBACK");
echo "error";
}

}
}else
{
    
    echo 50;
}
?>