<?php session_start(); 

$total_amount=$_SESSION['total_amount'];

$total_amount = sprintf("%.2f", $total_amount);

header('Cache-Control: no cache');
session_cache_limiter('private_no_expire');
include("functions.php");

$userid = $_SESSION['gid']; 

/*if(isset($_GET['is_customisable'])) {
    $is_customisable = $_GET['is_customisable'];
} else {
    $is_customisable = 0;
}
*/


//var_dump($_SESSION);
$product_arr = get_product_from_cart($userid); 
 
/*$sql=mysqli_query($conn,"select * from cart where user_id='".$userid."'");

//if($is_customizable != 1) {
    
    while($sql_result=mysqli_fetch_assoc($sql)) {
        
        $cart_product_id = $sql_result['product_id'];
        $cart_product_type = $sql_result['product_type'];
        $cart_quantity = ($sql_result['qty'])/2;
        
        $sku=get_sku($cart_product_id,$cart_product_type);
        
        $pos_sql=mysqli_query($con3,"select * from phppos_items where name='".$sku."'");
        $pos_sql_result=mysqli_fetch_assoc($pos_sql);
    
        $quantity=$pos_sql_result['quantity'];
        
        $new_quantity = $quantity-$cart_quantity;
        $new_quantity = sprintf("%.2f", $new_quantity);
        
        $update="update phppos_items set quantity='".$new_quantity."' where name LIKE '".$sku."'";
        
        //echo $update;
        // echo '<br>';
        
        mysqli_query($con3,"update phppos_items set quantity='".$new_quantity."' where name LIKE '".$sku."'");
    }*/
//}
// return;

foreach($product_arr as $key => $val) {
    
    $type=get_product_type_by_productid($val,$userid);
    //echo $type;
    $skua[]=get_sku($val,$type);    
    
}
    
$skua=json_encode($skua);

?>
<?php
if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') == 0){
    //Request hash
    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';   
    if(strcasecmp($contentType, 'application/json') == 0){
        $data = json_decode(file_get_contents('php://input'));
        $hash=hash('sha512', $data->key.'|'.$data->txnid.'|'.$data->amount.'|'.$data->pinfo.'|'.$data->fname.'|'.$data->email.'|||||'.$data->udf5.'||||||'.$data->salt);
        $json=array();
        $json['success'] = $hash;
        echo json_encode($json);
    }
    exit(0);
}

