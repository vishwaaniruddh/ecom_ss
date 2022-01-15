<?php session_start();
include('header.php') ;



function get_booking_date($sku) {
    global $con3; 
    $sql = mysqli_query($con3,"select * from order_detail where item_id ='".$sku."' order by bill_id desc");
    $sql_result = mysqli_fetch_assoc($sql);
    $bill_id = $sql_result['bill_id'];
    $status_sql = mysqli_query($con3,"select * from phppos_rent where bill_id ='".$bill_id."' and booking_status = 'Booked'");
    $status_sql_result = mysqli_fetch_assoc($status_sql);
    
    return $status_sql_result['pick_date'];
}



 

$url = 'http://www.srishringarr.com'.  $_SERVER['REQUEST_URI']  ; 
if ( $temp = strstr($url, 'days', true) ) {
   $url = $temp;
   $url = rtrim($url , '&');
}
?>


<script>
function round_amount(amount){
    
    var round_num = amount.slice(-2);

        if(round_num < 50 ){
            add_amount = 50 - round_num;
        }
        if(round_num > 50 ){
            add_amount = 100 - round_num;  
        }
        if(round_num ==  00 || round_num==50){
            add_amount = 00;
        }

    new_amount = parseInt(amount) + parseInt(add_amount);    
    return new_amount;
}




$("#document").ready(function(){
    


setTimeout(function(){ 
$("#dateRangeP").on('change',function(){

	   var dateRangeP = $('#dateRangeP').val();
       var dateRangeP_arr = dateRangeP.split('-');

const date1 = new Date(dateRangeP_arr[0]);
const date2 = new Date(dateRangeP_arr[1]);
const diffTime = Math.abs(date2 - date1);
const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 

console.log('diffDays'+diffDays);
if(diffDays > 7 || diffDays == 7){
    alert('Cannot select more than 7 days !');
    location.reload();
}
else{
    if(diffDays< 3){
        alert('selecting for minimum 3 days ! ');
        window.location.href = '<?php echo $url ?>&&days=3';
    }else if(diffDays==3){
        window.location.href = '<?php echo $url ?>&&days=4';
    }else if(diffDays==4){
                window.location.href = '<?php echo $url ?>&&days=5';
    }else if(diffDays==5){
                window.location.href = '<?php echo $url ?>&&days=6';
    }else if(diffDays==6){
                window.location.href = '<?php echo $url ?>&&days=7';
    }
}

    });
}, 2000);


       

});
</script>


<?



$type  = $_GET['type'];
$id = $_GET['id'];
$userid = $_SESSION['userid'];
$prid=$id; 
$transtyp = 1;

if($type=="1")
{ 
    $sql="SELECT * FROM `product` WHERE `product_id`='".$prid."'"; 
}  
else if($type=="2")
{ 
    $sql="select * from  `garment_product` where gproduct_id='".$prid."'"; 
}




$table=mysql_query($sql);
$rws=mysql_fetch_array($table);


$sku = $rws[2];



for($i=0; $i<7 ; $i++){
    $block_date[] = date('Y-m-d', strtotime( '+'.$i.' days'));
}


if(get_booking_date($sku)){
    
    $booking_date = get_booking_date($sku);    

    
    for($i=1; $i<=7 ; $i++){
        $block_date[] =date('Y-m-d', strtotime('-'.$i.' days', strtotime($booking_date)));
    }

    for($i=1; $i<=10 ; $i++){
        $block_date[] =date('Y-m-d', strtotime('+'.$i.' days', strtotime($booking_date)));

    }
}
else{
    $booking_date = date('Y-m-d', strtotime( '+7 days'));
}



foreach($block_date as $key => $value){
    if($value){
        $your_date[] = date("m/d/Y", strtotime($value));        
    }

}

$mdy_block_date = json_encode($your_date,JSON_UNESCAPED_SLASHES);
$missingDates = array();

$dateStart = date_create($your_date[0]);
$dateEnd   = date_create(end($your_date));
$interval  = new DateInterval('P1D');
$period    = new DatePeriod($dateStart, $interval, $dateEnd);

    foreach($period as $day) {
      $formatted = $day->format("m/d/Y");
      if(!in_array($formatted, $your_date)){
        $missingDates[] = $formatted;  
      } 
    }

$block_date_json = $mdy_block_date;


if($type=="1")
{
    $qryjew1=mysql_query("select * from subcat1  where subcat_id='".$rws['subcat_id']."'");
    $rowjew1=mysql_fetch_array($qryjew1);
            
    $qryjew2 = mysql_query("SELECT * FROM `jewel_subcat` where subcat_id='".$rowjew1['maincat_id']."'");
    $rowjew2 = mysql_fetch_array($qryjew2);
    
    if($rowjew2['mcat_id']=="1" || $rowjew2['mcat_id']=="3")
    {
        $transtypchk='1';
    } else
    {
        $transtypchk='2';
    }

} else
{

    $qryjew=mysql_query("SELECT * FROM `garments` where garment_id='".$rws['product_for']."'");     
	$rowjew=mysql_fetch_array($qryjew);
   
    if($rowjew['Main_id']=="1" || $rowjew['Main_id']=="3")
    {
        $transtypchk='1';
    } else
    {
        $transtypchk='2';
    }
}



    $re = mysqli_query($con3,"SELECT unit_price,cost_price,quantity FROM phppos_items where name like '".$rws[2]."'");
    $rero = mysqli_fetch_row($re);
    
    $qty = round($rero[2]); 
  $re1 = mysqli_query($con3,"select sum(commission_amt) from order_detail where item_id='".$rws[2]."' and bill_id in(select bill_id from phppos_rent where booking_status!='Booked')");
    $rero1 = mysqli_fetch_row($re1);
    $currentsp=$rero[0]-$rero1[0];
    $splimit=$rero[1]*0.8;
    if($currentsp>$splimit)
        $newsp=$currentsp;
    else
        $newsp=$splimit;
        

     //jwellery
