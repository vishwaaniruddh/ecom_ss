<?php session_start();
include('header.php');
include('functions.php');
?>

<?php

$total_amount = $_SESSION['total_amount'];
$total_gst = $_SESSION['total_gst'];
$is_same_state = $_SESSION['same_state'];

$shipping_charges = get_shipping_charges($total_amount);

if($is_same_state==1) {
    $cgst=$total_gst/2;
    $sgst=$total_gst/2;
    $igst=0;
    
} else {
    $cgst=0;
    $sgst=0;
    $igst=$total_gst;  
}

$userid = $_SESSION['gid'];

/*Ruchi : insert customised order */

$custom_details ='';

if(isset($_SESSION['piece'])) { 
    
    $custom_details.= 'Same piece \n';
}
if(isset($_SESSION['color'])) {
    
    $custom_details.= 'Same color \n';
}
if(isset($_SESSION['pattern'])) { 
    
    $custom_details.= 'Same pattern \n';
}

if(isset($_SESSION['customize'])){
    $custom_details = $_SESSION['custom_data'];
    $is_customisable = 1;
    
    $custom_data = $_SESSION['custom_data'];
} else {
    $is_customisable = 0;
    $custom_data = '';
}

//$is_customisable= 1;
// return; 
// var_dump($_POST);   

   /* $key              =   $postdata['key'];
    $salt               =   $postdata['salt'];
    $txnid              =   $postdata['txnid'];
    $amount             =   $postdata['amount'];
    $productInfo        =   $postdata['productinfo'];
    $firstname          =   $postdata['firstname'];
    $email              =   $postdata['email'];
    $udf5               =   $postdata['udf5'];
    $mihpayid           =   $postdata['mihpayid'];
    $status             =   $postdata['status'];
    $resphash           =   $postdata['hash'];
    //Calculate response hash to verify

    $keyString          =   $key.'|'.$txnid.'|'.$amount.'|'.$productInfo.'|'.$firstname.'|'.$email.'|||||'.$udf5.'|||||';
    $keyArray           =   explode("|",$keyString); 
    $reverseKeyArray    =   array_reverse($keyArray);
    $reverseKeyString   =   implode("|",$reverseKeyArray);
    $CalcHashString     =   strtolower(hash('sha512', $salt.'|'.$status.'|'.$reverseKeyString));*/
    
    //echo 'hash : '.$resphash.' response : '.$CalcHashString;
    
$errs++;
$email=$_SESSION['email'];
$email="developer.ruchi@gmail.com";

$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];

$salt="ecH0HEsO";

$shipping_charges = get_shipping_charges($amount);

$user_id=$_SESSION['gid'];

$qryqty=mysql_query("select * from Order_ent where transaction_id='".$txnid."' and transaction_stats=1");
$frw=mysql_fetch_array($qryqty);

$nrws=mysql_num_rows($qryqty);

if($nrws>0)
{
    $orderid=$frw[0];
}
if(isset($_POST["additionalCharges"])) {
    $additionalCharges=$_POST["additionalCharges"];
    $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
} else {
    $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
}
$hash = hash("sha512", $retHashSeq);

