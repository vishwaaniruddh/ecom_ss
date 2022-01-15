<?php session_start();
include('config.php');


$pid = $_POST['pid'];
$type = $_POST['type'];
$qty = $_POST['qty'];
$rent_date = $_POST['rent_date'];
$return_date = $_POST['return_date'];
$price = $_POST['price'];
$deposit = $_POST['deposit'];
$sales_price = $_POST['sales_price'];
$actyp ='1';

$gid=$_SESSION['gid'];
$dt= $date = date('Y-m-d H:i:s');
$image= $_POST['image'];


$errs=0;

if(isset($_SESSION['gid']) & $_SESSION['gid']!="" & $_SESSION['gid']>0)
{

if($rent_date!="")
{
   $rent_date=date("Y-m-d",strtotime($rent_date));
}



if($return_date!="")
{
    $return_date=date("Y-m-d",strtotime($return_date));
}



   
if($type=="1")
{
$sql="SELECT * FROM `product` WHERE `product_id`='".$pid."'";
}
else if($type=="2")
{
$sql="select * from  `garment_product` where gproduct_id='".$pid."'";
}

// echo $sql;

  
$table=mysqli_query($con,$sql);
$tableftch=mysqli_fetch_array($table);
 $productcode=$tableftch[2];
//$usrid=1;

$usrid=$gid;

$cartid=0;
$billidexs=0;

mysqli_query($con,"BEGIN");
mysqli_autocommit($con3, FALSE);


$qryqty=mysqli_query($con,"select cart_id,qty,deposit_amt from cart where user_id='".$usrid."' and product_id='".$pid."' and product_type='".$type."' and ac_typ='".$actyp."' and status=0");



$fetchqty1=mysqli_num_rows($qryqty);
if($fetchqty1 > 0)
{
    $fetchqty=mysqli_fetch_array($qryqty);
    $cartid=$fetchqty[0];
$billidexs=$fetchqty[13];

$qt=($fetchqty[1]+$qty);
$totalamt1=$qt*$pprice;
//$deposit1=$deposit*$qty;
$qryinsert=mysqli_query($con,"update cart set qty='".$qt."',total_amt='".$totalamt1."',rent_dt='".$rent_date."',return_dt='".$return_date."',deposit_amt='".$deposit."' where cart_id='".$fetchqty[0]."'");

if(!$qryinsert)
{
    $errs++;
     echo mysqli_error();
}

}
else
{
$qryinsert=mysqli_query($con,"INSERT INTO `cart`( `user_id`, `product_id`, `qty`, `product_amt`, `total_amt`, `date`,product_type,ac_typ,rent_dt,return_dt,deposit_amt,image) 
VALUES ('".$usrid."','".$pid."','".$qty."','".$price."','".$sales_price."','".$date."','".$type."','".$actyp."','".$rent_date."','".$return_date."','".$deposit."','".$image."')");

if(!$qryinsert)
{
    $errs++;
    echo mysqli_error();
}

$cartid=mysqli_insert_id();

}

if($errs==0)
{
    mysqli_query($con,"COMMIT");
     mysqli_commit($con3);
echo 1;
}
else
{

    mysqli_rollback($con3) ;
    mysqli_query($con,"ROLLBACK");
    echo 0;
    }
}

else
{
    
    echo 0;
}
?>