if($type=="1") {
    if($newsp<=40000){
            $rentprice=$newsp*0.20;  
          }   
        else if($newsp<=60000){
            $rentprice=$newsp*0.17;
        }
        else{
            $rentprice=$newsp*0.15;
        }
            
           if($newsp<=2000){
               $courier = 100;
           }else if($newsp<=5000){
               $courier = 250;                                   
           }else if($newsp<=10000){
               $courier = 500;
           }else{
               $courier = 1000;                                   
           }
                                 
}
if($type==2){
    
    if($newsp<=40000){
        $rentprice=$newsp*0.20;
    } else if($newsp<=60000){
        $rentprice=$newsp*0.17;
    } else{
        $rentprice=$newsp*0.15;
    }
    
    if($newsp<=10000){
           $courier = 750;
       }else {
           $courier = 1000;                                   
       }
    
    if($rentprice<1500){
        $rentprice  =1500;

    }
}
        $deposit = round($newsp*0.35) ;
        $deposit=round_amount($deposit);
        $final_rent = round_amount($rentprice  + $courier) ;
        
        
        
        if($type=="1")
{
    $sqlimg="SELECT img_name FROM `product_images_new` WHERE `product_id`='$prid' order by rank";
}
else if($type=="2") 
{
    $sqlimg="SELECT img_name FROM `product_images_new` WHERE `gproduct_id`='$prid' order by rank";
}

//echo $sqlimg;

$qryimg=mysql_query($sqlimg);
$rowimg=mysql_fetch_row($qryimg);
$img_path ='https://yosshitaneha.com/uploads';
$pathmain = 'https://yosshitaneha.com/';
$path = $img_path.$rowimg[0];

?>


<style>
.daterangepicker{
    position: fixed;
    top: 10% !important;
    left: 24% !important;

    right: 10%;
    width: 50%;
}
.daterangepicker .calendar{
    max-width: 500px;
}
.ranges{
        width: 100% ! important;
    display: flex;
    justify-content: center;
}
.left ,.right{
    width:49% ! important;
}

body{
    overflow-x:hidden;
}
</style>


<style>

@import url("https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&subset=devanagari,latin-ext");

:root {
  --white: #ffffff;
  --light: #f0eff3;
  --black: #000000;
  --dark-blue: #1f2029;
  --dark-light: #353746;
  --red: #da2c4d;
  --yellow: #f8ab37;
  --grey: #ecedf3;
}




	figure.zoom {
 	 background-position: 50% 50%;
 	 position: relative;
 	 /*width: 500px;*/
  	 overflow: hidden;
  	 cursor: zoom-in;
	}
	
	figure.zoom img:hover {
  		opacity: 0;
	}
	
	figure.zoom img {
  		transition: opacity .5s;
  		display: block;
  		width: 100%;
	}

	.prodGalleryImg {
		width: 80px;
	    height: 80px;
	    border: 1px solid #424242;
	    margin:5px;
	}
	
	.g-background {
		height: 5px;
	    position: relative;
	    background: #f0f0f0;
	    margin-top: 7px;
	    margin-left: 7px;
	    border-radius: 100px;
	    width: 80%;
	}
	.ratio-background {
		left: 0;
	    position: absolute;
	    height: 5px;
	    transform: scaleX(1);
	    transform-origin: left center;
	    transition: transform 0.4s cubic-bezier(0, 0, 0.3, 1) 0.3s, -webkit-transform 0.4s cubic-bezier(0, 0, 0.3, 1) 0.3s;
	    border-radius: 100px;
	    width:100%;
	    background-color: #388e3c;
	}

	.zoom:hover {
		transform: scale(1.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
		overflow: scroll;
	}

	.pointer {cursor: pointer;}
		.dot {
	  height: 72px;
	  width: 70px;
	  background-color: #E2C88A;
	  border-radius: 100%;
	  display: inline-block;
	  /*border: 1px solid black;*/
	  }


	/*radio buttons design*/

	.days_btn,.del_btn{
	    /*width: 40px;*/
	    height: 40px;
	    /*border-radius: 3px;*/
        border: 1px solid #E6BE6E;
	    border-radius: 4px;
	    align-items: flex-start;
	    text-align: center;
	    padding: 8px 15px;
	    float: left;
	}
	.days_btn.sel,.del_btn.sel{
		background: #e6be6e;
		color: #fff;
	}
	.subject-list,.del_btn_radio{
		display: none;
	}

	.flex-w label + input[type="radio"]:checked { 
    	background:pink !important;
	}

	input[type=text] {
		border-color: #e6be6e !important;
	}

	.bo9{
		border: 1px solid #cccccc !important;
	}
	.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  border-color:#e6be6e
  margin-bottom: 15px;
}
.icon {
  padding: 10px;
  background-color:#E6BE6E;
  //background-color:orange;
  min-width:50px;
  text-align: center;
}
.fs-15.hvr {
    background-color: #E6BE6E;
	//background-color: orange;
    height: 40px;

    }
	.fs-15 {
        background-color: white;
	}


.amazingslider-space-0{
    height : 550px !important;
}
amazingslider-img-elem-0{ 
        margin-top: 0 !important;
}
amazingslider-img-0{
    overflow : visible !important;
    top : 50% !important;
    position : unset;
}

a[data-zoom-id], .mz-thumb{
    line-height : 1 !important;
    /*display: table-cell !important;*/
    display: unset !important;

}
.selectors{
        display: inherit;
        margin-top:2%;
}
.mz-inner, #mzCrA118625690571 , #crMz1178248867535 {
    display: none !important;
}


::selection {
  color: var(--white);
  background-color: var(--black);
}
::-moz-selection {
  color: var(--white);
  background-color: var(--black);
}
mark {
  color: var(--white);
  background-color: var(--black);
}
.section {
  position: relative;
  width: 100%;
  display: block;
  text-align: center;
  margin: 0 auto;
}
.over-hide {
  overflow: hidden;
}
.z-bigger {
  z-index: 100 !important;
}

