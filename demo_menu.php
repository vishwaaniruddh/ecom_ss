<?php











var_dump($_POST);




 return ; ?>
<script>

function addcart(actyp,btnid,customize=0)
{
    try
    {
    var qty=1;
    var pprice=0;
    var finalp=0;
    var deposit=0;
    var orgdeposit=0;
    var orgprice=0;
    var dt="";
    var retdt="";
    //if actyp 1 then its rent 2 is sale
    //alert("test");

var sizes=0;
//alert(sizes);
var typ=document.getElementById('typ').value;
var sizests=1;
if(typ==2){

    sizes=document.getElementById('sizes').value;
    if(sizes=="0")
    {
       sizests=0; 
    }
}
var product_id=document.getElementById('selectedproduct').value;

var url="";
if(actyp=="2")
{
//alert("ok1");
//qty=document.getElementById('saleqty').value;

qty=document.getElementById('adjust_qty').value;
   
pprice=fround(document.getElementById('prate').value,2);
finalp=document.getElementById('totamt').value;
deposit=0;
retdt="0000-00-00";
dt="0000-00-00";
orgdeposit=0;
orgprice=0;
url="addcart_process.php";
}
else
{
//alert("ok");
qty=document.getElementById('qty').value;
pprice=fround(document.getElementById('totamt2').value,2);
finalp=document.getElementById('totamtf').value;
    dt=document.getElementById('demo').value;
    retdt=document.getElementById('retdt').value;
    deposit=document.getElementById('deposit1').value;
    orgdeposit=document.getElementById('dep2').value;
//alert("qt"+qty);    
url="addcartrentprocess.php";
    
}
 //alert(product_id+'q '+qty);
 sizests =1;
 //console.log('qqq',qty,'size ',sizests)
 if(qty>0 & sizests==1)
 {
 var pgnm=document.getElementById('pgnm').value;

$.ajax({
   type: 'POST',    
url:url,
data:'typ='+typ+'&product_id='+product_id+'&qty='+qty+'&finalp='+finalp+'&pprice='+pprice+'&actyp='+actyp+'&dt='+dt+'&retdt='+retdt+'&deposit='+deposit+'&orgdeposit='+orgdeposit+'&sizes='+sizes+'&is_customized='+customize,
 beforeSend: function() {
    //document.getElementById(btnid).disabled = true;  
    //document.getElementById(btnid).innerHTML="Processing..";
    },
success: function(msg){
//alert(msg);
console.log('cartprocess ',msg);
//addincart();

if(msg==2)
{
    swal("You can change quantity in shopping bag");
    //document.getElementById(btnid).disabled = false; 
    //document.getElementById(btnid).innerHTML="Add To Cart";
}
else if(msg==1)
{
    // toastfunc();
    if(actyp=="1")
    {
        $('.popup1').hide();
        overlay1.appendTo(document.body).remove();
    }
    else
    {
        $('.popup3').hide();
        overlay3.appendTo(document.body).remove();
    }
   
    // document.getElementById(btnid).disabled = false;  
    // document.getElementById(btnid).innerHTML="Add To Cart";
     
if(pgnm=="1")
{
    funcs('','');
}else
{
window.location.reload();

}

}
else if(msg==50)
{
    
    swal("Sorry your session has been expired");
    window.open("logout.php","_self");
}
else{
swal("Error please try again after some time");
// document.getElementById(btnid).disabled = false;
// document.getElementById(btnid).innerHTML="Add To Cart";
}
  //document.getElementById('show').innerHTML=msg;
         }
    });
     
 }else
 {
     if(qty==0){
     swal("NO Quantity");
     }else if(sizests==0){
          swal("Please select size!!");
         
     }
 }

    }catch(ex)
    {
        
        //alert(ex);
    }

     
}



   function verify1()
    {
    
    var cd=document.getElementById('cd1').value;
    var email=document.getElementById('em1').value;
    //alert(cd);
    //alert(email);
    $.ajax({
       type: 'POST',    
    url:'../verification.php',
    data:'email='+email+'&cd='+cd,
    
    success: function(msg){
    //alert("check");
    //alert(msg);
    if(msg==1)
    {
    alert("Verification successfull! Login to Continue ..");
    window.open("my-account.php",'_self');
    }
    else
    {
    alert("Verification code is incorrect");
    }
    
    
             }
         });
    }
    
    
    function final_addtocart(sku,qty,pprice,slecprdid,actyp,btnid)
{
        var dt="";
        var retdt="";
        var product_id=slecprdid; 
      

      
        // console.log(product_id+'actyp='+actyp+'qty'+qty+'pprice'+pprice);

        $.ajax({
            type: 'POST',
            url:'checkifqtyavailonaddtocart.php',
            data:'sku='+sku+'&qtyselc='+qty+'&selpr='+product_id+'&dt='+dt+'&retdt='+retdt+'&typ='+actyp+'&transtyp='+actyp+'&pprice='+pprice,
            success: function(msg){
                
                console.log('msg'+msg);
            if(msg!="")
            
            {
                if(parseInt(msg)>0)
                {
                    alert("Product added to cart Succesfully !");

    
                } else
                {
                    alert('No Qunatity Available');

                }
            }
            
            }
            });
        
   
    }


