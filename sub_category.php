<?php  
include('header.php');
 
//$path= "static/images/category/";

$path= "http://yosshitaneha.com/Admin/";
?> 

<div class="row m-t-20" >
    <?php
    if(isset($_GET['type']) && $_GET['type'] == 2){  
         
        $qry = "SELECT * FROM `garments` where `Main_id`=1 or `Main_id`=3";
        $qryjew=mysqli_query($con,$qry); 
        
    } else if(isset($_GET) & $_GET['type'] ==1 & !isset($_GET['cid'])) { 
        
        $qry = "SELECT * FROM `jewel_subcat` where mcat_id=1 or mcat_id=3";
        //echo '1'.$qry;
        
        $qryjew=mysqli_query($con,$qry); 
        
    } else if(isset($_GET) && $_GET['type'] == 1 & isset($_GET['cid'])) { 
        
        $cid = $_GET['cid'];
        $qry = "select * from subcat1  where maincat_id='".$cid."' and status=1 order by name";
        
        $qryjew=mysqli_query($con,"select * from subcat1  where maincat_id='".$cid."' and status=1 order by name");
        //echo '2'.$qry;
    } 
    
    while($rowjew=mysqli_fetch_assoc($qryjew)) { 
        
        

        $cid = '';
        $pathmain = '';
        
        if(isset($_GET['type']) & $_GET['type'] == 2) {
            $id = $rowjew['garment_id'];
            $pathmain = $rowjew['garments_image']; 
            $name = $rowjew['name'];
            $mainCatId = $rowjew['Main_id']; 
            
        } else if(isset($_GET['type']) & $_GET['type'] == 1 & !isset($_GET['cid'])){ 
            $id = $rowjew['subcat_id'];
            $pathmain = $rowjew['image'];
            $name =$rowjew['categories_name'];
            $mainCatId =$rowjew['mcat_id'];
            
            $qryjew1=mysqli_query($con,"select * from subcat1  where maincat_id='".$id."' order by name");
		    $subcategory = mysqli_fetch_assoc($qryjew1);
		    $cnt = mysqli_num_rows($qryjew1);
		    
		    //echo "select * from subcat1  where maincat_id='$id' order by name".$cnt;
		    $subcatId = $subcategory['subcat_id'];
	        $main_catId = $subcategory['maincat_id'];
            
        } else if(isset($_GET['type']) & $_GET['type'] == 1 & isset($_GET['cid'])){ 
            // $id = $rowjew['subcat_id'];
            $pathmain = $rowjew['image'];
            $name =$rowjew['name'];
            $mainCatId =$rowjew['maincat_id'];
            
            $id = $rowjew['maincat_id'];
            $subcatId = $rowjew['subcat_id'];
            $main_catId = $rowjew['maincat_id'];
        } 
        
        if($pathmain!='') {
            $pathmain = $path.$pathmain;
        } else {
            $pathmain ='images/no_img.jpg';
        }
        

        
    ?>
    
    <div class="col-lg-3" style="padding: 30px;">
	    <div class="block2">
		    <div class="block2-img wrap-pic-w">
    		    <?php if(isset($_GET['type']) & $_GET['type'] == 2){ ?> 
    		        <a href="list.php?id=<?php echo $id;?>&type=2"> 
    		            <img src="<?php echo $pathmain;?>" alt="IMG-PRODUCT" style="height: auto;" />
    		            <div style="text-align: center;"><?php echo $name;?></div> <br>
    		        </a>
    			    
    			<?php } else if(isset($_GET['type']) & $_GET['type'] == 1){  
    			    //echo '22';
    			    if($cnt>1) { 
    			        //echo 'cnt:'.$cnt;
    			        //$cid = $_GET['cid'];
    			        //$isSub = true; 
    			        ?> 
    			        <a href="sub_category.php?cid=<?php echo $id;?>&type=1">
    			            <img src="<?php echo $pathmain;?>" alt="IMG-PRODUCT" style="height: auto;" />
        		            <div style="text-align: center;"><?php echo $name;?></div> <br>
        		        </a>
    			   <?php }  else {
    			        //$isSub = false; 
    			        //echo 'ss'.var_dump($isSub);
    			        ?>
    			        <a href="list.php?id=<?php echo $subcatId;?>&type=1" >
    			            <img src="<?php echo $pathmain;?>" alt="IMG-PRODUCT" style="height: auto;" />
        		            <div style="text-align: center;"><?php echo $name;?></div> <br>
        		        </a>
    			   <?php }  
                } ?>
            
            </div>
    		</div>
    	</div>

		    <!--<div class="product-grid love-grid col-md-4 col-sm-6 col-xs-6">
			    <div class="more-product"><span> </span></div>	
				<div class="prod-prop b-link-stripe b-animate-go  thickbox">
					<img src="<?php echo $pathmain;?>" class="img-responsive" alt=""/>
					<div class="b-wrapper">
					<h4 class="b-animate b-from-left b-delay03">							
					    <button class="btns"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>Quick View</button>
					</h4>
					</div>
				</div>
		    </a>						
			<div class="product-info simpleCart_shelfItem">
				<div class="product-info-cust prt_name">
					<h4><?php echo $name;?></h4>
				</div>							
			</div>
	    </div>
	    -->


	    <!--<div class="col-lg-3" style="padding: 30px;">
    		<div class="block2">
    			<div class="block2-img wrap-pic-w">
    				<a href="list/36/?page=1">
    				     <img src="static/images/site/category/Indo Western.jpg" alt="IMG-PRODUCT"
    					style="height: auto;" />
    					<div style="text-align: center;">Indo Western</div> <br>
    				</a>
    			</div>
    		</div>
    	</div>
-->
    <?php } ?> 
</div>

<?php include('footer.php'); ?>
