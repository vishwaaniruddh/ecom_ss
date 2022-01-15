<?php 
$db= mysqli_connect('localhost','root','');
mysqli_select_db($db,'yoshitaneha');


if ($db) {
	// echo 'connect';
}
else{
	echo mysqli_error();
}



if(isset($_POST['login'])){ // Fetching variables of the form which travels in URL
$firstname = $_POST['firstname'];
$lName = $_POST['lName'];
$useremail = $_POST['useremail'];
$userMobile = $_POST['userMobile'];
$cuntry = $_POST['cuntry'];
$state = $_POST['state'];
$city = $_POST['city'];
$pincode = $_POST['pincode'];
$address = $_POST['address'];
if($firstname !=''||$lName !=''||$useremail!=''||$ucityserMobile !=''||$cuntry!=''||$state !=''||$city!=''||$pincode !=''||$address!=''){
//Insert Query of SQL
$query = mysqli_query($db,"INSERT INTO `user_information`(firstname, lName, useremail, userMobile, cuntry, state, city, pincode, address) VALUES ('".$firstname."', '".$lName."', '".$useremail."','".$userMobile."','".$cuntry."','".$state."','".$city."','".$pincode."','".$address."')");
//var_dump ($con,"insert into `table`(name, email, contact, address) values ('".$name."', '".$email."', '".$contact."', '".$address."')");
//echo "<br/><br/><span>Data Inserted successfully...!!</span>";
}
else{
echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
}
}
mysqli_close($db); // Closing Connection with Server
?>