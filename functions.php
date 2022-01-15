<?php session_start();


function get_cart_info($cartid){
    global $conn;
    
    $sql = mysqli_query($conn,"select * from cart where cart_id='".$cartid."'");
    
    $sql_result = mysqli_fetch_assoc($sql);
    
    return array($sql_result['rent_dt'],$sql_result['return_dt'],$sql_result['deposit_amt'],$sql_result['total_amt']);
}


function round_amount($amount){

    $round_num = substr( $amount, -2);
        if($round_num < 50 && $round_num!=00 ){
            $add_amount = 50 - $round_num;  
        
        }
        if($round_num > 50 && $round_num != 00 ){
            $add_amount = 100 - $round_num;  
        }
    $new_amount = $amount + $add_amount; 
    
    return $new_amount;
}


function get_image($product_id,$type){

if($type==1){
    
    $sql=mysqli_query($con,"select * from product_images_new where product_id='".$product_id."' ");
    $sql_result=mysqli_fetch_assoc($sql);
    
    $image_url=$sql_result['prod_image'];
    
    return $image_url;
    
}
else{
    $sql=mysqli_query($con,"select * from product_images_new where gproduct_id='".$product_id."' ");
    $sql_result=mysqli_fetch_assoc($sql);
    
    $image_url=$sql_result['prod_image'];
    
    return $image_url;
}
    
}



function get_sku($product_id,$type){
    
    global $conn;
    
             if($type==2){
            
                $sql=mysqli_query($conn,"SELECT gproduct_code FROM `garment_product` WHERE gproduct_id = '".$product_id."'");
                
                $sql_result=mysqli_fetch_assoc($sql);
                
                $sku=$sql_result['gproduct_code'];
                return $sku;
            
                
            }
             else {
                
                $sql=mysqli_query($conn,"SELECT * FROM product WHERE product_id = '".$product_id."'");
                
                $sql_result=mysqli_fetch_assoc($sql);
                
                $sku=$sql_result['product_code'];
                
                return $sku;
            
            }

return;
   
}







function total_cart_amount($userid){
    
    global $conn;
    
    $sql=mysqli_query($conn,"select sum(total_amt) as total from cart where user_id='".$userid."'");
    
    $sql_result=mysqli_fetch_assoc($sql);
    
    $total=$sql_result['total'];

    return $total;
    
}


function get_product_from_cart($userid){
    
    global $conn;
    
    $sql=mysqli_query($conn,"select product_id from cart where user_id='".$userid."'");
   
    while($sql_result=mysqli_fetch_assoc($sql)){
        
        $product_id[]=$sql_result['product_id'];
    

    }
    return $product_id;    // returns array

}


function get_product_from_cart_by_cartid($cartid){
    
    global $conn;
    
    $sql=mysqli_query($conn,"select product_id from cart where cart_id='".$cartid."'");
   
    $sql_result=mysqli_fetch_assoc($sql);
        
    $product_id=$sql_result['product_id'];
        
    return $product_id;

}




function get_product_type_from_cart($cartid,$userid){
    
    global $conn;
    
    $sql=mysqli_query($conn,"select * from cart where cart_id='".$cartid."' and user_id='".$userid."'");
   
    $sql_result=mysqli_fetch_assoc($sql);
        
        $product_type=$sql_result['product_type'];
        
    return $product_type;

}

function get_product_type_by_productid($productid,$userid){

    global $conn;
    
    $sql=mysqli_query($conn,"select * from cart where product_id='".$productid."' and user_id='".$userid."'");
   
    $sql_result=mysqli_fetch_assoc($sql);
        
        $product_type=$sql_result['product_type'];
        
    return $product_type;
    
}



function get_quantity($sku){
    
    global $con3;
    
      $sql=mysqli_query($con3,"select quantity from phppos_items where name='".$sku."'");
      $sql_result=mysqli_fetch_assoc($sql);
      
      $qunatity=$sql_result['quantity'];
      
      return $qunatity;
}


