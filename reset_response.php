<?php include_once('header.php'); 

error_reporting(1);

// include('../functions.php');


function get_id($email){
    
    global $conn;
    
    $get_id=mysqli_query($conn,"select login_id from customer_login  where email='".$email."'");
    $get_id_result=mysqli_fetch_assoc($get_id);
    
    $id=$get_id_result['login_id'];
    
    return $id;
}


?>



<style>
    *, *:before, *:after {
  box-sizing: border-box;
}

html {
  overflow-y: scroll;
}

body {
  background: #c1bdba;
  font-family: 'Titillium Web', sans-serif;
}

a {
  text-decoration: none;
  color: #1ab188;
  -webkit-transition: .5s ease;
  transition: .5s ease;
}
a:hover {
  color: #179b77;
}

.form {
  background: rgba(19, 35, 47, 0.9);
  padding: 40px;
  max-width: 900px;
  margin: 40px auto;
  border-radius: 4px;
  box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
  overflow: hidden;
}

.tab-group {
  list-style: none;
  padding: 0;
  margin: 0 0 40px 0;
}
.tab-group:after {
  content: "";
  display: table;
  clear: both;
}
.tab-group li a {
  display: block;
  text-decoration: none;
  padding: 15px;
  background: rgba(160, 179, 176, 0.25);
  color: #a0b3b0;
  font-size: 20px;
  float: left;
  width: 100%;
  text-align: center;
  cursor: pointer;
  -webkit-transition: .5s ease;
  transition: .5s ease;
}
.tab-group li a:hover {
  background: #179b77;
  color: #ffffff;
}
.tab-group .active a {
  background: #1ab188;
  color: #ffffff;
}

/*.tab-content > div:last-child {*/
/*  display: none;*/
/*}*/

h1 {
  text-align: center;
  color: #ffffff;
  font-weight: 300;
  margin: 0 0 40px;
}

label {
  position: absolute;
  -webkit-transform: translateY(6px);
          transform: translateY(6px);
  left: 13px;
  color: rgba(255, 255, 255, 0.5);
  -webkit-transition: all 0.25s ease;
  transition: all 0.25s ease;
  -webkit-backface-visibility: hidden;
  pointer-events: none;
  font-size: 22px;
}
label .req {
  margin: 2px;
  color: #1ab188;
}

label.active {
  -webkit-transform: translateY(50px);
          transform: translateY(50px);
  left: 2px;
  font-size: 14px;
}
label.active .req {
  opacity: 0;
}

label.highlight {
  color: #ffffff;
}

input, textarea {
  font-size: 22px;
  display: block;
  width: 100%;
  height: 100%;
  padding: 5px 10px;
  background: none;
  background-image: none;
  border: 1px solid #a0b3b0;
  color: #ffffff;
  border-radius: 0;
  -webkit-transition: border-color .25s ease, box-shadow .25s ease;
  transition: border-color .25s ease, box-shadow .25s ease;
}
input:focus, textarea:focus {
  outline: 0;
  border-color: #1ab188;
}

textarea {
  border: 2px solid #a0b3b0;
  resize: vertical;
}

.field-wrap {
  position: relative;
  margin-bottom: 40px;
}

.top-row:after {
  content: "";
  display: table;
  clear: both;
}
.top-row > div {
  float: left;
  width: 48%;
  margin-right: 4%;
}
.top-row > div:last-child {
  margin: 0;
}

.button {
  border: 0;
  outline: none;
  border-radius: 0;
  padding: 15px 0;
  font-size: 2rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: .1em;
  background: #1ab188;
  color: #ffffff;
  -webkit-transition: all 0.5s ease;
  transition: all 0.5s ease;
  -webkit-appearance: none;
}
.button:hover, .button:focus {
  background: #179b77;
}

.button-block {
  display: block;
  width: 100%;
}

.forgot {
  margin-top: -20px;
  text-align: right;
}
.tab-group li{
    padding-bottom:0 ! important;
}
input[type=checkbox]{
        width: 40px;
        height: 30px;
        display: inline-block;
}
.tnc{
    font-size:22px;
    color:white;
}

</style>


<div class="custom_margin"></div>

<div class="container">
    

<? 
$email=$_POST['email'];
$otp=$_POST['otp'];
$password=$_POST['password'];

$userid=get_id($email);



$sql=mysql_query("select * from forget_password where email='".$email."' and password  like '".$otp."'",$con);
$sql_result=mysql_fetch_assoc($sql);


if($sql_result){
    
    $update_password="update customer_login set password='".$password."' where login_id='".$userid."'";
    
    if(mysql_query($update_password,$con)){ ?>
        
         <div class="alert alert-success" role="alert">
                    <strong>Password changed successfully !</strong>
                    
                    <a href="my-account.php">Login | Register</a>
                    
                    
                    
                    
                </div>
        
    <? }
    else{ ?>
        <div class="alert alert-danger" role="alert">
                    <strong><? echo mysql_error(); ?></strong>
                </div> 
    <? }
    

    
}
else{ ?>
        <div class="alert alert-danger" role="alert">
                    <strong>Some error occured</strong>
                </div> 
    <? }





?>
</div>



