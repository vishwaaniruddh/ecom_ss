<?php session_start();

$usrid = $_SESSION['gid'];
include('header.php'); ?>
	
<style type="text/css">
.pointer {cursor: pointer;}

	@media only screen and (min-width:1024px) {
  .table-shopping-cart{
   min-width: auto;
  }
}

@media only screen and (max-width:424px) {
  .mobilecart{
  	width:316px;
  }
}
@media only screen and (max-width:424px) {
  .mobilecartbtn{
  	margin-left:46px;
  }
}
@media only screen and (min-width:1024px) {
  .mobilecartbtn{
  	margin-left:5px;
  }
}

</style> 

<form enctype="multipart/form-data" id="cart_form" method="POST">
	<input type='hidden' name='csrfmiddlewaretoken' value='rtMXRu2c2i3W0NRJmIPMZbhbWy9XrjmxCCZXOpGEbhZTcriFV3jSb9Kl1DBJPla2' />
    <!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
		<div class="flex-w" style="width:100%;"> 
			Cart
			<!-- 		 
	 			(1) 
			 -->
			<hr style="width:100%;background:#ccc;">
		</div>
		<div class="row">
			<div class="col-sm-9 s-text15 m-t-40" >	<!-- Cart item -->
				<div class="container-table-cart pos-relative">
					<div class="wrap-table-shopping-cart bgwhite">
					    <?php 
					    
					    
					    $is_cart_count=mysqli_query($conn,"SELECT * from cart where ac_typ=1 and user_id='".$usrid."'");
                        $is_cart_count_result=mysqli_fetch_assoc($is_cart_count);
                        if($is_cart_count_result){ ?>
						
						<table  class="table-shopping-cart">
							<tr class="table-head">
								<th class="column-3">Image</th>
								<th class="column-3">Product</th>
								<th class="column-3">Quantity</th>
								<th class="column-3">Total</th>
							</tr>
							
							
							<?php
                            $get_cart_sql=mysqli_query($conn,"SELECT * from cart where ac_typ=1 and user_id='".$usrid."'");
                            
                            while($get_cart_sql_result=mysqli_fetch_array($get_cart_sql)) { 
                             //var_dump($get_cart_sql_result);
                            
                            $productid=$get_cart_sql_result['product_id'];
                            $quantity=$get_cart_sql_result['qty'];
                            $type=$get_cart_sql_result['product_type'];
                            
                            if($type=="1")
                            { 
                                $sql="SELECT * FROM `product` WHERE `product_id`='".$productid."'"; 
                                $prod_qry = mysql_query($sql);
                                $prod_name = mysql_fetch_assoc($prod_qry);
                            }  
                            else if($type=="2")
                            { 
                                $sql="select * from  `garment_product` where gproduct_id='".$productid."'"; 
                                $prod_qry = mysql_query($sql);
                                $prod_name = mysql_fetch_assoc($prod_qry['gproduct_name']);
                            }
                            
                            
                             ?>
        
							
							<tr class="table-row">
								<td  align="center" class="column-3">
									<a href="detail.php">
									    <div class="cart-img-product b-rad-4 o-f-hidden m-l-20">
											<img src="http://yosshitaneha.com/uploads/<? echo get_image($productid,$type); ?>" alt="<?php echo $productid; ?>">
										</div>
									</a>
								</td>
								<td  align="center" class="column-3">
									<a align ="center" href="/detail/p_444"><?php echo $prod_name['product_code']; ?></a>
									<div class="s-text7">  Rental For  
										3 Days <br>
										From: <?php echo $get_cart_sql_result['rent_dt']; ?>  <br>
										To:  <?php echo $get_cart_sql_result['return_dt']; ?>  <br>
										Deposit : &#8377;<?php echo $get_cart_sql_result['deposit_amt']; ?>
									</div>
								</td>
								<td  align="center" class="column-3">
									<div class="flex-w bo5 of-hidden w-size17">
										<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2" id="qtyminus" value="-" onclick="updateCart('444','-');">
											<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
										</button>

    									<input class="size8 m-text18 t-center num-product" type="number" name="quantity" id="quantity_444" value="1">
    
    									<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2" id='qtyplus' value="+" onclick="updateCart('444','+');">
    										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
    									</button>
									</div>
								</td>
								<td align="center" class="column-3"><div id="productTotal_444">  Rs. <?php echo $get_cart_sql_result['product_amt']; ?></div></td>
							</tr>
							<?php } ?>
							
						    <input type="hidden" name="pid" value="<?php echo $productid; ?>" />
							<input type="hidden" name="cid" value="" />
						</table>
						<?php } ?>
					</div>
				</div>
			</div>
			
			<div class="col-sm-3">
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
 						            <div style="width:28%; font-weight:bold;" id=""><?php echo get_sku($productid,$type); ?>&nbsp;</div>
 						        </div>
        						<div style="display:flex;padding:10px">
        
        							<div style="width:70%; font-weight:bold;">Price (1 items)</div>
        							<div style="width:30%; font-weight:bold;" id="product_total">Rs. <?php echo $get_cart_sql_result['total_amt']; ?></div>
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
            						<!-- Button -->
            						<input type="submit" class="flex-c-m  bg1 bo-rad-23 hov1 s-text1 trans-0-4 p-l-20 p-r-10 p-t-12 p-b-12 pointer mobilecartbtn" name="cart_form_btn" style="background-color: #e6be6e;color: #444;" value="PROCEED TO CHECKOUT">
					            </div>
						    </td>
					    </tr>

					</div>
				</div>
			</table>
			</div>
		</div>
	</div>
</section>

	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					GET IN TOUCH
				</h4>

				<div>
					<p class="s-text7 w-size27">
						Any questions? Let us know at<br>
						Sri Shringarr Fashion Studio,<br>Shyamkamal Building B/1, Office No.104,<br>1 st Floor, Agarwal Market, Opposite Railway Station,<br>Vile Parle (East), Mumbai 400 057
						
						Mobile No : 075066 28663/ 093242 43011
					</p>

					<div class="flex-m p-t-30">
						<a href="https://www.facebook.com/srishringarr/" target="_blank" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="https://www.instagram.com/srishringarr/" target="_blank" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
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
						<a href="sub-category.php" class="s-text7">
							Jewellery
						</a>
					</li>
					<li class="p-b-9">
						<a href="/sub-category.php" class="s-text7">
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
				</ul>
			</div>

			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
				
				<iframe width="100%" height="250px" src="https://www.youtube.com/embed/KGZVaCSe_mw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<h7>Take a virtual tour of Sri Shringarr Fashion Studio</h7>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
			<div class="t-center s-text8 p-t-20">
        	    <a style="text-decoration: none;" href="/terms-of-use/">TERMS OF USE</a> &nbsp;
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
	
	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div> 

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>

	<script type="text/javascript" src="static/css/vendor/jquery/jquery-3.2.1.min.js"></script>

	<script type="text/javascript" src="static/css/vendor/animsition/js/animsition.min.js"></script>

	<script type="text/javascript" src="static/css/vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="static/css/vendor/bootstrap/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="static/css/vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
	<script type="text/javascript" src="static/css/vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="static/js/slick-custom.js"></script>
	<script type="text/javascript" src="static/css/vendor/countdowntime/countdowntime.js"></script>
	<script type="text/javascript" src="static/css/vendor/lightbox2/js/lightbox.min.js"></script>
	<script type="text/javascript" src="static/css/vendor/sweetalert/sweetalert.min.js"></script>
	<script src="static/js/main.js"></script>
	<script src="static/js/site.js"></script>
</body>
</html>
