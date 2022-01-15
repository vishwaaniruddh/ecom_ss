<?php session_start();
include('header.php'); 

// daterangepicker_end   daterangepicker_start 

?>

<style>
.daterangepicker{
    position: fixed;
    top: 35% !important;
    left: 24% !important;
    bottom: 25%;
    right: 10%;
    width: 50%;
}
    
</style>
<?php
$type  = $_GET['type'];
$id = $_GET['id'];

$userid = $_SESSION['userid']; 

$prid=$id;
$transtyp = 1;

if($type=="1")
{ 
    $sql="SELECT * FROM `product` WHERE `product_id`='".$prid."'"; 
}  
else if($type=="2")
{ 
    $sql="select * from  `garment_product` where gproduct_id='".$prid."'"; 
}

//echo  $sql;

$table=mysql_query($sql);
$rws=mysql_fetch_array($table);
$total_view =  $rws['seen_count'];

if(isset($_SESSION['product_viewed_counts']['pid']) && $_SESSION['product_viewed_counts']['pid']==$id){
    $seen_count = 0;
}  else {
    $_SESSION['product_viewed_counts']['pid'] = $id;
    $seen_count=1;
}

$total_view =  $rws['seen_count'] + $seen_count;

if($type=="1")
{
    $insert_count = mysql_query("update product set seen_count='".$total_view."' where product_id='".$id."'");

    $qryjew1=mysql_query("select * from subcat1  where subcat_id='".$rws['subcat_id']."'");
    $rowjew1=mysql_fetch_array($qryjew1);
            
    $qryjew2=mysql_query("SELECT * FROM `jewel_subcat` where subcat_id='".$rowjew1['maincat_id']."'");
    $rowjew2=mysql_fetch_array($qryjew2);
    
    if($rowjew2['mcat_id']=="1" || $rowjew2['mcat_id']=="3")
    {
        $transtypchk='1';
    } else
    {
        $transtypchk='2';
    }

} else
{
    $insert_count = mysql_query("update garment_product set seen_count='".$total_view."' where gproduct_id='".$id."'");
    $qryjew=mysql_query("SELECT * FROM `garments` where garment_id='".$rws['product_for']."'");     
	$rowjew=mysql_fetch_array($qryjew);
   
    if($rowjew['Main_id']=="1" || $rowjew['Main_id']=="3")
    {
        $transtypchk='1';
    } else
    {
        $transtypchk='2';
    }
}
    $re = mysqli_query($con3,"SELECT unit_price,cost_price,quantity FROM phppos_items where name like '".$rws[2]."'");
    $rero = mysqli_fetch_row($re);
    $re1 = mysqli_query($con3,"select sum(commission_amt) from order_detail where item_id='".$rws[2]."' and bill_id in(select bill_id from phppos_rent where booking_status!='Booked')");
    $rero1 = mysqli_fetch_row($re1);
    $currentsp=$rero[0]-$rero1[0];
    $splimit=$rero[1]*0.8;
    if($currentsp>$splimit)
        $newsp=$currentsp;
    else
        $newsp=$splimit;
    
    if($rero[0]<=30000)
        $rentprice=$rero[0]*0.2;
    else if($rero[0]<=60000)
        $rentprice=$rero[0]*0.15;
    else
        $rentprice=$rero[0]*0.12;
    
        $deposit=$rero[1]-$rentprice; 

        $qty=round($rero[2]);
        $qtyr=round($rero[2]);
    
//echo $qty;

if($type=="1") 
{
    /** if jewellery ***/
    if($rws[11]!="" & $rws[11]>0.00)
    {
        $newsp=$rws[11];
    }

    if($rws[12]!="" & $rws[12]>0.00)
    {
        $rentprice=$rws[12];
    }

    if($rws[15]!="" & $rws[15]>0.00)
    {
        $deposit=$rws[15];
    }
    $todaysdt=date("Y-m-d");
    $qrybk23toc=mysqli_query($con3,"SELECT * FROM `order_detail` where `item_id`='".$rws[2]."' and bill_id in(SELECT bill_id  FROM `phppos_rent` WHERE (`pick_date` >=".$todaysdt." or `delivery_date` >=".$todaysdt.") and booking_status='Picked' ORDER BY `phppos_rent`.`pick_date` ASC) group by bill_id");
    while($gtfrbk23totc=mysqli_fetch_array($qrybk23toc))
    {
        $qty=$qty+$gtfrbk23totc[9];
    }

    /**** get social sites details of jewellerty****/
    $fb=$rws[16];
	$insta=$rws[17];
	$google=$rws[18];

	$twitter=$rws[19];

	$pin=$rws[20];

	$flipkart=$rws[21];
    $amazon=$rws[22];

}
/**** if $typ=="1" end ***/

if($type=="2")
{
    /** if garment***/

    if($rws[8]!="" & $rws[8]>0.00)
    {
        //echo $rws[8];
        $newsp=$rws[8];
    }

    if($rws[9]!="" & $rws[9]>0.00)
    {
        $rentprice=$rws[9];
    }

    if($rws[12]!="" & $rws[12]>0.00)
    {
        $deposit=$rws[12];
    }

    /**** get social sites details of jewellerty****/

    $fb=$rws[13];

	$insta=$rws[14];

	$google=$rws[15];

	$twitter=$rws[16];

	$pin=$rws[17];

	$flipkart=$rws[18];
	
    $amazon=$rws[19]; 

}
    /**** if $typ=="2" end ***/
    $todaysdt=date("Y-m-d");
    //echo "SELECT * FROM `order_detail` where `item_id`='".$rws[2]."' and bill_id in(SELECT bill_id  FROM `phppos_rent` WHERE (`pick_date` >=".$todaysdt." or `delivery_date` >=".$todaysdt.") ORDER BY `phppos_rent`.`pick_date` ASC) group by bill_id";
    $qrybk=mysqli_query($con3,"SELECT * FROM `order_detail` where `item_id`='".$rws[2]."' and bill_id in(SELECT bill_id  FROM `phppos_rent` WHERE (`pick_date` >=".$todaysdt." or `delivery_date` >=".$todaysdt.") and booking_status!='Returned'  ORDER BY `phppos_rent`.`pick_date` ASC) group by bill_id");
    $nrwbk=mysqli_num_rows($qrybk);
    
