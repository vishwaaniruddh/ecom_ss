<?php session_start();
include('config.php');
include('functions.php');
include('js_functions.php');

if($_SESSION['gid']=="")
{
    create_guest_user();
} 

$userid = $_SESSION['gid'];





?>
<!DOCTYPE html>
<html lang="en">
    <head>
    	<title>Sri Shringarr</title>
    	<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1"> 
        
    	<link rel="icon" type="image/png" href="static/images/icons/favicon.png"/>
    
    	<link rel="stylesheet" type="text/css" href="http://sarmicrosystems.in/srishringarr/web/static/css/bootstrap.min.css"> 
    
    	<link rel="stylesheet" type="text/css" href="static/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    
    	<link rel="stylesheet" type="text/css" href="static/fonts/themify/themify-icons.css">
    
    	<link rel="stylesheet" type="text/css" href="static/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    	
    	<link rel="stylesheet" type="text/css" href="static/css/style.css">
    
    	<link rel="stylesheet" type="text/css" href="static/css/vendor/animate/animate.css">
    
    	<link rel="stylesheet" type="text/css" href="static/css/vendor/css-hamburgers/hamburgers.min.css">
    
    	<!-- <link rel="stylesheet" type="text/css" href="/static/css/vendor/animsition/css/animsition.min.css"> -->
    
    	<link rel="stylesheet" type="text/css" href="static/css/vendor/select2/select2.min.css">
    
    	<link rel="stylesheet" type="text/css" href="static/css/vendor/daterangepicker/daterangepicker.css">
    
    	<link rel="stylesheet" type="text/css" href="static/css/vendor/slick/slick.css">
    
    	<link rel="stylesheet" type="text/css" href="static/css/vendor/lightbox2/css/lightbox.min.css">
        
    	<link rel="stylesheet" type="text/css" href="static/css/util.css">
    	<link rel="stylesheet" type="text/css" href="static/css/main.css">
    	<link rel="stylesheet" type="text/css" href="static/css/site.css">
    	
    	
    	
    	  <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
      <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
      <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/latest/css/bootstrap.css">
      <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
      <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css">
      
      
      
    	<!--<link rel="stylesheet" type="text/css" href="static/css/custom.css">-->
    	 
    	<!--<script type="text/javascript" src="static/css/vendor/jquery/jquery-3.2.1.min.js"></script>-->
    	
    	
    	<!--Ruchi : Facebook pixel-->
    	<!-- Facebook Pixel Code -->
        <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window,document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
         fbq('init', '1777498652565564'); 
        fbq('track', 'PageView');
        </script>
        <noscript>
         <img height="1" width="1" 
        src="https://www.facebook.com/tr?id=1777498652565564&ev=PageView
        &noscript=1"/>
        </noscript>
        <!-- End Facebook Pixel Code -->

    	
    	
    </head>
    
    <style>
        .pointer {cursor: pointer;}
        .block2-overlay{
            top: auto !important;
            left: auto !important;
        }
        
        .add_to_cart_btn{
            display:none;
        }
        .product_div:hover .add_to_cart_btn{
            display: block ! important;
            
            color:white;
            text-align:center;
            padding: 7px;
    margin-bottom: 10px;
}


    </style>
    
    <body class="animsition">
	<!-- Header -->
	<header class="header1">

		<!-- Header desktop -->
		<div class="container-menu-header" style="height:120px;background:white;">
			<div class="topbar">
			    	    <?
	   // echo 'gid : '.$_SESSION['gid'];