function getCallbackUrl()
{
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    //  return $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . 'response.php';
    return  $protocol . $_SERVER['HTTP_HOST'] . '/response.php';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>YN</title>
        <link rel="" href="logo/Untitled-2 copy.jpg"/><link rel="icon" href="logo/Untitled-2 copy.jpg" type="image/x-icon" />
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        
        <!-- jQuery (necessary for Bootstrap s JavaScript plugins) -->
        
        <script src="js/jquery.min.js"></script>
        
        <!-- Custom Theme files -->
        <!--theme-style-->
        
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        
        <!--//theme-style-->
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Wedding Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
        Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- start menu -->
        <script src="js/simpleCart.min.js"></script>
        <!-- start menu -->
        <link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />
        <script type="text/javascript" src="js/memenu.js"></script>
        
        <script>
        $(document).ready(function(){
            if($.fn.memenu){
                $(".memenu").memenu();
            }
        });
        </script>	
        
        <!-- /start menu -->
        <link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />	
        
        <!-- this meta viewport is required for BOLT //-->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" >
        <!-- BOLT Sandbox/test //-->
        <!--<script id="bolt" src="https://sboxcheckout-static.citruspay.com/bolt/run/bolt.min.js" bolt-color="e34524" bolt-logo="http://boltiswatching.com/wp-content/uploads/2015/09/Bolt-Logo-e14421724859591.png"></script>-->
        <!-- BOLT Production/Live //--> 
        <script id="bolt" src="https://checkout-static.citruspay.com/bolt/run/bolt.min.js" bolt-color="e34524" bolt-logo="http://boltiswatching.com/wp-content/uploads/2015/09/Bolt-Logo-e14421724859591.png"></script> 

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

        <style>
            .alert {
                padding: 20px;
                background-color: #f44336;
                color: white;
            }
            
            .closebtn { 
                margin-left: 15px;
                color: white;
                font-weight: bold;
                float: right;
                font-size: 22px;
                line-height: 20px;
                cursor: pointer;
                transition: 0.3s;
            }
            
            .closebtn:hover {
                color: black;
            }
            
            #snackbar {
                visibility: hidden;
                min-width: 250px;
                margin-left: -125px;
                background-color: #333;
                color: #fff;
                text-align: center;
                border-radius: 2px;
                padding: 16px;
                position: fixed;
                z-index: 1;
                left: 50%;
                bottom: 30px;
                font-size: 17px;
            }
            
            #snackbar.showalrt{
                visibility: visible;
                -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
                animation: fadein 0.5s, fadeout 0.5s 2.5s;
            }
            
            @-webkit-keyframes fadein {
                from {bottom: 0; opacity: 0;} 
                to {bottom: 30px; opacity: 1;}
            }
            
            @keyframes fadein {
                from {bottom: 0; opacity: 0;}
                to {bottom: 30px; opacity: 1;}
            }
            
            @-webkit-keyframes fadeout {
                from {bottom: 30px; opacity: 1;} 
                to {bottom: 0; opacity: 0;}
            }
            
            @keyframes fadeout {
                from {bottom: 30px; opacity: 1;}
                to {bottom: 0; opacity: 0;}
            }
            
            
            .drop1{ border:0; color:#EEE; background:#800000;
            font-size:18px; font-weight:bold; padding:2px 8px; width:150px;
            *width:160px; *background:#fff; -webkit-appearance: none; }
            
            #mainselection { overflow:hidden; width:150px;
            -moz-border-radius: 9px 9px 9px 9px;
            -webkit-border-radius: 9px 9px 9px 9px;
            border-radius: 9px 9px 9px 9px;
            box-shadow: 1px 1px 11px #800000;
            background: url("http://www.danielneumann.com/wp-content/uploads/2011/01/arrow.gif") no-repeat scroll 219px 5px #fff; 
            }
            
            .main {
        		margin-left:30px;
        		font-family:Verdana, Geneva, sans-serif, serif;
        	}
        	.text {
        		float:left;
        		width:180px;
        	}
        	.dv {
        		margin-bottom:5px;
        	}
        	.hide-data{
        	    display : none;
        	}
        </style>
    </head>
    <body > 
    
    
            <?php include("addtocartpopup.php");?>
        <?php include("requiredfields.php");?>
    
        <div class="top_bg">
        	<div class="container">
        		<div class="header_top-sec">
        			<?php include('topbar.php')?>
        	    </div>
            </div>
            <div class="header-top">
        		<div class="container">	
        		    <!---->
        		    <div class="" style=" margin-top:-px; ">
        			  <?php include('menu.php')?>
        			</div>
        			
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-12 custom_checkout_heading text-center">
                                    
            						<h2>Payment Process</h2>
            						<p>Kindly complete your payment within</p>
            						<div id="app"></div>

            					</div>
                            </div>
                        </div>
                    </div>
    		        <div class="clearfix"> </div>
        			<div class="main">



                        <div> </div>
                    	<form action="#" id="payment_form">
                            <input type="hidden" id="udf5" name="udf5" value="BOLT_KIT_PHP7" />
                            <input type="hidden" id="surl" name="surl" value="<?php echo getCallbackUrl(); ?>" />
                        
                            <div class="dv hide-data">
                            <span class="text"><label>Merchant Key:</label></span>
                            <span><input type="text" id="key" name="key" placeholder="Merchant Key" value="nMHrhc6s" /></span>
                            </div>
                            
                            <div class="dv hide-data">
                            <span class="text"><label>Merchant Salt:</label></span>
                            <span><input type="text" id="salt" name="salt" placeholder="Merchant Salt" value="XrBnKyEXsp" /></span>
                            </div>
                            
                            <div class="dv hide-data">
                            <span class="text"><label>Transaction/Order ID:</label></span>
                            <span><input type="text" id="txnid" name="txnid" placeholder="Transaction ID" value="<?php echo  "Txn" . rand(10000,99999999)?>" /></span>
                            </div>
                            
                            <div class="form-group row">
                                <label for="amount" class="col-sm-2 col-form-label">Amount:</label>
                                <div class="col-sm-10">
                                  <!--<input type="text" class="form-control" id="amount" placeholder="amount" name="amount" value="<? echo $total_amount; ?>" / >-->
                                  <input type="text" class="form-control" id="amount" placeholder="amount" name="amount" value="1.0" / >
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="amount" class="col-sm-2 col-form-label">First Name:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" value="<? echo $_SESSION['fname'].' '.$_SESSION['lname'] ?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="amount" class="col-sm-2 col-form-label">Email:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="email" name="email" placeholder="Email ID" value="<?php echo $_SESSION['email'];?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="amount" class="col-sm-2 col-form-label">Mobile/Cell Number:</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile/Cell Number" value="<? echo $_SESSION['mobile']; ?>" />
                                </div>
                            </div>
                             
                            <div class="dv hide-data">
                            <span class="text"><label>Product Info:</label></span>
                            <span><input type="text" id="pinfo" name="pinfo" placeholder="Product Info" value="P01,P02" /></span>
                            <!--<span><input type="text" id="pinfo" name="pinfo" placeholder="Product Info" value="P01,P02" /></span>-->
                            </div>
                            
                            <div class="dv hide-data">
                            <span class="text"><label>Hash:</label></span>
                            <span><input type="text" id="hash" name="hash" placeholder="Hash" value="" /></span>
                            </div>
                            <div class="text-center">
                                <input type="submit" value="Pay" class="btn btn-info" onclick="launchBOLT(); return false;" />
                            </div>
                    	</form>
                    </div>
        		</div>
        		<div class="clearfix"> </div>
            </div>
        </div>
        <?php include('footer.php'); ?>
        <script type="text/javascript"><!--
        
        
        function get_hashCode(){
            // ajax for qty to be started
            
            <?php //if($is_customisable==0) { 
            ?>
            
                $.ajax({
                    type: 'POST',
                    url:'revert_qty.php',
                    data:'userid=1',
                    success: function(msg){
                        
                        //alert(msg);
                        
                        if(msg==1){
                            console.log('done :',msg);
                        }
                        else {
                           console.log('failde ! : ',msg); 
                        }
                    }
                });
            <?php //}
            ?>
            
            $.ajax({
                  url: 'pay.php',
                  type: 'post',
                  data: JSON.stringify({ 
                    key: $('#key').val(),
        			salt: $('#salt').val(),
        			txnid: $('#txnid').val(),
        			amount: $('#amount').val(),
        		    pinfo: $('#pinfo').val(),
                    fname: $('#fname').val(),
        			email: $('#email').val(),
        			mobile: $('#mobile').val(),
        			udf5: $('#udf5').val()
                  }),
        		  contentType: "application/json",
                  dataType: 'json',
                  success: function(json) {
                      //alert('pay res');
                    if (json['error']) {
        			 $('#alertinfo').html('<i class="fa fa-info-circle"></i>'+json['error']);
                    }
        			else if (json['success']) {	
        				$('#hash').val(json['success']);
                    }
                  }
                });
            }
        
        get_hashCode();
        </script>
        <script type="text/javascript"><!--
        function launchBOLT()
        {
        	bolt.launch({
        	key: $('#key').val(),
        	txnid: $('#txnid').val(), 
        	hash: $('#hash').val(),
        	amount: $('#amount').val(),
        	firstname: $('#fname').val(),
        	email: $('#email').val(),
        	phone: $('#mobile').val(),
        	productinfo: $('#pinfo').val(),
        	udf5: $('#udf5').val(),
        	surl : $('#surl').val(),
        	furl: $('#surl').val(),
        	mode: 'dropout'	
        },{ responseHandler: function(BOLT){
        	console.log( BOLT.response.txnStatus );		
        	if(BOLT.response.txnStatus != 'CANCEL')
        	{
        		//Salt is passd here for demo purpose only. For practical use keep salt at server side only.
        		var fr = '<form action=\"'+$('#surl').val()+'\" method=\"post\">' +
        		'<input type=\"hidden\" name=\"key\" value=\"'+BOLT.response.key+'\" />' +
        		'<input type=\"hidden\" name=\"salt\" value=\"'+$('#salt').val()+'\" />' +
        		'<input type=\"hidden\" name=\"txnid\" value=\"'+BOLT.response.txnid+'\" />' +
        		'<input type=\"hidden\" name=\"amount\" value=\"'+BOLT.response.amount+'\" />' +
        		'<input type=\"hidden\" name=\"productinfo\" value=\"'+BOLT.response.productinfo+'\" />' +
        		'<input type=\"hidden\" name=\"firstname\" value=\"'+BOLT.response.firstname+'\" />' +
        		'<input type=\"hidden\" name=\"email\" value=\"'+BOLT.response.email+'\" />' +
        		'<input type=\"hidden\" name=\"udf5\" value=\"'+BOLT.response.udf5+'\" />' +
        		'<input type=\"hidden\" name=\"mihpayid\" value=\"'+BOLT.response.mihpayid+'\" />' +
        		'<input type=\"hidden\" name=\"status\" value=\"'+BOLT.response.status+'\" />' +
        		'<input type=\"hidden\" name=\"hash\" value=\"'+BOLT.response.hash+'\" />' +
        		'</form>';
        		var form = jQuery(fr);
        		jQuery('body').append(form);								
        		form.submit();
        	}
        },
        	catchException: function(BOLT){
         		alert( BOLT.message );
        	}
        });
        }
        //--
        </script>
        <!--timer-->
        <style>
        .custom_checkout_heading{
        display:flex;
        justify-content:center;
        }
        .custom_checkout_heading #app{
        margin:2%;
        }
        
        .base-timer {
        position: relative;
        width: 60px;
        height: 60px;
        }

        .base-timer__svg {
        transform: scaleX(-1);
        }
        
        .base-timer__circle {
        fill: none;
        stroke: none;
        }
        
        .base-timer__path-elapsed {
        stroke-width: 7px;
        stroke: grey;
        }
        
        .base-timer__path-remaining {
        stroke-width: 7px;
        stroke-linecap: round;
        transform: rotate(90deg);
        transform-origin: center;
        transition: 1s linear all;
        fill-rule: nonzero;
        stroke: currentColor;
        }
        
        .base-timer__path-remaining.green {
        color: rgb(65, 184, 131);
        }
        
        .base-timer__path-remaining.orange {
        color: orange;
        }
        
        .base-timer__path-remaining.red {
        color: red;
        }
        
        .base-timer__label {
        position: absolute;
        width: 60px;
        height: 60px;
        top: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        }
    </style>
    <script>
         console.log('a');
