<?php session_start();
include('config.php');
include('functions.php');

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
    
    	<link rel="stylesheet" type="text/css" href="static/css/bootstrap.min.css"> 
    
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
      
    </head>
    
    <!-- jQuery -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
crossorigin="anonymous"></script>

<!-- Bootstrap files (jQuery first, then Popper.js, then Bootstrap JS) -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" type="text/javascript"></script>


<script type="text/javascript">
/// some script

// jquery ready start
$(document).ready(function() {
	// jQuery code

	//////////////////////// Prevent closing from click inside dropdown
    $(document).on('hover', '.dropdown-menu', function (e) {
      e.stopPropagation();
    });

    // make it as accordion for smaller screens
    if ($(window).width() < 992) {
	  	$('.dropdown-menu a').click(function(e){
	  		e.preventDefault();
	        if($(this).next('.submenu').length){
	        	$(this).next('.submenu').toggle();
	        }
	        $('.dropdown').on('hide.bs.dropdown', function () {
			   $(this).find('.submenu').hide();
			})
	  	});
	}
	
}); // jquery end
</script>

<style type="text/css">
	@media (min-width: 992px){
		.dropdown-menu .dropdown-toggle:after{
			border-top: .3em solid transparent;
		    border-right: 0;
		    border-bottom: .3em solid transparent;
		    border-left: .3em solid;
		}

		.dropdown-menu .dropdown-menu{
			margin-left:0; margin-right: 0;
		}

		.dropdown-menu li{
			position: relative;
		}
		.nav-item .submenu{ 
			display: none;
			position: absolute;
			left:100%; top:-7px;
		}
		.nav-item .submenu-left{ 
			right:100%; left:auto;
		}

		.dropdown-menu > li:hover{ background-color: #f1f1f1 }
		.dropdown-menu > li:hover > .submenu{
			display: block;
		}
	}
</style>
    
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
    
    <?php include('js_functions.php');?>
    
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
					<span style="font-size: 20px;font-weight: 700;color: #888888;"> <img src="assets/truck.png" style="height: 32px; "> Free Shipping To And Fro </span>
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
    			    <img  src="static/images/site/logo/main_logo.png" alt="Avatar" /> 
    			</a>
    			
    			
    			
    			
    			
    			<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="main_nav">

<ul class="navbar-nav">
    
    
	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href ="sub_category.php?type=2" data-toggle="dropdown">  Apparel  </a>
            <ul class="dropdown-menu">
						    <?php 
	        $qryjew=mysql_query("SELECT * FROM `garments` where `Main_id`=1 or `Main_id`=3");     
 	        while($rowjew=mysql_fetch_array($qryjew)){  ?>
                  <li><a class="dropdown-item" href="list.php?id=<?php echo $rowjew[0];?>&type=2"><?php echo ucfirst(strtolower($rowjew[2])); ?></a></li>
            <?php } ?>

            </ul>
            
    </li>
								

	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">  Jewellery  </a>
	    <ul class="dropdown-menu">
  <?php  $qryjew = mysql_query("SELECT * FROM `jewel_subcat` where mcat_id=1 or mcat_id=3");     
                                			
                                		    while($rowjew=mysql_fetch_array($qryjew)) {  
                                				$qryjew1=mysql_query("select * from subcat1  where maincat_id='$rowjew[0]' and status=1 order by name");
                                				
                                				$cnt = mysql_num_rows($qryjew1); 	
                            					$i = 1;
                            					while($rowjew1=mysql_fetch_row($qryjew1)) { 
                            						 
                            						if($cnt >1){ 
                            						    if($i==1){ ?>
                            						    <li>
                            							    <a class="dropdown-item" href="#"><?php echo ucwords($rowjew[2]); ?> &raquo </span></a>
                            							    <ul class="submenu dropdown-menu">
                            							<?php }  ?>
                                                            <li> <a class="dropdown-item" href="list.php?id=<?php echo $rowjew1[0];?>&type=1" ><?php echo ucwords(strtolower($rowjew1[2]))?></b></a></li>
                                                            
                                                        <?php if($i==$cnt){?>
                                                        
                                                            <li>
                                                                <!--<a href="sub_category.php?type=1&cid=<?php echo $rowjew[0];?>"><?php echo ucwords($rowjew[2]); ?></span></a>-->
                                                                <a class="dropdown-item" href="list.php?id=0&viewall=<?php echo $rowjew1[0];?>&type=1" >View All</a></li>
                                                        <?php echo '</ul></li>';} ?>
                            						<?php } else  { ?>
                                						
                                						<?php if($i==1){ ?>
                                						    <li><a class="dropdown-item" href="list.php?id=<?php echo $rowjew1[0];?>&type=1" ><?php echo ucfirst(strtolower($rowjew[2]))?></b></a></li>
                                						<?php } ?>
                            						
                            						<?php } ?>

                            						<?php  
                            						$i++;
                            					}  ?>
                                			<?php } ?>
	    </ul>
	</li>
	
</ul>


  </div> <!-- navbar-collapse.// -->

</nav>
    			
    			
    			
    			
    			
    			
			    
			    
			    
			    
			    
			    
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
        								<li><a href="account/my-account.php">Profile</a></li>
        								<li><a href="wishlist">Wishlist</a></li>
        								<li><a href="account/orders.php">Orders</a></li>
        								<li><a href="logout.php">Logout</a></li>
    								</ul>
								<?php } else { ?>
    							    <ul class="sub_menu" >
        								<li><a href="account/my-account.php">Signup</a></li>
        								<li><a href="account/my-account.php">Login</a></li>
        							</ul>
        					    </li>
						</ul>
					<?php } ?> <br>
    			</nav>
				<span class="linedivide1"></span>
		        <div class="header-wrapicon2">
					<a href="cart.php" class="cart_anchor">
						<img src="static/images/site/cart_image/cart.jpg" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span id="cartCount" class="header-icons-noti"><?php echo get_cart_count($userid); ?></span>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="wrap_header_mobile">
		<!-- Logo moblie -->
		<!-- <a href="index.html" class="logo-mobile">
			<img src="images/dummy_logo.png" alt="IMG-LOGO">
		</a> -->
		<a href="#" class="logo-mobile">
			<img src="static/images/site/logo/main_logo.png" alt="IMG-LOGO">
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
								<li><a href="account/my-account.php">Login</a></li>
								<li><a href="account/my-account.php">Signup</a></li>
							</ul>
						</li>
					</ul>
				</nav>

				<span class="linedivide2"></span>
				<div class="header-wrapicon2">
					<!-- <img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON"> -->
					  
					<a href="cart.php">
						<img src="static/images/site/cart_image/cart.jpg" class="header-icon1 js-show-header-dropdown" alt="ICON">
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
								<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
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


