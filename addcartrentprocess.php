<?php
session_start();
include('config.php');
 $sizes=$_POST['sizes'];
$typ=$_POST['typ'];/* if 1 its jewel 2 is garment */
$product_id=$_POST['product_id'];
$qty=$_POST['qty'];
//$uid=$_SESSION['id'];
$gid=$_SESSION['gid'];
$dt= $date = date('Y-m-d H:i:s');
$pprice=$_POST['pprice'];
$fianlprice=$_POST['finalp'];
$actyp=$_POST['actyp'];/* if 1 its rent 2 is jewel */
$deposit=$_POST['deposit'];
$orgdeposit=$_POST['orgdeposit'];
$dt="0000-00-00";
$retdt="0000-00-00";

if(isset($_SESSION['gid']) & $_SESSION['gid']!="" & $_SESSION['gid']>0)
{
    $errs=0;
    
    $resp=1;
    if($_POST['dt']!="")
    {
        
        $dt=date("Y-m-d",strtotime(str_replace("/","-",$_POST['dt'])));
    }
    
    
    if($_POST['retdt']!="")
    {
        $retdt=date("Y-m-d",strtotime(str_replace("/","-",$_POST['retdt'])));
    }
       
    if($typ=="1")
    {
        $sql="SELECT * FROM `product` WHERE `product_id`='".$product_id."'";
    }
    else if($typ=="2")
    {
       
        $sql="select * from  `garment_product` where gproduct_id='".$product_id."'";
    }
    
    //echo $sql;
    $table=mysql_query($sql);
    $tableftch=mysql_fetch_array($table);
    $productcode=$tableftch[2];
    //$usrid=1;
    
    $usrid=$gid;
    
    $cartid=0;
    $billidexs=0;
    
    mysql_query("BEGIN");
    mysqli_autocommit($con3, FALSE);
    
    
    $qryqty=mysql_query("select cart_id,qty,deposit_amt from cart where user_id='".$usrid."' and product_id='".$product_id."' and product_type='".$typ."' and ac_typ='".$actyp."' and rent_dt='".$dt."' and return_dt='".$retdt."' and status=0");
    $fetchqty1=mysql_num_rows($qryqty);
    if($fetchqty1 > 0)
    {
        $resp=2;
    }
    else
    {
    
        $qryinsert=mysql_query("INSERT INTO `cart`( `user_id`, `product_id`, `qty`, `product_amt`, `total_amt`, `date`,product_type,ac_typ,rent_dt,return_dt,deposit_amt,size) 
        VALUES ('".$usrid."','".$product_id."','".$qty."','".$pprice."','".$fianlprice."','".date("Y-m-d H:i:s")."','".$typ."','".$actyp."','".$dt."','".$retdt."','".$orgdeposit."','".$sizes."')");
    
        //echo "INSERT INTO `cart`( `user_id`, `product_id`, `qty`, `product_amt`, `total_amt`, `date`,product_type,ac_typ,rent_dt,return_dt,deposit_amt,size) 
        //VALUES ('".$usrid."','".$product_id."','".$qty."','".$pprice."','".$fianlprice."','".date("Y-m-d H:i:s")."','".$typ."','".$actyp."','".$dt."','".$retdt."','".$orgdeposit."','".$sizes."')";
    
        if(!$qryinsert)
        {
            //echo "ok2";
            $errs++;
            echo mysql_error();
        }
        $cartid=mysql_insert_id();
    }
    
    
    if($actyp=="1" & $resp==1)
    {
     
        if($billidexs==0)
        {
            $calcrentamt=$qty*$pprice;
            $t1=mysqli_query($con3,"insert into `phppos_rent`(cust_id,bill_date,status,pick,delivery,throught,pstatus,bal_amount,pick_date,delivery_date,delivery_status,throught_phone,person_Name,person_contact,comm_by,comm_amount,note,booking_status,rent_amount,amount) 
            values('".$usrid."','".date("Y-m-d")."','A','Customer','Customer Return','','Paid','0','".$dt."','".$retdt."','Paid','0','','0','0','0','','Booked','".$calcrentamt."','".$calcrentamt."')");
            
            
            if($t1=="")
            {
                //echo "1123";
                $errs++;
            }
            
            $billid=mysqli_insert_id($con3);
            
                
            $paymat=mysqli_query($con3,"Insert into rent_amount(`cust_id`,`amount`,bill_id) Values('".$usrid."','".$fianlprice."',$billid)");
                
            
            if($paymat=="")
            {
                $errs++;
            }
            
            //echo "insert into order_detail(bill_id,item_id,rent,deposit,discount,total_amount,item_detail,commission_amt,qty) values('".$billid."','".$productcode."','".$pprice."','".$orgdeposit."','0','".$fianlprice."','','0','','0','".$qty."')";
            $t3=mysqli_query($con3,"insert into order_detail(bill_id,item_id,rent,deposit,discount,total_amount,item_detail,commission_amt,qty) values('".$billid."','".$productcode."','".$pprice."','".$orgdeposit."','0','".$calcrentamt."','','0','".$qty."')");
                
            if($t3=="")
            {
                $errs++;
            }
            
            if($errs==0)
            {
                $updbllidqry=mysql_query("update cart set bill_id='".$billid."' where cart_id='".$cartid."'");
                if(!$updbllidqry)
                {
                    $errs++;
                }     
            }
        
        } else {
            
            //$billidexs=  
        }
    }
    
    if($errs==0)
    {
        mysql_query("COMMIT");
        mysqli_commit($con3);
        echo $resp;
    }
    else
    {
        mysqli_rollback($con3) ;
        mysql_query("ROLLBACK");
        echo $resp;
    }
} else 
{
    
    echo 50;
}
?>