.background-color {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: var(--dark-blue);
  z-index: 1;
  -webkit-transition: all 300ms linear;
  transition: all 300ms linear;
}
.checkbox:checked ~ .background-color {
  background-color: var(--white);
}

[type="checkbox"]:checked,
[type="checkbox"]:not(:checked),
[type="radio"]:checked,
[type="radio"]:not(:checked) {
  position: absolute;
  left: -9999px;
  width: 0;
  height: 0;
  visibility: hidden;
}
.checkbox:checked + label,
.checkbox:not(:checked) + label {
  position: relative;
  width: 70px;
  display: inline-block;
  padding: 0;
  margin: 0 auto;
  text-align: center;
  margin: 17px 0;
  margin-top: 100px;
  height: 6px;
  border-radius: 4px;
  background-image: linear-gradient(298deg, var(--red), var(--yellow));
  z-index: 100 !important;
}
.checkbox:checked + label:before,
.checkbox:not(:checked) + label:before {
  position: absolute;
  font-family: "unicons";
  cursor: pointer;
  top: -17px;
  z-index: 2;
  font-size: 20px;
  line-height: 40px;
  text-align: center;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  -webkit-transition: all 300ms linear;
  transition: all 300ms linear;
}
.checkbox:not(:checked) + label:before {
  content: "\eac1";
  left: 0;
  color: var(--grey);
  background-color: var(--dark-light);
  box-shadow: 0 4px 4px rgba(0, 0, 0, 0.15), 0 0 0 1px rgba(26, 53, 71, 0.07);
}
.checkbox:checked + label:before {
  content: "\eb8f";
  left: 30px;
  color: var(--yellow);
  background-color: var(--dark-blue);
  box-shadow: 0 4px 4px rgba(26, 53, 71, 0.25), 0 0 0 1px rgba(26, 53, 71, 0.07);
}

.checkbox:checked ~ .section .container .row .col-12 p {
  color: var(--dark-blue);
}

.checkbox-tools:checked + label,
.checkbox-tools:not(:checked) + label {
  position: relative;
  display: inline-block;
  padding: 20px;
  width: 110px;
  font-size: 14px;
  line-height: 20px;
  letter-spacing: 1px;
  margin: 0 auto;
  margin-left: 5px;
  margin-right: 5px;
  margin-bottom: 10px;
  text-align: center;
  border-radius: 4px;
  overflow: hidden;
  cursor: pointer;
  text-transform: uppercase;
  color: var(--white);
  -webkit-transition: all 300ms linear;
  transition: all 300ms linear;
}
.checkbox-tools:not(:checked) + label {
  background-color: var(--dark-light);
  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1);
}
.checkbox-tools:checked + label {
  background-color: transparent;
  box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
}
.checkbox-tools:not(:checked) + label:hover {
  box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
}
.checkbox-tools:checked + label::before,
.checkbox-tools:not(:checked) + label::before {
  position: absolute;
  content: "";
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: 4px;
  background-image: linear-gradient(298deg, var(--red), var(--yellow));
  z-index: -1;
}
.checkbox-tools:checked + label .uil,
.checkbox-tools:not(:checked) + label .uil {
  font-size: 24px;
  line-height: 24px;
  display: block;
  padding-bottom: 10px;
}

.checkbox:checked
  ~ .section
  .container
  .row
  .col-12
  .checkbox-tools:not(:checked)
  + label {
  background-color: var(--light);
  color: var(--dark-blue);
  box-shadow: 0 1x 4px 0 rgba(0, 0, 0, 0.05);
}

.checkbox-budget:checked + label,
.checkbox-budget:not(:checked) + label {
  color:white;
  padding: 2%;
}
.checkbox-budget:not(:checked) + label {
  background-color: var(--dark-light);
  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1);
}
.checkbox-budget:checked + label {
  background-color: #e6be6e;
  /*box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);*/
}
.checkbox-budget:not(:checked) + label:hover {
  box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
}
.checkbox-budget:checked + label::before,
.checkbox-budget:not(:checked) + label::before {
  position: absolute;
  content: "";
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: 4px;
  background-image: linear-gradient(138deg, var(--red), var(--yellow));
  z-index: -1;
}
.checkbox-budget:checked + label span,
.checkbox-budget:not(:checked) + label span {
  position: relative;
  display: block;
}
.checkbox-budget:checked + label span::before,
.checkbox-budget:not(:checked) + label span::before {
  position: absolute;
  content: attr(data-hover);
  top: 0;
  left: 0;
  width: 100%;
  overflow: hidden;
  -webkit-text-stroke: transparent;
  text-stroke: transparent;
  -webkit-text-fill-color: var(--white);
  text-fill-color: var(--white);
  color: var(--white);
  -webkit-transition: max-height 0.3s;
  -moz-transition: max-height 0.3s;
  transition: max-height 0.3s;
}
.checkbox-budget:not(:checked) + label span::before {
  max-height: 0;
}
.checkbox-budget:checked + label span::before {
  max-height: 100%;
}

.checkbox:checked
  ~ .section
  .container
  .row
  .col-xl-10
  .checkbox-budget:not(:checked)
  + label {
  background-color: var(--light);
  -webkit-text-stroke: 1px var(--dark-blue);
  text-stroke: 1px var(--dark-blue);
  box-shadow: 0 1x 4px 0 rgba(0, 0, 0, 0.05);
}

