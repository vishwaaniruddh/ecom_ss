<?php 



include('header.php'); ?>

<style>


					     p{
					         color:#000;
					     }
					     .product_col:hover .product_img{
    transition: transform .2s;
    transform: scale(1.5);

					     } 

    .ftco-animate {
    /*opacity: 0;*/
    /*visibility: hidden;*/
}
.product {
    display: block;
    width: 100%;
    margin-bottom: 30px;
    position: relative;
    -moz-transition: all .3s ease;
    -o-transition: all .3s ease;
    -webkit-transition: all .3s ease;
    -ms-transition: all .3s ease;
    transition: all .3s ease;
}.product .img-prod {
    position: relative;
    display: block;
    overflow: hidden;
}
a {
    -webkit-transition: .3s all ease;
    -o-transition: .3s all ease;
    transition: .3s all ease;
    color: #ffa45c;
}
.product .img-prod img {
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    -o-transform: scale(1);
    transform: scale(1);
    -moz-transition: all .3s ease;
    -o-transition: all .3s ease;
    -webkit-transition: all .3s ease;
    -ms-transition: all .3s ease;
    transition: all .3s ease;
}
.img-fluid {
    max-width: 100%;
    height: auto;
}
img {
    vertical-align: middle;
    border-style: none;
}
.product .img-prod span.status {
    position: absolute;
    top: 10px;
    left: -1px;
    padding: 2px 15px;
    color: #000;
    font-weight: 300;
    background: #ffa45c;
}
.product .img-prod .overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    content: '';
    opacity: 0;
    background: #ffa45c;
    -moz-transition: all .3s ease;
    -o-transition: all .3s ease;
    -webkit-transition: all .3s ease;
    -ms-transition: all .3s ease;
    transition: all .3s ease;
}
.product .text {
    background: #fff;
    position: relative;
    width: 100%;
}
.pl-3, .px-3 {
    padding-left: 1rem!important;
}
.pb-3, .py-3 {
    padding-bottom: 1rem!important;
}
.pr-3, .px-3 {
    padding-right: 1rem!important;
}
.pt-3, .py-3 {
    padding-top: 1rem!important;
}
.product .text h3 {
    font-size: 14px;
    margin-bottom: 5px;
    font-weight: 300;
    text-transform: uppercase;
    letter-spacing: 1px;
}
.product .text h3 a {
    color: #000;
    font-size:13px;
}
.d-flex {
    display: -webkit-box!important;
    display: -ms-flexbox!important;
    display: flex!important;
}
@media (min-width: 992px){
.col-lg {
    -ms-flex-preferred-size: 0;
    flex-basis: 0;
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    max-width: 100%;
}    
}

@media (min-width: 768px){
    

.col-md-6 {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 50%;
    flex: 0 0 50%;
    max-width: 50%;
}
}
@media (min-width: 576px){
.col-sm {
    -ms-flex-preferred-size: 0;
    flex-basis: 0;
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    max-width: 100%;
}    
}

</style>

<div class="container">
    <div class="row">






</div>    
</div>




<?

include('config.php');

function get_booking_status($sku) {
    global $con3;
    
    $sql = mysqli_query($con3,"select * from order_detail where item_id ='".$sku."' order by bill_id desc");
    $sql_result = mysqli_fetch_assoc($sql);
    $bill_id = $sql_result['bill_id'];
    $status_sql = mysqli_query($con3,"select * from phppos_rent where bill_id ='".$bill_id."'");
    $status_sql_result = mysqli_fetch_assoc($status_sql);
    return $status_sql_result['booking_status'];
}

/*include("requiredfields.php");
include('addtocartpopup.php');*/
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$type = $_GET['type'];
$subcatid = $_GET['id'];
$maincatid =$_GET['id'];
//$maincatid = 5;
$todaysdt=date("Y-m-d"); 

$transtyp = 1;

if(isset($_GET['discountfilter'])){
    $discountfilter = $_GET['discountfilter'];
} /*else {
    $discountfilter = 0;
}*/

