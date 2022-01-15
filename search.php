<?php session_start();

include('header.php'); 
echo '<pre>'; print_r($_POST['search']); echo '</pre>';

$searchText = $_POST['search'];

?>
            	
            	
            <div class="p-t-45 p-b-15 p-l-40">
            	<!-- <strong>Search Result for ""</strong> -->
            	<div class="p-l-20 p-r-20 p-t-20 p-b-20 m-l-20 m-r-20 m-t-20 m-b-20">
            		<!-- <form style="display:flex;" method="post" enctype="multipart/form-data" >
            			<input type='hidden' name='csrfmiddlewaretoken' value='V6g0Y5ctxx4BfZL0AJGLHL3kwNuYlFkq5Wu3s0TwGfjoiPrhuU3V18H6jrehnja8' />
            			<div class="bo4 dis-flex">
            				<div class="topbar effect1 w-size9">
            					<input type="text" class=" p-l-20 topbar s-text7 bg6 w-full" name="searchtxt" placeholder="Enter Search String here" value="">
            					<span class="effect1-line"></span>
            				</div>
            				 <input type="submit" class = "search_btn" name="searchbtn" value="Search">
            			 </div>
            		</form> -->
            	</div>
            			
            </div>

	<div class="bo9 m-l-20 m-r-20 m-t-20 m-b-20">		
		<section class="newproduct bgwhite">
				<div>
					<div class="p-b-20 p-t-20 p-r-20 p-l-20">
						<h3 class="m-text15">
							Products Count: 201
						</h3>
					</div>
					
					<!-- Slide2 -->
					<div class="wrap-slick2">
						<div class="row">
						    
						    
						    <?php
						    $pathmain = "http://yosshitaneha.com/";
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
                        $name = $row['gproduct_name'];
                        
                    } else if($category==1){
                        $prcode=$row['product_code'];
                        $pid = $row['product_id'];
                        $image_qry ="SELECT prod_image from product_images_new where product_id = '".$pid."' or pro_code='".$prcode."' ";
                        $name = $row['product_name'];
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
							<div class="col-sm-3" style="padding: 10px;">				
								<div class="item-slick2 p-l-15 p-r-15">
									<!-- Block2 -->
									<div class="block2">
										<div class="block2-img wrap-pic-w of-hidden pos-relative">
											<a href="detail.php?id=<?php echo $pid; ?>&type=<?php echo $category;?>">
												<img src="<?php echo $path;?>" >
											</a>
			
											<!-- <div class="block2-overlay trans-0-4"> -->
												<!-- <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
													<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
													<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
												</a> -->
												<!-- <div class="block2-btn-details w-size1 trans-0-4">
													<a href="/detail/p_57/" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
														Details
													</a>
												</div> -->
												<!-- <div class="block2-btn-addcart w-size1 trans-0-4">
													<form style="margin-bottom: 0;" enctype="multipart/form-data" >
														<input type='hidden' name='csrfmiddlewaretoken' value='V6g0Y5ctxx4BfZL0AJGLHL3kwNuYlFkq5Wu3s0TwGfjoiPrhuU3V18H6jrehnja8' />
														<input class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" type="button"  value="Add To Cart"  id = "add_to_cart" name="add_to_cart" onclick="addToCart('57');"/>
													</form>	
												</div> -->
											<!-- </div> -->
										</div>
			
										<div class="block2-txt p-t-20">
											<a href="detail.php?id=<?php echo $pid; ?>&type=<?php echo $category;?>" class="block2-name dis-block s-text3 p-b-5">
												<?php echo $name;?> 
											</a>
											 <span class="block2-price m-text6 p-r-5">
												<?php echo $prcode; ?>
											</span>
											<table style="width: 100%;">
												<tr>
													<td class="block2-price m-text6 p-r-5" style="width: 95%;color: #444;font-size: 15px;">
														<!-- <span class="block2-price m-text6 p-r-5"> -->
															Rs. <?php echo $newsp; ?>
														<!-- </span> -->
													</td>
													<!-- <td style="width: 5%;">
														<form style="margin-bottom:0;float: right;" enctype="multipart/form-data">
															<input type='hidden' name='csrfmiddlewaretoken' value='V6g0Y5ctxx4BfZL0AJGLHL3kwNuYlFkq5Wu3s0TwGfjoiPrhuU3V18H6jrehnja8' />
															<i class="fa fa-shopping-cart fa-1x pointer" id = "add_to_cart" name="add_to_cart" value="Add To Cart" onclick="addToCart('57','0');"></i>
														</form>
													</td> -->
												</tr>
											</table>
										</div>
									</div>
								</div>
							</div>
							<?php }
                $num++;
                }?>
							
							
						</div>
					</div>
				</div>
			</section>
	</div>

	
	<?php include('footer.php'); ?>