.checkbox-booking:checked + label,
.checkbox-booking:not(:checked) + label {
  position: relative;
  display: -webkit-inline-flex;
  display: -ms-inline-flexbox;
  display: inline-flex;
  -webkit-align-items: center;
  -moz-align-items: center;
  -ms-align-items: center;
  align-items: center;
  -webkit-justify-content: center;
  -moz-justify-content: center;
  -ms-justify-content: center;
  justify-content: center;
  -ms-flex-pack: center;
  text-align: center;
  padding: 0;
  padding: 6px 25px;
  font-size: 14px;
  line-height: 30px;
  letter-spacing: 1px;
  margin: 0 auto;
  margin-left: 6px;
  margin-right: 6px;
  margin-bottom: 16px;
  text-align: center;
  border-radius: 4px;
  cursor: pointer;
  color: var(--white);
  text-transform: uppercase;
  background-color: var(--dark-light);
  -webkit-transition: all 300ms linear;
  transition: all 300ms linear;
}
.checkbox-booking:not(:checked) + label::before {
  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1);
}
.checkbox-booking:checked + label::before {
  box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
}
.checkbox-booking:not(:checked) + label:hover::before {
  box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
}
.checkbox-booking:checked + label::before,
.checkbox-booking:not(:checked) + label::before {
  position: absolute;
  content: "";
  top: -2px;
  left: -2px;
  width: calc(100% + 4px);
  height: calc(100% + 4px);
  border-radius: 4px;
  z-index: -2;
  background-image: linear-gradient(138deg, var(--red), var(--yellow));
  -webkit-transition: all 300ms linear;
  transition: all 300ms linear;
}
.checkbox-booking:not(:checked) + label::before {
  top: -1px;
  left: -1px;
  width: calc(100% + 2px);
  height: calc(100% + 2px);
}
.checkbox-booking:checked + label::after,
.checkbox-booking:not(:checked) + label::after {
  position: absolute;
  content: "";
  top: -2px;
  left: -2px;
  width: calc(100% + 4px);
  height: calc(100% + 4px);
  border-radius: 4px;
  z-index: -2;
  background-color: var(--dark-light);
  -webkit-transition: all 300ms linear;
  transition: all 300ms linear;
}
.checkbox-booking:checked + label::after {
  opacity: 0;
}
.checkbox-booking:checked + label .uil,
.checkbox-booking:not(:checked) + label .uil {
  font-size: 20px;
}
.checkbox-booking:checked + label .text,
.checkbox-booking:not(:checked) + label .text {
  position: relative;
  display: inline-block;
  -webkit-transition: opacity 300ms linear;
  transition: opacity 300ms linear;
}
.checkbox-booking:checked + label .text {
  opacity: 0.6;
}
.checkbox-booking:checked + label .text::after,
.checkbox-booking:not(:checked) + label .text::after {
  position: absolute;
  content: "";
  width: 0;
  left: 0;
  top: 50%;
  margin-top: -1px;
  height: 2px;
  background-image: linear-gradient(138deg, var(--red), var(--yellow));
  z-index: 1;
  -webkit-transition: all 300ms linear;
  transition: all 300ms linear;
}
.checkbox-booking:not(:checked) + label .text::after {
  width: 0;
}
.checkbox-booking:checked + label .text::after {
  width: 100%;
}

.checkbox:checked
  ~ .section
  .container
  .row
  .col-12
  .checkbox-booking:not(:checked)
  + label,
.checkbox:checked
  ~ .section
  .container
  .row
  .col-12
  .checkbox-booking:checked
  + label {
  background-color: var(--light);
  color: var(--dark-blue);
}
.checkbox:checked
  ~ .section
  .container
  .row
  .col-12
  .checkbox-booking:checked
  + label::after,
.checkbox:checked
  ~ .section
  .container
  .row
  .col-12
  .checkbox-booking:not(:checked)
  + label::after {
  background-color: var(--light);
}

.link-to-page {
  position: fixed;
  top: 30px;
  right: 30px;
  z-index: 20000;
  cursor: pointer;
  width: 50px;
}
.link-to-page img {
  width: 100%;
  height: auto;
  display: block;
}


.checkbox-budget + label > a{
    color:white;
}


</style>

