<?php session_start();
include('functions.php');
include("config.php");

$sku=$_POST['sku'];

$custom_qtyavailable = get_quantity($sku);

$pprice = $_POST['pprice'];

$transtyp=$_POST['transtyp'];
$typ=$_POST['typ'];
$itemidmain=$_POST['selpr'];
$qtyavailablefinal=0;
$todaysdt=date("Y-m-d");

$usrid=$_SESSION['gid'];

$custom_quantity = $_POST['qtyselc'];

if(!$custom_quantity){
    $custom_quantity=1;
}

function check_in_range($start_date, $end_date, $date_from_user)
{
  // Convert to timestamp
  $start_ts = strtotime($start_date);
  $end_ts = strtotime($end_date);
  $user_ts = strtotime($date_from_user);

  // Check that user date is between start & end
  return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
}


/* get total qty*/
//echo "SELECT * FROM `phppos_items` where name='".$itemid."'";

$sql24="";
if($typ=="1")
{

 $sql24="SELECT * FROM `product` WHERE `product_id`='".$itemidmain."'";

}
else if($typ=="2")
{
$sql24="SELECT *  FROM `garment_product` WHERE `gproduct_id`='".$itemidmain."'";
}

//echo $sql24;
$gtnm=mysql_query($sql24);
$nmrwsf=mysql_fetch_array($gtnm);

$itemid=$nmrwsf[2];


$gtqt=mysqli_query($con3,"SELECT * FROM `phppos_items` where name='".$itemid."'");

