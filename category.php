<?php session_start();  
include('header.php');
 
//$path= "static/images/category/";


if(isset($_POST['from_date']) && isset($_POST['to_date']) ){


$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];

$_SESSION['from_date'] = $from_date;
$_SESSION['to_date'] = $to_date;


}



$path= "http://yosshitaneha.com/Admin/";
?> 

<div class="row m-t-20" >
    <?php



        $qry = "SELECT * FROM garments where garments.Main_id=1 or garments.Main_id=3";
        $qryjew=mysql_query($qry);
        
        
        

    
    
    while($rowjew=mysql_fetch_assoc($qryjew)) {
    
    

            $id = $rowjew['garment_id'];
            $pathmain = $rowjew['garments_image']; 
            $name = $rowjew['name'];
            $mainCatId = $rowjew['Main_id']; 

        
        
       if($pathmain!='') {
            $pathmain = $path.$pathmain;
        } else {
            $pathmain ='images/no_img.jpg';
        }
        
        ?> 
         
        
    <div class="col-lg-3" style="padding: 30px;">
	    <div class="block2">
		    <div class="block2-img wrap-pic-w">
    		        <a href="list.php?id=<?php echo $id;?>&type=2"> 
    		            <img src="<?php echo $pathmain;?>" alt="IMG-PRODUCT" style="height: auto;" />
    		            <div style="text-align: center;"><?php echo $name;?></div> <br>
    		        </a>
    			   
            
            </div>
    		</div>
    	</div>
    	
    	
    <?php } ?> 
    
    
    
    <?
    $qry = "SELECT * FROM  jewel_subcat where jewel_subcat.mcat_id=1 or jewel_subcat.mcat_id=3";
    $qryjew=mysql_query($qry);
        
            
    while($rowjew=mysql_fetch_assoc($qryjew)) { 


            $id = $rowjew['subcat_id'];
            $pathmain = $rowjew['image'];
            $name =$rowjew['categories_name'];
            $mainCatId =$rowjew['mcat_id'];
            
            $qryjew1=mysql_query("select * from subcat1  where maincat_id='".$id."' order by name");
		    $subcategory = mysql_fetch_assoc($qryjew1);
		    $cnt = mysql_num_rows($qryjew1);
		    
		    //echo "select * from subcat1  where maincat_id='$id' order by name".$cnt;
		    $subcatId = $subcategory['subcat_id'];
	        $main_catId = $subcategory['maincat_id'];
            

 
       if($pathmain!='') {
            $pathmain = $path.$pathmain;
        } else {
            $pathmain ='images/no_img.jpg';
        }
        
    ?> 
         
        
    <div class="col-lg-3" style="padding: 30px;">
	    <div class="block2">
		    <div class="block2-img wrap-pic-w">
  
<?    			    //echo '22';
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
                 ?>
            
            </div>
    		</div>
    	</div>
    	
    	
    <?php } ?> 


        

        
        
</div>

<?php include('footer.php'); ?>