function get_cart_ids($userid){
    
    global $conn;
    
    $sql=mysqli_query($conn,"select * from cart where user_id='".$userid."'");
    
    while($sql_result=mysqli_fetch_assoc($sql)){
        
        $cart_id[]=$sql_result['cart_id'];
        
    }
    
   
return $cart_id;

// $cart_id = json_encode($cart_id);

// $cart_id = trim($cart_id,'[]');

// return $cart_id;

    
}


function get_product_amt_by_cart_id($cartid){

    global $conn;
    
    $sql=mysqli_query($conn,"select * from cart where cart_id='".$cartid."'");
    
    $sql_result=mysqli_fetch_assoc($sql);
    
    $cart_total=$sql_result['product_amt'];
    
    return $cart_total;
}

function get_cart_quantity($cartid){
    
    global $conn;
    
    $sql=mysqli_query($conn,"select * from cart where cart_id='".$cartid."'");
    
    while($sql_result=mysqli_fetch_assoc($sql)){
        
        $cart_quantity=$sql_result['qty'];
        
    }
    
    return $cart_quantity;
    
}




function delete_from_cart($userid){
    global $conn;
    
    $delete="delete from cart where user_id='".$userid."'";
    
    mysqli_query($conn,$delete);
}

function get_shipping_charges($total){
    $shipping_charges = 0;
    if($total<=2000){
     $shipping_charges = 150;
    } else if($total >=2001 && $total <=5000){
     $shipping_charges = 200;
    } else if($total >=5001){
     $shipping_charges = 0;
    }
    return $shipping_charges;
}


function get_rating_review($pid,$category) {
    
    global $conn;
    
    $sql=mysqli_query($con,"SELECT COUNT(`review`) as review_count , COUNT(`rating`) rating_count , SUM(`rating`) total_rating from `ratings` WHERE `product_id`='".$pid."' and product_category_id='".$category."' ");
    $sql_result=mysqli_fetch_assoc($sql);
    
    return $sql_result;
    // $result[] = array();
    // $result['review_count'] = $sql_result['review_count'];
    // $result['rating_count'] = $sql_result['rating_count'];
    // $result['total_rating'] = $sql_result['total_rating'];
    //$result=array('review_count'=>$sql_result['review_count'], 'rating_count'=>$sql_result['rating_count'] , 'total_rating'=>$sql_result['total_rating']);
    //var_dump($result);exit;
    //return $result;
}

function add_recent_viewed_products($pid,$userid,$category){
    $insert_qry = mysqli_query($con,"insert into recent_viewed_products(userid,product_id,product_category,status) values($userid,$pid,$category,1) ");
    if($insert_qry){
        return true;
    } else{
        return false;
    }
}

function get_recent_viewed_products($userid){
    $qry = mysqli_query($con,"select * from recent_viewed_products where status = 1 and userid ='".$userid."' ");
    $result = mysqli_fetch_assoc($qry);
    return $result;
}


function get_city($userid){
    
    global $conn;
    
    $sql=mysqli_query($conn,"SELECT * FROM Registration WHERE registration_id = '".$userid."'");
    
    $sql_result=mysqli_fetch_assoc($sql);
    
    $city=$sql_result['city'];
    
    $sql1=mysqli_query($conn,"select * from cities where code='".$city."' ");
    
    $sql1_result=mysqli_fetch_assoc($sql1);
    
    $city_name=$sql1_result['name'];
    
    return $city_name;
    
    
}


function get_state_id($state_name){
   
    global $conn;
    
     
    $sql=mysqli_query($conn,"SELECT * FROM states WHERE state_name = '".$state_name."'");
    
    $sql_result=mysqli_fetch_assoc($sql);
    
    $state_code=$sql_result['state_code'];
     
     return $state_code;
    
    
}



function state_id_userid($userid){
   
    global $conn;
    
     
    $sql=mysqli_query($conn,"SELECT * FROM Registration WHERE registration_id='".$userid."'");
    
    $sql_result=mysqli_fetch_assoc($sql);
    
    $state_code=$sql_result['state'];
     
     return $state_code;
    
    
}