if($transtyp=="2")
{
   // echo "222";
    
    $qrybk2=mysqli_query($con3,"SELECT * FROM `order_detail` where `item_id`='".$rws[2]."' and bill_id in(SELECT bill_id  FROM `phppos_rent` WHERE (`pick_date` >=".$todaysdt." or `delivery_date` >=".$todaysdt.")  and booking_status!='Returned' ORDER BY `phppos_rent`.`pick_date` ASC) group by bill_id");

    $dtarr=array();

    while($gtfrbk2=mysqli_fetch_array($qrybk2))
    {
        $qryrentbk=mysqli_query($con3,"Select pick_date, delivery_date from phppos_rent where bill_id='".$gtfrbk2[0]."'");
        $qty=$qty-$gtfrbk2[9];
    }
} else {
    //echo "333";
    $qrybk2=mysqli_query($con3,"SELECT * FROM `order_detail` where `item_id`='".$rws[2]."' and bill_id in(SELECT bill_id  FROM `phppos_rent` WHERE (`pick_date` >=".$todaysdt." or `delivery_date` >=".$todaysdt.")  and booking_status!='Returned' ORDER BY `phppos_rent`.`pick_date` ASC) group by bill_id");

    $dtarr=array();

    while($gtfrbk2=mysqli_fetch_array($qrybk2))
    {
        $qryrentbk=mysqli_query($con3,"Select pick_date, delivery_date from phppos_rent where bill_id='".$gtfrbk2[0]."'");
        $qtyr=$qtyr-$gtfrbk2[9];
    }
}

?>
<?php 
if($type=="1")
{
    $sqlpn="SELECT * FROM `product` WHERE `subcat_id`='".$rws['subcat_id']."'";
    $sqlpn24="SELECT name  FROM `subcat1` WHERE `subcat_id`='".$rws['subcat_id']."'";
}
else if($type=="2")
{
    $sqlpn="select * from  `garment_product` where product_for='".$rws['product_for']."' and  gproduct_id in(select gproduct_id from product_images_new where gproduct_id>0)";
    $sqlpn24="SELECT name  FROM `garments` WHERE `garment_id`='".$rws['product_for']."'";
}

$gtnm=mysql_query($sqlpn24);
$nmrws=mysql_fetch_array($gtnm);
$table=mysql_query($sqlpn);
$Num_Rows = mysql_num_rows ($table);

//=================
$pidarr="";

$prchsproid=mysqli_query($con3,"select b.name from phppos_purchase_details a, phppos_items b where a.item_id=b.item_id order by a.pur_id desc");
$prchsproidnr=mysqli_num_rows($prchsproid);

while($prchid=mysqli_fetch_row($prchsproid)){
    if($pidarr==""){
        
        $pidarr="'".$prchid[0]."'";
    }else{
        
        $pidarr=$pidarr.","."'".$prchid[0]."'";
    }
}
//echo $pidarr;

if($type=="1")
{
    $sqlpn=$sqlpn." and product_code in ($pidarr)";
    $sqlpn=$sqlpn." order by field(product_code,$pidarr) ";
}
else if($type=="2")
{
    $sqlpn=$sqlpn." and gproduct_code in ($pidarr)";
    
    $sqlpn=$sqlpn." order by field(gproduct_code,$pidarr)  ";
}

//echo $sqlpn;
$qrys3=mysql_query($sqlpn);
//===============
$productid=array();

while($row123=mysql_fetch_array($qrys3))
{
    $productid[]=$row123[0];
}

    $getproid=array_search($prid, $productid);	
    //	print_r($productid);
	//echo "fgvd ".$getproid;

    $cnt=count($productid);
    $tl=$cnt-1;

    $nxtt=$getproid+1;
    $prv=$getproid-1;

?>

<?php

if($type=="1")
{
    $sqlimg="SELECT img_name FROM `product_images_new` WHERE `product_id`='$prid' order by rank";
}
else if($type=="2") 
{
    $sqlimg="SELECT img_name FROM `product_images_new` WHERE `gproduct_id`='$prid' order by rank";
}

//echo $sqlimg;

$qryimg=mysql_query($sqlimg);
$rowimg=mysql_fetch_row($qryimg);
$img_path ='http://yosshitaneha.com/uploads';
//$path=trim($pathmain."static/images/catalog/products".$rowimg[0]);	
$path = $img_path.$rowimg[0];

?>