const FULL_DASH_ARRAY = 283;
const WARNING_THRESHOLD = 10;
const ALERT_THRESHOLD = 5;

const COLOR_CODES = {
  info: {
    color: "green"
  },
  warning: {
    color: "orange",
    threshold: WARNING_THRESHOLD
  },
  alert: {
    color: "red",
    threshold: ALERT_THRESHOLD
  }
};

const TIME_LIMIT = 300;
let timePassed = 0;
let timeLeft = TIME_LIMIT;
let timerInterval = null;
let remainingPathColor = COLOR_CODES.info.color;

document.getElementById("app").innerHTML = `
<div class="base-timer">
  <svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
    <g class="base-timer__circle">
      <circle class="base-timer__path-elapsed" cx="50" cy="50" r="45"></circle>
      <path
        id="base-timer-path-remaining"
        stroke-dasharray="283"
        class="base-timer__path-remaining ${remainingPathColor}"
        d="
          M 50, 50
          m -45, 0
          a 45,45 0 1,0 90,0
          a 45,45 0 1,0 -90,0
        "
      ></path>
    </g>
  </svg>
  <span id="base-timer-label" class="base-timer__label">${formatTime(
    timeLeft
  )}</span>
</div>
`;

startTimer();

function onTimesUp() {
  clearInterval(timerInterval);
}