function get_city_id($city_name){
   
    global $conn;
    
     
    $sql=mysqli_query($conn,"SELECT * FROM cities WHERE  name= '".$city_name."'");
    
    $sql_result=mysqli_fetch_assoc($sql);
    
    $city_code=$sql_result['code'];
     
     return $city_code;
    
    
}



function igst($userid){
    
    global $conn;
    //
    $sql=mysqli_query($conn,"select * from cart where user_id='".$userid."'");
    
    while($sql_result=mysqli_fetch_assoc($sql)){

        
     
        $quantity=$sql_result['qty'];
        $price=$sql_result['product_amt'];
        $product_type=$sql_result['product_type'];
        $price=floatval($price);
        
       $price = sprintf("%.2f", $price);

        
        
        if($product_type==2){ // ie. garment
            
        if($price<1060){
            
          $igst[]=($price-floatval($price*100)/106)*$quantity;
            }
            else{
            
            $igst[]=($price-floatval($price*100)/112)*$quantity;
           
            }
        }
        
        if($product_type==1){ // ie. garment
        

            $igst[]=($price-floatval($price*100)/103)*$quantity;
            
            
           
        }
    }



$total=0; 
foreach($igst as $key => $val){



    $total=$total+$val;
    $total[]=sprintf("%.2f", $total);

}
return sprintf("%.2f", $total);
    
}



function gst($userid){
    
    global $conn;
    //
    $sql=mysqli_query($conn,"select * from cart where user_id='".$userid."'");
    
    while($sql_result=mysqli_fetch_assoc($sql)){

         $quantity=$sql_result['qty'];
        $price=$sql_result['product_amt'];
        $product_type=$sql_result['product_type'];
        
        if($product_type==2){ // ie. garment
            
        if($price<999){
            
            $igst[]=($price*(5/100))*$quantity;
            
            }
            else{
            
            $igst[]=($price*(12/100))*$quantity;

            }
        }
        
        if($product_type==1){ // ie. garment
        
            $igst[]=($price*(3/100))*$quantity;
        }
    }
$total=0;    
foreach($igst as $key => $val){
    $total=$total+$val;
}

return $total;
}


function get_size(){
    $sql = mysqli_query($con,"SELECT * FROM `product_size`");
    //$result = mysqli_fetch_assoc($sql);
    return $sql;
}


function check_state($userid){
    
    global $conn;
    
    $sql=mysqli_query($conn,"select * from Registration where registration_id='".$userid."'");
    $sql_result=mysqli_fetch_assoc($sql);
    
    if($sql_result){
        
        $state=$sql_result['state'];
        return $state;    
    }
    else{
        return 0;   // no user found...
    }
    
    
    
}


function get_state_name($state_id){
   
    global $conn;
    
     
    $sql=mysqli_query($conn,"SELECT * FROM states WHERE state_code = '".$state_id."'");
    
    $sql_result=mysqli_fetch_assoc($sql);
    
    $state_name=$sql_result['state_name'];
     
     return $state_name;
    
    
}




function get_city_name($city_id){
   
    global $conn;
    
     
    $sql=mysqli_query($conn,"SELECT * FROM cities WHERE code = '".$city_id."'");
    
    $sql_result=mysqli_fetch_assoc($sql);
    
    $city_name=$sql_result['name'];
     
     return $city_name;
    
    
}


function get_shipping_address($userid){
    
    global $conn;
    
    $sql=mysqli_query($conn,"select * from Registration where registration_id='".$userid."'");
    $sql_result=mysqli_fetch_assoc($sql);
    
if(isset($_SESSION['email'])){
    

    if($sql_result){
        $address = $sql_result['address'];
        $pincode = $sql_result['pincode'];
        $landmark = $sql_result['landmark'];
        $state = $sql_result['state'];
        $city = $sql_result['city'];
        
        
        $city = get_city_name($city);
        $state = get_state_name($state);
        
        if(!$city){
            return "Complete your Profile !!";
        }
    
    
    
        return $address.', '.$landmark.', '.$city.', '.$pincode.', '.$state;        
    }
}
    
}



