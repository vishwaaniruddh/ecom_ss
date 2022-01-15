<?php session_start();
include('config.php');

$gid=$_SESSION['gid'];
$email=$_POST['usernm'];
$passwd=$_POST['pass'];
//var_dump($_POST);
mysql_query("BEGIN");
mysqli_autocommit($con3, FALSE);



$sql=mysqli_query($conn,"select * from Registration where email='".$email."' and password='".$passwd."'");

if($sql_result=mysqli_fetch_assoc($sql)){
    


$_SESSION['fname']=$sql_result['Firstname'];
$_SESSION['lname']=$sql_result['Lastname'];
$_SESSION['mobile']=$sql_result['Mobile'];
$_SESSION['email'] = $sql_result['email'];
$_SESSION['gid'] = $sql_result['registration_id'];


    mysqli_query($conn,"update cart set user_id = '".$sql_result['id']."' where user_id='".$gid."'");
    
    
    
    echo '<script>alert("Login Successfully");
    window.location.href="index.php";
    </script>';
}
else{
    
    echo '<script>alert("Incorrect Login Credentials");
    window.history.back();
    </script>';
    
}