<form method="post" style="margin-bottom: 0;" enctype="multipart/form-data" >
	<input type="hidden" name="final_amount" id="final_amt_id" value=ad"">
	<input type="hidden" name="selected_days" id="selected_days_id" value="">
	<input type="hidden" name="user_id" id="user_id_id" value="">
	<input type="hidden" name="deposite_amount" id="deposite_amount" value="<?php echo $deposit;?>">
	<input type="hidden" name="from_date" id="from_date" value="">
	<input type="hidden" name="till_date" id="till_date" value="">
	<input type="hidden" name="rent_amt" id="rent_amt" value="<?php echo $rentprice;?>">
	
	<section class="bgwhite p-t-55 p-b-65 ">
		<div>
		    <div>
        		<div class="col-sm-12 col-md-12 col-lg-12">
        			<div>
        				<div class="flex-w">
        					<!--<a href="sub_category.php?page=1">Jewellery&nbsp;</a>/&nbsp;
        					<a href="list.php?page=1">American Diamond</a> / CZ/AD choker necklace set with golden polish and ruby coloured stones-->
        					
        					<ol class="breadcrumb" style="display:inline-flex">
                    		  <?php
                    		  if($type=="1")
                    		  {
                    		      ?>
                    		       <a href="sub_category.php?type=1"><li class=""> <?php echo "Jewellery";?>&nbsp; / &nbsp;</li></a>
                    		      <?php
                    		  } else if($type=="2")
                    		  { ?>
                    		       <a href="sub_category.php?type=2"><li class=""> <?php echo "Apparels";?>&nbsp; / &nbsp;</li></a>
                    		      <?php  
                    		  }
                    		 
                    		  if($type=="1")
                    		  {
                    		    $gtmctnm=mysql_query("select name,maincat_id from subcat1 where subcat_id='".$rws[8]."'");
                    		    //echo "select name,maincat_id from subcat1 where subcat_id='".$rws[8]."'";
                    		    $grmrws=mysql_fetch_array($gtmctnm);
                    		    
                    		    $gtmctnm2=mysql_query("select categories_name from jewel_subcat where subcat_id='".$grmrws[1]."'");
                    		    $grmrws2=mysql_fetch_array($gtmctnm2);
                        	    ?>
                        	    <?php if(strtolower($grmrws2[0]) != strtolower($grmrws[0])) { ?>
                        		    <li class=""><a href="javascript:void(0);" onclick='brdcrumbfunc("<?php echo $grmrws[1];?>","<?php echo $subcatid;?>","<?php echo $typ;?>","1");'><?php echo ucfirst(strtolower($grmrws2[0]));?></a></li>&nbsp; / &nbsp;
                        	    <?php } ?>
                        		    
                                <!--<li class=""><?php echo $grmrws2[0];?></li>-->
                                <li class=""><a href="javascript:void(0);" onclick='brdcrumbfunc("<?php echo $grmrws[1];?>","<?php echo $rws[8];?>","<?php echo $typ;?>");'><?php echo ucfirst(strtolower($grmrws[0]));?></a></li>&nbsp; / &nbsp;
                        	<?php }  else  if($type=="2"){ 
                    		        $gtmctnm=mysql_query("select name from garments where garment_id='".$rws['product_for']."'");
                    		        $grmrws=mysql_fetch_array($gtmctnm);
                    		  ?>
                    		 <li class=""><a href="javascript:void(0);" onclick='brdcrumbfunc("<?php echo $rws['product_for'];?>","<?php echo "0";?>","<?php echo $typ;?>");'><?php echo ucfirst(strtolower($grmrws[0]));?></a></li>&nbsp; / &nbsp;
                    		 
                    		 <?php } ?>
                    	</ol>
    				</div> 
    				<hr style="width:100%;background:#ccc;">
    			</div>
    		</div>
        		<div class="container bgwhite p-t-35 p-b-80">
        			<div class="flex-w flex-sb" >
        				<div class="w-size13 p-t-0 respon5">
        					<div class="wrap-slick3 flex-sb flex-w">
        						<div class="wrap-slick3-dots y-scroll"></div>
        	
        						<div class="slick3">
        							<div class="item-slick3" data-thumb="<?php echo $path;?>">
        						    <!--<div class="item-slick3" data-thumb="static/images/catalog/products/thumbnail/SET818-11000(1).jpg">-->	
        								<div class="wrap-pic-w">
        									<section class="bgwhite">
        										<div class="">
        											<!--<figure class="zoom" onmousemove="zoom(event)" style="background-image: url( '/static/images/catalog/products/thumbnail/SET818-11000(1).jpg')">-->
          											<figure class="zoom" onmousemove="zoom(event)" style="background-image: url( '<?php echo $path; ?>')">
          												<!--<img class="test" src="static/images/catalog/products/thumbnail/SET818-11000(1).jpg" />-->
        											    <img class="test" src="<?php echo $path; ?>" />
        											</figure>
        										</div>
        								 	</section>										
        								</div>
        							</div>
        						</div>
        					</div>
        				</div>
        				<div class=" bo9 w-size14 p-t-0 respon5 p-b-0 ">
					        <div class=" p-l-20 p-r-20 p-t-20 p-b-20 mainbox">	
                        		<h4 class="product-detail-name m-text15 p-b-10">
                        			<?php echo $rws[3];?>
                        		</h4>
        							
        						<span class="p-b-10" style="color:#E6BE6E;"><strong>SKU: <?php echo $rws[2];?></strong></span>
        						<br>
        						<?php
                                if($rws['discount']>0){
                                    $ab=($rws['discount']/100)*$rero[0];
                                    $newsp=$rero[0]-$ab;
                                }
                                if($rero[0]==$newsp)
                                { ?>
                                   <span class="p-b-10" style="color:#E6BE6E	;"><strong>MRP: <?php echo $newsp; ?></strong></span>
                                   
                                   <input type="hidden" name="price" id="price" value="<?php echo $newsp; ?>">
                                   <?php 
                                   } else { 
                                   ?> 
                                   <span class="p-b-10" style="color:#E6BE6E	;"><strong>MRP: <strike><?php echo $newsp; ?></strike> <b>Now </b> <?php echo $newsp; ?>  <br /> </strong> </span>
                                   
                                   <input type="hidden" name="price" id="price" value="<?php echo $newsp; ?>">
                                   
                                    <?php if($rws['discount']>0){ ?>
                                        <font color="#00ff99"><b>Flat</b></font> &nbsp;<?php echo $rws['discount']; ?>%  off<br />
                                        <span class="p-b-10" style="color:#E6BE6E	;"><strong>Flat: </strong></span>
                                    <?php
                                    }
                                }?>
						        <!--<span class="p-b-10" style="color:#E6BE6E	;"><strong>MRP: 11000.00</strong></span>-->
						        <hr style="background-color:#e6be6e"> 
						
							<div class="fs-15 p-b-5">
								<div class="">
									<table style="border:0px;">
										<tr style="border:0px; padding-bottom: 10px; ">
    										<td style="border:0px; padding-bottom: 10px; "	>
    									        <span class="fs-15"  style="color: #555555;"> <b>Rent Price</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
    										</td>
    										
    										<td style="border:0px; padding-bottom: 10px; "><b>:</b></td>
    										
    										<td style="border:0px; padding-bottom: 10px; ">
            									<strong>
            										<!--<span class="fs-15 m-l-10" style="color: #424242;font-size: 18px;" id="rentalValue" >Rs. <?php echo $rentprice; ?> </span>-->
            										<span class="fs-15 m-l-10" style="color: #424242;font-size: 18px;"  >Rs. <?php echo $rentprice; ?> </span>
            									</strong>
            								</td >
								        </tr>
								        
								        <input type="hidden" name="sku" id="sku" value="<?php echo $rws[2];?>">
								        
        								<tr>
        									<p></p>	
        								</tr>

        								<tr>
        									<td style="border:0px; padding-bottom: 10px; ">
        								        <span class="fs-15 "  style="color: #555555;"><b>Deposit</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
        								    </td>
        								    <td style="border:0px; padding-bottom: 10px; "><b>:</b></td>
        									<td style="border:0px; padding-bottom: 10px; " >
            									<strong>
            										<!--<span class="fs-15 m-l-10" id="finalVaueForRentel" style="font-size: 18px;color: #424242;"></span>-->
            										<span class="fs-15 m-l-10"  style="font-size: 18px;color: #424242;">Rs. <?php echo $deposit; ?></span>
            									</strong>
        									</td>
        								</tr>
        								<tr>
        									<p></p>	
        								</tr>
								        <!-- stock -->
										
										<div class="m-t-10">
											<tr>
												<td style="border:0px;padding-bottom: 10px; ">
											        <span class="fs-15 " style="color: #555555;"><b>Stock</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
										        </td>
    											<td style="border:0px;padding-bottom: 10px; "><b>:</b></td>
    												<td style="border:0px;padding-bottom: 10px; ">
    												<span class="fs-15 m-b-15 m-t-15 m-l-10 " style="color: #000000;"><?php echo $qty; ?> in stock</span>
    											</td>
											</tr>
											<tr>
												<td style="border:0px;" ></td>
											        <p></p>
											    </td>	
											</tr>
										</div>
    									<!-- end stock -->
    									<!-- color -->
									
										<!--<div class="">
											<tr class="m-t-10">
												<td style="border:0px; padding-bottom: 10px; ">
											
												    <span class="fs-15" style="color: #555555;"><b>Color</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span> 
											    </td>
											    <td style="border:0px;padding-bottom: 10px; "><b>:</b>&nbsp;&nbsp;&nbsp;</td>
    											<td style="border:0px;padding-bottom: 10px; ;">
    												<span class="fs-15 m-b-15 m-t-15 m-l-10 " style="color: #000000;">GOLD &amp; RUBY</span>
    											</td>
										    </tr>
										    <tr>
            									<p></p>	
            								</tr>
										</div>-->
									    <!-- end color -->
									</table>
								</div>
								<!-- size -->
								<!--  -->
								<!-- end size -->
							</div>
						
						    <hr style="background-color:#e6be6e">
							<div class="p-b-5 flex-w">
							    <strong class="m-b-5" style="color: #444444;">Rental period</strong>
							    <div class="p-b-5 flex-w">
    								<form class = "formimages" class="" enctype="multipart/form-data" method="POST" >
    									
    									<div class="flex-w">
    										<div class="fs-15">
    											<label for="days_3" class="days_btn days_3 pointer" value="3" checked >3 days</label>
    											<input class="subject-list  " type="radio" name="radiobtndays" value="3"  id="days_3" checked>
    										</div>
    										<div class="fs-15 m-l-3">
    											<label for="days_4"class="days_btn days_4 pointer " value="4">4 days</label>
    											<input class="subject-list" type="radio" name="radiobtndays" value="4"  id="days_4">
    										</div>
    										<div class="fs-15 m-l-3 ">
    											<label for="days_5" class="days_btn days_5 pointer">5 days</label>
    											<input class="subject-list" type="radio" name="radiobtndays" value="5"  id="days_5">
    										</div>
    										<div class="fs-15 m-l-3">
    											<label for="days_6" id="rbtn" class="days_btn days_6 pointer">6 days</label>
    											<input class="subject-list" type="radio" name="radiobtndays" value="6"  id="days_6">
    										</div>
    										<div class="fs-15 m-l-3">
    											<label for="days_7"  class="days_btn days_7 pointer">7 days</label>
    											<input class="subject-list" type="radio" name="radiobtndays" value="7"  id="days_7">
    										</div> <br>
    									</div>
    								</form>
							    </div>	
						    </div>
						    
						    <hr style="background-color:#e6be6e">
							<div class="p-b-5 flex-w">
							    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxOCIgaGVpZ2h0PSIxOCI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48ZWxsaXBzZSBjeD0iOSIgY3k9IjE0LjQ3OCIgZmlsbD0iI0ZGRTExQiIgcng9IjkiIHJ5PSIzLjUyMiIvPjxwYXRoIGZpbGw9IiMyODc0RjAiIGQ9Ik04LjYwOSA3LjAxYy0xLjA4IDAtMS45NTctLjgyNi0xLjk1Ny0xLjg0NSAwLS40ODkuMjA2LS45NTguNTczLTEuMzA0YTIuMDIgMi4wMiAwIDAgMSAxLjM4NC0uNTRjMS4wOCAwIDEuOTU2LjgyNSAxLjk1NiAxLjg0NCAwIC40OS0uMjA2Ljk1OS0uNTczIDEuMzA1cy0uODY0LjU0LTEuMzgzLjU0ek0zLjEzIDUuMTY1YzAgMy44NzQgNS40NzkgOC45MjIgNS40NzkgOC45MjJzNS40NzgtNS4wNDggNS40NzgtOC45MjJDMTQuMDg3IDIuMzEzIDExLjYzNCAwIDguNjA5IDAgNS41ODMgMCAzLjEzIDIuMzEzIDMuMTMgNS4xNjV6Ii8+PC9nPjwvc3ZnPg==" class="location_icon" style="margin-right: 6px;">
							    <strong class="m-b-5" style="color: #444444;">Deliver to </strong>
							    <div class="p-b-5 flex-w">
    								<form class = "formimages" class="" enctype="multipart/form-data" method="POST" >
    									<div class="flex-w">
    										<input  type='text' data-language='en' placeholder="Enter your pin" style="padding:5px;width:360px;height:45px;border:1px solid #e6be6e !important;" name="delivery_pin" id="delivery_pin" value=""/><br><br><br>
    									    <span>
    									        <input class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 pointer" type="button"  value="check Location"  id = "check_location" name="check_location"  style="background-color: #E6BE6E;color: #444;"/>
    									    </span>
    									</div>
    								</form>
							    </div>	
						    </div>
							<div class="flex-w p-b-5 ">
							    <strong class="m-b-5" style="color: #444444;">Select Date : </strong> <br>
							    <div class="p-b-5 flex-w p-t-10" style="border-color:#E6BE6E;">
    								<div class="bo1 input-container lengthdate" style="border-color:#e6be6e;">
    									<i class="fa fa-calendar icon" style="font-size:25px;color: white;"></i>
								        <input type="text" name="daterange" id="dateRangeP" value=""></p>
    									<!--<input class="dateinput" type='text' data-language='en' placeholder="From Date" style="padding:5px;width:360px;height:45px;" name="from_selected_days" id="from_selected_days" value=""/>-->
    								</div>
							    </div>
						    </div>
							<!--<div class="rating" style="margin-top: 29px;">-->
							<div >
                            	<span class="review-no"><?php echo $total_view;?> people viewed this product.</span>
                            </div>
                            <?php
                            $rating_result = get_rating_review($id,$type); 
                             //var_dump($rating_result);
                             if($rating_result['rating_count'] > 0) {
                                $total_rating = $rating_result['total_rating'] / $rating_result['rating_count'];
                             } else {
                                $total_rating = 0;
                             }
                            
                            ?>
                        <div class="row">
                    		<div >
                    			<div class="rating-block">
                					<!--<h4>Average user rating</h4>-->
                					<strong class="m-b-5" style="color: #444444;">Average user rating: </strong>
                					<button type="button" class="btn btn-link" style="color:#0f6cb2;border:none;" data-toggle="modal" data-target="#myModal">Write a review</button> /
                					<?php echo $rating_result['review_count'];?><a href ="review.php?productid=<?php echo $id;?>&prod_type=<?php echo $type;?>"  class="btn btn-link">Reviews</a>
                					
                					<!------===========================================================================-->
                    				<div class="container">
                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                      <h4 class="modal-title">WRITE A REVIEW</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div id="review-form" class="panel review-form-width">
                                                            <div class="panel-body">
                                                                <form class="form-horizontal" id="form-review">
                                                                    <input type="hidden" name="pro_id" value="<?php echo $id;?>" >
                                                                   <input type="hidden" name="cat_id" value="<?php echo $type;?>">
                                                                    <div class="form-group required">
                                                                        <div class="col-sm-12">
                                                                            <label class="control-label" for="input-review">Your Review</label>
                                                                            <textarea name="text" rows="5" id="input-review" class="form-control"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="rating-wrapper">
                                                                        <div class="col-sm-12">
                                                                            <input type="radio" class="rating-input" id="rating-input-1-5" name="rating"  value="5"/>
                                                                            <label for="rating-input-1-5" class="rating-star" ></label>
                                                                            <input type="radio" class="rating-input" id="rating-input-1-4" name="rating" value="4"/>
                                                                            <label for="rating-input-1-4" class="rating-star"></label>
                                                     
                                                                            <input type="radio" class="rating-input" id="rating-input-1-3" name="rating" value="3"/>
                                                                            <label for="rating-input-1-3" class="rating-star"></label>
                                                                            <input type="radio" class="rating-input" id="rating-input-1-2" name="rating" value="2" />
                                                                            <label for="rating-input-1-2" class="rating-star"></label>
                                                                            <input type="radio" class="rating-input" id="rating-input-1-1" name="rating"  value="1"/>
                                                                            <label for="rating-input-1-1" class="rating-star"></label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="buttons">
                                                                        <div class="pull-right">
                                                                            <button type="button" id="button-review" data-loading-text="Loading..." class="btn btn-primary">Continue</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <!--===================================================================-->
                    					<h2 class="bold padding-bottom-7"><?php echo round($total_rating,1);?> <small>/ 5</small></h2>
                    					<?php for($i=1;$i<=5;$i++) { ?>
                    					    <button type="button" class="btn <?php if($i<=$total_rating){echo 'btn-warning';}else{echo 'btn-grey';}?> btn-sm" aria-label="Left Align">
                    					        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    					    </button>
                    					<?php } ?>
                    				</div>
                    			</div>
		                    </div>

		                    <!-- add to cart code -->
							<div class="flex-c-m bo-rad-23 float-r m-text3 trans-0-4">
								<div class="flex-m flex-w">
									<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10 pointer">
										<input class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 pointer" type="button" value="Add To Cart"  id = "add_to_cart" name="add_to_cart"  style="background-color: #E6BE6E;color: #444;"/>
									</div>
								</div>
							</div>
							<input type="hidden" name="h_days_index" id="id_days_index" value="" />
		                    <!-- end add to cart code -->
		                </div>
				    </div>
			    </div>
			    <?php if($rws['gproduct_desc']) { ?>
    			    <div class="flex-w flex-sb respondesc" >
        				<div class="bo9 p-t-20 p-t-20 p-l-20 p-r-20 p-b-20 m-t-40">
        					<h5 class="fs-16" style="color: #444444;"><strong> Description :</strong> </h5>
        					<hr/>
        					<div class="dropdown-content p-t-15 p-b-23">
        						<p class="s-text8">
        							<p> <?php echo $rws['gproduct_desc'];  ?></p>
        					</div>
        				</div>
        			</div>
    			<?php } ?>
		    </div>
		</div>
	</div>
  </div>