<script>
    $('li').each(function(){
if($(this).html() == "" || typeof($(this).html())=="undefined")
{
    $(this).remove
}
})
</script>















<style>
    @media only screen and (max-width: 600px) {
          .item-menu-mobile{
              background-color:white;
          }
          .side-menu .main-menu > li > a{
              color:black;
          }
          
}

    
</style>


<style>
body {margin:0;font-family:Arial}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon {
  display: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 17px;    
  border: none;
  outline: none;
  color: black;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.topnav a:hover, .dropdown:hover .dropbtn {
  background-color: #555;
  color: white;
}

.dropdown-content a:hover {
  background-color: #ddd;
  color: black;
}

.dropdown:hover .dropdown-content {
  display: block;
}


  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}
</style>













































	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					GET IN TOUCH
				</h4>

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
						Mobile No :
						<a href="tel:+919324243011" class="Blondie">09324243011</a> /
						<a href="tel:+917400413163" class="Blondie">07400413163</a>
						
						  
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
								<a href="sub-category.php?page=2" class="s-text7">
									Jewellery
								</a>
							</li>
						
							<li class="p-b-9">
								<a href="sub-category.php?page=1" class="s-text7">
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
						<a href="user-profile.php" class="s-text7">
							Profile
						</a>
					</li>
	
					<li class="p-b-9">
						<a href="my-orders.php" class="s-text7">
							Orders 
						</a>
					</li>

					<li class="p-b-9">
						<a href="wishlist.php" class="s-text7">
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
						<a href="Shipping,Cancellation&amp;Returns.php" class="s-text7">
							Shipping
						</a>
					</li>

					<li class="p-b-9">
						<a href="Shipping,Cancellation&amp;Returns.php" class="s-text7">
							Cancellation
						</a>
					</li>

					<li class="p-b-9">
						<a href="Shipping,Cancellation&amp;Returns.php" class="s-text7">
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
        
        	 <a style="text-decoration: none;" href="terms-of-use.php">TERMS OF USE</a> &nbsp;
    	
        	 | &nbsp;<a style="text-decoration: none;" href="privacy-policy.php"> PRIVACY POLICY  </a>&nbsp; 
    	
        	 | &nbsp;<a style="text-decoration: none;" href="about-us.php">ABOUT US </a>&nbsp; 
    	
        	 | <a style="text-decoration: none;" href="enquiry.php">&nbsp;ENQUIRY</a>&nbsp; 
    	
        	 | <a style="text-decoration: none;" href="faqs.php">&nbsp;FAQs</a>&nbsp;
	        
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
	
	<!--<script type="text/javascript" src="static/css/vendor/jquery/jquery-3.2.1.min.js"></script>-->

	<script type="text/javascript" src="static/css/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="http://sarmicrosystems.in/srishringarr/web/static/css/vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="static/css/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
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
	
	<script src='static/js/validation.js'></script>
	
	<script src='static/js/site.js'></script>
	
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script>

$(document).ready(function(){


	$(".title").fadeIn(1000);
	// $("#fade").hide();
	
// 	$(function(){
//     if (window.matchMedia("(min-width:1366px)").matches) {
//         $('#mobileviewperfect').remove();
//     }
// });
// $(document).ready(function(){
// 	console.clear();
// });
// $(window).resize(function(){

//        if ($(window).width() <= 424) {  
//        		$('#mobileviewperfect').show();

//        }
//        else{
//        		$('#mobileviewperfect').hide();
//        }     

});

</script>

</body>
</html>