function get_product_id_from_cart($cartid){

    global $conn;
    
    $sql=mysqli_query($conn,"select * from cart where cart_id='".$cartid."'");
    $sql_result=mysqli_fetch_assoc($sql);
    
    $product_id=$sql_result['product_id'];
    
    return $product_id;
    
    
}



function revert_qty($userid){
    
    global $conn;
    
    global $con3;
        

    $cart_id= get_cart_ids($userid);
if($cart_id){
   
    foreach($cart_id as $key => $val){ 
    
    $product_id=get_product_id_from_cart($val);
    $sku = get_sku($product_id);
    $quantity = get_cart_quantity($val);

    $sql=mysqli_query($con3,"select * from phppos_items where name='".$sku."'");
    $sql_result=mysqli_fetch_assoc($sql);
    

    $get_quantity = $sql_result['quantity'];
    
    $new_quantity = $get_quantity+$quantity; 
     
     echo "update phppos_items set quantity='".$new_quantity."' where name='".$sku."'";
    $update_sql=mysqli_query($con3,"update phppos_items set quantity='".$new_quantity."' where name='".$sku."'"); 
}

   
}



    
}



function is_online($userid){
    
    global $conn;
    
    $sql=mysqli_query($conn,"select * from online where userid='".$userid."'");
    
    $sql_result=mysqli_fetch_assoc($sql);
    
    if($sql_result){
        $update_sql=mysqli_query($conn,"update online set status=1 where userid='".$userid."'");
    }
    else{
        $insert_sql=mysqli_query($conn,"insert into online(userid,status) values ('".$userid."',1)");
    }
}

function get_cart_count($userid){
    
    global $conn;
    
    $sql=mysqli_query($conn,"select count(cart_id) as cart_count from cart where user_id='".$userid."' and ac_typ='1'");
    $sql_result=mysqli_fetch_assoc($sql);
    
    $count=$sql_result['cart_count'];
    
    return $count;
}

function check_avail_quantity($sku) {
    
    global $con3;
    
    $sql=mysqli_query($con3,"select quantity from phppos_items where name='".$sku."'");
    
    $sql_result=mysqli_fetch_assoc($sql);
    
    $quantity=$sql_result['quantity'];

    return $quantity;
    
} 

function get_price_without_gst($product_id){
    
    global $conn;
    
    $sql=mysqli_query($conn,"select * from cart where product_id='".$product_id."'");
    
    $sql_result=mysqli_fetch_assoc($sql);
    
    $total_price=$sql_result['product_amt'];
    $product_type=$sql_result['product_type'];
    
    
    if($product_type==2){
        if($total_price>1060){
            $price=($total_price*100)/112;
            return sprintf("%.2f", $price);
        }
        else{
            $price=($total_price*100)/106;
            return sprintf("%.2f", $price);            
        }
    }
    else{
            $price=($total_price*100)/103;
            return sprintf("%.2f", $price);
    }
}

function check_price_db($sku){
    
    global $conn;
    
    $sql=mysqli_query($conn,"select sales_price,discount from product where product_code='".$sku."'");
    
    $sql_result=mysqli_fetch_assoc($sql);
    
    if($sql_result>0 ){
        $price=$sql_result['sales_price'];
      
        return $price;
    }
    else{
        $sql=mysqli_query($conn,"select sales_price from garment_product where product_code='".$sku."'");
        $sql_result=mysqli_fetch_assoc($sql);
        if($sql_result>0 ){
            $price=$sql_result['sales_price'];
            return $price;
        }
    }
}