</section>
</form>
<!-- Footer -->

<script>
    /*  Rating  */
    $('#button-review').on('click', function() {
    	$.ajax({
    		url:  'rating_insert.php',
    		type: 'post',
    		data: $("#form-review").serialize(),
    		beforeSend: function() {},
    		complete: function() {},
    		success: function(msg) {
    			//alert(msg);
    			if(msg==1)
    			{
    			  window.location.reload();
    			}
    			else if(msg==3){
    		        alert("please login!!");
    		        window.location="login.php";
    			}
    		}
    	});
    });
 
</script>
<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
	<div class="flex-w p-b-90">
		<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
			<h4 class="s-text12 p-b-30"> GET IN TOUCH </h4>
			<div>
				<!-- <p class="s-text7 w-size27">
					Any questions? Let us know in store at<br>
					Shrawan Shinde,<br>C 10 Goverdhan Bhug,Matunga west,Mumbai,MH,
					<br>Pin Code : 400016<br>
					Mobile No : 9167186662
				</p> -->

				<p class="s-text7 w-size27">
					Any questions? Let us know at<br>
					Sri Shringarr Fashion Studio,<br>Shyamkamal Building B/1, Office No.104,<br>1 st Floor, Agarwal Market, Opposite Railway Station,<br>Vile Parle (East), Mumbai 400 057
					<!-- <br>Pin Code : 400 057 --><br>
					Mobile No : 075066 28663/ 093242 43011
				</p>

				<div class="flex-m p-t-30">
					<a href="https://www.facebook.com/srishringarr/" target="_blank" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
					<a href="https://www.instagram.com/srishringarr/" target="_blank" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
					<!-- <a href="https://plus.google.com/u/1/113103807414319162517" target="_blank" class="fs-18 color1 p-r-20 fa social_googleplus"></a> -->
					<a href="https://twitter.com/SriShringarr" target="_blank" class="fs-18 color1 p-r-20 fa social_twitter"></a>
					<a href="https://in.pinterest.com/srishringarr/?eq=sri&etslf=5839" target="_blank" class="fs-18 color1 p-r-20 fa social_pinterest"></a>
				</div>
			</div>
		</div>
		<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
			<h4 class="s-text12 p-b-30">
				Categories
			</h4>
			<ul>
    			<li class="p-b-9">
    				<a href="/sub-category/2/" class="s-text7">
    					Jewellery
    				</a>
    			</li>
    			<li class="p-b-9">
    				<a href="/sub-category/1/" class="s-text7">
    					Apparel
    				</a>
    			</li>
			</ul>
		</div>
		<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
			<h4 class="s-text12 p-b-30">
				Quick Links
			</h4>
			<ul>
				<!-- <li class="p-b-9">
					<a href="/search/" class="s-text7">
						Search
					</a>
				</li> -->
				<li class="p-b-9">
					<a href="/user-profile/" class="s-text7">
						Profile
					</a>
				</li>
				<li class="p-b-9">
					<a href="/my-orders/" class="s-text7">
						Orders 
					</a>
				</li>
				<li class="p-b-9">
					<a href="/wishlist/" class="s-text7">
						Wishlist 
					</a>
				</li>
			</ul>
		</div>
		<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
			<h4 class="s-text12 p-b-30">
				Help
			</h4>
			<ul>
				<!-- <li class="p-b-9">
					<a href="/track-orders/" class="s-text7">
						Track Order
					</a>
				</li> -->

				<li class="p-b-9">
					<a href="/Shipping,Cancellation&amp;Returns/" class="s-text7">
						Shipping
					</a>
				</li>

				<li class="p-b-9">
					<a href="/Shipping,Cancellation&amp;Returns/" class="s-text7">
						Cancellation
					</a>
				</li>

				<li class="p-b-9">
					<a href="/Shipping,Cancellation&amp;Returns/" class="s-text7">
						Returns
					</a>
				</li>
				<!-- <li class="p-b-9">
					<a href="#" class="s-text7">
						Blog
					</a>
				</li> -->
			</ul>
		</div>

		<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
			<!---------------------------- Rahul 30-07-2019 --------------------------------->
			<iframe width="100%" height="250px" src="https://www.youtube.com/embed/KGZVaCSe_mw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			<h7>Take a virtual tour of Sri Shringarr Fashion Studio</h7>
		</div>

		<!-- <div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
			<h4 class="s-text12 p-b-30">
				Notify Me
			</h4>
			<form>
				<div class="effect1 w-size9">
					<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
					<span class="effect1-line"></span>
				</div>
				<div class="w-size2 p-t-20">
					
					<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4 pointer" style="background-color: #e6be6e;color: #444;">
						Notify
					</button>
				</div>
			</form>
		</div> -->
		</div>
		<div class="t-center p-l-15 p-r-15">
			<div class="t-center s-text8 p-t-20">
        	 <a style="text-decoration: none;" href="terms-of-use/">TERMS OF USE</a> &nbsp;
    	
        	 | &nbsp;<a style="text-decoration: none;" href="/privacy-policy/"> PRIVACY POLICY  </a>&nbsp; 
    	
        	 | &nbsp;<a style="text-decoration: none;" href="/about-us/">ABOUT US </a>&nbsp; 
    	
        	 | <a style="text-decoration: none;" href="/enquiry/">&nbsp;ENQUIRY</a>&nbsp; 
	        
        	 | <a style="text-decoration: none;" href="/faqs/">&nbsp;FAQs</a>&nbsp;
    	
				<div style="text-align: center;font-size:15px;margin:10px 0px;">
		         	<a style="text-decoration: none;">
					Copyright © 2018 Sri Shringarr All Rights Reserved  </a><br/><br/>
		        </div>
			</div>
		</div>
	</footer>
	