if(isset($_GET['prcfilter'])){
    $prcfilter = $_GET['prcfilter'];
} else {
    $prcfilter = 3;
}

if(isset($_GET['size'])){
    $size_filter = $_GET['size'];
} /*else {
    $size_filter = 0; 
}*/
/*if(($subcatid==0 && $maincatid>0) || ($subcatid==0 && $maincatid==0)) {
    if($type=="1")
    { 
        $sql="SELECT * FROM `product` WHERE `categories_id`='".$maincatid."'";
        $sql24="SELECT name  FROM `subcat1` WHERE `maincat_id`='".$maincatid."'";
    }
    else if($type=="2")
    {
        $sql="select * from  `garment_product` where product_for='".$maincatid."' and  gproduct_id in(select gproduct_id from product_images_new where gproduct_id>0)";
        $sql24="SELECT name  FROM `garments` WHERE `garment_id`='".$maincatid."'";
    }
    
} else {*/      
        
        if($type=="1")
        {
            $sql="SELECT * FROM `product` WHERE `subcat_id`='".$subcatid."'"; 
            $sql24="SELECT name  FROM `subcat1` WHERE `subcat_id`='".$subcatid."'";
        }
        else if($type=="2")
        {
            $sql="select * from  `garment_product` where product_for='".$maincatid."' and  gproduct_id in(select gproduct_id from product_images_new where gproduct_id>0)";
            $sql24="SELECT name  FROM `garments` WHERE `garment_id`='".$maincatid."'";
        }
