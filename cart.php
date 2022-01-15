<?php session_start();
include('header.php');

?>

<style>
    .table thead th {
    vertical-align: top;

}
</style>
<script>
    function remove_from_cart(productid,usrid) {
      $.ajax({
           type: "POST",
           url: 'remove_from_cart.php',
           data: 'productid='+productid+'&usrid='+usrid,
           success:function(msg) {
               if(msg == 1){
                    swal("remove succesfully !! ");
                    setTimeout(function(){ location.reload(); },
                    2000); 
               } else {
                   swal("Not removed  !! ");
                    setTimeout(function(){ location.reload(); },
                    2000);
               }
                
            }
        });
    }
 
    function add_one_cart(productid,usrid,sku) {
        $.ajax({
           type: "POST",
           url: 'cart/add_one_cart.php',
           data: 'productid='+productid+'&usrid='+usrid+'&sku='+sku,
           success:function(msg) {
                console.log(msg);
                location.reload(); 
            }
        });
        return;
    }
    function remove_one_cart(productid,usrid,sku) {
        $.ajax({
           type: "POST",
           url: 'cart/remove_one_cart.php',
           data: 'productid='+productid+'&usrid='+usrid+'&sku='+sku,
           success:function(msg) {
                console.log(msg);
                 location.reload(); 
            }
        });
        return;
    }

</script>
<script>
    function showcart() {
        $("#cart").toggle();
    }
    
    function detail(sid,typ,subcattyp,transtyp,maincatid,subcatid)
    {
        var s=1009;
        var typ =2;
        var subcattyp =2;
        var transtyp=2;
        var maincatid = 8;
        var subcatid =0;

        window.open('sdets1.php?slkd='+s+'&slpyt='+typ+'&psbctp='+subcattyp+'&ptrp='+transtyp+'&dmctd='+maincatid+'&dsd='+subcatid,'_self');
    }

</script>	