<link href="static/css/magiczoom.css" rel="stylesheet" type="text/css" media="screen"/>
<script src="static/js/magiczoom.js" type="text/javascript"></script>
<script type="text/javascript">
    var mzOptions = {};
    mzOptions = {
        onZoomReady: function() {
            console.log('onReady', arguments[0]);
        },
        onUpdate: function() {
            console.log('onUpdated', arguments[0], arguments[1], arguments[2]);
        },
        onZoomIn: function() {
            console.log('onZoomIn', arguments[0]);
        },
        onZoomOut: function() {
            console.log('onZoomOut', arguments[0]);
        },
        onExpandOpen: function() {
            console.log('onExpandOpen', arguments[0]);
        },
        onExpandClose: function() {
            console.log('onExpandClosed', arguments[0]);
        }
    };
    var mzMobileOptions = {};

    function isDefaultOption(o) {
        return magicJS.$A(magicJS.$(o).byTag('option')).filter(function(opt){
            return opt.selected && opt.defaultSelected;
        }).length > 0;
    }

    function toOptionValue(v) {
        if ( /^(true|false)$/.test(v) ) {
            return 'true' === v;
        }
        if ( /^[0-9]{1,}$/i.test(v) ) {
            return parseInt(v,10);
        }
        return v;
    }

    function makeOptions(optType) {
        var  value = null, isDefault = true, newParams = Array(), newParamsS = '', options = {};
        magicJS.$(magicJS.$A(magicJS.$(optType).getElementsByTagName("INPUT"))
            .concat(magicJS.$A(magicJS.$(optType).getElementsByTagName('SELECT'))))
            .forEach(function(param){
                value = ('checkbox'==param.type) ? param.checked.toString() : param.value;

                isDefault = ('checkbox'==param.type) ? value == param.defaultChecked.toString() :
                    ('SELECT'==param.tagName) ? isDefaultOption(param) : value == param.defaultValue;

                if ( null !== value && !isDefault) {
                    options[param.name] = toOptionValue(value);
                }
        });
        return options;
    }

    function updateScriptCode() {
        var code = '&lt;script&gt;\nvar mzOptions = ';
        code += JSON.stringify(mzOptions, null, 2).replace(/\"(\w+)\":/g,"$1:")+';';
        code += '\n&lt;/script&gt;';

        magicJS.$('app-code-sample-script').changeContent(code);
    }

    function updateInlineCode() {
        var code = '&lt;a class="MagicZoom" data-options="';
        code += JSON.stringify(mzOptions).replace(/\"(\w+)\":(?:\"([^"]+)\"|([^,}]+))(,)?/g, "$1: $2$3; ").replace(/\{([^{}]*)\}/,"$1").replace(/\s*$/,'');
        code += '"&gt;';

        magicJS.$('app-code-sample-inline').changeContent(code);
    }

    function applySettings() {
        MagicZoom.stop('Zoom-1');
        mzOptions = makeOptions('params');
        mzMobileOptions = makeOptions('mobile-params');
        MagicZoom.start('Zoom-1');
        updateScriptCode();
        updateInlineCode();
        try {
            prettyPrint();
        } catch(e) {}
    }

    function copyToClipboard(src) {
        var
            copyNode,
            range, success;

        if (!isCopySupported()) {
            disableCopy();
            return;
        }
        copyNode = document.getElementById('code-to-copy');
        copyNode.innerHTML = document.getElementById(src).innerHTML;

        range = document.createRange();
        range.selectNode(copyNode);
        window.getSelection().addRange(range);

        try {
            success = document.execCommand('copy');
        } catch(err) {
            success = false;
        }
        window.getSelection().removeAllRanges();
        if (!success) {
            disableCopy();
        } else {
            new magicJS.Message('Settings code copied to clipboard.', 3000,
                document.querySelector('.app-code-holder'), 'copy-msg');
        }
    }

    function disableCopy() {
        magicJS.$A(document.querySelectorAll('.cfg-btn-copy')).forEach(function(node) {
            node.disabled = true;
        });
        new magicJS.Message('Sorry, cannot copy settings code to clipboard. Please select and copy code manually.', 3000,
            document.querySelector('.app-code-holder'), 'copy-msg copy-msg-failed');
    }

    function isCopySupported() {
        if ( !window.getSelection || !document.createRange || !document.queryCommandSupported ) { return false; }
        return document.queryCommandSupported('copy');
    }
</script>


<script>
   $(document).ready(function() {

$("#rent_price").html('<?php echo $final_rent ; ?>');


    
    $("#rent_price").html(''); 
    // var days = $(this).attr('id');
    

    var days = "<?php echo $_GET['days']; ?>";
    if(days=='' || days == undefined){
        days=3;
    }
    var rent_price = parseInt('<?php echo $final_rent; ?>') ; 
    
    var rent_calc_single = rent_price*0.05;
    
    if(days == 3){
    var rent_calc = rent_price;                
    }
    else if(days == 4){
        
        var rent_calc = rent_price + rent_calc_single; 
    }
    else if(days == 5){
        var rent_calc = rent_price + (days-3)*rent_calc_single;
    }
    else if(days == 6){
        var rent_calc = rent_price + (days-3)*rent_calc_single;
    }
    else if(days == 7){
        var rent_calc = rent_price + (days-3)*rent_calc_single;
    }
    
    rent_calc = Math.round(rent_calc);
    rent_calc = rent_calc.toString();

    $("#rent_price").html( round_amount(rent_calc));
    
   }); 
        
        

</script>

<?php

if($missingDates){
    $start_date = $missingDates[0];
    $days = $_GET['days']-1;
    $end =  date('m/d/Y', strtotime($start_date. ' + ' . $days .' days'));    
}
else{
    $start_date = date('m/d/Y', strtotime( '+7 days'));
    $days = $_GET['days']-1;
    $end =  date('m/d/Y', strtotime($start_date. ' + ' . $days .' days'));
}



 


if(array_search($end,$your_date)){ ?>
   <script>
      alert('The product is already booked on selected date !');
       setTimeout(function(){ 
          window.history.back();
       }, 1500);

   </script> 
    
<? }