//}
    
    $maketemp = "CREATE TEMPORARY TABLE tempprdets(prcode varchar(1000),amt double,rentpr double,depositr double,disc double)";
    $exec=mysql_query($maketemp);
    
    $pidarr="";

    $prchsproid=mysqli_query($con3,"select b.name from phppos_purchase_details a, phppos_items b where a.item_id=b.item_id order by a.pur_id desc");
    $prchsproidnr=mysqli_num_rows($prchsproid);
    $popiprcodearr=[];

    while($prchid=mysqli_fetch_row($prchsproid))
    {
        array_push($popiprcodearr, $prchid[0]);
    }
    
    //var_dump($pidarr);
    
    // Filter
    
    /**********************************filter ***************************************************/

    if($prcfilter=="3")
    {
        /************if popular is selectd*********************/
        for($c=0;$c<count($popiprcodearr);$c++)
        {
            if($pidarr==""){
                $pidarr="'".$popiprcodearr[$c]."'";
            } else {
                $pidarr=$pidarr.","."'".$popiprcodearr[$c]."'";
            }
        }
        
        if($discountfilter!="")
        {
            //  echo "###--".$discountfilter."---###";
            if($discountfilter=="1")
            {
                $sql=$sql." and discount<30 and discount>0";
            }
            
            if($discountfilter=="2")
            {
                $sql=$sql." and discount BETWEEN 30 AND 50";
            }
            
            if($discountfilter=="3")
            {
                $sql=$sql." and discount BETWEEN 50 AND 70";
            }
        }
        
        if($type=="2"){
            if($size!="")
            {
                //$sql=$sql." and size = '".$size."'  ";
                $sql=$sql." and FIND_IN_SET('".$size."',`size_avail`)";
            }
        }
        
        /************if popular is selectd end*********************/
    }

    if($prcfilter=="1" || $prcfilter=="2")
    {
        /************if other options are selected *********************/
    
    	$tablefilt=mysql_query($sql);
    	while($rowf=mysql_fetch_array($tablefilt))
        {
        
            if($type=="1")
            {
                $prcodef=$rowf[2];
            }
            else
            {
                $prcodef=$rowf[2];
            }
            //echo "SELECT unit_price FROM satyavan_pos.phppos_items where name='".$prcode."'";
            //echo "SELECT unit_price,cost_price,quantity FROM phppos_items where name like '".$prcode."'";
            $ref = mysqli_query($con3,"SELECT unit_price,cost_price,quantity FROM phppos_items where name like '".$prcodef."'");
            $rerof=mysqli_fetch_row($ref);
            $re1f = mysqli_query($con3,"select sum(commission_amt) from order_detail where item_id='".$prcodef."' and bill_id in(select bill_id from phppos_rent where booking_status!='Booked')");
            $rero1f=mysqli_fetch_row($re1f);
            $currentspf=$rerof[0]-$rero1f[0];
            $splimitf=$rerof[1]*0.8;
            if($currentspf>$splimitf)
                $newspf=$currentspf;
            else
                $newspf=$splimitf;
        
            if($rerof[0]<=40000)
                $rentpricef=$rerof[0]*0.2;
            else if($rerof[0]<=60000)
                $rentpricef=$rerof[0]*0.15;
            else
                $rentpricef=$rerof[0]*0.12;
        
        	//$path=substr($row[1],7);
    
            $depositf=$rerof[1]-$rentpricef; 
            
            $qtyf=round($rerof[2]);
            $qtyrf=round($rerof[2]);/*used when type is rent */
    
            if($type=="1")
            {
                if($rowf[11]!="" & $rowf[11]>0.00)
                {
                    //echo $rws[11];
                    $newspf=$rowf[11];
                }
                
                if($rowf[12]!="" & $rowf[12]>0.00)
                {
                    $rentpricef=$rowf[12];
                }
                
                if($rowf[15]!="" & $rowf[15]>0.00)
                {
                    $depositf=$rowf[15];
                }
            }
    
            if($type=="2")
            {
                if($rowf[8]!="" & $rowf[8]>0.00)
                {
                    //echo $rws[8];
                    $newspf=$rowf[8];
                }
                if($rowf[9]!="" & $rowf[9]>0.00)
                {
                    $rentpricef=$rowf[9];
                }
                if($rowf[12]!="" & $rowf[12]>0.00)
                {
                    //echo $row[12];
                    $depositf=$rowf[12];
                }
            }
    
            $filtinsqr=mysql_query("insert into tempprdets(prcode,amt,rentpr,depositr,disc)values('".$prcodef."','".$newspf."','".$rentpricef."','".$depositf."','".$rowf["discount"]."')");
            //echo "yeah".mysql_error();
    
    	    if (!in_array($prcodef, $popiprcodearr))
            {
                array_push($popiprcodearr, $prcodef);
            }
        }
    
        $fltrstr="select *  from tempprdets where 1";
    
        if($discountfilter!="")
        {
            if($discountfilter=="1")
            {
                $fltrstr=$fltrstr." and disc<30 and disc>0";
            }
        
            if($discountfilter=="2")
            {
                $fltrstr=$fltrstr." and disc BETWEEN 30 AND 50";
            }
        
            if($discountfilter=="3")
            {
                $fltrstr=$fltrstr." and disc BETWEEN 50 AND 70";
            }
        }
    
        if($prcfilter=="1")
        {
            if($transtyp=="1" || $transtyp=="" || $transtyp=="0")
            {
                $fltrstr=$fltrstr." order by rentpr desc";
            } else
            {
                $fltrstr=$fltrstr." order by amt desc";  
            }  
        }
        
        if($prcfilter=="2")
        {
            if($transtyp=="1" || $transtyp=="" || $transtyp=="0")
            {
                $fltrstr=$fltrstr." order by rentpr asc";
            } else
            {
                $fltrstr=$fltrstr." order by amt asc";  
            }  
        } 
        
        if($type=="2")
        {
            if($size!="")
            {
                //$sql=$sql." and size = '".$size."'  ";
                $sql=$sql." and FIND_IN_SET('".$size."',`size_avail`)";
            }
        }
    
       // echo   $fltrstr;
        $prcfilterdstring="";
        ?>
        <table border="1">
            <?php
            $fltfqr=mysql_query($fltrstr);
            while($gtprfilpr=mysql_fetch_array($fltfqr))
            { ?>
                <?php
                if($prcfilterdstring=="")
                {
                    // echo "ok";
                    $prcfilterdstring="'".$gtprfilpr[0]."'";
                }
                else
                {
                    $prcfilterdstring=$prcfilterdstring.","."'".$gtprfilpr[0]."'";
                }
            }
            $pidarr=$prcfilterdstring;
            ?>
    </table>
<?php }
/**************************************8filter end*********************************************/


    $gtnm=mysql_query($sql24);
    $nmrws=mysql_fetch_array($gtnm);
    
    $pathmain ='http://yosshitaneha.com/';
    
    
    //Pagination 
	if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }
    // $no_of_records_per_page = 10;
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
    
    
    if($type=="1")
    {
        $sql=$sql." order by product_code desc LIMIT $offset , $no_of_records_per_page";
    }
    else if($type=="2")
    {
        $sql=$sql." order by gproduct_code desc LIMIT $offset, $no_of_records_per_page";
    }

 
    /*echo $sql;
    
    if($pidarr=="")
    {
        echo "NO Data to display";   
    }
    */
    
