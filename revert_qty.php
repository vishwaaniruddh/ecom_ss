<?php session_start(); 

include("functions.php");

$userid = $_SESSION['gid']; 

$sql = mysql_query("select * from cart where user_id='".$userid."'");

//echo "select * from cart where user_id='".$userid."'";

/*$sqlqry = mysql_query('select * from cart');
while($r = mysql_fetch_array($sqlqry)){
    var_dump($r);
}
*/

$crtids=get_cart_ids($userid);
        
foreach($crtids as $key => $val) {
    
    $qty=get_cart_quantity($val);
    
    $skuqry = mysql_query("select * from cart where cart_id = '".$val."' ");
    $sku_result = mysql_fetch_assoc($skuqry); 
    
    $cart_product_id = $sku_result['product_id'];
    
    $cart_product_type = $sku_result['product_type'];
    
    $is_customizable = $sku_result['is_customized'];
    
    $sku=get_sku($cart_product_id,$cart_product_type);
    
    $insert_track_details="insert into order_track(cart_id,userid,sku,quantity,is_customized) VALUES ('".$val."','".$userid."','".$sku."','".$qty."','".$is_customizable."')";

    mysqli_query($conn,$insert_track_details);
}



while($sql_result=mysql_fetch_assoc($sql)) {
    
    $cart_product_id = $sql_result['product_id'];
    $cart_product_type = $sql_result['product_type'];
    
    $cart_quantity = $sql_result['qty'];
    
    $is_customizable = $sql_result['is_customized'];
    
    $sku=get_sku($cart_product_id,$cart_product_type);
    
    $pos_sql=mysqli_query($con3,"select * from phppos_items where name='".$sku."'");
    $pos_sql_result=mysqli_fetch_assoc($pos_sql);

    $quantity=$pos_sql_result['quantity'];
    
    $new_quantity = $quantity-$cart_quantity;
    
    $new_quantity = sprintf("%.2f", $new_quantity);
    
    //echo 'cart qty : '.$cart_quantity.' qty : '.$quantity.' new qty : '.$new_quantity.'   sku : '.$sku; 
    
    $updateqry = "update phppos_items set quantity='".$new_quantity."' where name LIKE '".$sku."'";
    
    //echo $updateqry;
    if($is_customizable ==0){ 
    
        $update = mysqli_query($con3,"update phppos_items set quantity='".$new_quantity."' where name LIKE '".$sku."'");
        
        //var_dump($update);
    }
    
    if($update) {
        echo '1';
    } else {
        echo '0';
    }
}

?>