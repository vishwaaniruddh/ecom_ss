<?php session_start();
include('config.php');
include('functions.php');
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!--<meta name="keywords" content="htmlcss bootstrap menu, navbar, mega menu examples" />-->
<!--<meta name="description" content="Navigation  menu with submenu examples for any type of project, Bootstrap 4" />  -->
	<!--<title>Sri Shringarr</title>-->
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

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://sarmicrosystems.in/srishringarr/web/static/css/vendor/bootstrap/js/popper.js"></script>
<!-- Bootstrap files (jQuery first, then Popper.js, then Bootstrap JS) -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    	
        <!--<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>-->
        <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/latest/css/bootstrap.css">
        <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css">


        <script src="requiredfunctions.js"></script>
<script type="text/javascript">
/// some script

// jquery ready start
$(document).ready(function() {
	// jQuery code

	//////////////////////// Prevent closing from click inside dropdown
    $(document).on('click', '.dropdown-menu', function (e) {
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
	
	
	$(".dropdown-menu li a").on("click",function(){
    var href = $(this).attr('href');
    
    if(href != '#'){
        window.location = 'https://srishringarr.com/'+href;
    }
})



	
}); // jquery end
</script>

<style type="text/css">

.cart_anchor{
    position:relative;
}
.header-icons-noti{
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 18px;
    height: 18px;
    border-radius: 50%;
    background-color: #111111;
    color: white;
    font-family: Montserrat-Medium;
    font-size: 12px;
    position: absolute;
    top: -15px;
    right: -19px;
}




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
    
</head>
<body class="bg-light">
    
<!-- ========================= SECTION CONTENT ========================= -->

<style>
@media (min-width: 992px){
.navbar-expand-lg {
    -ms-flex-flow: row nowrap;
    flex-flow: row nowrap;
    -ms-flex-pack: start;
    justify-content: center;
}    

.navbar-nav{
        width: 100%;
    display: flex;
    justify-content: center;
}
}

    .custom_fluid{
        display: flex;
    justify-content: center;
    margin: auto;
    }
    
    @media (min-width: 768px){
    .cust_logo{
        width:30%;
    }        
    nav.navbar{
        width:50%;
    }
    .header-icons{
            width: 20%;
        }
                    #web{
        position: sticky;
    top: 0;
    z-index: 1000;
    }


        #mobile{
            display:none;
        }
                #web{
background: white;
    padding-left: 2%;
    padding-right: 2%;
    display: flex;
        }
        .navbar-expand-lg{
                /*flex-flow: column;*/
        }
        .free_shipping_quotes{
        font-size: 20px;            
        }

    }
    
        @media (max-width: 768px){

        #web{
            display:none;
        }

        #mobile{
    display: flex;
    justify-content: space-between;
        background: white;
        }
        .nav-item{
            padding-left: 1%;
        }
        .nav-link{
            color: black;
        }
        .navbar-toggler{
background-color: white;
    border: 1px solid;
        }
        .topbar-social{
    padding-left: 15px;
    width: 80%;
        }
        .p-r-20{
                padding-right: 10px;
        }
        .topbar-child2{
            padding-right: 0;
    width: 20%;
        }
        .free_shipping_quotes{
            font-size:12px;
        }
        .collapse.show {
    display: block;
    width: 100%;
    padding: 1%;
    background: white;
    border: 1px solid #f8f9fa;
}
    }
    
    .navbar-expand-lg .navbar-nav .nav-link{
        color:black;
    }
    
    .wrap-slick1{
        z-index:-1;
    }

.dropdown-item{
        padding: 0.05rem 1.5rem;
}
</style>

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
        height:10%;
    }
}


</style>


<div class="topbar">
			    			    <div class="topbar-social" style="width: 80%;">
					<a href="https://www.facebook.com/srishringarr/" target="_blank" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
					<a href="https://www.instagram.com/srishringarr/" target="_blank" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
					<!-- <a href="https://plus.google.com/u/1/113103807414319162517" target="_blank" class="fs-18 color1 p-r-20 fa social_googleplus"></a> -->
					<a href="https://twitter.com/SriShringarr" target="_blank" class="fs-18 color1 p-r-20 fa social_twitter"></a>
					<a href="https://in.pinterest.com/srishringarr/?eq=sri&amp;etslf=5839" target="_blank" class="fs-18 color1 p-r-20 fa social_pinterest"></a>
					<p style="font-weight: 700;color: #888888; width: 100%; text-align: center;    margin: 0; "> <img src="assets/truck.png" style="height: 32px; "> <b class="free_shipping_quotes">Free Shipping To And Fro</b> </p>
				</div>
				<div class="topbar-child2">
					<form style="display:flex;" method="post" enctype="multipart/form-data" action="">
						<div class="topbar effect1 w-size9">
							<input type="text" class="topbar  s-text7 bg6 w-full" name="search" placeholder="Search.." value="">
							<span class="effect1-line"></span>
						</div>
						<input type="submit" class="search_btn" name="searchbtn" value="Search">
					</form>
		        </div> 
	        </div>
	        
	        
