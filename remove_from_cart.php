<? include($_SERVER['DOCUMENT_ROOT'].'/config.php');
include('../functions.php');

$product_id=$_POST['productid'];
$userid=$_POST['usrid'];

$delete_sql="delete from cart where product_id='".$product_id."' and user_id='".$userid."'";

// echo $delete_sql;
    
    if(mysqli_query($conn,$delete_sql)){
        echo '1';
    }
    else {
        echo '0';
    }
    



?>