<script>
$(function() {
    $('input[name="daterange"]').daterangepicker({
        dateLimit: { days: 7 },
         "dateFormat": "dd-mm-yy",
        "minDate": -7,
        "maxDate": 14,
        locale: {
            format: 'MM/DD/YYYY '
        },
    });
});
</script>

<script>
    // tell the embed parent frame the height of the content
    if (window.parent && window.parent.parent){
      window.parent.parent.postMessage(["resultsFrame", {
        height: document.body.getBoundingClientRect().height,
        slug: "rLnycn80"
      }], "*")
    }
    
    // always overwrite window.name, in case users try to set it manually
    window.name = "result"
</script>

<script>
    let allLines = []

    window.addEventListener("message", (message) => {
        if (message.data.console){
          let insert = document.querySelector("#insert")
          allLines.push(message.data.console.payload)
          insert.innerHTML = allLines.join(";\r")
    
          let result = eval.call(null, message.data.console.payload)
          if (result !== undefined){
            console.log(result)
          }
        }
    })
</script>
	
<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
	<span class="symbol-btn-back-to-top">
		<i class="fa fa-angle-double-up" aria-hidden="true"></i>
	</span>
</div> 

<!-- Container Selection1 -->
<div id="dropDownSelect1"></div>

	<!--<script type="text/javascript" src="http://sarmicrosystems.in/srishringarr/web/static/css/vendor/jquery/jquery-3.2.1.min.js"></script>-->

	<script type="text/javascript" src="http://sarmicrosystems.in/srishringarr/web/static/css/vendor/animsition/js/animsition.min.js"></script>

	<script type="text/javascript" src="http://sarmicrosystems.in/srishringarr/web/static/css/vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="http://sarmicrosystems.in/srishringarr/web/static/css/vendor/bootstrap/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="http://sarmicrosystems.in/srishringarr/web/static/css/vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>

	<script type="text/javascript" src="http://sarmicrosystems.in/srishringarr/web/static/css/vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="http://sarmicrosystems.in/srishringarr/web/static/js/slick-custom.js"></script>

	<script type="text/javascript" src="http://sarmicrosystems.in/srishringarr/web/static/css/vendor/countdowntime/countdowntime.js"></script>

	<script type="text/javascript" src="http://sarmicrosystems.in/srishringarr/web/static/css/vendor/lightbox2/js/lightbox.min.js"></script>

	<script type="text/javascript" src="http://sarmicrosystems.in/srishringarr/web/static/css/vendor/sweetalert/sweetalert.min.js"></script>

	<script src="static/js/main.js"></script>
	
	<!-- <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment-with-locales.min.js"></script> -->

	<script type="text/javascript" src="http://sarmicrosystems.in/srishringarr/web/static/js/site.js"></script>
	<!-- <script src='/static/js/datepicker.js'></script> -->
	<script src='http://sarmicrosystems.in/srishringarr/web/static/js/Drift.js'></script>
	<script type='text/javascript' src="http://sarmicrosystems.in/srishringarr/web/static/js/main.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	
    <script type="text/javascript">