if($status=='success'){
    
    $select_sql=mysqli_query($conn,"select * from Order_ent where transaction_id='".$txnid."'");
    $select_sql_result=mysqli_fetch_assoc($select_sql);
    
    if(!$select_sql_result && $userid>0) { //to prevent duplicate entries
        $insert="insert into Order_ent(user_id,amount,status,pmode,cmplt_status,transaction_stats,transaction_id,shipping_charges,total_amount,sgst,cgst,igst,is_customized) VALUES ('".$user_id."','".$amount."','".$status."','online','1','1','".$txnid."','".$shipping_charges."','".$total_amount."','".$sgst."','".$cgst."','".$igst."',$is_customisable)";
        mysqli_query($conn,$insert);
        
        $order= mysqli_insert_id($conn);
      
        $crtids=get_cart_ids($userid);
        
        foreach($crtids as $key => $val) {
            
            $qty=get_cart_quantity($val);
            $product_amt=get_product_amt_by_cart_id($val);
            
            $insert_order_details = "insert into order_details(order_id,cart_id,user_id,product_type,product_id,qty,product_amt,total_amt,date,status,ac_typ,custom_data) VALUES ('".$order."','".$val."','".$userid."','".get_product_type_from_cart($val,$userid)."','".get_product_from_cart_by_cartid($val)."','".$qty."','".$product_amt."','".$product_amt*$qty."','".date('Y/m/d h:i:s')."','".'1'."','2','".$custom_data."')";

            mysqli_query($conn,$insert_order_details);
            
            $update_track_order = mysqli_query($conn,"update order_track set transaction_id='".$txnid."' ");
        }
    }
    
    $select_sql=mysqli_query($con3,"select * from approval where transaction_id='".$txnid."'");
    $select_sql_result=mysqli_fetch_assoc($select_sql);
    
    if(!$select_sql_result && $userid>0 & $is_customisable!=1) { //to prevent duplicate entries
        $insert_approval="insert into approval(cust_id,status,paid_amount,typ,transaction_id,bill_date,bill_by,pay_by) VALUES ('".$user_id."','S','".$total_amount."','1','".$txnid."','".date("Y-m-d")."','QUOTATION','online')";
        mysqli_query($con3,$insert_approval);
        
        $last_approval_id= mysqli_insert_id($con3);
        
        //end Approval table
    
        //insert  paid_amount table 
       
        $insert_paid_amount = "insert into paid_amount(bill_id,amount,payment_by,bid) values('".$userid."','".$total_amount."','ONLINE','".$last_approval_id."')";
       
        mysqli_query($con3,$insert_paid_amount);
        
        // end paid_amount table

        // insert  approval_detail table
        
        $crtids=get_cart_ids($userid);
        
        $state_id = state_id_userid($userid);
        
         foreach($crtids as $key => $val){
            
            $qty=get_cart_quantity($val);
            $product_amt=get_product_amt_by_cart_id($val);
            $pro_type=get_product_type_from_cart($val,$userid);
            $product_id = get_product_from_cart_by_cartid($val);
            $sku=get_sku($product_id,$pro_type);
            
            $discount = get_discount($product_id,$pro_type);
            
            if($discount>0){

                $discounted_amount= ($product_amt*$discount)/100;
                $final_product_amount =  $product_amt - $discounted_amount; 
            }
            else{
                $discounted_amount=0.00;
            }
            
            if($state_id!=3){
            
                   if($pro_type == 2){
                       
                       if($product_amt>1060) {
                           
                           $igstperc = '12';
                           $igstamt=($product_amt*100)/112;
                           $igstamt =   sprintf("%.2f", $igstamt); 
                           
                       }
                       else{
                        
                           $igstperc = '6';
                           $igstamt=($product_amt*100)/106;
                           $igstamt =   sprintf("%.2f", $igstamt); 
                       }
                   }
                    else{
                       $igstperc = '3';
                       $igstamt=($product_amt*100)/103;
                       $igstamt =   sprintf("%.2f", $igstamt);  
                    }
            
            $insert_approval_detail="insert into approval_detail(bill_id, item_id, qty, return_qty, discount, dis_amount, amount, typ,	final_amount,igstperc,igstamt) VALUES ('".$last_approval_id."',
            '".$sku."',
            '".$qty."',
            '0','
            ".$discount."',
            '".$discounted_amount."',
            '".$product_amt."',
            '".$pro_type."','".$product_amt."',
            '".$igstperc."','".$igstamt."'
            
            
            )";

            echo $insert_approval_detail;
             
            mysqli_query($con3,$insert_approval_detail);
        }
        
        else{
            if($pro_type == 2){
                if($product_amt>1060){
                   $gstperc = '12';
                   $cgst='6';
                   $sgst='6';
                   $sgstamt=($product_amt*100)/112;
                   $sgstamt =   sprintf("%.2f", $sgstamt);  
                } else{
                   $sgstperc = '6';
                   $cgst='3';
                   $sgst='3';
                   $sgstamt=($product_amt*100)/106;
                   $sgstamt =   sprintf("%.2f", $sgstamt);       
                   $sgstamt = $sgstamt/2;
               }
                       
            } else{
               $sgstperc = '3';
               $cgst='1.5';
               $sgst='1.5';
               $sgstamt=($product_amt*100)/103;
               $sgstamt =   sprintf("%.2f", $sgstamt);        
               $sgstamt = $sgstamt/2;
            }
            
            $insert_approval_detail="insert into approval_detail(bill_id, item_id, qty, return_qty, discount, dis_amount, amount, typ,	final_amount,sgstperc,sgstamt,cgstperc,cgstamt) VALUES ('".$last_approval_id."',
            '".$sku."',
            '".$qty."',
            '0','
            ".$discount."',
            '".$discounted_amount."',
            '".$product_amt."',
            '".$pro_type."','".$product_amt."',
            '".$sgst."','".$sgstamt."', '".$cgst."','".$sgstamt."'
            
            )";
            
            mysqli_query($con3,$insert_approval_detail);
        }
    }
    // end approval_detail table
      
    }
    //start Email Body 
    
    
    if($is_customisable==1){
        
        $Adminlink= '<html lang="en">

 <head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<div id="m_3716871841364271743wrapper" dir="ltr" style="background-color:#f7f7f7;margin:0;padding:70px 0;width:100%">
	<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
		<tbody>
		    <tr>
			 <td align="center" valign="top">
				<div id="m_3716871841364271743template_header_image"></div>
					<table border="0" cellpadding="0" cellspacing="0" width="600" id="m_3716871841364271743template_container" style="background-color:#ffffff;border:1px solid #dedede;border-radius:3px">
						<tbody>
							<tr>
							<td align="center" valign="top">
								<table border="0" cellpadding="0" cellspacing="0" width="600" id="m_3716871841364271743template_header" style="background-color:#96588a;color:#ffffff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;border-radius:3px 3px 0 0">
									<tbody>
										<tr>
											<td id="m_3716871841364271743header_wrapper" style="padding:36px 48px;display:block">
												<h1 style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:30px;font-weight:300;line-height:150%;margin:0;text-align:left;color:#ffffff">
												Customization order request  

												</h1>
												
					<h3>You have received an customization order request from '.$firstname.' ! </h3>
                
												</td>
										</tr>
									</tbody>
								</table>

							</td>
							</tr>

							<tr>
							<td align="center" valign="top">
									<table border="0" cellpadding="0" cellspacing="0" width="600" id="m_3716871841364271743template_body"><tbody><tr>
										<td valign="top" id="m_3716871841364271743body_content" style="background-color:#ffffff">
												
												<table border="0" cellpadding="20" cellspacing="0" width="100%"><tbody><tr>
												<td valign="top" style="padding:48px 48px 32px">
													<div id="m_3716871841364271743body_content_inner" style="color:#636363;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left">

															<p style="margin:0 0 16px">Hi Admin,</p>

															</span><h2 style="color:#96588a;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left">
																[Order #'.$order.'] ('.date('Y/m/d h:i:s').')</h2>
															
															<p style="margin:0 0 16px">Measurement given below : ,</p>'.$custom_details.'

															<div style="margin-bottom:40px">
																<table cellspacing="0" cellpadding="6" border="1" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;width:100%;font-family:Helvetica Neue,Helvetica,Roboto,Arial,sans-serif">
															<thead><tr>
															<th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Product</th>
																			<th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Quantity</th>
																			<th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Price</th>
																		</tr></thead>';
																		
									
									
																		
                                                        $sql=mysqli_query($conn,"select * from order_details  where order_id='".$order."' ");
                                                        while($sql_result=mysqli_fetch_assoc($sql)){
                                                        
                                                        $product_id=$sql_result['product_id'];
                                                        $type = $sql_result['product_type'];
                                                        
                                                        $name = get_sku($product_id,$type); 
                                                        
                                                        $quantity = $sql_result['qty'];
                                                        $product_amt = $sql_result['product_amt'];
                                                            
                                                        $link .=  '<tbody>
                                                            <tr>
                                                                <td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:Helvetica Neue,Helvetica,Roboto,Arial,sans-serif;word-wrap:break-word">
                                                				    <img src="http://srishringarr.com/yn/uploads'. get_image($product_id,$type).'" width="30%">	'.$name.'		</td>
                                                                <td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:Helvetica Neue,Helvetica,Roboto,Arial,sans-serif">
                                                															'.$quantity.' </td>
                                                                <td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:Helvetica Neue,Helvetica,Roboto,Arial,sans-serif">
                                                				<span><span>₹</span>'.$product_amt.'</span>		</td>
                                                            </tr>
                                                            </tbody>';
                                                        }
                                                        //footer
                                                        $Adminlink .= '<tfoot> <tr>
															<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Shipping:</th>
																					<td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">
															<span><span>₹</span>'.$shipping_charges.'</span>&nbsp;<small>via Flat rate</small>
															</td>
														</tr>
															
															<tr>
															<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Total:</th>
																<td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"><span><span>₹</span>'.$total_amount.'</span></td>
															</tr>
															</tfoot>
															</table>
															</div>
															<p style="margin:0 0 16px">We look forward to fulfilling your order soon.</p>
													</div>

												</td>
											</tr>
										</tbody>
									</table>

								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</td>
</tr>

<tr>
<td align="center" valign="top">
						
<table border="0" cellpadding="10" cellspacing="0" width="600" id="m_3716871841364271743template_footer"><tbody><tr>
<td valign="top" style="padding:0;border-radius:6px">
									<table border="0" cellpadding="10" cellspacing="0" width="100%"><tbody><tr>
<td colspan="2" valign="middle" id="m_3716871841364271743credit" style="border-radius:6px;border:0;color:#8a8a8a;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:12px;line-height:150%;text-align:center;padding:24px 0">
									
											</td>
										</tr></tbody></table>
</td>
							</tr></tbody></table>

</td>
				</tr>
</tbody></table><div class="yj6qo"></div><div class="adL">
</div></div>

</body>
</html>';
}
    $to = $email;
    $link= '<html lang="en">

 <head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<div id="m_3716871841364271743wrapper" dir="ltr" style="background-color:#f7f7f7;margin:0;padding:70px 0;width:100%">
	<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
		<tbody>
		    <tr>
			 <td align="center" valign="top">
				<div id="m_3716871841364271743template_header_image"></div>
					<table border="0" cellpadding="0" cellspacing="0" width="600" id="m_3716871841364271743template_container" style="background-color:#ffffff;border:1px solid #dedede;border-radius:3px">
						<tbody>
							<tr>
							<td align="center" valign="top">
								<table border="0" cellpadding="0" cellspacing="0" width="600" id="m_3716871841364271743template_header" style="background-color:#96588a;color:#ffffff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;border-radius:3px 3px 0 0">
									<tbody>
										<tr>
											<td id="m_3716871841364271743header_wrapper" style="padding:36px 48px;display:block">
												<h1 style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:30px;font-weight:300;line-height:150%;margin:0;text-align:left;color:#ffffff">
												Thank you for your order

												</h1>
												
					<h3>Your Order is successfully placed ! </h3>
                <span> The transaction id for your reference is  '.$txnid.' </span>
                
                
												</td>
										</tr>
									</tbody>
								</table>

							</td>
							</tr>

							<tr>
							<td align="center" valign="top">
									<table border="0" cellpadding="0" cellspacing="0" width="600" id="m_3716871841364271743template_body"><tbody><tr>
										<td valign="top" id="m_3716871841364271743body_content" style="background-color:#ffffff">
												
												<table border="0" cellpadding="20" cellspacing="0" width="100%"><tbody><tr>
												<td valign="top" style="padding:48px 48px 32px">
													<div id="m_3716871841364271743body_content_inner" style="color:#636363;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left">

															<p style="margin:0 0 16px">Hi '.$firstname.',</p>
															<p style="margin:0 0 16px">Thanks for your order. It’s on-hold until we confirm that payment has been received. In the meantime, here’s a reminder of what you ordered:</p><span class="im">


															</span><h2 style="color:#96588a;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left">
																[Order #'.$order.'] ('.date('Y/m/d h:i:s').')</h2>

															<div style="margin-bottom:40px">
																<table cellspacing="0" cellpadding="6" border="1" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;width:100%;font-family:Helvetica Neue,Helvetica,Roboto,Arial,sans-serif">
															<thead><tr>
															<th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Product</th>
																			<th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Quantity</th>
																			<th scope="col" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Price</th>
																		</tr></thead>';
																		
									
									
																		
$sql=mysqli_query($conn,"select * from order_details  where order_id='".$order."' ");
while($sql_result=mysqli_fetch_assoc($sql)){

$product_id=$sql_result['product_id'];
$type = $sql_result['product_type'];

$name = get_sku($product_id,$type); 

$quantity = $sql_result['qty'];
$product_amt = $sql_result['product_amt'];
    
$link .=  '<tbody>
            <tr>
                <td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:Helvetica Neue,Helvetica,Roboto,Arial,sans-serif;word-wrap:break-word">
				    <img src="http://srishringarr.com/yn/uploads'. get_image($product_id,$type).'" width="30%">	'.$name.'		</td>
                <td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:Helvetica Neue,Helvetica,Roboto,Arial,sans-serif">
															'.$quantity.' </td>
                <td style="color:#636363;border:1px solid #e5e5e5;padding:12px;text-align:left;vertical-align:middle;font-family:Helvetica Neue,Helvetica,Roboto,Arial,sans-serif">
				<span><span>₹</span>'.$product_amt.'</span>		</td>
            </tr>

            </tbody>';
                    
}
        
															











$link .= '<tfoot>

 <tr>
															<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Shipping:</th>
																					<td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">
															<span><span>₹</span>'.$shipping_charges.'</span>&nbsp;<small>via Flat rate</small>
															</td>
																				</tr>
															
															<tr>
															<th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Total:</th>
																					<td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left"><span><span>₹</span>'.$total_amount.'</span></td>
																				</tr>
															</tfoot>
															</table>
															</div>




															<p style="margin:0 0 16px">We look forward to fulfilling your order soon.</p>
															
															<a href="http://srishringarr.com/bill/Yosshita_neha_bill/yoss_bill.php?oid='.$order.'" >Click here to View/download Bill</a>

<h3>Enjoy Unlimited Unique Fashion Products !<h3>
<p>Visit <b><a href="http://srishringarr.com/">Srishringarr</a></b></p>


<a style="border-radius:0px;font-size:16px;color:#fff;padding:11px 50px;max-width:500px;font-family:Atlas Grotesk,Open Sans,HelveticaNeue-Light,Helvetica Neue Light,Helvetica Neue,Helvetica,Arial,Lucida Grande,sans-serif;border:0px solid #0061ff;text-align:center;text-decoration:none;font-weight:300;display:block;background-color:#0061ff" href="https://www.srishringarr.com/account/redirect.php?id='.$userid.'" data-saferedirecturl="https://www.google.com/url?q=https://www.dropbox.com/l/AABWjooGQaWoHtoVAS-WNXojMuESi-3AWkk/transfer&amp;source=gmail&amp;ust=1599233688458000&amp;usg=AFQjCNFvNdMIywplnetehOofv4MityU2Kg">
View My Account
</a>


													</div>

												</td>
											</tr>
										</tbody>
									</table>

								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
</td>
</tr>

<tr>
<td align="center" valign="top">
						
						<table border="0" cellpadding="10" cellspacing="0" width="600" id="m_3716871841364271743template_footer"><tbody><tr>
<td valign="top" style="padding:0;border-radius:6px">
									<table border="0" cellpadding="10" cellspacing="0" width="100%"><tbody><tr>
<td colspan="2" valign="middle" id="m_3716871841364271743credit" style="border-radius:6px;border:0;color:#8a8a8a;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:12px;line-height:150%;text-align:center;padding:24px 0">
									
											</td>
										</tr></tbody></table>
</td>
							</tr></tbody></table>

</td>
				</tr>
</tbody></table><div class="yj6qo"></div><div class="adL">
</div></div>

</body>
</html>';

    $headers .= "Reply-To: The Sender sales@srishringarr.com\r\n"; 
    $headers .= "Return-Path: The Sender sales@srishringarr.com\r\n"; 
    $headers .= "From: sales@srishringarr.com" ."\r\n" .
    $headers .= "Organization: Sender Organization\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "X-Priority: 3\r\n";
    $headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
    
            
    if(mail($to, "Thanks You For Shopping At Srishringarr", $link, $headers,'-f sales@srishringarr.com -F "Srishringarr Fashion Studio"')){
        // mail('yosshita.neha@gmail.com', "Thanks You For Shopping At Srishringarr", $link, $headers,'-f sales@srishringarr.com -F "Srishringarr Fashion Studio"');
        
        // mail('rajanipoddar@gmail.com', "Thanks You For Shopping At Srishringarr", $link, $headers,'-f sales@srishringarr.com -F "Srishringarr Fashion Studio"');
        mail('vishwaaniruddh@gmail.com', "Thanks You For Shopping At Srishringarr", $link, $headers,'-f sales@srishringarr.com -F "Srishringarr Fashion Studio"');
        mail('developer.ruchi@gmail.com', "Thanks You For Shopping At Yosshitaneha", $link, $headers,'-f sales@srishringarr.com -F "Yosshitaneha Fashion Studio"');
    }
    
    if($is_customisable==1) {
        $filename = 'dummy.pdf';
        $path = 'http://sarmicrosystems.in/srishringarr/web/static/documents';
        $file = $path . "/" . $filename;
        
        $content = file_get_contents($file);
        $content = chunk_split(base64_encode($content));
        
        // a random hash will be necessary to send mixed content
        $separator = md5(time());
    
        // carriage return type (RFC)
        $eol = "\r\n";
        
        // main header (multipart mandatory)
        
        
        $headers = "Reply-To: The Sender sales@srishringarr.com\r\n"; 
        $headers .= "Return-Path: The Sender sales@srishringarr.com\r\n"; 
        $headers .= "From: sales@srishringarr.com" ."\r\n" .
        $headers .= "Organization: Sender Organization\r\n";
        //$headers .= "MIME-Version: 1.0\r\n";
        //$headers .= "Content-type: text/html; charset=utf-8\r\n";
        //$headers .= "X-Priority: 3\r\n";
        //$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
    
    
    
        $headers .= "From: sales@srishringarr.com" . $eol;
        $headers .= "MIME-Version: 1.0" . $eol; 
        $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
        $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
        $headers .= "This is a MIME encoded message." . $eol;
    
        // message
        $Adminlink.= "--" . $separator . $eol;
        $Adminlink .= $message . $eol;
        
        // attachment
        $Adminlink .= "--" . $separator . $eol;
        $Adminlink .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
        $Adminlink .= "Content-Transfer-Encoding: base64" . $eol;
        $Adminlink .= "Content-Disposition: attachment" . $eol;
        $Adminlink .= $content . $eol;
        $Adminlink .= "--" . $separator . "--";

        // mail('developer.ruchi@gmail.com', "Admin customization request Mail", $Adminlink, $headers);
    }
    // end Email Body
} ?>

iv class="product-model">  
        <div class="container">
            <div class="row ">
                <div class="col-md-12 pay-info">
                    <?php if($status='success'){
                        echo "<h3>Thank You, " . $firstname .".Your order status is ". $status .".</h3>";
                        echo "<h4>Your Transaction ID for this transaction is <span class='txn_id'>".$txnid.".</span></h4>"; ?>
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main" role="main">
                                <article id="post-8" class="post-8 page type-page status-publish hentry">
                                    <div class="entry-content">
                                        <div class="woocommerce">
                                            <div class="woocommerce-order">
                                            <?php $sql=mysqli_query($conn,"select * from Order_ent where transaction_id='".$txnid."'");
                                            $sql_result=mysqli_fetch_assoc($sql);
                                            $order_id=$sql_result['id'];
                                            $date = $sql_result['date'];
                                            ?>
                                            <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">
                                                <li class="woocommerce-order-overview__order order">
                                                    Order number:  <strong><? echo $order_id; ?></strong>
                                                </li>
                                                <li class="woocommerce-order-overview__date date">
                                                    Date:                   <strong><? echo $date; ?> </strong>
                                                </li>
                    
                                                <li class="woocommerce-order-overview__email email">
                                                    Email: <strong><? echo $email;?></strong>
                                                </li>
                                    
                                                <li class="woocommerce-order-overview__total total">
                                                    Total: <strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₹</span><? echo $total_amount ; ?></span></strong>
                                                </li>
                                            </ul>
                                
                                            <section class="woocommerce-order-details">
                                                <h2 class="woocommerce-order-details__title">Order details</h2>
                                                <table class="woocommerce-table woocommerce-table--order-details shop_table order_details">
                                                    <thead>
                                                        <tr>
                                                            <th class="woocommerce-table__product-name product-name">Product</th>
                                                            <th class="woocommerce-table__product-table product-total">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        
                                                        $sql=mysqli_query($conn,"select * from order_details where order_id='".$order_id."'");
                                                        // $sql=mysqli_query($conn,"select * from order_details where order_id='68'");
                                                        
                                                        while($sql_result=mysqli_fetch_assoc($sql)){
                                                        
                                                        $product_id=$sql_result['product_id'];
                                                        $type=$sql_result['product_type'];
                                                        
                                                        $total_amt=$sql_result['total_amt'];
                                                        $qty=$sql_result['qty'];
                                                        $name = get_sku($product_id,$type);
                                                        ?>
                                                
                                                        <tr class="woocommerce-table__line-item order_item">
                                                            <td class="woocommerce-table__product-name product-name">
                                                                <img src="http://srishringarr.com/yn/uploads<? echo get_image($product_id,$type); ?>">
                                                                <?php echo $name;?> <strong class="product-quantity">×&nbsp;<? echo $qty; ?></strong>
                                                            </td>
                                                            <td class="woocommerce-table__product-total product-total">
                                                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₹</span><? echo $total_amt; ?></span>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            
                                                <tfoot>
                                                    <tr>
                                                        <th scope="row">Shipping:</th>
                                                        <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₹</span><? echo  $shipping_charges; ?></span>&nbsp;<small class="shipped_via">via Flat rate</small></td>
                                                    </tr>
                                                               
                                                    <tr>
                                                        <th scope="row">Total:</th>
                                                        <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₹</span><? echo $total_amount; ?></span></td>
                                                    </tr>
                                                                               
                                                                                
                                                                           
                                                </tfoot>
                                                </table>
                    
                        </section>
                    
                    
                        
                    </div>
                    </div>
                                        </div><!-- .entry-content -->
                            </article><!-- #post-## -->
                            </main><!-- #main -->
                        </div>
                        
                        
                        
                        
                                <? 
                               
                              
                                
                      
                            // include ('avopdf/report.php');
                            // include("sendmailwithattachment.php");
                              // }     
                              
                              
                               //delete everything from cart
                                delete_from_cart($userid);
                                
                                $_SESSION['pay_status']=true;
                           }
       
       
       else{
           
              echo "<h3>Something went Wrong !! </h3>";
          echo "<h4>Please try Again !</h4>";
          
          
         $sql=mysqli_query($conn,"select * from cart where user_id='".$userid."'");

while($sql_result=mysqli_fetch_assoc($sql)){
    
    $cart_product_id = $sql_result['product_id'];
    $cart_product_type = $sql_result['product_type'];
    $cart_quantity = $sql_result['qty'];
    
    $sku=get_sku($cart_product_id,$cart_product_type);
    
    $pos_sql=mysqli_query($con3,"select * from phppos_items where name='".$sku."'");
    $pos_sql_result=mysqli_fetch_assoc($pos_sql);

    $quantity=$pos_sql_result['quantity'];
    $new_quantity=$quantity+$cart_quantity;
    $new_quantity = sprintf("%.2f", $new_quantity);
    $update="update phppos_items set quantity='".$new_quantity."' where name LIKE '".$sku."'";
    mysqli_query($con3,$update);
}





            $_SESSION['pay_status']=false;
       }   
         
?>  
            <div >

                
                  
             </div>              
          </div>
        </div>
</div>


<?php include('footer.php')?>
</div>  


<?php include('footer.php');?>