?>







	<section class="bgwhite p-t-55 p-b-65 ">
		<div>
		    <div>
        		<div class="col-sm-12 col-md-12 col-lg-12">
        			<div>
        				<div class="flex-w">

        					<ol class="breadcrumb" style="display:inline-flex">
                    		  <?php
                    		  if($type=="1")
                    		  {
                    		      ?>
                    		       <a href="sub_category.php?type=1"><li class=""> <?php echo "Jewellery";?>&nbsp; / &nbsp;</li></a> 
                    		      <?php
                    		  } else if($type=="2")
                    		  { ?>
                    		       <a href="sub_category.php?type=2"><li class=""> <?php echo "Apparels";?>&nbsp; / &nbsp;</li></a>
                    		      <?php  
                    		  }
                    		 
                    		  if($type=="1")
                    		  {
                    		    $gtmctnm=mysql_query("select name,maincat_id from subcat1 where subcat_id='".$rws[8]."'");
                    		    $grmrws=mysql_fetch_array($gtmctnm);
                    		    
                    		    $gtmctnm2=mysql_query("select categories_name from jewel_subcat where subcat_id='".$grmrws[1]."'");
                    		    $grmrws2=mysql_fetch_array($gtmctnm2);
                        	    ?>
                        	    <?php if(strtolower($grmrws2[0]) != strtolower($grmrws[0])) { ?>
                        		    <li class=""><a href="javascript:void(0);" onclick='brdcrumbfunc("<?php echo $grmrws[1];?>","<?php echo $subcatid;?>","<?php echo $typ;?>","1");'><?php echo ucfirst(strtolower($grmrws2[0]));?></a></li>&nbsp; / &nbsp;
                        	    <?php } ?>
                        		    
                                <!--<li class=""><?php echo $grmrws2[0];?></li>-->
                                <li class=""><a href="javascript:void(0);" onclick='brdcrumbfunc("<?php echo $grmrws[1];?>","<?php echo $rws[8];?>","<?php echo $typ;?>");'><?php echo ucfirst(strtolower($grmrws[0]));?></a></li>&nbsp; / &nbsp;
                        	<?php }  else  if($type=="2"){ 
                    		        $gtmctnm=mysql_query("select name from garments where garment_id='".$rws['product_for']."'");
                    		        $grmrws=mysql_fetch_array($gtmctnm);
                    		  ?>
                    		 <li class=""><a href="javascript:void(0);" onclick='brdcrumbfunc("<?php echo $rws['product_for'];?>","<?php echo "0";?>","<?php echo $typ;?>");'><?php echo ucfirst(strtolower($grmrws[0]));?></a></li>&nbsp; / &nbsp;
                    		 
                    		 <?php } ?>
                    	</ol>
    				</div> 
    				<hr style="width:100%;background:#ccc;">
    			</div>
    		</div>
        		<div class="container bgwhite p-t-35 p-b-80"> 
        			<div class="flex-w flex-sb" >
        				<div class="w-size13 p-t-0 respon5">
        					<div class="wrap-slick3 flex-sb flex-w">
        					
        						
        					</div>
                            
                            <div class="app-figure" id="zoom-fig">
                                <a id="Zoom-1" class="MagicZoom" title="Show your product in stunning detail."
                                    href="<?php echo $path; ?>"
                                    data-zoom-image-2x="<?php echo $path; ?>"
                                    data-image-2x="<?php echo $path; ?>"
                                >
                                    <img src="<?php echo $path; ?>" srcset="<?php echo $path; ?>?h=800 2x"
                                        alt=""/>
                                </a>
                                <div class="selectors">
                                    <?php 
                                        if($type=="1")
                                        {
                                            $sqlimg="SELECT img_name FROM `product_images_new` WHERE `product_id`='$prid' order by rank";
                                        }
                                        else if($type=="2") 
                                        {
                                            $sqlimg="SELECT img_name FROM `product_images_new` WHERE `gproduct_id`='$prid' order by rank";
                                        }
                                        
                                        //echo $sqlimg;
                                        
                                        $qryimg=mysql_query($sqlimg);
                                        while($rowimg23=mysql_fetch_array($qryimg))
                                        {
                                            $img = str_replace("/ ","/",$rowimg23[0]); 
                                        
                                            $path=trim($pathmain."uploads".$img);
                                            
                                            $expl=explode('/',$path);
                                            
                                            $cnt=count($expl);
                                            
                                            $angle_img=trim($pathmain."thumbs/".trim($expl[$cnt-1]));
                                            $zoom_img = $path;
                                            
                                    ?>
                                    <a
                                        data-zoom-id="Zoom-1"
                                        href="<?php echo $zoom_img; ?>"
                                        data-image="<?php echo $zoom_img; ?>"
                                        data-zoom-image-2x="<?php echo $zoom_img; ?>"
                                        data-image-2x="<?php echo $zoom_img; ?>"
                                    >
                                        <img srcset="<?php echo $angle_img; ?>?h=120 2x" src="<?php echo $angle_img; ?>" style=" height:100px;"/>
                                    </a>
                                    
                                    <?php } ?>
                                </div>
                            </div>
        				</div>
        				<div class=" bo9 w-size14 p-t-0 respon5 p-b-0 ">
					        <div class=" p-l-20 p-r-20 p-t-20 p-b-20 mainbox">	
                        		<h4 class="product-detail-name m-text15 p-b-10">
                        			<?php echo $rws[3];?>
                        		</h4>
        							
        						<span class="p-b-10" style="color:#E6BE6E;"><strong>SKU: <?php echo $rws[2];?></strong></span>
        						<br>
        						<?php
                                if($rws['discount']>0){
                                    $ab=($rws['discount']/100)*$rero[0];
                                    $newsp=$rero[0]-$ab;
                                }
                                $mrp_price = $rero[0];
                                if($rero[0]==$newsp)
                                { 

                                ?>
                                   <span class="p-b-10" style="color:#E6BE6E;"><strong>MRP: <?php echo $rero[0]; ?></strong></span>
                                   <input type="hidden" name="mrp" id="mrp" value="<?php echo $rero[0]; ?>">
                                   <?php 
                                } else { 
                                   ?> 
                                   <span class="p-b-10" style="color:#E6BE6E	;"><strong>MRP: <strike><?php echo $rero[0]; ?></strike> <b>Now </b> <?php echo $newsp; ?>  <br /> </strong> </span>
                                   
                                   <input type="hidden" name="price1" id="price" value="<?php echo $newsp; ?>">
                                   
                                    <?php if($rws['discount']>0){ ?>
                                        <font color="#00ff99"><b>Flat</b></font> &nbsp;<?php echo $rws['discount']; ?>%  off<br />
                                        <span class="p-b-10" style="color:#E6BE6E	;"><strong>Flat: </strong></span>
                                    <?php
                                    }
                                }
                        
                   
                          
                                ?>
                                                                <br>
                                
            						<?php if($pick_date!='' && $delivery_date!='' && get_booking_status($row[2]) !='Returned') { ?>
                            						<span class="block2-price m-text6 p-r-5">
                            						    <?php
                            						    if(date("m/d/Y", strtotime($pick_date)) === '01/01/1970'){
                            						        
                            						    }else{ ?>

                                                            <span class="p-b-10" style="color:#E6BE6E;"><strong>Booking Status Dates : <?php echo date("m/d/Y", strtotime($pick_date)) .' - '. date("m/d/Y", strtotime($pick_date)) ;?></strong></span>

                            						    <?php }
                            						    
                            						    ?>

                        						    </span>
                    						    <?php } ?>
                    						    

                                
                                <span class="label label-primary">
                                    <?php //echo $book_status $pick_date $delivery_date; ?>
                                </span>
						        
						        <hr style="background-color:#e6be6e"> 
						
							<div class="fs-15 p-b-5">
								<div class="">
									<table style="border:0px;">
										<tr style="border:0px; padding-bottom: 10px; ">
    										<td style="border:0px; padding-bottom: 10px; "	>
    									        <span class="fs-15"  style="color: #555555;"> <b>Rent Price</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
    										</td>
    										
    										<td style="border:0px; padding-bottom: 10px; "><b>:</b></td>
    										
    										<td style="border:0px; padding-bottom: 10px; ">
            									<strong>
            										<span class="fs-15 m-l-10" style="color: #424242;font-size: 18px;" >Rs. <label id="rent_price"> </label> </span>
            									</strong>
            								</td >
								        </tr>
								        
								        <input type="hidden" name="sku" id="sku" value="<?php echo $rws[2];?>">
								        
        								<tr>
        									<p></p>	
        								</tr>

        								<tr>
        									<td style="border:0px; padding-bottom: 10px; ">
        								        <span class="fs-15 "  style="color: #555555;"><b>Deposit</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
        								    </td>
        								    <td style="border:0px; padding-bottom: 10px; "><b>:</b></td>
        									<td style="border:0px; padding-bottom: 10px; " >
            									<strong>
            							
            							<span class="fs-15 m-l-10"  style="font-size: 18px;color: #424242;" >Rs. <label id="deposite_amount" ><?php echo round_amount($deposit); ?></label></span>
            									</strong>
        									</td>
        								</tr>
        								<tr>
        									<p></p>	
        								</tr>
								        <!-- stock -->
										
										<div class="m-t-10">
											<tr>
												<td style="border:0px;padding-bottom: 10px; ">
											        <span class="fs-15 " style="color: #555555;"><b>Stock</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
										        </td>
    											<td style="border:0px;padding-bottom: 10px; "><b>:</b></td>
    												<td style="border:0px;padding-bottom: 10px; ">
    												<span class="fs-15 m-b-15 m-t-15 m-l-10 " style="color: #000000;"><?php echo $qty; ?> in stock</span>
    											</td>
											</tr>
											<tr>
												<td style="border:0px;" ></td>
											        <p></p>
											    </td>	
											</tr>
										</div>
    								
									</table>
								</div>
							</div>
						
						    <hr style="background-color:#e6be6e">
						    <p><strong class="m-b-5" style="color: #444444;">Rental period</strong></p>