// var selectobject = document.getElementById("mySelect");
// for (var i=0; i<selectobject.length; i++) {
//     if (selectobject.options[i].value == '47')
//         selectobject.remove(i);
// }



   $(document).ready(function() {
// var days = $(".subject-list").val();
// alert('ssssssssssssss')
// alert(days)

   		var $radios = $("#three_days_id");

	    if($radios.is(':checked') == false) {
	        $radios.filter('[value=3]').prop('checked', true);

	        var first_base_percent = 22;
			var second_base_percent = 17;
			var third_base_percent = 12; 

			var mrp = document.getElementById('price').value;
			console.log('mrp1 : ',mrp);

			if (mrp <= 40000)
			{
				amount = (mrp*(first_base_percent))/100;
				//rent_amt = 1;
				rent_amt = Math.ceil(amount/100)*100
				var finalData = "Rs. " + Number(rent_amt) + " For " + 3 + " days";
				rental_amt = $("#rentalValue").html(finalData);	

				deposite_amt = (mrp*35)/100;
				deposite = Math.ceil(deposite_amt/100)*100
				var finalDeposie = "Rs. " + Number(deposite);
				deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
				$("#final_amt_id").val(rent_amt);
				$("#deposite_amount_id").val(deposite);
			}
			if (mrp > 40000 & mrp <= 60000)
			{
				amount = (mrp*(second_base_percent))/100;
				rent_amt = Math.ceil(amount/100)*100
				var finalData = "Rs. " + Number(rent_amt) + " For " + 3 + " days";
				rental_amt = $("#rentalValue").html(finalData);

				deposite_amt = (mrp*35)/100;
				deposite = Math.ceil(deposite_amt/100)*100
				var finalDeposie = "Rs. " + Number(deposite);
				deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
				$("#final_amt_id").val(rent_amt);
				$("#deposite_amount_id").val(deposite);
			}
			if (mrp >= 60001)
			{
				amount = (mrp*(third_base_percent))/100;
				rent_amt = Math.ceil(amount/100)*100
				var finalData = "Rs. " + Number(rent_amt) + " For " + 3 + " days";
				rental_amt = $("#rentalValue").html(finalData);

				deposite_amt = (mrp*35)/100;
				deposite = Math.ceil(deposite_amt/100)*100
				var finalDeposie = "Rs. " + Number(deposite);
				deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
				$("#final_amt_id").val(rent_amt);
				$("#deposite_amount_id").val(deposite);
			}	

	    }
	
    });

	// $('#add_to_cart').on('click',function(){
	// 	swal('Added To Cart')
	// });
	
	$('#add_to_cart').on('click',function() {
	    
    console.log('add')
    var pid = <?php echo $id; ?>;
    var type = <?php echo $type?>;
    var qty = 1;
    var sku = document.getElementById('sku').value;
    var price = document.getElementById('price').value;
    
    var dateRangeP = $('#dateRangeP').val();
    var dateRangeP_arr = dateRangeP.split('-');
    
    $('#from_date').val(dateRangeP_arr[0]);
    $('#till_date').val(dateRangeP_arr[1]);
    //alert($('#from_date').val());
    var rent_date = document.getElementById('from_date').value;
    var return_date = document.getElementById('till_date').value;
    
    /*var dateRangeP = $('#dateRangeP').val();
    var dateRangeP_arr = dateRangeP.split('-');*/
    
    var days = document.getElementsByName('radiobtndays').value;
    var day = $('input[name="radiobtndays"]:checked').val();
    var d = $('input:radio[name=radiobtndays]:checked').val();
    
    var deposit = $('#deposite_amount').val();
    // alert(days+' day : '+day+' d : '+d);
    //alert($('#dateRangeP').val()); rent_amt
    
    var rent_amt = $('#rent_amt').val();
    alert(deposit+rent_amt);
    
	if($('#dateRangeP').val()==''){
		swal('Please select Date or Days');
	}
	else {
	    $.ajax({
           type: 'POST',    
            url:'addcart_process.php',
            data:'pid='+pid+'&type='+type+'&qty='+qty+'&rent_date='+rent_date+'&return_date='+return_date+'&price='+rent_amt+'&deposit='+deposit,
            
            success: function(msg){
                // alert(msg);
              
                if(msg==1)
                {
                   swal('Added To Cart');
        			//Scroll to top if cart icon is hidden on top
        			 $('html, body').animate({
        			 	'scrollTop' : $(".cart_anchor").position().top
        		    });
        		    window.location.reload();
                
                }else
                {
                    swal("No Quantity available");
                }
            }
        });
		
	  //  $(".cart_anchor").effect( "shake", { direction: "left", times: 4, distance: 101}, 2000 );
	 }
});
	       