// var_dump($_SESSION);
	    ?>
			    <div class="topbar-social">
					<a href="https://www.facebook.com/srishringarr/" target="_blank" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
					<a href="https://www.instagram.com/srishringarr/" target="_blank" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
					<!-- <a href="https://plus.google.com/u/1/113103807414319162517" target="_blank" class="fs-18 color1 p-r-20 fa social_googleplus"></a> -->
					<a href="https://twitter.com/SriShringarr" target="_blank" class="fs-18 color1 p-r-20 fa social_twitter"></a>
					<a href="https://in.pinterest.com/srishringarr/?eq=sri&etslf=5839" target="_blank" class="fs-18 color1 p-r-20 fa social_pinterest"></a>
				</div>
				<div class="topbar-child2">
					<form style="display:flex;" method="post" enctype="multipart/form-data"  action="search.php">
						<div class="topbar effect1 w-size9">
							<input type="text" class="topbar  s-text7 bg6 w-full" name="search" placeholder="Search.." value="<?php if(isset($_POST['search'])){ echo $_POST['search'];}?>">
							<span class="effect1-line"></span>
						</div>
						<input type="submit" class = "search_btn" name="searchbtn" value="Search">
					</form>
		        </div> 
	        </div>
			<div class="wrap_header">
				<!-- Logo --> 
    			<a href="/" class="logo" >
    			    <img  src=" static/images/site/logo/main_logo.png" alt="Avatar" /> 
    			</a>
				<!-- Menu -->
				<div class="wrap_menu">					
					<nav class="menu">
					    <div style="display:flex;">
							<ul class="main_menu">
								<li><a href="index.php">Home</a></li>
								<li> 
								    <a href ="sub_category.php?type=1">Jewellery</a>
									<ul class="sub_menu">
										<!--<li><a href ="list.php">Kundan</a> </li>-->
                                		<li>
                                		    <?php 
                                			$qryjew=mysql_query("SELECT * FROM `jewel_subcat` where mcat_id=1 or mcat_id=3");     
                                			
                                		    while($rowjew=mysql_fetch_array($qryjew)) {  
                                				$qryjew1=mysql_query("select * from subcat1  where maincat_id='$rowjew[0]' and status=1 order by name");
                                				
                                				$cnt = mysql_num_rows($qryjew1); 	
                            					$i = 1;
                            					while($rowjew1=mysql_fetch_row($qryjew1)) { 
                            						 
                            						if($cnt >1){ 
                            						    if($i==1){ ?>
                            						    <li>
                            							    <a href="sub_category.php?type=1&cid=<?php echo $rowjew[0];?>"><?php echo ucwords($rowjew[2]); ?><span class="caret"></span></a>
                            							    <ul class="dropdown-menu">
                            							<?php }  ?>
                                                            <li> <a href="list.php?id=<?php echo $rowjew1[0];?>&type=1" ><?php echo ucfirst(strtolower($rowjew1[2]))?></b></a></li>
                                                            
                                                        <?php if($i==$cnt){ echo '</ul></li>';} ?>
                            						<?php } else  { ?>
                                						
                                						<?php if($i==1){ ?>
                                						    <li><a href="list.php?id=<?php echo $rowjew1[0];?>&type=1" ><?php echo ucfirst(strtolower($rowjew[2]))?></b></a></li>
                                						<?php } ?>
                            						
                            						<?php } ?>
                            						<li class="divider"></li>
                            						<?php  
                            						$i++;
                            					}  ?>
                                			<?php } ?>			 
                            		    </li>		
                            	    </ul>
							    </li>
							    <li>
								    <a href ="sub_category.php?type=2">Apparel</a>
									<ul class="sub_menu"> 
									    <?php 
                        		        $qryjew=mysql_query("SELECT * FROM `garments` where `Main_id`=1 or `Main_id`=3");     
                         		        while($rowjew=mysql_fetch_array($qryjew)){  ?>
                          	                <li><a href="list.php?id=<?php echo $rowjew[0];?>&type=2"><?php echo ucfirst($rowjew[2]); ?></a></li>
                                        <?php } ?>
								        <!--<li><a href ="/list/36/?page=1">Indo Western</a> </li>-->
									</ul>
								</li>
				  				<!------------------rahul----------- 29-07-2019 ------------------------>
				  				<li><a href="contact_us.php">Contact Us</a></li>
							</ul>
					    </div>
			        </nav>
			    </div>
				<!-- Header Icon -->
				<div class="header-icons"> 
				    <nav>
				        <ul class="main_menu">	
						    <li style="text-align: center;">
    							<a class="dropbtn">
								    <img src="static/images/icons/icon-header-01.png" class="header-icon1" alt="ICON" style="position: absolute;">
								</a>
								<?php if(isset($_SESSION['email'])){ ?>
								    <ul class="sub_menu" >
        								<li><a href="account/user-profile.php">Profile</a></li>
        								<li><a href="wishlist">Wishlist</a></li>
        								<li><a href="account/orders.php">Orders</a></li>
        								<li><a href="logout.php">Logout</a></li>
    								</ul>
								<?php } else { ?>
    							    <ul class="sub_menu" >
        								<li><a href="signup.php">Signup</a></li>
        								<li><a href="login.php">Login</a></li>
        							</ul>
        					</li>
						</ul>
					<?php } ?> <br>
    			</nav>
				<span class="linedivide1"></span>
		        <div class="header-wrapicon2">
			  
					<a href="cart1.php" class="cart_anchor">
						<img src=" static/images/site/cart_image/cart.jpg" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span id="cartCount" class="header-icons-noti"><? echo get_cart_count($userid); ?></span>
					</a>
					
				</div>
			</div>
		</div>
	</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<!-- <a href="index.html" class="logo-mobile">
				<img src="images/dummy_logo.png" alt="IMG-LOGO">
			</a> -->
			<a href="#" class="logo-mobile">
				<img src=" static/images/site/logo/main_logo.png" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<nav>
						<ul class="main_menu">				
							<li>
								<a class="dropbtn">
									<img src="static/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
								</a>
								<ul class="sub_menu" >
    								<li><a href="login.php">Login</a></li>
    								<li><a href="signup.php">Signup</a></li>
								</ul>
							</li>
						</ul>
					</nav>

					<span class="linedivide2"></span>
					<div class="header-wrapicon2">
						<!-- <img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON"> -->
						  
						<a href="cart1.php">
							<img src=" static/images/site/cart_image/cart.jpg" class="header-icon1 js-show-header-dropdown" alt="ICON">
							<span id="cartCountMob" class="header-icons-noti">0</span>
						</a>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<!-- <img src="images/item-cart-01.jpg" alt="IMG"> -->
										<img src="static/" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											White Shirt With Pleat Detail Back
										</a>

										<span class="header-cart-item-info">
											1 x $19.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<!-- <img src="images/item-cart-02.jpg" alt="IMG"> -->
										<img src="static/" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Converse All Star Hi Black Canvas
										</a>

										<span class="header-cart-item-info">
											1 x $39.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<!-- <img src="images/item-cart-03.jpg" alt="IMG"> -->
										<img src="static/" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Nixon Porter Leather Watch In Tan
										</a>

										<span class="header-cart-item-info">
											1 x $17.00
										</span>
									</div>
								</li>
							</ul>

							<div class="header-cart-total">
								Total: $75.00
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart1.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" style="position: fixed;right: 0;top:0; z-index:900" >
			<nav class="side-menu">
				<ul class="main-menu">
					<!-- <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							Free shipping for standard order over $100
						</span>
					</li>
                -->
					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
								info@srishringarr.com
							</span>

                    <!--    <div class="topbar-language rs1-select2">
								<select class="selection-1" name="time">
									<option>USD</option>
									<option>EUR</option>
								</select>
							</div> -->
						</div>
					</li>

					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<a href="https://www.facebook.com/srishringarr/" target="_blank" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
							<a href="https://www.instagram.com/srishringarr/" target="_blank" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
							<a href="https://twitter.com/SriShringarr" target="_blank" class="fs-18 color1 p-r-20 fa social_twitter"></a>
							<a href="https://in.pinterest.com/srishringarr/?eq=sri&etslf=5839" target="_blank" class="topbar-social-item fa fa-pinterest-p"></a>
						<!-- 	<a href="#" class="topbar-social-item fa fa-facebook"></a>
							<a href="#" class="topbar-social-item fa fa-instagram"></a>
							<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
							<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
							<a href="#" class="topbar-social-item fa fa-youtube-play"></a> -->
						</div>
					</li>
					<li class="item-menu-mobile">
						<a href="#">Home</a>
					</li>
					<li class="item-menu-mobile">
						<a href ="sub_category.php?type=2">Jewellery</a>
						<ul class="sub-menu">
    						
    						<li>
                                <?php 
                                $qryjew=mysql_query("SELECT * FROM `jewel_subcat` where mcat_id=1 or mcat_id=3");     
                                			
                                while($rowjew=mysql_fetch_array($qryjew)) {  
                                    $qryjew1=mysql_query("select * from subcat1  where maincat_id='$rowjew[0]' and status=1 order by name");
                                				
                                	$cnt = mysql_num_rows($qryjew1); 	
                                	$i = 1;
                					while($rowjew1=mysql_fetch_row($qryjew1)) { 
                						 
                						if($cnt >1){ 
                						    if($i==1){ ?>
                						        <li>
                							        <a href="sub_category.php?type=1&cid=<?php echo $rowjew[0];?>"><?php echo ucwords($rowjew[2]); ?><span class="caret"></span></a>
                							        <ul class="dropdown-menu">
                							<?php }  ?>
                                            <li> <a href="list.php?id=<?php echo $rowjew[0];?>&type=1" ><?php echo ucfirst(strtolower($rowjew1[2]))?></b></a></li>
                                                
                                            <?php if($i==$cnt){ echo '</ul></li>'; } ?>
                                            
                    					<?php } else  { ?>
                        						
                    						<?php if($i==1){ ?>
                    						
                    						    <li><a href="list.php?id=<?php echo $rowjew[0];?>&type=1" ><?php echo ucfirst(strtolower($rowjew[2]))?></b></a></li>
                    						
                    						<?php } ?>
                    						
                    					<?php } ?>
                						
                						<li class="divider"></li>
                						
                						<?php  
                						$i++;
                					}  ?>
                                <?php } ?>			 
                            </li>		
                	    </ul>
				    </li>
				</ul>
				<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
    			</li>
    				<li class="item-menu-mobile">
    					<a href ="sub_category.php?type=2">Apparel</a>
						<ul class="sub_menu">
						     <?php 
                		        $qryjew=mysql_query("SELECT * FROM `garments` where `Main_id`=1 or `Main_id`=3");     
                 		        while($rowjew=mysql_fetch_array($qryjew)){  ?>
                  	                <li><a href="list.php?id=<?php echo $rowjew[0];?>&type=2"><?php echo ucfirst($rowjew[2]); ?></a></li>
                                <?php } ?>
						        <!--<li><a href ="/list/36/?page=1">Indo Western</a> </li>-->
						</ul>
						<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>
					<li class="item-menu-mobile">
						<a href="contact_us.php">Contact Us</a>
					</li>
					<br>
				</ul>
			</nav>
		</div>
	</header>
	 
<style>
.list-1 {
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-flex-wrap: wrap;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
}
.list-1 li:first-child, .list-1 li:last-child {
    width: 50%;
}
.list-1 li {
    overflow: hidden;
    position: relative;
    width: 25%;
}
.list-1 img {
    width: 100%;
}
.list-1 li:first-child, .list-1 li:last-child {
    width: 50%;
}

@media (max-width: 767px)
{
.list-1 li {
    width: 100%;
}
.list-1 li:first-child, .list-1 li:last-child {
   width: 100%;
}

.item-slick1{
	height: 100px !important;
}

.slick-initialized .slick-slide{
	margin-top: 0 !important;
}

.slick1 .slick-slide .slick-initialized .slick-slider{
	margin-top: 0 !important;
}

.slick-list .draggable .slick-slide .slick-current .slick-active{
	margin-top: 0 !important;
}

.slick-slide{
	margin-top: 0 !important;
}

@media screen and (max-width:424px) {
  #mobileviewperfect {

height:150px;
}
}

</style>
<!-- <link rel="stylesheet" href="/static/css/site.css"> -->