<style>

.day_select{
    display:flex;
}
        .day_select div , .day_select div label {
            width: 100%;            
        }

.day_select div label{
    padding:10% ! important;    
    text-align:center;
}

.day_select div{
    margin: auto 1%;    
}

</style>
							<div class="day_select">
							    
							    <div>
							    <input class="checkbox-budget" type="radio" name="budget" id="3" <? if($_GET['days']==3 || !isset($_GET['days']) ){ echo 'checked'; }?> >
        						<label class="for-checkbox-budget" for="3">
        							<a href="<?php echo $url .  '&&days=3'?>"><span data-hover="3 Days">3 Days</span></a>
        						</label>							        
							    </div>

        						<div>
        						<input class="checkbox-budget" type="radio" name="budget" id="4" <? if($_GET['days']==4 ){ echo 'checked'; }?>>
        						<label class="for-checkbox-budget" for="4">
        							<a href="<?php echo $url .  '&&days=4'?>"><span data-hover="4 Days">4 Days</span></a>
        						</label>        						    
        						</div>

        						<div>
        						    <input class="checkbox-budget" type="radio" name="budget" id="5" <? if($_GET['days']==5 ){ echo 'checked'; }?>>
        						<label class="for-checkbox-budget" for="5">
        							<a href="<?php echo $url .  '&&days=5'?>"><span data-hover="5 Days">5 Days</span></a>

        						</label>
        						</div>
        						
        						<div>
        						<input class="checkbox-budget" type="radio" name="budget" id="6" <? if($_GET['days']==6 ){ echo 'checked'; }?>>
        						<label class="for-checkbox-budget" for="6">							
        							<a href="<?php echo $url .  '&&days=6'?>"><span data-hover="6 Days">6 Days</span></a>
        						</label>    
        						</div>
                				
                				<div>
                				<input class="checkbox-budget" type="radio" name="budget" id="7" <? if($_GET['days']==7 ){ echo 'checked'; }?>>
        						<label class="for-checkbox-budget" for="7">							
        							<a href="<?php echo $url .  '&&days=7'?>"><span data-hover="7 Days">7 Days</span></a>
        						</label>    
                				</div>
        						


						    </div>
						    
						    <hr style="background-color:#e6be6e">
							<div class="">
							    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxOCIgaGVpZ2h0PSIxOCI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48ZWxsaXBzZSBjeD0iOSIgY3k9IjE0LjQ3OCIgZmlsbD0iI0ZGRTExQiIgcng9IjkiIHJ5PSIzLjUyMiIvPjxwYXRoIGZpbGw9IiMyODc0RjAiIGQ9Ik04LjYwOSA3LjAxYy0xLjA4IDAtMS45NTctLjgyNi0xLjk1Ny0xLjg0NSAwLS40ODkuMjA2LS45NTguNTczLTEuMzA0YTIuMDIgMi4wMiAwIDAgMSAxLjM4NC0uNTRjMS4wOCAwIDEuOTU2LjgyNSAxLjk1NiAxLjg0NCAwIC40OS0uMjA2Ljk1OS0uNTczIDEuMzA1cy0uODY0LjU0LTEuMzgzLjU0ek0zLjEzIDUuMTY1YzAgMy44NzQgNS40NzkgOC45MjIgNS40NzkgOC45MjJzNS40NzgtNS4wNDggNS40NzgtOC45MjJDMTQuMDg3IDIuMzEzIDExLjYzNCAwIDguNjA5IDAgNS41ODMgMCAzLjEzIDIuMzEzIDMuMTMgNS4xNjV6Ii8+PC9nPjwvc3ZnPg==" class="location_icon" style="margin-right: 6px;">
							    <strong class="m-b-5" style="color: #444444;">Deliver to </strong>
							    <div class="">
    								<form class = "formimages" class="" enctype="multipart/form-data" method="POST" >
    									<div style="display: flex; margin: 1%;">
    										<input  type='text' placeholder="Enter your pincode" style="padding:5px;width:70%; margin: auto 1%;border:1px solid #353746 !important;" name="delivery_pin" id="delivery_pin" value=""/>
    									    <input class="btn btn-primary" type="button"  value="check Location"  id = "check_location" name="check_location"  style="width:30%; padding:0;  background-color: #353746;color: white;"/>
    									    
    									</div>
    								</form>
							    </div>	
						    </div>
						    <br>
						    




   
							<div class="">
							    <strong class="" style="color: #444444;">Select Date : </strong> <br>
							    <div class="" style="border-color:#E6BE6E;">
    								<div class="bo1 input-container lengthdate" style="border-color:#353746;">
    									<i class="fa fa-calendar icon" style="font-size:14px;color: white; background-color: #353746;"></i>
								        <input type="text" name="daterange" id="dateRangeP" value="<?php echo $start_date . ' - ' . $end?>"  style="text-align: left; width: 100%;padding-left: 3%;"></p>
    								</div>
							    </div>
						    </div>
							<!--<div class="rating" style="margin-top: 29px;">-->
							<br>
							<!--<div >-->
       <!--                     	<span class="review-no"><?php echo $total_view;?> people viewed this product.</span>-->
       <!--                     </div>-->
                            <?php
                            $rating_result = get_rating_review($id,$type);
                             if($rating_result['rating_count'] > 0) {
                                $total_rating = $rating_result['total_rating'] / $rating_result['rating_count'];
                             } else {
                                $total_rating = 0;
                             }
                            
                            ?>
                            
                            <br>
