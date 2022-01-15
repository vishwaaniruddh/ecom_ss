<?php include('header.php');

$directory = 'static/images/site/banner/';
$opendir = opendir($directory);

?>
<title>Best Rental Wedding Outfits and Jewelry for Women|Sri Shringarr</title>
  <meta name="description" content="Don’t Repeat It,Rent It.Exclusive Designer Lehenga Choli,Jewellery,Bridal Lehengas,Evening Gowns,Indo-Western on Hire.Click now for an ultimate renting experience.">
  <meta name="keywords" content="Rent Wedding Wear, Bridal Lehengas on Rent, Hire Traditional Jewellery, Hire Wedding Clothes, Wedding Clothes on hire, Indian Bridal Wear, Indian Bridal Jewelry on Hire, Hand Embroidered Lehengas on Rent, Rental Clothes, Lehenga on Rent, Jewellery on Rent, Evening Gowns on Hire, Made In India">

	<div id="mobileviewperfect" style=""> </div>	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider.js" integrity="sha512-/LtMywMLXZ29TJbETec4e6ndSWPxQDTdsqCud+8Q4IFnKQ1WVlr87r0D5oo9QNO9zuqQNJDmvQxQmvqe8DRYLA==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/flexslider.css" integrity="sha512-HWY8i77pPLL23sU4pHj+5iuZEmmmu2YaiTUcWrBXqBRTpn6yUdDvlFGNmG0qyjDg/vpt+YWNMASjg9M0eOU9DA==" crossorigin="anonymous" />
<div class="flexslider">
  <ul class="slides">
    <?php while($file = readdir($opendir))
		    { 
    			if($file != '.' && $file != '..')
    			{ ?>
    			<li style="position:relative; height:450px;">
    			    <img src="<?php echo $directory.$file;?>" style="height:100%;object-fit:cover;; ">
                        <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15" style="position:absolute;top:10%;">
        				    <div class="xl-text1 title" ><b>NEW ARRIVALS</b></div>
        					<a href="contact_us.php">
        				        <input type="button" class="flex-c-m bg1 bo-rad-23 hov1 s-text1 trans-0-4"  value="Shop now" id="fade" style=" width:120px;height:30px;" />
        			        </a>
    				    </div>
    			</li>
                    
                <?php } 
            } ?>
            
    <li>
      <img src="slide1.jpg" />
    </li>

  </ul>
</div>



<script>
    // Can also be used with $(document).ready()
$(document).ready(function() {
    $('.flexslider').flexslider({
        animation: "slide"
});
});
</script>
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
				       <a class="hov-img-zoom" href="list.php?id=67&type=1"> <img alt="" src="static/images/site/grid_images/bracelet.png"></a>
				    </li>
				    <li>
				        <a class="hov-img-zoom" href="list.php?id=10&type=2"> <img alt="" src="static/images/site/grid_images/lehenga.png"></a>       
				    </li>
				    <li>
				        <a class="hov-img-zoom" href="list.php?id=63&type=1"> <img alt="" src="static/images/site/grid_images/mang_tikkas.png"></a>   
				    </li>
				    <li>
				        <a class="hov-img-zoom" href="list.php?id=53&type=1"> <img alt="" src="static/images/site/grid_images/borla.png"></a>       
				    </li>
				    <li>
				        <a class="hov-img-zoom" href="list.php?id=66&type=1"> <img alt="" src="static/images/site/grid_images/bangles.png"></a>        
				    </li>
				    <li>
				        <a class="hov-img-zoom" href="list.php?id=69&type=1"> <img alt="" src="static/images/site/grid_images/hath_phool.png"></a>        
				    </li>
				</ul>		
			</div>
        </div>
    </section>
    <!-- Dummy Data -->

    <!-- End of Categories -->
    
    <!-- Start Product Section  -->
    	
    <!-- End of Product Section  -->
<?php include('footer.php'); ?>

