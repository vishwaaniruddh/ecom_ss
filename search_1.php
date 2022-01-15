<?php 
session_start();
include('config.php');

if(isset($_GET['search'])){
    $searchText = $_GET['search'];
} else {
    $searchText = $_POST['srchtxt'];
}


$typ=$_POST['typ'];
$subcattyp=$_POST['subcattyp'];
$transtyp=1;
$maincatid=$_POST['maincatid'];
$subcatid=$_POST['subcatid'];
//var_dump($_POST);
//echo $searchText;
?>
<!DOCTYPE html>
<html>
<head>
<title>YN</title>
<link rel="" href="logo/Untitled-2 copy.jpg"/><link rel="icon" href="logo/Untitled-2 copy.jpg" type="image/x-icon" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap s JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Wedding Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- start menu -->
<script src="js/simpleCart.min.js"> </script>
<!-- start menu -->
<link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/memenu.js"></script>
<script>
    
    $(document).ready(function(){
        if($.fn.memenu){
            $(".memenu").memenu();
        }
    });
    </script>	
<!-- /start menu -->
</head>
<body onload="funcs('','');">
    <input type="hidden" id="pgnm" name="pgnm" value="1" readonly>
 <div id="snackbar">Product added to cart successfuly..</div>
<?php include("addtocartpopup.php");?>

<form id="formf" method="post">
    <input type="hidden" id="calc" name="calc" value="0">
    <input type="hidden" id="StockOut" name="StockOut" value="0">
    <?php include("requiredfields.php");?>
    <div class="top_bg">
	    <div class="container">
		    <div class="header_top-sec" >
			    <?php include('topbar.php')?>
	        </div>
        </div>
        <div class="header-top">
	        <div class="header-bottom">
		        <div class="container" style="margin-top:-20px;">
			        <?php include('menu.php')?>
			        <div class="clearfix"> </div>
			    </div>
			    <div class="clearfix"> </div>
	        </div>
        </div>
<!---->
<div >
<!---->
</div>
<!---
<div class="banner">
</div>
<!---->
<!--header//-->
<div class="product-model">	 
	<div class="container">
		<br>
		    <center><h2 style="color:#800000;font-size:40px;"><b>Your Search</b></h2></center>
		</br>
		</br>
		<div class="row ">
		    <div class="col-md-12 ">
		        <?php
		        $jewellery = 'jewellery';
                $apparels = 'Apparels';
                $path = '../Admin/';
                $qty = 1;
                
                $Apparel=mysqli_query($conn,"SELECT g.*,gp.* FROM `garments` g left join  garment_product gp on g.garment_id = gp.product_for WHERE g.name like '%".$searchText."%' or gp.gproduct_code like '%".$searchText."%'");
                
                $garment_row_count = mysqli_num_rows($Apparel);
                
                $Jewellery=mysqli_query($conn,"SELECT j.categories_name,j.subcat_id as m_category,js.name,js.subcat_id as sub_cat,p.* from jewel_subcat j join subcat1 js on j.subcat_id=js.maincat_id join product p on js.subcat_id = p.subcat_id where j.categories_name like '%".$searchText."%' or js.name like '%".$searchText."%' or p.product_code like '%".$searchText."%' or p.product_name like '%".$searchText."%' ");
                
                $jewel_row_count = mysqli_num_rows($Jewellery);
                
                if($garment_row_count > 0){
                    
                    $result = $Apparel;
                    $category = 2;
                } else if($jewel_row_count > 0){
                    
                    $result = $Jewellery;
                    $category = 1;
                } else {
                    $result = 0;
                    echo 'No result found!';
                }
                $num = 0;
                 
                while($row = mysqli_fetch_assoc($result))
                {
                    if($category==2){
                        $prcode=$row['gproduct_code'];
                        $pid = $row['gproduct_id'];
                        $image_qry ="SELECT prod_image from product_images_new where gproduct_id = '".$pid."' or pro_code='".$prcode."' ";
                        
                    } else if($category==1){
                        $prcode=$row['product_code'];
                        $pid = $row['product_id'];
                        $image_qry ="SELECT prod_image from product_images_new where product_id = '".$pid."' or pro_code='".$prcode."' ";
                    }
                    //echo $image_qry;
                    $image=mysqli_query($conn,$image_qry);
                    
                    $img = mysqli_fetch_assoc($image);
                    $path=trim($pathmain."uploads".$img['prod_image']);
                  
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
                        $qty=round($rero[2]);
                        
                        if($img['prod_image']!=''){
                
                ?>
                
                    <a href="javascript:void(0)" onclick="subf('<?php echo $pid;?>','2','2');">
                    <div class="product-grid love-grid col-md-3 col-sm-6 col-xs-12">
            		   <div class="more-product"><span> </span></div>						
            			<div class="product-img b-link-stripe b-animate-go  thickbox">
            				<img style="height:220px;" src="<?php echo $path;?>" class="img-responsive" alt=""/>
            				<div class="b-wrapper">
            				    <h4 class="b-animate b-from-left  b-delay03">							
            					    <button type="button" class="btns"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>Quick View</button>
            					</h4>
            				</div>
            			</div>
            		</a>						
            		<div class="product-info simpleCart_shelfItem" style="height:150px;">
            			<div class="product-info-cust prt_name" >
                            <?php if($qty<=0){ ?>
                              <font color="#ff0000"><b>OUT OF STOCK</b></font><br /><br/>
                              <font color="#000000"><b>Product Code:</b></font> <?php echo $pid; ?> <br />
                            <?php } else { ?>
                                <h4><font color="#000000"><b>Product Code:</b></font> <?php echo $prcode; ?></h4>
                                <h4 style="margin-top:-10px; margin-bottom:-2px;"><font color="#000000" ><b>Quantity:</b></font> <?php echo $qty; ?></h4> 
                                <?php
                                if($row['discount']>0){
                                    $ab=($row['discount']/100)*$rero[0];
                                    $newsp=$rero[0]-$ab;
                                }
                                if($rero[0]==$newsp) { ?>
                                    <font color="#000000" ><b style="margin-top:-10px;">Sales Price:</b></font><?php echo $newsp;  ?> </br>
                                <?php }else{ ?> 
                                    <font color="#000000"><b>Sales Price:</b></font><strike><?php echo $rero[0]; ?></strike>&nbsp;<font color="#00ff99"><b>Now </b></font> <?php echo $newsp; ?>  <br />
                                    <?php if($row['discount']>0 ){ ?>
                                        <font color="#00ff99"><b>Flat</b></font> &nbsp;<?php echo $row['discount']; ?>%  off<br />
                                    <?php } 
                                }  ?>
                                <a href="javascript:void(0);" class="btn btn-default btn-cart col-xs-6 col-sm-6" onclick="final_addtocart('<? echo $prcode;?>','<?php echo $qty;?>','<?php echo $newsp;?>','<?php echo  $pid;?>','<?php echo $category;?>',this.id);">Add to Cart</a>
                                
                                <a href="javascript:void(0);" class="btn btn-default btn-cart col-xs-6 col-sm-6" onclick="buy('<? echo $prcode;?>','<?php echo $qty;?>','<?php echo $newsp;?>','<?php echo  $pid;?>','<?php echo $category;?>',this.id);">Buy Now</a>
                                
                                <?php } ?>
                                
            			    </div>													
            				<div class="clearfix"> </div>
            			</div>
            		</div>	
            		
                <?php }
                $num++;
                }
		        ?>
			<div >
		</div>				 
	</div>