<br>

		                    <!-- add to cart code -->
							
							<?php if($qty > 0){ ?>
							    							<div class="">
										<input class="btn" type="button" value="Add To Cart"  id = "add_to_cart" name="add_to_cart"  style="background-color: #353746;color: white; width:100%;"/>
							</div>
							<? }
							else{ ?>
							    <a href="#" class="btn" style="background-color: #353746;color: white; width:100%;">Sorry ! This Product is not available now !</a> 
							<? } ?>

							<input type="hidden" name="h_days_index" id="id_days_index" value="" />
		                    <!-- end add to cart code -->
		                </div>
				    </div>
			    </div>
			    <?php if($rws['gproduct_desc']) { ?>
    			    <div class="flex-w flex-sb respondesc" >
        				<div class="bo9 p-t-20 p-t-20 p-l-20 p-r-20 p-b-20 m-t-40">
        					<h5 class="fs-16" style="color: #444444;"><strong> Description :</strong> </h5>
        					<hr/>
        					<div class="dropdown-content p-t-15 p-b-23">
        						<p class="s-text8">
        							<p> <?php echo $rws['gproduct_desc'];  ?></p>
        					</div>
        				</div>
        			</div>
    			<?php } ?>
		    </div>
		</div>
	</div>
  </div>
</section>







<script>
$(function() {
    var result = new Date();
    result.setDate(result.getDate() + 7);




    $('input[name="daterange"]').daterangepicker({

        dateLimit: { days: 7 },
        "dateFormat": "dd-mm-yy",
        "maxDate": 7,
        minDate: result,
        locale: {
            format: 'MM/DD/YYYY '
        }
    });
  
});


var array2 = <?php echo $block_date_json; ?>;
var array1 = [] ; 
var array= array1.concat(array2); 

$(function(){
       $('input[name="daterange"]').daterangepicker({
        format: 'YYYY-MM-DD',
        minDate: new Date(),
        isInvalidDate: function(date) {
        for (i = 0; i < array.length; i++) {            
            if (date.format('MM/DD/YYYY') == array[i]) {
                return true; 
                }
            }
        }
    });
});



	$('#add_to_cart').on('click',function() {
	    

    var pid = <?php echo $id; ?>;
    var type = <?php echo $type?>;
    var qty = 1;
    var sku = document.getElementById('sku').value;
    var price = $("#rent_price").html();
    var dateRangeP = $('#dateRangeP').val();
    var dateRangeP_arr = dateRangeP.split('-');
    var sales_price = <?php echo $newsp; ?>;
    var deposit = $('#deposite_amount').html();
    
    console.log('pid = '+pid);
    console.log('type = '+type);
    console.log('sku = '+sku);
    console.log('price = '+price);
    console.log('from = '+dateRangeP_arr[0]);
    console.log('to = '+dateRangeP_arr[1]);
    console.log('sales_price = '+sales_price);
    console.log('deposit = '+deposit);




    
	if($('#dateRangeP').val()==''){
		alert('Please select Date or Days');
	}
	else {
	    $.ajax({
           type: 'POST',    
            url:'addcart_process_demo.php',
            data:'pid='+pid+'&type='+type+'&qty='+qty+'&rent_date='+dateRangeP_arr[0]+'&return_date='+dateRangeP_arr[1]+'&price='+price+'&deposit='+deposit+'&sales_price='+sales_price,
            
            success: function(msg){
                swal('Product Added To cart successfully ! ');
                setTimeout(function(){ 
                    // window.location.href="cart.php";
                }, 3000);


            }
        });
		
	  //  $(".cart_anchor").effect( "shake", { direction: "left", times: 4, distance: 101}, 2000 );
	 }
});


</script>




<?php include('footer.php'); ?>