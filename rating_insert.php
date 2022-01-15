<?php session_start();
include('config.php');
 
$gid=$_SESSION['gid'];

$comment=$_POST['text'];
$rating=$_POST['rating'];
$product_id=$_POST['pro_id'];
$cat_id=$_POST['cat_id'];
//$date=Date('Y-m-d H:i:s');
 

 $slctqry=mysql_query("SELECT * FROM `customer_login` where login_id='".$gid."' and email!='' and password!=''");
 $slctchkqry=mysql_num_rows($slctqry);

if(isset($_SESSION['loginstats']) && $_SESSION['loginstats']=1){
    $insrtqry=mysql_query("INSERT INTO `ratings`( `userid`, `product_id`, `rating`, `review`, product_category_id) VALUES ('$gid','$product_id','$rating','$comment','$cat_id')");
     
    if($insrtqry)
    {
         echo 1;
    }
    else{
        echo 0;
    }
} else {
    echo 3;
}


/* if($slctchkqry>0)
 {
    $insrtqry=mysql_query("INSERT INTO `ratings`( `userid`, `product_id`, `rating`, `review`, product_category_id) VALUES ('$gid','$product_id','$rating','$comment','$cat_id')");
     
    if($insrtqry)
    {
         echo 1;
    }
    else{
        echo 0;
    }
}
else{
    header('Location: login.php');
   echo 3;
}*/
?>