?>
<script>
    function brdcrumbfunc(maincat,subcatid,typ)
{
    
}
</script>
<form method="POST">
    
    <input type="hidden" name="final_amount" id="final_amt_id" value=ad"">
	<input type="hidden" name="selected_days" id="selected_days_id" value="">
	<input type="hidden" name="user_id" id="user_id_id" value="">
	<input type="hidden" name="deposite_amount" id="deposite_amount" value="<?php echo $deposit;?>">
	<input type="hidden" name="from_date" id="from_date" value="">
	<input type="hidden" name="till_date" id="till_date" value="">
	<input type="hidden" name="rent_amt" id="rent_amt" value="<?php echo $rentprice;?>">
	
	<!-- Content page  --> 
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 p-b-50 p-r">
					<!--  -->
					<div class="flex-sb-m flex-w p-b-35">
						<!--<div class="flex-w"> 
							<a href="sub_category.php?type=1">Jewellery</a>&nbsp;/ Kundan
						</div> -->
						
						<ol class="breadcrumb" style="display:inline-flex">
		  <?php
		  if($type=="1")
		  {
		      ?>
		       <a href="sub_category.php?type=2"><li class=""> <?php echo "Jewellery";?>&nbsp; / &nbsp;</li></a>
		      <?php
		  }else if($type=="2")
		  {
		     ?>
		       <a href="sub_category.php?type=1"><li class=""> <?php echo "Apparels";?>&nbsp; / &nbsp;</li></a>
		      <?php  
		  }
		 
		if($type=="1")
		{
		    $gtmctnm=mysql_query("select name,maincat_id from subcat1 where subcat_id='".$rws[8]."'");
		    $grmrws=mysql_fetch_array($gtmctnm);
		    
		    $gtmctnm2=mysql_query("select categories_name from jewel_subcat where subcat_id='".$grmrws[1]."'");
		    $grmrws2=mysql_fetch_array($gtmctnm2);
	    ?>
	    <?php if(strtolower($grmrws2[0]) != strtolower($grmrws[0])){ ?>
		    <li class=""><a href="javascript:void(0);" onclick='brdcrumbfunc("<?php echo $grmrws[1];?>","<?php echo $subcatid;?>","<?php echo $typ;?>","1");'><?php echo ucfirst(strtolower($grmrws2[0]));?></a></li>
	    <?php } ?>
		    
        <li class=""><a href="javascript:void(0);" onclick='brdcrumbfunc("<?php echo $grmrws[1];?>","<?php echo $rws[8];?>","<?php echo $typ;?>");'><?php echo ucfirst(strtolower($grmrws[0]));?></a></li>
		<?php }
		    else  if($type=="2"){ 
		        $gtmctnm=mysql_query("select name from garments where garment_id='".$rws['product_for']."'");
		        $grmrws=mysql_fetch_array($gtmctnm);
		  ?>
		 
		 <li class=""><a href="javascript:void(0);" onclick='brdcrumbfunc("<?php echo $rws['product_for'];?>","<?php echo "0";?>","<?php echo $typ;?>");'><?php echo ucfirst(strtolower($grmrws[0]));?></a></li>
	 
		          
		 
		 <?php } ?>
		  
		 </ol>

						<span class="s-text8 p-t-5 p-b-5">
							Showing &lt; Page <?php echo $pageno?> of <?php echo $total_pages;?>&gt;  <?php echo $total_rows; ?> results
						</span>
						<span>
						    <div class="pagination flex-m flex-w p-l-96" style="justify-content:center;">
                                <ul class="pagination">
                                    <li><a href="?id=<?php echo $maincatid;?>&type=<?php echo $type;?>&pageno=1"  class="btn btn-warning"><i class="fa fa-backward" aria-hidden="true"></i></a></li>&nbsp;&nbsp;&nbsp;
                                    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                                        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"  class="btn btn-warning"><i class="fa fa-step-backward" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;
                                    </li>&nbsp;&nbsp;&nbsp;
                                    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                                        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?id=".$maincatid."&type=".$type."&pageno=".($pageno + 1); } ?>" class="btn btn-warning"><i class="fa fa-step-forward" aria-hidden="true"></i></a>
                                    </li>&nbsp;&nbsp;&nbsp;
                                    <li><a href="?id=<?php echo $maincatid;?>&type=<?php echo $type;?>&=pageno=<?php echo $total_pages; ?>"  class="btn btn-warning"><i class="fa fa-fast-forward" aria-hidden="true"></i></a></li>&nbsp;&nbsp;&nbsp;
                                </ul>
                            </div>
						</span>
						
						<hr style="width:100%;background:#ccc;">
					</div>
					
					<!-- Filter -->
					<div class="flex-sb-m flex-w p-b-35">
						<div class="flex-w"> 
							<a href="sub_category.php?type=1">Sort </a>&nbsp; By
						</div>  
						
						<span class="s-text8 p-t-5 p-b-5">
							<div class="dropdown">
                              <a class="btn btn-warning dropdoadwn-toggle" href="#" role="button" id="discountfilter" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Discount
                              </a>
                            
                              <div class="dropdown-menu" aria-labelledby="discountfilter">
                                <a class="dropdown-item" href="?id=<?php echo $maincatid;?>&type=<?php echo $type;?>&discountfilter='' ">All</a>
                                <a class="dropdown-item" href="?id=<?php echo $maincatid;?>&type=<?php echo $type;?>&discountfilter=1">Below 30%</a>
                                <a class="dropdown-item" href="?id=<?php echo $maincatid;?>&type=<?php echo $type;?>&discountfilter=2">30 to 50%</a>
                                <a class="dropdown-item" href="?id=<?php echo $maincatid;?>&type=<?php echo $type;?>&discountfilter=3">50 to 70%</a>
                              </div>
                            </div>
						</span>
						
						<span class="s-text8 p-t-5 p-b-5">
							<div class="dropdown">
                              <a class="btn btn-warning dropdown-toggle" href="#" role="button" id="pricefilter" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Price
                              </a>
                            
                              <div class="dropdown-menu" aria-labelledby="pricefilter">
                                <a class="dropdown-item" href="?id=<?php echo $maincatid;?>&type=<?php echo $type;?>&pricefilter=3">Popular</a>
                                <a class="dropdown-item" href="?id=<?php echo $maincatid;?>&type=<?php echo $type;?>&pricefilter=1">Higher To Lower</a>
                                <a class="dropdown-item" href="?id=<?php echo $maincatid;?>&type=<?php echo $type;?>&pricefilter=2"> Lower To Higher</a>
                              </div>
                            </div>
						</span>
						
						<?php if($type==2){?>

						<span class="s-text8 p-t-5 p-b-5">
							<div class="dropdown show">
                              <!--<a class="btn btn-warning dropdown-toggle" href="#" role="button" id="size" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Size
                              </a>-->
                            
                              <!--<div class="dropdown-menu" aria-labelledby="size">-->
                                <!--<a class="dropdown-item" href="">All</a>
                                
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>-->
                                
                                <select class="form-control select2" id="size" name="size" >
            		                <option value="">All</option>
            		                <?php 
                		            $s =  get_size(); 
                		            while($result = mysql_fetch_assoc($s)) { ?>
            		                        <option value="<?php echo $result['id'];?>">
            		                            <a class="dropdown-item" href="?id=<?php echo $maincatid;?>&type=<?php echo $type;?>&size=<?php echo $result['id'];?>"><?php echo $result['size'];?></option> </a>
            		                <?php } ?>
            	    	        </select>
                              <!--</div>-->
                            </div>
						</span>
						<?php } ?>
						<hr style="width:100%;background:#ccc;">
					</div>

					<!-- Product -->
					<div class="row formob">
                    <?php 
                    
                    /*if($type=="1")
                    {
                        $sql.=" order by product_code desc LIMIT $offset , $no_of_records_per_page";
                    }
                    else if($type=="2")
                    {
                        $sql.=" order by gproduct_code desc LIMIT $offset, $no_of_records_per_page";
                    }*/
                   
                    if($pidarr=="")
                    {
                        echo "NO Data to display";   
                    }
                    
                    else
                    {
                        // echo $sql;
                        // echo '<br>';
                        $qrys=mysql_query($sql);
                    	
                    	$i=0;
                        while($row=mysql_fetch_array($qrys))
                        {
                            if($type=="1")
                            {
                                $prcode=$row[2];
                            }
                            else
                            {
                                $prcode=$row[2];
                            }
                            
                            // echo "SELECT unit_price,cost_price,quantity FROM phppos_items where name like '".$prcode."'";
                            $re = mysqli_query($con3,"SELECT unit_price,cost_price,quantity FROM phppos_items where name like '".$prcode."'");
                            $rero=mysqli_fetch_row($re);
                            
                            // echo '<br>';
                            // echo "select sum(commission_amt) from order_detail where item_id='".$prcode."' and bill_id in(select bill_id from phppos_rent where booking_status!='Booked')";
                            $re1 = mysqli_query($con3,"select sum(commission_amt) from order_detail where item_id='".$prcode."' and bill_id in(select bill_id from phppos_rent where booking_status!='Booked')");
                            $rero1=mysqli_fetch_row($re1);
                            $currentsp=$rero[0]-$rero1[0];
                            $splimit=$rero[1]*0.8; 
                            
                            if($currentsp>$splimit)
                                $newsp=$currentsp;
                            else
                                $newsp=$splimit;
                            
                            if($rero[0]<=40000)
                                $rentprice=$rero[0]*0.2;
                            else if($rero[0]<=60000)
                                $rentprice=$rero[0]*0.15; 
                            else
                                $rentprice=$rero[0]*0.12;
                            
                            // // echo '$rentprice'. $rentprice; 
                                //$path=substr($row[1],7);
                        
                            // $deposit=$rero[1]-$rentprice; 
                            
                            $qty=round($rero[2]); 
                            $qtyr=round($rero[2]);/*used when type is rent */
                            
                            
                        if($type=="1")
                        {
                            $sqlimg="SELECT img_name FROM `product_images_new` WHERE `product_id`='".$row[0]."'";
                        }
                        else
                        {
                            $sqlimg="SELECT img_name FROM `product_images_new` WHERE `gproduct_id`='".$row[0]."'";
                        }
                        
                        
                        if($type=="1") //jwellery 
                        {
                            if($row[11]!="" & $row[11]>0.00)
                            {
                                //echo $rws[11];
                                $newsp=$row[11];
                            }
                        
                            if($row[12]!="" & $row[12]>0.00)
                            {
                                $rentprice=$row[12];
                            }
                            if($row[15]!="" & $row[15]>0.00)
                            {
                                // $deposit=$row[15];
                            }
                            
                            
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
                        
                        if($type=="2") //garment
                        {
                            if($row[8]!="" & $row[8]>0.00)
                            { 
                                //echo $rws[8];
                                $newsp=$row[8];
                            }
                        
                            if($row[9]!="" & $row[9]>0.00)
                            {
                                $rentprice=$row[9];
                            }
                            if($row[12]!="" & $row[12]>0.00)
                            {
                                //echo $row[12];
                                // $deposit=$row[12];
                            }
                            
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
                        
                            // $deposit=$rero[1]-$rentprice; 
                        }
                        
                        $deposit=$newsp*0.35;
                        // echo '$rentprice2'.$rentprice;
                        //echo $sqlimg;
                        $qryimg = mysql_query($sqlimg);
                        $rowimg = mysql_fetch_row($qryimg); 
                        
                        $path = trim($pathmain."uploads".$rowimg[0]);
                        
                        $expl = explode('/',$path);
                        
                        $cnt = count($expl);
                        
                        $pth1 = trim($pathmain."thumbs/".$expl[$cnt-1]);
                        
                        $qrybk = mysqli_query($con3,"SELECT * FROM `order_detail` where `item_id`='".$row[2]."' and bill_id in(SELECT bill_id  FROM `phppos_rent` WHERE (`pick_date` >=".$todaysdt." or `delivery_date` >=".$todaysdt.")  and booking_status!='Returned'  ORDER BY `phppos_rent`.`pick_date` ASC) group by bill_id");
                        
                        echo mysql_error();
                        
                        $nrwbk = mysqli_num_rows($qrybk);
                        
                        if($transtyp=="2")
                        {
                            $qrybk2=mysqli_query($con3,"SELECT * FROM `order_detail` where `item_id`='".$row[2]."' and bill_id in(SELECT bill_id  FROM `phppos_rent` WHERE (`pick_date` >=".$todaysdt." or `delivery_date` >=".$todaysdt.") and booking_status!='Returned' ORDER BY `phppos_rent`.`pick_date` ASC) group by bill_id");
                            
                            $dtarr=array();
                        
                            while($gtfrbk2=mysqli_fetch_array($qrybk2))
                            {
                                $qryrentbk=mysqli_query($con3,"Select pick_date, delivery_date, booking_status from phppos_rent where bill_id='".$gtfrbk2[0]."'");
                                $qty=$qty-$gtfrbk2[9];
                                
                                $data = mysqli_fetch_assoc($qryrentbk);
                                $pick_date = $data['pick_date'];
                                $delivery_date = $data['delivery_date'];
                                $book_status = $data['booking_status'];
                            }
                        }
                        else
                        {
                        
                            $qrybk2=mysqli_query($con3,"SELECT * FROM `order_detail` where `item_id`='".$row[2]."' and bill_id in(SELECT bill_id  FROM `phppos_rent` WHERE (`pick_date` >=".$todaysdt." or `delivery_date` >=".$todaysdt.") and booking_status !='Returned' ORDER BY `phppos_rent`.`pick_date` ASC) group by bill_id");
                            
                            $dtarr=array();
                            
                            while($gtfrbk2=mysqli_fetch_array($qrybk2))
                            {
                                $qryrentbk=mysqli_query($con3,"Select pick_date, delivery_date, booking_status from phppos_rent where bill_id='".$gtfrbk2[0]."'");
                                $qtyr=$qtyr-$gtfrbk2[9];

                                $data = mysqli_fetch_assoc($qryrentbk);
                                $pick_date = $data['pick_date'];
                                $delivery_date = $data['delivery_date'];
                                $book_status = $data['booking_status'];
                            }
                            
                            $qrybk23=mysqli_query($con3,"SELECT * FROM `order_detail` where `item_id`='".$row[2]."' and bill_id in(SELECT bill_id  FROM `phppos_rent` WHERE (`pick_date` >=".$todaysdt." or `delivery_date` >=".$todaysdt.") and booking_status='Picked' ORDER BY `phppos_rent`.`pick_date` ASC) group by bill_id");
                            
                            while($gtfrbk23=mysqli_fetch_array($qrybk23))
                            {
                                $qty=$qty+$gtfrbk23[9];
                            }
                        }
                        ?>
                        <?php if($qty>0) { ?>
					 	

<div class="col-md-3 ftco-animate fadeInUp ftco-animated product_col">
<div class="product">
<a href="detail.php?id=<?php echo $row[0];?>&type=<?php echo $type;?>&days=3" class="img-prod">
    <img class="img-fluid product_img" src="<?php echo $path;?>" alt="Colorlib Template" data-pagespeed-url-hash="2897450385" onload="">


</a>
<div class="text py-3 px-3">
<h3><a href="detail.php?id=<?php echo $row[0];?>&type=<?php echo $type;?>&days=3"><?php echo $row[3]; ?></a></h3><hr>
<?php

                                                                if($row['discount']>0) { 
                                                                    $ab=($row['discount']/100)*$rero[0];
                                                                    $newsp=$rero[0]-$ab;
                                                                }
                                                                
                                                            if($rero[0]== $newsp)
                                                            { ?>
                        										MRP &#x20b9; <?php echo $newsp; ?>
                            								<?php  } else { ?>
                                    							<strike> &#8377;<?php echo $rero[0]; ?></strike> &nbsp;
                                                                <b>Now </b>
                                                                &#8377;
                                                                <?php echo $newsp; ?>
                                                                
                                                                <?php if($row['discount']>0 ) { ?>
                                                                    <b>Flat : </b> &nbsp;<?php echo $row['discount']; ?>%  off<br />
                                                                <?php } 
                                                            } ?>
                                                            
                                                            
<h6>SKU : <a href="#"><?php echo $row[2]; ?></a></h6>

<div class="d-flex">
<div class="pricing">
    <p class="price">
        <span class="mr-2 price-dc">Rent &#8377; <strong><?php echo  round_amount($rentprice+$courier) ; ?></strong> : for 3 Days
        </span>
        <br>
        <span class="price-sale">                        							Deposit &#8377; <strong><?php echo round_amount($deposit); ?></strong>
        </span>
    </p>
</div>
<div class="rating">
<p class="text-right">
<a href="#"><span class="ion-ios-star-outline"></span></a>
<a href="#"><span class="ion-ios-star-outline"></span></a>
<a href="#"><span class="ion-ios-star-outline"></span></a>
<a href="#"><span class="ion-ios-star-outline"></span></a>
<a href="#"><span class="ion-ios-star-outline"></span></a>
</p>
</div>
</div>

<?php if($pick_date!='' && $delivery_date!='' && get_booking_status($row[2]) !='Returned') { ?>

        <?php 
        if(date("m/d/Y", strtotime($pick_date)) === '01/01/1970'){
        }else{ ?>

<div class="pricing">
    <p class="price">
        <span class="mr-2 price-dc">Booking Status Dates &#8377; 
        <strong>
                        <?php echo date("d-m-Y", strtotime($pick_date)) .' - '. date("d-m-Y", strtotime($delivery_date)) ;?>  
		    <?php } ?>
</strong>
        </span>
        <br>
    </p>
</div>


    <?php } ?>

</div>
</div>
</div>
                            	
                            	
                            	
                            	
                            	<?php } ?>
                        	<?php 
                            $num++;
                            } 
                        }  ?>
                    </div>
                </div>
			</div>
		</div>
	</div>
					
    <!--<div class="pagination flex-m flex-w p-l-96" style="margin-left: 842px;">-->
        <div class="pagination flex-m flex-w p-l-96" style="justify-content:center;">
        <ul class="pagination">
            <li><a href="?id=<?php echo $maincatid;?>&type=<?php echo $type;?>&pageno=1"  class="btn btn-warning"><i class="fa fa-backward" aria-hidden="true"></i></a></li>&nbsp;&nbsp;&nbsp;
            <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"  class="btn btn-warning"><i class="fa fa-step-backward" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;
            </li>&nbsp;&nbsp;&nbsp;
            <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?id=".$maincatid."&type=".$type."&pageno=".($pageno + 1); } ?>" class="btn btn-warning"><i class="fa fa-step-forward" aria-hidden="true"></i></a>
            </li>&nbsp;&nbsp;&nbsp;
            <li><a href="?id=<?php echo $maincatid;?>&type=<?php echo $type;?>&=pageno=<?php echo $total_pages; ?>"  class="btn btn-warning"><i class="fa fa-fast-forward" aria-hidden="true"></i></a></li>&nbsp;&nbsp;&nbsp;
        </ul>
    
    </div>
				</div>
			</div>
		</div>
	</section>
</form>
	 


<?php include('footer.php'); ?>
