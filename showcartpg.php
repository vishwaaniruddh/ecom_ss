<?php session_start();
 include("config.php");

$userid = $_SESSION['gid']; ?>


<script>
setInterval(function(){ 
    <?php

$qryc=mysqli_query($conn,"select sum(qty) as total from cart where user_id='".$userid."' and status=0 and ac_typ=1");
    $fetchc=mysqli_fetch_array($qryc);
    $totqt=0;
        $totamt=0;
        if($fetchc[0]!=null)
        {
            $totqt  = $fetchc[0];
            echo $totamt = $fetchc[1];
            }
    
    ?>    
}, 3000);    
</script>






        <a href="cart.php" class="cart_anchor">
            <img src="assets/shopping-cart.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
            <span id="cartCount" class="header-icons-noti"><?echo $totqt; ?></span>
        </a>
        