function get_price_currentdb($sku){
    global $conn;
    $sql=mysqli_query($conn,"select sales_price,discount from product where product_code='".$sku."'");
    $sql_result=mysqli_fetch_assoc($sql);
    // var_dump($sql_result);
    if($sql_result>0 ){
        $price=$sql_result['sales_price'];
        $discount=$sql_result['discount'];
        if($discount>0){
            $discounted_price = $price*($discount/100);
            $discounted_price_final = $price-$discounted_price;
            return "<font color='#000000'><b>Sales Price:</b></font>
            <strike>$price</strike>&nbsp;
            <font color='#00ff99'>
                <b>Now</b>
            </font>
            $discounted_price_final
            <br />";
        }
        
        else {
            return "<font color='#000000'><b>Sales Price:</b></font>$price&nbsp;
            <br />";
        }
    }
    
    else{
        

         $sql=mysqli_query($conn,"select sales_price from garment_product where product_code='".$sku."'");
    
        $sql_result=mysqli_fetch_assoc($sql);

        if($sql_result>0 ){
            
           $price=$sql_result['sales_price'];
        
        $discount=$sql_result['discount'];
        
        if($discount>0){
            
            $discounted_price = $price*($discount/100);
            $discounted_price_final = $price-$discounted_price;
            
            return "<font color='#000000'><b>Sales Garment Price:</b></font>
            
            <strike>$price</strike>&nbsp;
            <font color='#00ff99'>
                <b>Now</b>
            </font>
            $discounted_price_final
            <br />";
        }
        
            else{
            return "<font color='#000000'><b>Sales Price:</b></font>$price&nbsp;
            <br />";
            }
        }
    
        
    }
    
    
}



function get_email_by_id($userid){
    
    global $conn;
    
    $sql=mysqli_query($conn, "select * from customer_login where login_id='".$userid."'");
    
    $sql_result=mysqli_fetch_assoc($sql);
    
    $email=$sql_result['email'];
    
    return $email;
}

/*Ruchi : Admin functions*/

function admin_reject_order($sku,$qty){
    global $con3;
    
    $select_sql=mysqli_query($con3,"select * from phppos_items where name LIKE '".$sku."'");
    //echo "select * from phppos_items where name LIKE '".$sku."'";
    
    $select_sql_result=mysqli_fetch_assoc($select_sql);
    
    $quantity=$select_sql_result['quantity'];
    
    $new_quantity=$quantity+$qty;
    
    $update="update phppos_items set quantity='".$new_quantity."' where name LIKE '".$sku."'"; 

    mysqli_query($con3,$update);
    echo $update;
}


function get_discount($productid,$type){
    
    global $conn;
    
    if($type==2){
        
        $sql=mysqli_query($conn,"select * from garment_product where gproduct_id='".$productid."'");
        
        $sql_result=mysqli_fetch_assoc($sql);
        
        $discount = $sql_result['discount'];
        
        return $discount;
        
    }
    else{
        
        $sql=mysqli_query($conn,"select * from product where product_id='".$productid."'");
        
        $sql_result=mysqli_fetch_assoc($sql);
        
        $discount = $sql_result['discount'];
        
        return $discount;
        
        
    }

}

function create_guest_user(){
    
    global $conn;
    global $con3;
    
    $errs=0;
    mysqli_query($con,"BEGIN");
    mysqli_autocommit($con3, FALSE);
    $qryid=mysqli_query($con3,"insert into phppos_people(first_name,acc_type) values ('',1)");
    if($qryid=="")
    {
    $errs++;
    }
    $usrid=mysqli_insert_id($con3);
    
    
    $qryid2=mysqli_query($con,"insert into Registration(registration_id,acc_type) values ('".$usrid."',1)");
    if(!$qryid2)
    {
        $errs++;
    }
    
    
    $_SESSION['gid']=$usrid;
    
    
    if($errs==0)
    {
        
        mysqli_query($con,"COMMIT");
         mysqli_commit($con3);
     echo $usrid;
    }
    else
    {
         mysqli_rollback($con3) ;
        mysqli_query($con,"ROLLBACK");
        echo 2;
    }
}

?>