</script><!DOCTYPE html>
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
							<input type="text" class="topbar  s-text7 bg6 w-full" name="search" placeholder="Search.." value="">
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
                                		                                						    <li>
                            							    <a href="sub_category.php?type=1&cid=1">Necklace Sets<span class="caret"></span></a>
                            							    <ul class="dropdown-menu">
                            							                                                            <li> <a href="list.php?id=2&type=1" >American diamond</b></a></li>
                                                            
                                                                                    						                            						<li class="divider"></li>
                            						                                                            <li> <a href="list.php?id=1&type=1" >Antique</b></a></li>
                                                            
                                                                                    						                            						<li class="divider"></li>
                            						                                                            <li> <a href="list.php?id=6&type=1" >Imitation</b></a></li>
                                                            
                                                                                    						                            						<li class="divider"></li>
                            						                                                            <li> <a href="list.php?id=3&type=1" >Kundan</b></a></li>
                                                            
                                                                                    						                            						<li class="divider"></li>
                            						                                                            <li> <a href="list.php?id=68&type=1" >South indian set</b></a></li>
                                                            
                                                                                    						                            						<li class="divider"></li>
                            						                                                            <li> <a href="list.php?id=4&type=1" >Vilandi / polki</b></a></li>
                                                            
                                                        </ul></li>                            						                            						<li class="divider"></li>
                            						                                			                                						
                                						                                						    <li><a href="list.php?id=57&type=1" >Damini / mathapatti</b></a></li>
                                						                            						
                            						                            						<li class="divider"></li>
                            						                                			                                						
                                						                                						    <li><a href="list.php?id=53&type=1" >Borlas</b></a></li>
                                						                            						
                            						                            						<li class="divider"></li>
                            						                                			                            						    <li>
                            							    <a href="sub_category.php?type=1&cid=17">Earrings<span class="caret"></span></a>
                            							    <ul class="dropdown-menu">
                            							                                                            <li> <a href="list.php?id=77&type=1" >Antique</b></a></li>
                                                            
                                                                                    						                            						<li class="divider"></li>
                            						                                                            <li> <a href="list.php?id=74&type=1" >Diamond</b></a></li>
                                                            
                                                                                    						                            						<li class="divider"></li>
                            						                                                            <li> <a href="list.php?id=59&type=1" >Earrings</b></a></li>
                                                            
                                                                                    						                            						<li class="divider"></li>
                            						                                                            <li> <a href="list.php?id=78&type=1" >Imitation</b></a></li>
                                                            
                                                                                    						                            						<li class="divider"></li>
                            						                                                            <li> <a href="list.php?id=75&type=1" >Kundan</b></a></li>
                                                            
                                                                                    						                            						<li class="divider"></li>
                            						                                                            <li> <a href="list.php?id=79&type=1" >Oxidized</b></a></li>
                                                            
                                                                                    						                            						<li class="divider"></li>
                            						                                                            <li> <a href="list.php?id=76&type=1" >Vilandi</b></a></li>
                                                            
                                                        </ul></li>                            						                            						<li class="divider"></li>
                            						                                			                                						
                                						                                						    <li><a href="list.php?id=56&type=1" >Kamar patta</b></a></li>
                                						                            						
                            						                            						<li class="divider"></li>
                            						                                			                                						
                                						                                						    <li><a href="list.php?id=63&type=1" >Tikka</b></a></li>
                                						                            						
                            						                            						<li class="divider"></li>
                            						                                			                                						
                                						                                						    <li><a href="list.php?id=65&type=1" >Payal/pag pan</b></a></li>
                                						                            						
                            						                            						<li class="divider"></li>
                            						                                			                                						
                                						                                						    <li><a href="list.php?id=66&type=1" >Bangles</b></a></li>
                                						                            						
                            						                            						<li class="divider"></li>
                            						                                			                                						
                                						                                						    <li><a href="list.php?id=67&type=1" >Bracelet</b></a></li>
                                						                            						
                            						                            						<li class="divider"></li>
                            						                                			                                						
                                						                                						    <li><a href="list.php?id=69&type=1" >Hath phool</b></a></li>
                                						                            						
                            						                            						<li class="divider"></li>
                            						                                			                                						
                                						                                						    <li><a href="list.php?id=70&type=1" >Pendant set</b></a></li>
                                						                            						
                            						                            						<li class="divider"></li>
                            						                                			                                						
                                						                                						    <li><a href="list.php?id=71&type=1" >Baju bandh</b></a></li>
                                						                            						
                            						                            						<li class="divider"></li>
                            						                                			                                						
                                						                                						    <li><a href="list.php?id=72&type=1" >Mala</b></a></li>
                                						                            						
                            						                            						<li class="divider"></li>
                            						                                			                                						
                                						                                						    <li><a href="list.php?id=73&type=1" >Hair accessories</b></a></li>
                                						                            						
                            						                            						<li class="divider"></li>
                            						                                						 
                            		    </li>		
                            	    </ul>
							    </li>
							    <li>
								    <a href ="sub_category.php?type=2">Apparel</a>
									<ul class="sub_menu"> 
									                              	                <li><a href="list.php?id=10&type=2">LEHENGA CHOLI</a></li>
                                                                  	                <li><a href="list.php?id=28&type=2">Indo Western Outfits</a></li>
                                                                  	                <li><a href="list.php?id=22&type=2">Evening Gowns</a></li>
                                                                  	                <li><a href="list.php?id=29&type=2">Trail Gowns / Infinity Gowns</a></li>
                                                                  	                <li><a href="list.php?id=30&type=2">Mask</a></li>
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
								    							    <ul class="sub_menu" >
        								<li><a href="signup.php">Signup</a></li>
        								<li><a href="login.php">Login</a></li>
        							</ul>
        					</li>
						</ul>
					 <br>
    			</nav>
				<span class="linedivide1"></span>
		        <div class="header-wrapicon2">
			  
					<a href="cart1.php" class="cart_anchor">
						<img src=" static/images/site/cart_image/cart.jpg" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span id="cartCount" class="header-icons-noti">0</span>
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
                                                						        <li>
                							        <a href="sub_category.php?type=1&cid=1">Necklace Sets<span class="caret"></span></a>
                							        <ul class="dropdown-menu">
                							                                            <li> <a href="list.php?id=1&type=1" >American diamond</b></a></li>
                                                
                                                                                        
                    					                						
                						<li class="divider"></li>
                						
                						                                            <li> <a href="list.php?id=1&type=1" >Antique</b></a></li>
                                                
                                                                                        
                    					                						
                						<li class="divider"></li>
                						
                						                                            <li> <a href="list.php?id=1&type=1" >Imitation</b></a></li>
                                                
                                                                                        
                    					                						
                						<li class="divider"></li>
                						
                						                                            <li> <a href="list.php?id=1&type=1" >Kundan</b></a></li>
                                                
                                                                                        
                    					                						
                						<li class="divider"></li>
                						
                						                                            <li> <a href="list.php?id=1&type=1" >South indian set</b></a></li>
                                                
                                                                                        
                    					                						
                						<li class="divider"></li>
                						
                						                                            <li> <a href="list.php?id=1&type=1" >Vilandi / polki</b></a></li>
                                                
                                            </ul></li>                                            
                    					                						
                						<li class="divider"></li>
                						
                						                                                        						
                    						                    						
                    						    <li><a href="list.php?id=14&type=1" >Damini / mathapatti</b></a></li>
                    						
                    						                    						
                    					                						
                						<li class="divider"></li>
                						
                						                                                        						
                    						                    						
                    						    <li><a href="list.php?id=11&type=1" >Borlas</b></a></li>
                    						
                    						                    						
                    					                						
                						<li class="divider"></li>
                						
                						                                                						        <li>
                							        <a href="sub_category.php?type=1&cid=17">Earrings<span class="caret"></span></a>
                							        <ul class="dropdown-menu">
                							                                            <li> <a href="list.php?id=17&type=1" >Antique</b></a></li>
                                                
                                                                                        
                    					                						
                						<li class="divider"></li>
                						
                						                                            <li> <a href="list.php?id=17&type=1" >Diamond</b></a></li>
                                                
                                                                                        
                    					                						
                						<li class="divider"></li>
                						
                						                                            <li> <a href="list.php?id=17&type=1" >Earrings</b></a></li>
                                                
                                                                                        
                    					                						
                						<li class="divider"></li>
                						
                						                                            <li> <a href="list.php?id=17&type=1" >Imitation</b></a></li>
                                                
                                                                                        
                    					                						
                						<li class="divider"></li>
                						
                						                                            <li> <a href="list.php?id=17&type=1" >Kundan</b></a></li>
                                                
                                                                                        
                    					                						
                						<li class="divider"></li>
                						
                						                                            <li> <a href="list.php?id=17&type=1" >Oxidized</b></a></li>
                                                
                                                                                        
                    					                						
                						<li class="divider"></li>
                						
                						                                            <li> <a href="list.php?id=17&type=1" >Vilandi</b></a></li>
                                                
                                            </ul></li>                                            
                    					                						
                						<li class="divider"></li>
                						
                						                                                        						
                    						                    						
                    						    <li><a href="list.php?id=15&type=1" >Kamar patta</b></a></li>
                    						
                    						                    						
                    					                						
                						<li class="divider"></li>
                						
                						                                                        						
                    						                    						
                    						    <li><a href="list.php?id=19&type=1" >Tikka</b></a></li>
                    						
                    						                    						
                    					                						
                						<li class="divider"></li>
                						
                						                                                        						
                    						                    						
                    						    <li><a href="list.php?id=20&type=1" >Payal/pag pan</b></a></li>
                    						
                    						                    						
                    					                						
                						<li class="divider"></li>
                						
                						                                                        						
                    						                    						
                    						    <li><a href="list.php?id=21&type=1" >Bangles</b></a></li>
                    						
                    						                    						
                    					                						
                						<li class="divider"></li>
                						
                						                                                        						
                    						                    						
                    						    <li><a href="list.php?id=22&type=1" >Bracelet</b></a></li>
                    						
                    						                    						
                    					                						
                						<li class="divider"></li>
                						
                						                                                        						
                    						                    						
                    						    <li><a href="list.php?id=23&type=1" >Hath phool</b></a></li>
                    						
                    						                    						
                    					                						
                						<li class="divider"></li>
                						
                						                                                        						
                    						                    						
                    						    <li><a href="list.php?id=24&type=1" >Pendant set</b></a></li>
                    						
                    						                    						
                    					                						
                						<li class="divider"></li>
                						
                						                                                        						
                    						                    						
                    						    <li><a href="list.php?id=25&type=1" >Baju bandh</b></a></li>
                    						
                    						                    						
                    					                						
                						<li class="divider"></li>
                						
                						                                                        						
                    						                    						
                    						    <li><a href="list.php?id=26&type=1" >Mala</b></a></li>
                    						
                    						                    						
                    					                						
                						<li class="divider"></li>
                						
                						                                                        						
                    						                    						
                    						    <li><a href="list.php?id=27&type=1" >Hair accessories</b></a></li>
                    						
                    						                    						
                    					                						
                						<li class="divider"></li>
                						
                						                                			 
                            </li>		
                	    </ul>
				    </li>
				</ul>
				<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
    			</li>
    				<li class="item-menu-mobile">
    					<a href ="sub_category.php?type=2">Apparel</a>
						<ul class="sub_menu">
						                       	                <li><a href="list.php?id=10&type=2">LEHENGA CHOLI</a></li>
                                                  	                <li><a href="list.php?id=28&type=2">Indo Western Outfits</a></li>
                                                  	                <li><a href="list.php?id=22&type=2">Evening Gowns</a></li>
                                                  	                <li><a href="list.php?id=29&type=2">Trail Gowns / Infinity Gowns</a></li>
                                                  	                <li><a href="list.php?id=30&type=2">Mask</a></li>
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

	<div id="mobileviewperfect" style=""> </div>	
	<div class="wrap-slick1" style="margin-top: -80px;">			
		<div class="slick1">
		                        <div class="" style="background-image: url(static/images/site/banner/slide4.png);max-width: 100%;background-size:cover;background-position:center;background-repeat:no-repeat;height: 450px;margin-top: 80px;">
                        <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-500">
        				    <div class="xl-text1 title" style="font-size:40px;color:white;display: none;"><b>NEW ARRIVALS</b></div>
        					<a href="contact_us.php">
        				        <input type="button" class="flex-c-m bg1 bo-rad-23 hov1 s-text1 trans-0-4"  value="Shop now" id="fade" style=" width:120px;height:30px;" />
        			        </a>
    				    </div>
    			    </div>
                                    <div class="" style="background-image: url(static/images/site/banner/slide01.png);max-width: 100%;background-size:cover;background-position:center;background-repeat:no-repeat;height: 450px;margin-top: 80px;">
                        <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-500">
        				    <div class="xl-text1 title" style="font-size:40px;color:white;display: none;"><b>NEW ARRIVALS</b></div>
        					<a href="contact_us.php">
        				        <input type="button" class="flex-c-m bg1 bo-rad-23 hov1 s-text1 trans-0-4"  value="Shop now" id="fade" style=" width:120px;height:30px;" />
        			        </a>
    				    </div>
    			    </div>
                                    <div class="" style="background-image: url(static/images/site/banner/slide2.png);max-width: 100%;background-size:cover;background-position:center;background-repeat:no-repeat;height: 450px;margin-top: 80px;">
                        <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-500">
        				    <div class="xl-text1 title" style="font-size:40px;color:white;display: none;"><b>NEW ARRIVALS</b></div>
        					<a href="contact_us.php">
        				        <input type="button" class="flex-c-m bg1 bo-rad-23 hov1 s-text1 trans-0-4"  value="Shop now" id="fade" style=" width:120px;height:30px;" />
        			        </a>
    				    </div>
    			    </div>
                                    <div class="" style="background-image: url(static/images/site/banner/slide5.png);max-width: 100%;background-size:cover;background-position:center;background-repeat:no-repeat;height: 450px;margin-top: 80px;">
                        <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-500">
        				    <div class="xl-text1 title" style="font-size:40px;color:white;display: none;"><b>NEW ARRIVALS</b></div>
        					<a href="contact_us.php">
        				        <input type="button" class="flex-c-m bg1 bo-rad-23 hov1 s-text1 trans-0-4"  value="Shop now" id="fade" style=" width:120px;height:30px;" />
        			        </a>
    				    </div>
    			    </div>
                                    <div class="" style="background-image: url(static/images/site/banner/slide7.png);max-width: 100%;background-size:cover;background-position:center;background-repeat:no-repeat;height: 450px;margin-top: 80px;">
                        <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-500">
        				    <div class="xl-text1 title" style="font-size:40px;color:white;display: none;"><b>NEW ARRIVALS</b></div>
        					<a href="contact_us.php">
        				        <input type="button" class="flex-c-m bg1 bo-rad-23 hov1 s-text1 trans-0-4"  value="Shop now" id="fade" style=" width:120px;height:30px;" />
        			        </a>
    				    </div>
    			    </div>
                                    <div class="" style="background-image: url(static/images/site/banner/slide3.png);max-width: 100%;background-size:cover;background-position:center;background-repeat:no-repeat;height: 450px;margin-top: 80px;">
                        <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-500">
        				    <div class="xl-text1 title" style="font-size:40px;color:white;display: none;"><b>NEW ARRIVALS</b></div>
        					<a href="contact_us.php">
        				        <input type="button" class="flex-c-m bg1 bo-rad-23 hov1 s-text1 trans-0-4"  value="Shop now" id="fade" style=" width:120px;height:30px;" />
        			        </a>
    				    </div>
    			    </div>
                                    <div class="" style="background-image: url(static/images/site/banner/slide6.png);max-width: 100%;background-size:cover;background-position:center;background-repeat:no-repeat;height: 450px;margin-top: 80px;">
                        <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-500">
        				    <div class="xl-text1 title" style="font-size:40px;color:white;display: none;"><b>NEW ARRIVALS</b></div>
        					<a href="contact_us.php">
        				        <input type="button" class="flex-c-m bg1 bo-rad-23 hov1 s-text1 trans-0-4"  value="Shop now" id="fade" style=" width:120px;height:30px;" />
        			        </a>
    				    </div>
    			    </div>
                                    <div class="" style="background-image: url(static/images/site/banner/slide02.png);max-width: 100%;background-size:cover;background-position:center;background-repeat:no-repeat;height: 450px;margin-top: 80px;">
                        <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-500">
        				    <div class="xl-text1 title" style="font-size:40px;color:white;display: none;"><b>NEW ARRIVALS</b></div>
        					<a href="contact_us.php">
        				        <input type="button" class="flex-c-m bg1 bo-rad-23 hov1 s-text1 trans-0-4"  value="Shop now" id="fade" style=" width:120px;height:30px;" />
        			        </a>
    				    </div>
    			    </div>
                        </div>
    </div>
    <!--End Of Main Slider -->
    <!-- dUMMY dATA -->
    <section class="blog bgwhite p-t-94 p-b-65">
        <div>
			<div class="sec-title p-b-52">
				<h3 class="m-text5 t-center">
					Collections
				</h3>
			</div>
			<div class="row">
				<ul class="list-1">
				    <li>
				       <a class="hov-img-zoom" href="list.php"> <img alt="" src="static/images/site/grid_images/bracelet.png"></a>
				    </li>
				    <li>
				        <a class="hov-img-zoom" href="list.php"> <img alt="" src="static/images/site/grid_images/lehenga.png"></a>       
				    </li>
				    <li>
				        <a class="hov-img-zoom" href="list.php"> <img alt="" src="static/images/site/grid_images/mang_tikkas.png"></a>   
				    </li>
				    <li>
				        <a class="hov-img-zoom" href="list.php"> <img alt="" src="static/images/site/grid_images/borla.png"></a>       
				    </li>
				    <li>
				        <a class="hov-img-zoom" href="list.php"> <img alt="" src="static/images/site/grid_images/bangles.png"></a>        
				    </li>
				    <li>
				        <a class="hov-img-zoom" href="list.php"> <img alt="" src="static/images/site/grid_images/hath_phool.png"></a>        
				    </li>
				</ul>		
			</div>
        </div>
    </section>
    <!-- Dummy Data -->

    <!-- End of Categories -->
    
    <!-- Start Product Section  -->
    	
    <!-- End of Product Section  -->
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
