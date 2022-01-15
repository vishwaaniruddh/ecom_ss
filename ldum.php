<? include('config.php');
include('functions.php');
// header('Content-Type: application/json');

$get_id = $_REQUEST['id'];
$type = $get_type = $_REQUEST['type'];
$get_pricefilter = $_REQUEST['pricefilter'];
$pathmain ='http://yosshitaneha.com/';

// $discountfilter = $_REQUEST['discountfilter'];

if (isset($_REQUEST['pageno'])) {
        $pageno = $_REQUEST['pageno'];
    } else {
        $pageno = 1;
    }

    $no_of_records_per_page = 20;
    $offset = ($pageno-1) * $no_of_records_per_page;
    
    if($type=="1") {
        $total_pages_sql = "SELECT count(*) FROM `product` WHERE `subcat_id`='".$subcatid."'"; 
    } else if($type=2){
        $total_pages_sql = "select count(*) from  `garment_product` where product_for='".$maincatid."' and  gproduct_id in(select gproduct_id from product_images_new where gproduct_id>0)";
    }
    
    $result = mysqli_query($conn,$total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);
    
    
    
    
    
$sql_count = mysqli_query($con,"select count(product_for)  as count_a from `garment_product` where product_for='".$get_id."' and gproduct_id in(select gproduct_id from product_images_new where gproduct_id>0)");
 $sql_count = mysqli_fetch_assoc($sql_count);

$product_count =  $sql_count['count_a'];
$sql = mysqli_query($con,"select * from `garment_product` where product_for='".$get_id."' and gproduct_id in(select gproduct_id from product_images_new where gproduct_id>0)");


while($row = mysqli_fetch_array($sql)){
    
            if($type=="1"){
            $prcode=$row[2];
            }else{
            $prcode=$row[2];
            }
            
            $product_name = $row[3];
            $discount = $row[21];


    
        $re = mysqli_query($con3,"SELECT unit_price,cost_price,quantity FROM phppos_items where name like '".$prcode."'");
        $rero=mysqli_fetch_row($re);
        
        
        $re1 = mysqli_query($con3,"select sum(commission_amt) from order_detail where item_id='".$prcode."' and bill_id in(select bill_id from phppos_rent where booking_status!='Booked')");
        $rero1=mysqli_fetch_row($re1);
        $currentsp=$rero[0]-$rero1[0];
        $splimit=$rero[1]*0.8; 
        
        if($currentsp>$splimit)
        $newsp=$currentsp;
        else
        $newsp=$splimit;
        

                 if($type=="1")
                        {
                            $sqlimg="SELECT img_name FROM `product_images_new` WHERE `product_id`='".$row[0]."'";
                              if($newsp<=40000){
                                $rentprice=$newsp*0.20;  
                              }   
                            else if($newsp<=60000){
                                $rentprice=$newsp*0.17;
                            }
                            else{
                                $rentprice=$newsp*0.15;
                            }
                                
                               if($newsp<=2000){
                                   $courier = 100;
                               }else if($newsp<=5000){
                                   $courier = 250;                                   
                               }else if($newsp<=10000){
                                   $courier = 500;                                   
                               }else{
                                   $courier = 1000;                                   
                               }
                        }
                        else
                        {
                            $sqlimg="SELECT img_name FROM `product_images_new` WHERE `gproduct_id`='".$row[0]."'";
                              if($newsp<=40000)
                                $rentprice=$newsp*0.20;
                            else if($newsp<=60000)
                                $rentprice=$newsp*0.17; 
                            else
                                $rentprice=$newsp*0.15;
                                
                                
                                
                               if($newsp<=10000){
                                   $courier = 750;
                               }else {
                                   $courier = 1000;                                   
                               }
                            
                            if($rentprice<1500){
                                $rentprice  =1500;

                            }
                        }  
                        
                        $deposit = intval($newsp*0.35);
                        // $final_deposit = round_amount($deposit);
                        $qryimg = mysqli_query($con,$sqlimg);
                        $rowimg = mysqli_fetch_row($qryimg);
                        $path = trim($pathmain."uploads".$rowimg[0]);
                        $rentprice = round_amount($rentprice+$courier);
                    

echo $deposit .' of $round_num is = '. $round_num = substr( $deposit, -2) . '  ';
if($round_num < 50 && $round_num!=00 && $round_num!=50){
    $add_amount = 50 - $round_num;
}
elseif($round_num > 50 && $round_num != 00 && $round_num!=50){
    $add_amount = 100 - $round_num;  
}
else{
    $add_amount = 0; 
}
$final_deposit = $deposit + $add_amount; 

echo '  $final_deposit  '.$final_deposit ; 

echo '<br>';



                    $link = "detail.php?id=$row[0]&type=$type&days=3";
                    
                    $data[] = ['dummy'=>$final_deposit,'product_name'=>$product_name,'selling_price'=>$newsp,'rent_price'=>$rentprice,'image'=>$path,'sku'=>$prcode,'deposite'=>$final_deposit,'discount'=>$discount,'link'=>$link];                
}

// if(isset($_REQUEST['pricefilter'])){
//     if($get_pricefilter==1){
//         function pricesort($a, $b) {
//             return $b['rent_price'] - $a['rent_price'];
//         }
//     }
//     elseif($get_pricefilter==2){
//             function pricesort($a, $b) {
//                 return  $a['rent_price'] - $b['rent_price'];
//             }
//     }
    
//     if(count($data)!= 0){
//     usort($data, 'pricesort');
//     $data = array_slice($data, 0, $product_count);
//     }    
// }



// if($data){
// echo json_encode($data);    
// }
// else{
//     echo json_encode('0');
// }    
?>