<div class="container-fluid custom_fluid" id="web">
    
    <div class="cust_logo">
        <a href="/">
            <img src="static/images/site/logo/main_logo.png" alt="Avatar"> 
        </a>
    </div>
    			
<nav class="navbar navbar-expand-lg">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="main_nav">

<ul class="navbar-nav">
    

	<li class="nav-item"><a href="index.php" class="nav-link" href="#"> Home </a></li>

	
	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href ="sub_category.php?type=2" data-toggle="dropdown">  Apparel  </a>
            <ul class="dropdown-menu">
						    <?php 
	        $qryjew=mysqli_query($con,"SELECT * FROM `garments` where `Main_id`=1 or `Main_id`=3");     
 	        while($rowjew=mysqli_fetch_array($qryjew)){  ?>
                  <li><a class="dropdown-item" href="list.php?id=<?php echo $rowjew[0];?>&type=2"><?php echo ucfirst(strtolower($rowjew[2])); ?></a></li>
            <?php } ?>

            </ul>
            
    </li>
								

	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">  Jewellery  </a>
	    <ul class="dropdown-menu">
  <?php  $qryjew = mysqli_query($con,"SELECT * FROM `jewel_subcat` where mcat_id=1 or mcat_id=3");     
                                			
                                		    while($rowjew=mysqli_fetch_array($qryjew)) {  
                                				$qryjew1=mysqli_query($con,"select * from subcat1  where maincat_id='$rowjew[0]' and status=1 order by name");
                                				
                                				$cnt = mysqli_num_rows($qryjew1); 	
                            					$i = 1;
                            					while($rowjew1=mysqli_fetch_row($qryjew1)) { 
                            						 
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
	
	<li class="nav-item"><a href="contact_us.php" class="nav-link" >Contact Us</a> </li>
	
</ul>


  </div> <!-- navbar-collapse.// -->

</nav>

<style>
    .cart_account img{
        height:30px;
        width:30px;
    }
    .cart_account div{
        margin:auto 0;
        /*width: 25%;*/
    }
</style>
                      
<div class="cart_account" style="display:flex;justify-content: space-around;width:20%;"> 

        <div class="">  
         
                <a class="dropbtn" href="account/my-account.php">

                    <? if($_SESSION['email']){
                          echo "<span>Hello," .  $_SESSION['fname'] ."</span>" ;   }
                    else{ 
                        echo  "<span>Login / Signup"  ."</span>" ;     
                    } ?> 
                    
                </a>
            </div>
    
    <div class="" id="cartshowid"></div>
    
<? if($_SESSION['email']){ ?>
       <div>
           <a href="logout.php" style="color:black;">Logout</a>
       </div> 
<? }?>

</div>


</div><!-- container //  -->



<div id="mobile">
    <div class="">
        <a href="/">
            <img src="static/images/site/logo/main_logo.png" alt="Avatar"> 
        </a>
    </div>    
    
    <nav class="navbar navbar-expand-lg" >




  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" style="    margin: auto;">
    <!--<span class="navbar-toggler-icon"></span>-->
    <img src="assets/menu.png" style="height: 20px; width: 20px;">
  </button>
</nav>


</div>


  <div class="collapse navbar-collapse" id="main_nav">

<ul class="navbar-nav">
    

	<li class="nav-item"><a href="index.php" class="nav-link" href="#"> Home </a></li>
	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href ="sub_category.php?type=2" data-toggle="dropdown">  Apparel  </a>
            <ul class="dropdown-menu">
						    <?php 
	        $qryjew=mysqli_query($con,"SELECT * FROM `garments` where `Main_id`=1 or `Main_id`=3");     
 	        while($rowjew=mysqli_fetch_array($qryjew)){  ?>
                  <li><a class="dropdown-item" href="list.php?id=<?php echo $rowjew[0];?>&type=2"><?php echo ucfirst(strtolower($rowjew[2])); ?></a></li>
            <?php } ?>

            </ul>
            
    </li>
								

	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">  Jewellery  </a>
	    <ul class="dropdown-menu">
  <?php  $qryjew = mysqli_query($con,"SELECT * FROM `jewel_subcat` where mcat_id=1 or mcat_id=3");     
                                			
                                		    while($rowjew=mysqli_fetch_array($qryjew)) {  
                                				$qryjew1=mysqli_query($con,"select * from subcat1  where maincat_id='$rowjew[0]' and status=1 order by name");
                                				
                                				$cnt = mysqli_num_rows($qryjew1); 	
                            					$i = 1;
                            					while($rowjew1=mysqli_fetch_row($qryjew1)) { 
                            						 
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
                                                        <?php echo '</ul>';} ?>
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
		<li class="nav-item"><a href="contact_us.php" class="nav-link" >Contact Us</a> </li>
	
</ul>


  </div> <!-- navbar-collapse.// -->

<?
// var_dump($_SESSION);
?>
    