function zoom(e){
  	var zoomer = e.currentTarget;
  	e.offsetX ? offsetX = e.offsetX : offsetX = e.touches[0].pageX
  	e.offsetY ? offsetY = e.offsetY : offsetX = e.touches[0].pageX
  	x = offsetX/zoomer.offsetWidth*100
  	y = offsetY/zoomer.offsetHeight*100
  	zoomer.style.backgroundPosition = x + '% ' + y + '%';
}

    
$('.subject-list').on('change', function() {
    $('.subject-list').not(this).prop('checked', false);
    var selected_days = $(this).val();
    $("#selected_days_id").val(selected_days);

    var first_base_percent = 22;
	var second_base_percent = 17;
	var third_base_percent = 12; 
	var mrp = "11000.00";
	console.log(mrp);

	if (selected_days == 3)
	{
		if (mrp <= 40000)
		{
			amount = (mrp*(first_base_percent))/100;
			//rent_amt = 1;
			rent_amt = Math.ceil(amount/100)*100
			var finalData = "Rs. " + Number(rent_amt) + " For " + selected_days + " days";
			rental_amt = $("#rentalValue").html(finalData);

			deposite_amt = (mrp*35)/100;
			deposite = Math.ceil(deposite_amt/100)*100
			var finalDeposie = "Rs. " + Number(deposite);
			deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
			$("#final_amt_id").val(rent_amt);
			$("#deposite_amount_id").val(deposite);
		}
		if (mrp > 40000 & mrp <= 60000)
		{
			amount = (mrp*(second_base_percent))/100;
			rent_amt = Math.ceil(amount/100)*100
			var finalData = "Rs. " + Number(rent_amt) + " For " + selected_days + " days";
			rental_amt = $("#rentalValue").html(finalData);

			deposite_amt = (mrp*35)/100;
			deposite = Math.ceil(deposite_amt/100)*100
			var finalDeposie = "Rs. " + Number(deposite);
			deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
			$("#final_amt_id").val(rent_amt);
			$("#deposite_amount_id").val(deposite);
		}
		if (mrp >= 60001)
		{
			amount = (mrp*(third_base_percent))/100;
			rent_amt = Math.ceil(amount/100)*100
			var finalData = "Rs. " + Number(rent_amt) + " For " + selected_days + " days";
			rental_amt = $("#rentalValue").html(finalData);

			deposite_amt = (mrp*35)/100;
			deposite = Math.ceil(deposite_amt/100)*100
			var finalDeposie = "Rs. " + Number(deposite);
			deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
			$("#final_amt_id").val(rent_amt);
			$("#deposite_amount_id").val(deposite);
		}	
	}
	else if (selected_days == 4)
	{
		if (mrp <= 40000)
		{
			amount = (mrp*(first_base_percent+5))/100;
			rent_amt = Math.ceil(amount/100)*100
			var finalData = "Rs. " + Number(rent_amt) + " For " + selected_days + " days";
			rental_amt = $("#rentalValue").html(finalData);

			deposite_amt = (mrp*35)/100;
			deposite = Math.ceil(deposite_amt/100)*100
			var finalDeposie = "Rs. " + Number(deposite);
			deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
			$("#final_amt_id").val(rent_amt);
			$("#deposite_amount_id").val(deposite);
		}
		if (mrp > 40000 & mrp <= 60000)
		{
			amount = (mrp*(second_base_percent+5))/100;
			rent_amt = Math.ceil(amount/100)*100
			var finalData = "Rs. " + Number(rent_amt) + " For " + selected_days + " days";
			rental_amt = $("#rentalValue").html(finalData);

			deposite_amt = (mrp*35)/100;
			deposite = Math.ceil(deposite_amt/100)*100
			var finalDeposie = "Rs. " + Number(deposite);
			deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
			$("#final_amt_id").val(rent_amt);
			$("#deposite_amount_id").val(deposite);
		}
		if (mrp >= 60001)
		{
			amount = (mrp*(third_base_percent+5))/100;
			rent_amt = Math.ceil(amount/100)*100
			var finalData = "Rs. " + Number(rent_amt) + " For " + selected_days + " days";
			rental_amt = $("#rentalValue").html(finalData);

			deposite_amt = (mrp*35)/100;
			deposite = Math.ceil(deposite_amt/100)*100
			var finalDeposie = "Rs. " + Number(deposite);
			deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
			$("#final_amt_id").val(rent_amt);
			$("#deposite_amount_id").val(deposite);
		}	
	}
	else if (selected_days == 5)
	{
		if (mrp <= 40000)
		{
			amount = (mrp*(first_base_percent+10))/100;
			rent_amt = Math.ceil(amount/100)*100
			var finalData = "Rs. " + Number(rent_amt) + " For " + selected_days + " days";
			rental_amt = $("#rentalValue").html(finalData);

			deposite_amt = (mrp*35)/100;
			deposite = Math.ceil(deposite_amt/100)*100
			var finalDeposie = "Rs. " + Number(deposite);
			deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
			$("#final_amt_id").val(rent_amt);
			$("#deposite_amount_id").val(deposite);
		}
		if (mrp > 40000 & mrp <= 60000)
		{
			amount = (mrp*(second_base_percent+10))/100;
			rent_amt = Math.ceil(amount/100)*100
			var finalData = "Rs. " + Number(rent_amt) + " For " + selected_days + " days";
			rental_amt = $("#rentalValue").html(finalData);

			deposite_amt = (mrp*35)/100;
			deposite = Math.ceil(deposite_amt/100)*100
			var finalDeposie = "Rs. " + Number(deposite);
			deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
			$("#final_amt_id").val(rent_amt);
			$("#deposite_amount_id").val(deposite);
		}
		if (mrp >= 60001)
		{
			amount = (mrp*(third_base_percent+10))/100;
			rent_amt = Math.ceil(amount/100)*100
			var finalData = "Rs. " + Number(rent_amt) + " For " + selected_days + " days";
			rental_amt = $("#rentalValue").html(finalData);

			deposite_amt = (mrp*35)/100;
			deposite = Math.ceil(deposite_amt/100)*100
			var finalDeposie = "Rs. " + Number(deposite);
			deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
			$("#final_amt_id").val(rent_amt);
			$("#deposite_amount_id").val(deposite);
		}	
	}
	else if (selected_days == 6)
	{
		if (mrp <= 40000)
		{
			amount = (mrp*(first_base_percent+15))/100;
			rent_amt = Math.ceil(amount/100)*100
			var finalData = "Rs. " + Number(rent_amt) + " For " + selected_days + " days";
			rental_amt = $("#rentalValue").html(finalData);

			deposite_amt = (mrp*35)/100;
			deposite = Math.ceil(deposite_amt/100)*100
			var finalDeposie = "Rs. " + Number(deposite);
			deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
			$("#final_amt_id").val(rent_amt);
			$("#deposite_amount_id").val(deposite);
		}
		if (mrp > 40000 & mrp <= 60000)
		{
			amount = (mrp*(second_base_percent+15))/100;
			rent_amt = Math.ceil(amount/100)*100
			var finalData = "Rs. " + Number(rent_amt) + " For " + selected_days + " days";
			rental_amt = $("#rentalValue").html(finalData);

			deposite_amt = (mrp*35)/100;
			deposite = Math.ceil(deposite_amt/100)*100
			var finalDeposie = "Rs. " + Number(deposite);
			deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
			$("#final_amt_id").val(rent_amt);
			$("#deposite_amount_id").val(deposite);
		}
		if (mrp >= 60001)
		{
			amount = (mrp*(third_base_percent+15))/100;
			rent_amt = Math.ceil(amount/100)*100
			var finalData = "Rs. " + Number(rent_amt) + " For " + selected_days + " days";
			rental_amt = $("#rentalValue").html(finalData);

			deposite_amt = (mrp*35)/100;
			deposite = Math.ceil(deposite_amt/100)*100
			var finalDeposie = "Rs. " + Number(deposite);
			deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
			$("#final_amt_id").val(rent_amt);
			$("#deposite_amount_id").val(deposite);
		}	
	}
	else if (selected_days == 7)
	{
		if (mrp <= 40000)
		{
			amount = (mrp*(first_base_percent+20))/100;
			rent_amt = Math.ceil(amount/100)*100
			var finalData = "Rs. " + Number(rent_amt) + " For " + selected_days + " days";
			rental_amt = $("#rentalValue").html(finalData);

			deposite_amt = (mrp*35)/100;
			deposite = Math.ceil(deposite_amt/100)*100
			var finalDeposie = "Rs. " + Number(deposite);
			deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
			$("#final_amt_id").val(rent_amt);
			$("#deposite_amount_id").val(deposite);
		}
		if (mrp > 40000 & mrp <= 60000)
		{
			amount = (mrp*(second_base_percent+20))/100;
			rent_amt = Math.ceil(amount/100)*100
			var finalData = "Rs. " + Number(rent_amt) + " For " + selected_days + " days";
			rental_amt = $("#rentalValue").html(finalData);

			deposite_amt = (mrp*35)/100;
			deposite = Math.ceil(deposite_amt/100)*100
			var finalDeposie = "Rs. " + Number(deposite);
			deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
			$("#final_amt_id").val(rent_amt);
			$("#deposite_amount_id").val(deposite);
		}
		if (mrp >= 60001)
		{
			amount = (mrp*(third_base_percent+20))/100;
			rent_amt = Math.ceil(amount/100)*100
			var finalData = "Rs. " + Number(rent_amt) + " For " + selected_days + " days";
			rental_amt = $("#rentalValue").html(finalData);

			deposite_amt = (mrp*35)/100;
			deposite = Math.ceil(deposite_amt/100)*100
			var finalDeposie = "Rs. " + Number(deposite);
			deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
			$("#final_amt_id").val(rent_amt);
			$("#deposite_amount_id").val(deposite);
		}	
	}
});



</script>

</body>
</html>