$gtqtrws=mysqli_fetch_array($gtqt);
$qty=$gtqtrws[7];
if($transtyp=="1")
{
    $dt=date("Y-m-d",strtotime(str_replace("/","-",$_POST['dt'])));

    $returndate=date("Y-m-d",strtotime(str_replace("/","-",$_POST['retdt'])));

    $qrybk23=mysqli_query($con3,"SELECT * FROM `order_detail` where `item_id`='".$itemid."' and bill_id in(SELECT bill_id  FROM `phppos_rent` WHERE (`pick_date` >=".$todaysdt." or `delivery_date` >=".$todaysdt.")  and booking_status='Picked' ORDER BY `phppos_rent`.`pick_date` ASC) group by bill_id");
    while($gtfrbk23=mysqli_fetch_array($qrybk23))
    {
        $qty=$qty+$gtfrbk23[9];
    }


$qtybooked=0;
$qtybooked1=0;
$qtybooked2=0;

$qrybk2=mysqli_query($con3,"SELECT * FROM `order_detail` where `item_id`='".$itemid."' and bill_id in(SELECT bill_id  FROM `phppos_rent` WHERE (`pick_date` >=".$todaysdt." or `delivery_date` >=".$todaysdt.") and booking_status!='Returned' ORDER BY `phppos_rent`.`pick_date` ASC) group by bill_id");
$dtarr=array();

while($gtfrbk2=mysqli_fetch_array($qrybk2))
{
    $qryrentbk24r=mysqli_query($con3,"Select pick_date, delivery_date from phppos_rent where bill_id='".$gtfrbk2[0]."'");
    $frws24r=mysqli_fetch_array($qryrentbk24r);

    if(check_in_range($frws24r[0], $frws24r[1],$dt))
    {
        $qtybooked1=$qtybooked1+$gtfrbk2[9];    
    }
}

$qrybk22=mysqli_query($con3,"SELECT * FROM `order_detail` where `item_id`='".$itemid."' and bill_id in(SELECT bill_id  FROM `phppos_rent` WHERE (`pick_date` >=".$todaysdt." or `delivery_date` >=".$todaysdt.") and booking_status!='Returned' ORDER BY `phppos_rent`.`pick_date` ASC) group by bill_id");
$dtarr=array();

while($gtfrbk22=mysqli_fetch_array($qrybk22))
{
    $qryrentbk24r2=mysqli_query($con3,"Select pick_date, delivery_date from phppos_rent where bill_id='".$gtfrbk22[0]."'");
    $frws24r2=mysqli_fetch_array($qryrentbk24r2);
if(check_in_range($frws24r2[0], $frws24r2[1],$returndate))
{
    $qtybooked2=$qtybooked2+$gtfrbk22[9];    
}


}




if($qtybooked1>$qtybooked2)
{
    
$qtybooked=$qtybooked1;
}else
{
$qtybooked=$qtybooked2; 
}


if($qtybooked<$qty)/* get total qty booked if total booked is less than total qty calc availableqty to book*/
{
$qty=$qty-$qtybooked;
$qtyavailablefinal=$qty;
}
else if($qtybooked>=$qty)/* get total qty booked if total booked is greater than or equalto total qty check with dates*/
{
$qtr=$qty;
$qtr1=$qty;
$qtyavailable1=0;
$qtyavailable2=0;

$qrybk23=mysqli_query($con3,"SELECT * FROM `order_detail` where `item_id`='".$itemid."' and bill_id in(SELECT bill_id  FROM `phppos_rent` WHERE (`pick_date` >=".$todaysdt." or `delivery_date` >=".$todaysdt.") and booking_status!='Returned' ORDER BY `phppos_rent`.`pick_date` ASC) group by bill_id");


while($gtfrbk23=mysqli_fetch_array($qrybk23))
{
$qryrentbk=mysqli_query($con3,"Select pick_date, delivery_date from phppos_rent where bill_id='".$gtfrbk23[0]."'");
$frws=mysqli_fetch_array($qryrentbk);
if(check_in_range($frws[0], $frws[1],$dt))
{
//echo $frws[0];
$qtr=$qtr-$gtfrbk23[9];
//echo $qtr;
}
}
$qtyavailable1=$qtr;

if($qtyavailable1>0)
{
$qrybk24=mysqli_query($con3,"SELECT * FROM `order_detail` where `item_id`='".$itemid."' and bill_id in(SELECT bill_id  FROM `phppos_rent` WHERE (`pick_date` >=".$todaysdt." or `delivery_date` >=".$todaysdt.") and booking_status!='Returned' ORDER BY `phppos_rent`.`pick_date` ASC) group by bill_id");
while($gtfrbk24=mysqli_fetch_array($qrybk24))
{
$qryrentbk24=mysqli_query($con3,"Select pick_date, delivery_date from phppos_rent where bill_id='".$gtfrbk24[0]."'");
$frws24=mysqli_fetch_array($qryrentbk24);
if(check_in_range($frws24[0], $frws24[1],$returndate))
{
//echo $frws24[0];
$qtr1=$qtr1-$gtfrbk24[9];
//echo $qtr1;
}
}
$qtyavailable2=$qtr1;

//echo $qtyavailable2;
if($qtyavailable1>0 & $qtyavailable2>0)
{
if($qtyavailable1>$qtyavailable2)
{
$qtyavailablefinal=$qtyavailable2;
}
else
{
$qtyavailablefinal=$qtyavailable1;
}
}else
{
   $qtyavailablefinal=0; 
}



if($qtyavailablefinal<$_POST["qty"])
{
    $qtyavailablefinal=0;
}

}
else
{
    $qtyavailablefinal=0;
}
}

if($qtyavailablefinal<2)
{
$chkdtwith="";
$dtgrt=0;
$qrybk22chkdt=mysqli_query($con3,"SELECT * FROM `order_detail` where `item_id`='".$itemid."' and bill_id in(SELECT bill_id  FROM `phppos_rent` WHERE (`pick_date` >=".$todaysdt." or `delivery_date` >=".$todaysdt.")  and booking_status!='Returned' ORDER BY `phppos_rent`.`pick_date` ASC) group by bill_id");
$chkdtnrs=mysqli_num_rows($qrybk22chkdt);
if($chkdtnrs>0)
{
    $chkdtrsf=mysqli_fetch_array($qrybk22chkdt);
    $qryrentbk24rchkdt=mysqli_query($con3,"Select pick_date, delivery_date from phppos_rent where bill_id='".$chkdtrsf[0]."'");
    $frws24rchkdt=mysqli_fetch_array($qryrentbk24rchkdt);
    $chkdtwith=$frws24rchkdt[1];
    $chkdtwith1=$frws24rchkdt[0];

}

if($chkdtwith!="")
{
$nwdsfrmdts=date("Y-m-d",strtotime($chkdtwith1."-15 day"));
$nwds=date("Y-m-d",strtotime($chkdtwith."+7 day"));

 
if(check_in_range($nwdsfrmdts, $nwds,$dt))
{
$dtgrt=1; 
}
    
}

if($dtgrt==1)
{
    $qtyavailablefinal=0;
}

}

}else if($transtyp=="2")
{  

 $qrybk2=mysqli_query($con3,"SELECT * FROM `order_detail` where `item_id`='".$itemid."' and bill_id in(SELECT bill_id  FROM `phppos_rent` WHERE (`pick_date` >=".$todaysdt." or `delivery_date` >=".$todaysdt.") and booking_status!='Returned' ORDER BY `phppos_rent`.`pick_date` ASC) group by bill_id");

$dtarr=array();

while($gtfrbk2=mysqli_fetch_array($qrybk2))
{

    $qryrentbk=mysqli_query($con3,"Select pick_date, delivery_date from phppos_rent where bill_id='".$gtfrbk2[0]."'");
    $qty=$qty-$gtfrbk2[9];
}

$qtyavailablefinal=$qty;

if($qtyavailablefinal<$_POST["qtyselc"])
{
    $qtyavailablefinal=0;
}
}

if($custom_qtyavailable>0) {
    
    $sql_custom=mysqli_query($con3,"SELECT * FROM `phppos_items` where name='".$sku."'");

    if($sql_custom_result=mysqli_fetch_array($sql_custom)){
     
    };
    
    $check_sql=mysqli_query($conn,"select * from cart where user_id='".$usrid."' and product_id='".$itemidmain."'");
    $check_sql_result=mysqli_fetch_assoc($check_sql);
    
    $avail_qty=$check_sql_result['qty'];
    $new_qty=$avail_qty+$custom_quantity;
    
    if($check_sql_result){
        $sql="update cart set qty='".$new_qty."' where user_id='".$usrid."' and product_id='".$itemidmain."'";        
    }
    else{
        $sql="INSERT INTO `cart`( `user_id`, `product_id`, `qty`, `product_amt`,`total_amt`,`ac_typ`,`product_type`) VALUES ('".$usrid."','".$itemidmain."','".$custom_quantity."','".$pprice."','".$pprice."',1,'".$typ."')";
    
    }
    
    //echo $sql;
    
    if(mysqli_query($conn,$sql)) {
    
        echo 1;
    } else {
    
        echo 0;
    }
}

?>
