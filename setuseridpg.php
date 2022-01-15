<?php  session_start();
include('config.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if($_SESSION['gid']=="")
{ 
    if(mysqli_query($conn,"INSERT INTO `Registration`(`registration_id`) values ('')")){


$usrid=$conn->insert_id;
echo $usrid;
}
$_SESSION['gid']=$usrid;


}
     

?>