<body>
    
    <div class="container-fluid">
        <form action ="pay.php" method="post">
    	<input type="hidden" name="slkd" value="<?php echo $_POST['slkd']; ?>">
        <input type="hidden" name="psbctp" value="<?php echo $_POST['psbctp']; ?>">
        <input type="hidden" name="dmctd" value="<?php echo $_POST['dmctd']; ?>">
        <input type="hidden" name="dsd" value="<?php echo $_POST['dsd']; ?>">
        <input type="hidden" name="slpyt" value="<?php echo $_POST['slpyt']; ?>">
        <input type="hidden" id="pqty" name="pqty" value="<?php echo  $_POST['pqty']; ?>" readonly>
        <input type="hidden" id="price" name="price" value="<?php echo  $_POST['price']; ?>" readonly>
        <input type="hidden" id="avail_qty" name="avail_qty" value="<?php echo $_POST['avail_qty']; ?>" readonly>
        <?php
        $usrid=$_SESSION['gid'];
        $strPage = $_POST['Page'];
        $cartfinalids="";
        
        $View123 =mysqli_query($con,"select * from cart where ac_typ=1 and  user_id='".$usrid."' and status=0");
        while($vefetcharr=mysqli_fetch_array($View123))
        {
            if($cartfinalids=="")
            {
                $cartfinalids=$vefetcharr[0];
            }else
            {
                $cartfinalids=$cartfinalids.",".$vefetcharr[0];
            }
        }
        
        $i=1;
        $tl=0;
        
        $qrycnt=mysqli_query($con,"select count(cart_id) from cart  where ac_typ=1 and user_id='".$usrid."' and status=0");
        $fetchcnt=mysqli_fetch_array($qrycnt);
        
        $View = "select * from cart where ac_typ=1 and user_id='".$usrid."' and status=0";
        $table=mysqli_query($con,$View);
        
        $Num_Rows = mysqli_num_rows($table);
        
        //echo $View;
        ?>
        <div align="center" style="display:none" > Records Per Page : 
            <select name="perpg" id="perpg" onChange="funcs('1','perpg');"><br>
                <?php
                for($i=1;$i<=$Num_Rows;$i++)
                {
                    if($i%10==0)
                    { ?>
                        <option value="<?php echo $i; ?>" <?php if(isset($_POST['perpg']) && $_POST['perpg']==$i){?>  selected="selected" <?php } ?>><?php echo $i."/page"; ?></option>
                    <?php }
                } ?>
                <option value="<?php echo $Num_Rows; ?>"><?php echo "All"; ?></option>
            </select>
        </div>
        <?php
        if(isset($_GET['page']) && $_GET['page']=='all'){
            $View = "select * from cart where ac_typ=1 and user_id='".$usrid."' and status=0";
        } else {
        // pagins
        //echo $_POST['perpg'];
        $Per_Page =$_POST['perpg'];   // Records Per Page
        $Per_Page =12;
         
        //echo $Per_Page;
        $Page = $strPage;
        if($strPage=="")
        {
        	$Page=1;
        }
         
        $Prev_Page = $Page-1;
        $Next_Page = $Page+1;
        
        $Page_Start = (($Per_Page*$Page)-$Per_Page);
        if($Num_Rows<=$Per_Page)
        {
        	$Num_Pages =1;
        }
        else if(($Num_Rows % $Per_Page)==0)
        {
        	$Num_Pages =($Num_Rows/$Per_Page) ;
        }
        else
        {
        	$Num_Pages =($Num_Rows/$Per_Page)+1;
        	$Num_Pages = (int)$Num_Pages;
        }
        //$View.=" ORDER BY cust ASC ";
        $View.=" LIMIT $Page_Start , $Per_Page";
        $qrys=mysqli_query($con,$View);
        }	
        // echo $View;
        ?>
        
        
        

        <div class=" cart-items">
            <!--<h3>My Shopping Bag (<?php echo $fetchcnt[0];?>)</h3>-->
            <div class="px-4 px-lg-0">
            <!-- For demo purpose -->
            <div class="text-white py-5 text-center"> </div>
            <!-- End -->
            <div class="pb-5">
            <div class="">
            <?php
            $is_cart_count=mysqli_query($conn,"SELECT * from cart where ac_typ=1 and user_id='".$usrid."'"); 
         
            $is_cart_count_result=mysqli_fetch_assoc($is_cart_count);
         
            if($is_cart_count_result){ ?>
                
                <div class="row">
                    <div class="col-lg-8 p-5 bg-white rounded shadow-sm mb-5">
        
                    <!-- Shopping cart table -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                  <th scope="col" class="border-0 bg-light">
                                    <div class="p-2 px-3 text-uppercase">Product<br></div>
                                  </th>
                                  
                                  <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Refundable Deposit Amount</div>
                                  </th>
                                  <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Rental Price</div>
                                  </th>
                                  <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Deposit Date</div>
                                  </th>
                                  
                                  <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Quantity</div>
                                  </th>
                                  <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Remove</div>
                                  </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?
                                $total_deposite = 0 ;
                                $total_rental = 0; 
                                
                                $get_cart_sql=mysqli_query($conn,"SELECT * from cart where ac_typ=1 and user_id='".$usrid."'");
                                while($get_cart_sql_result=mysqli_fetch_array($get_cart_sql)){ 

                                $productid=$get_cart_sql_result['product_id'];
                                $quantity=$get_cart_sql_result['qty'];
                                $type=$get_cart_sql_result['product_type'];
                                $return_date = $get_cart_sql_result['return_dt'];
                                $image = $get_cart_sql_result['image'];
                                ?>    
                            
                            
                            
                            
                            
                            
                            
                            
                                <tr>
                                    <th scope="row" class="border-0">
                                        <div class="p-2">
                                          <img src="<? echo $image ; ?>" alt="<?php echo $productid; ?>" width="70" class="cart_img">
                                          <div class="cart_product_name">
                                            <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle"><?php echo get_sku($productid,$type); ?></a></h5>
                                          </div>
                                        </div>
                                    </th>
                                    <td class="border-0 align-middle"><strong>
                                        <input class="form-control total-amount" type="text" name="deposit_amt" id="deposit_amt" value="₹ <? echo $get_cart_sql_result['deposit_amt']; ?>/-" border="none" readonly="">
                                        </strong>
                                    </td>
                                    <td class="border-0 align-middle"><strong>
                                        <input class="form-control total-amount" type="text" name="amount" id="amount" value="₹ <? echo $get_cart_sql_result['product_amt']; ?>" border="none" readonly="">
                                        </strong>
                                    </td>
                                    
                                    <td class="border-0 align-middle"><p><? echo $return_date ; ?></p></td>
                                    
                                    
                                    <td class="border-0 align-middle" style="width:15%;">
                                        <div class="nights-count">
                                            <h6 class=""></h6>
                                            <button onclick="remove_one_cart(<? echo $productid; ?>,<?php echo $usrid; ?>,'<?php echo get_sku($productid,$type); ?>')" type="button" style="margin: 0; padding: 0; border: 0;background: transparent; outline:0; " class="button hollow circle" data-productinfo="minus" data-field="productinfo"> 
                                                <i class="fa" style="background: url(https://image.flaticon.com/icons/svg/149/149146.svg); height: 28px; width: 21px; background-repeat: no-repeat; outline:none; vertical-align: middle;" aria-hidden="true"></i>
                                            </button>
                                                    
                                            <input class="input-group-field" type="text" name="productinfo" style="font-size: 21px;width: 10%;text-align: center;background: #f1f1f1;border: none;border-top: none;box-shadow: none;" value="<? echo $quantity; ?>" readonly="">
                        
                                            <button onclick="add_one_cart(<? echo $productid; ?>,<? echo $usrid; ?>,'<?php echo get_sku($productid,$type); ?>')" type="button" style="margin: 0; padding: 0; border: 0;background: transparent; outline:none; " class="button hollow circle" data-productinfo="plus" data-field="productinfo">
                                                <i class="fa " style="background: url(https://image.flaticon.com/icons/svg/149/149145.svg); height: 28px; width: 21px; background-repeat: no-repeat; outline:none; vertical-align: middle;" aria-hidden="true"></i><br>
                                            </button>
                                        </div>
                                    </td>
                                    
                                                                        
                                    <td class="border-0 align-middle"><a href="#" class="text-dark" onclick="remove_from_cart(<? echo $productid; ?>,<? echo $usrid; ?>)"><i class="fa fa-trash"></i></a></td>
                                </tr>
                                
                                
                                
                                
                                
                            <?php
                            
                            $total_deposite +=  $quantity * $get_cart_sql_result['deposit_amt'];
                            $total_rental +=  $quantity * $get_cart_sql_result['product_amt'];
                            
                            } 
                            
                            $_SESSION['total_deposite'] = $total_deposite ;
                            $_SESSION['total_rental'] = $total_rental ;
                            ?>
                            
                            
                            
                            
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
                    
            <?php
            
                $subtotal = total_cart_amount($usrid);
            
                $shipping_charges = get_shipping_charges($subtotal);
            
                $total = $subtotal+$shipping_charges;
            
            ?>
                    
            <?php if($subtotal>0){ ?>
                <div class="col-md-4 cart_pay_details">
                    
                    
                    
             <? if(get_shipping_address($userid)){ ?>
                
                <div class="address">
                    
                    <h2 style="text-align:center">Shipping Address</h2>
                
                    <p class="shipping_address"><? echo get_shipping_address($userid);?></p>
                    
                    <a class="btn btn-primary" href="https://yosshitaneha.com/account/edit-account.php">Change</a>
                </div>
                             
            <? } ?>
                            
            <h2 style="text-align:center">Charges</h2>
            
            <p class="total_show">Product Price : ₹ <? echo $total_rental;?></p>
            <p class="total_show">Shipping Charges : ₹ 0.00 </p>
            
            <?php $user_state=state_id_userid($_SESSION['gid']);
                if($user_state){ ?>
                    <div class="gst_tax">
                        <? $gst= igst($userid);
                        if($user_state!=3){ ?>
                            <div class="tax">
                                <span> IGST: </span>
                                <span>  ₹ <? echo $gst; ?>   </span>
                                <? $_SESSION['same_state']=0;?>
                            </div>
                        <? } else { ?>
                            <?php $_SESSION['same_state']=1;?>
                            <div class="tax">
                                <div class="cgst" style="font-size:12px; color:gray;">
                                    <span> CGST: </span>
                                    <span> ₹ <? echo sprintf("%.2f", $gst/2); ?>  </span>   
                                </div>
                                <div class="sgst" style="font-size:12px; color:gray;">
                                    <span> SGST: </span>
                                    <span> ₹ <? echo sprintf("%.2f", $gst/2); ?>  </span>
                                </div>
                                <div class="total_gst" style="font-size:14px; color:gray;">
                                    <span> TOTAL GST: </span>
                                    <span> ₹ <? echo sprintf("%.2f", $gst); ?>  </span>
                                </div>
                            </div>
                            <br>
                        <?php } ?>
                    </div>
                <?php } ?>
                <p class="total_show" style="color:black; font-size: 18px;" > <b>Grand Total : ₹    <? echo sprintf("%.2f", $total_rental);?> </b></p>
                                
                <div class="checkout_btn">
                    <?php if($user_state ){ ?>
                        <a href="pay.php" class="btn btn-dark rounded-pill py-2 btn-block btn-check">Proceed to checkout</a> 
                    <?php } else { 
                        $_SESSION['recent_login']=1;
                    ?>
                        <a href="account/my-account.php" class="btn btn-dark rounded-pill py-2 btn-block btn-check">Proceed to checkout</a> 
                    <?php } ?>
                </div>    
            </div>
        <?php } ?>  
    </div>
<?php } else { ?>
<style>
    .cart-empty {
        padding: 15px;
        font-size: 20px;
        text-align: center;
    }
    .cart-empty {
        background: #f7f6f7;
        padding: 15px;
    }
    .empty-cart-image, .return-to-shop {
        display: flex;
        justify-content: center;
    }
    
    .empty-cart-image img {
        width: auto;
        height: 50vh;
    }
    .woocommerce img, .woocommerce-page img {
        height: auto;
        max-width: 100%;
    }
    
</style>
<p class="cart-empty">Your cart is currently empty.</p>
<div class="empty-cart-image">
    <img src="https://www.thousandmiles24.com/wp-content/themes/lastmiles/images/empty.png" alt="dasdadad">
</div>
<?php } ?>
<?php
    $_SESSION['total_gst']=$gst;
    $_SESSION['total_amount']=$total+$gst;
?>
</div>
</div>
</div>
</div>
<?php include('footer.php'); ?>