</div>
</div>

<?php include('footer.php')?>
</div>

<script>
    function funcs(strPage,perpg)
{
    //alert('funcs')
    try
    {
        var prcfilter=document.getElementById("pricefilter").value;
        var disc=document.getElementById("discountfilter").value;
        var size=document.getElementById("size").value;
         //alert(prcfilter);   
            
        var typ=document.getElementById('typ').value;
        var subcattyp=document.getElementById('subcattyp').value;
        var transtyp=document.getElementById('transtyp').value;
        var maincatid=document.getElementById('maincatid').value;
        var subcatid=document.getElementById('subcatid').value;
        
        var offst=document.getElementById('calc').value;
        var divLen= document.getElementById('StockOut').value;
        var stockIn = 1;
        var stockOut = 2;
        var sh=1;
        perp='30';
        
        var Page="";
        if(strPage!="")
        {
        Page=strPage;
        }
        if(document.getElementById('numrows'))
        {
        var numrws=document.getElementById('numrows').value;
        if((divLen==0 && Number(offst)>Number(numrws)))
            {
                document.getElementById('calc').value=parseInt(offst)*0;
                stockIn =2;
                stockOut =1;
                sh=1;
                offst = 0;
                
            } else if(stockOut =1 && stockIn==2 && divLen==0  && Number(offst)>Number(numrws)){
                console.log('end :',offst);
                stockOut = 2;
                sh=0;
            }
        }
        document.getElementById('calc').value=parseInt(offst)+30;
        if(stockIn ==2){
            perp =numrws;
        }
        
        if(sh==1)
        {
        $.ajax({
            type: 'POST',    
            url:'viewdts.php',
            data:'Page='+Page+'&perpg='+perp+'&maincatid='+maincatid+'&subcatid='+subcatid+'&typ='+typ+'&subcattyp='+subcattyp+'&transtyp='+transtyp+'&offst='+offst+"&prcfilter="+prcfilter+"&discountfilter="+disc+"&stockOut="+stockOut+"&stockIn="+stockIn+"&size="+size,
            beforeSend: function() {
            // setting a timeout
                
            //  $("#loadingdiv")
                document.getElementById('loadingdiv').style.display="block";
        },
        success: function(msg){
            var divLength = $(msg).filter('.product-grid').length;
            document.getElementById('StockOut').value=divLength;
            document.getElementById('loadingdiv').style.display="none";
            //alert(msg);
            // document.getElementById('show').innerHTML=msg;
            $("#show").append(msg);
            },
                //error: function(){console.log('error:',error);}
             });
        }
        
    }catch(ex) {
        alert(ex);
    }
}

function subf(sid)
{
    //alert('sub')
    try
    {
        document.getElementById('selectedproduct').value=sid;
        var typ = document.getElementById('typ').value;
        var subcattyp = document.getElementById('subcattyp').value;
        var transtyp = document.getElementById('transtyp').value;
        var maincatid = document.getElementById('maincatid').value;
        var subcatid = document.getElementById('subcatid').value;
        
        //$('#formf').attr('action','sdets1.php');
        //$('#formf').submit();
        
        window.open('sdets1.php?slkd='+sid+'&slpyt='+typ+'&psbctp='+subcattyp+'&ptrp='+transtyp+'&dmctd='+maincatid+'&dsd='+subcatid,'_self');
    } catch(ex) {
        //alert(ex);
    }
}

$("#srchtxt").keypress(function(e)
        {
            if(e.which==13)
            {
                var search= $("#srchtxt").val();
                if($("#srchtxt").val()!="") {
                    //searchfunc();
                    window.location="search.php?search="+search;
                }
            }
        });
</script>
</body>
</html>