function startTimer() {
  timerInterval = setInterval(() => {
    timePassed = timePassed += 1;
    timeLeft = TIME_LIMIT - timePassed;
    document.getElementById("base-timer-label").innerHTML = formatTime(
      timeLeft
    );
    setCircleDasharray();
    setRemainingPathColor(timeLeft);

    if (timeLeft === 0) {
      onTimesUp();
    }
  }, 1000);
}

function formatTime(time) {
  const minutes = Math.floor(time / 60);
  let seconds = time % 60;

  if (seconds < 10) {
    seconds = `0${seconds}`;
  }

  return `${minutes}:${seconds}`;
}

function setRemainingPathColor(timeLeft) {
  const { alert, warning, info } = COLOR_CODES;
  if (timeLeft <= alert.threshold) {
    document
      .getElementById("base-timer-path-remaining")
      .classList.remove(warning.color);
    document
      .getElementById("base-timer-path-remaining")
      .classList.add(alert.color);
  } else if (timeLeft <= warning.threshold) {
    document
      .getElementById("base-timer-path-remaining")
      .classList.remove(info.color);
    document
      .getElementById("base-timer-path-remaining")
      .classList.add(warning.color);
  }
}

function calculateTimeFraction() {
  const rawTimeFraction = timeLeft / TIME_LIMIT;
  return rawTimeFraction - (1 / TIME_LIMIT) * (1 - rawTimeFraction);
}

function setCircleDasharray() {
  const circleDasharray = `${(
    calculateTimeFraction() * FULL_DASH_ARRAY
  ).toFixed(0)} 283`;
  document
    .getElementById("base-timer-path-remaining")
    .setAttribute("stroke-dasharray", circleDasharray);
}

// get all product id from php variable and hit the function to increase quantity if timer is about to end .... in this case it is 1 second before timeer end  
var product_id=<? echo $skua; ?>;

//alert(product_id);

setInterval(function(){
    
    if(timeLeft==1) {
        // function add_again(product_id) {
        //     $.ajax({
        //       type: "POST",
        //         url: 'cart/add_again.php',
        //         data: 'product_id='+product_id,
        //         success:function(msg) {
        //             // alert(msg); 
        //             // console.log(msg);
        //         }
        //     });
        // }
                            
        // //  alert(msg);        
        alert('Maximum time limit extended to complete the transaction ! ');
        window.location='http://yosshitaneha.com';
    
        // add_again(product_id);
    }
    
},1000);


// });
        </script>
        <!--end-->
    </body>
</html>