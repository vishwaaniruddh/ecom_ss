<?php session_start();
include('header.php');

$userid=$_SESSION['gid'];

?>

<!-- Orders -->
<?php //if(isset($_SESSION['email'])){ 

?>
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
		<div class="flex-w" style="width:100%;"> 
			Order History
			<!-- 		 
	 			(1) 
			 -->
			<hr style="width:100%;background:#ccc;">
		</div>
		<div class="row">
			<div class="col-sm-12 s-text15 m-t-40" >	<!-- Cart item -->
				<div class="container-table-cart pos-relative">
					<div class="wrap-table-shopping-cart bgwhite">
						
						<table  class="table-shopping-cart">
							<tr class="table-head">
								<th class="column-3">Order Number</th>
								<th class="column-3">Date</th>
								<th class="column-3">Transaction ID</th>
								<th class="column-3">Total</th>
								<th class="column-3">Action</th>
							</tr>
							
							
							<!--get the order details-->
		    <?
		    $sql=mysqli_query($conn,"select * from Order_ent where user_id='".$userid."' ORDER BY id desc");
		    
		    $cnt = 1;
		    while($sql_result=mysqli_fetch_assoc($sql)){
		        
		         $transaction_id=$sql_result['transaction_id'];
		         $order_id=$sql_result['id'];
		         $date=$sql_result['date'];
		         $amount=$sql_result['amount'];
		         
		        if($transaction_id){?>
							
							<tr class="table-row">
								<td  align="center" class="column-3">
									<a href="detail.php">
									    <div class="cart-img-product b-rad-4 o-f-hidden m-l-20">
											<!--<img src="static/images/catalog/products/main/EAR955ON-2350  (1).jpg" alt="IMG-PRODUCT">-->
											<?php echo $cnt; ?>
										</div>
									</a>
								</td>
								<td  align="center" class="column-3">
									<a align ="center" href="/detail/p_444">Traditional Tasseled Dangler Earrings</a>
									<div class="s-text7">  Rental For  
										4 Days <br>
										From: 4/12/2020  <br>
										To:  4/15/2020  <br>
										Deposit : &#8377;900
									</div>
								</td>
								<td  align="center" class="column-3">
									<div class="flex-w bo5 of-hidden w-size17">
										<!--<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2" id="qtyminus" value="-" onclick="updateCart('444','-');">
											<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
										</button>

    									<input class="size8 m-text18 t-center num-product" type="number" name="quantity" id="quantity_444" value="1">
    
    									<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2" id='qtyplus' value="+" onclick="updateCart('444','+');">
    										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
    									</button>--> 
    									
    									<?php echo $transaction_id; ?>
									</div>  
								</td>
								<td align="center" class="column-3"><div id="productTotal_444">  Rs. <? echo $amount; ?></div></td>
								
								<td >
                                    <a href="orderDetails.php?id=<?php echo $order_id;?>"><i class="glyphicon glyphicon-eye-open"></i></a>
        						</td>
							</tr>
							
							<?php $cnt++; }
		                }   ?>
		    
						    <input type="hidden" name="pid" value="444" />
							
						</table>
					</div>
				</div>
			</div>
			
			<!--<div class="col-sm-3">
				<div class="bo16 w-size18 m-l-auto p-lr-15-sm p-l-20 p-r-40 ">
					<br><br>
				<table  class="table-shopping-cart1" style="min-width: auto;">
					<tr class="table-head">
						<th class="column-3">Cart Totals</th>
					</tr>
					<tr class="table-row">
					    <td  class="column-3">
 						    <div  class="s-text7" style=" background: #fff; padding:10px;">
 						        <div style="display:flex;padding:10px">
 							        <div style="width:70%;font-weight:bold;">SKU :</div>
 						            <div style="width:28%; font-weight:bold;" id="">EAR955ON&nbsp;</div>
 						        </div>
        						<div style="display:flex;padding:10px">
        
        							<div style="width:70%; font-weight:bold;">Price (1 items)</div>
        							<div style="width:30%; font-weight:bold;" id="product_total">Rs. 700</div>
        						</div>
        						<div style="display:flex;padding:10px">
        
        							<div style="width:70%; font-weight:bold;">Shipping Charges :</div>
        							<div style="width:30%; font-weight:bold;" id="shipping_charge">Rs. 100</div>
        						</div>
						   </td>
					  </tr>
					  <tr class="table-row">
					    <td  class="column-3">
						    <div  class="s-text7" style=" background: #fff; padding:10px;">
						        <div style="display:flex;padding:10px;">
        							<div style="width:70%; font-weight:bold;">Amount Payable  </div>
        							<div style="width:30%; font-weight:bold;" id="cart_total">Rs. 800</div>
						        </div>
						        <br>
						        <div class="size5 trans-0-4" >
            						
            						<input type="submit" class="flex-c-m  bg1 bo-rad-23 hov1 s-text1 trans-0-4 p-l-20 p-r-10 p-t-12 p-b-12 pointer mobilecartbtn" name="cart_form_btn" style="background-color: #e6be6e;color: #444;" value="PROCEED TO CHECKOUT">
					            </div>
						    </td>
					    </tr>

					</div>
				</div>
			</table>
			</div>
		</div> -->
	</div>
</section>

<?php 
/*} else { 
    include_once('login.php'); 
} */
?>

<?php include('footer.php'); ?>