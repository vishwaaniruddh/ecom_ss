<?php session_start();
include('header.php');
// daterangepicker_end   daterangepicker_start
?>

<style>
.daterangepicker{
    position: fixed;
    top: 35% !important;
    left: 24% !important;
    bottom: 25%;
    right: 10%;
    width: 50%;
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



	/*.ui-datepicker-prev span,
	.ui-datepicker-next span {
		background-image: none !important;
	}

	.ui-datepicker-prev:before,
	.ui-datepicker-next:before {
	  font-family: FontAwesome;
	  position: absolute;
	  top: 0;
	  right: 0;
	  bottom: 0;
	  left: 0;
	  display: flex;
	  font-weight: normal;
	  align-items: center;
	  justify-content: center;
	}

	.ui-datepicker-prev:before {
	  content: "\f100";
	}

	.ui-datepicker-next:before {
	  content: "\f101";
}*/
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

	/*@media screen and (max-width: 600px) {
  	.container{
    background-color: orange;
  	}*/
	/*@media screen and (max-width:424px) {    
		.lengthdate
		{ 
			width:300px; 
		} 
	}
	@media screen and (min-width: 1024px) {   
		.mainbox
		{
		 	height:650px;
		}
	}
	@media screen and (min-width: 924px) {  
		.respondesc 
		{
		 	margin-left: 120px;
		}
	}*/

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
  /*padding-top: 20px;*/
  /*padding-bottom: 20px;*/
  /*width: 260px;*/
  /*font-size: 52px;*/
  /*line-height: 52px;*/
  /*font-weight: 700;*/
  /*letter-spacing: 1px;*/
  /*margin: 0 auto;*/
  /*margin-left: 5px;*/
  /*margin-right: 5px;*/
  /*margin-bottom: 10px;*/
  /*text-align: center;*/
  /*border-radius: 4px;*/
  /*overflow: hidden;*/
  /*cursor: pointer;*/
  /*text-transform: uppercase;*/
  /*-webkit-transition: all 300ms linear;*/
  /*transition: all 300ms linear;*/
  /*-webkit-text-stroke: 1px var(--white);*/
  /*text-stroke: 1px var(--white);*/
  /*-webkit-text-fill-color: transparent;*/
  /*text-fill-color: transparent;*/
  /*color: transparent;*/
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



</style>
<!--<script type='text/javascript' src='https://amazingslider.com/wp-includes/js/jquery/jquery.js?ver=1.12.4-wp' id='jquery-core-js'></script>-->
<!--<script type='text/javascript' src='https://amazingslider.com/wp-content/uploads/amazingslider/sharedengine/amazingslider.js?ver=4.2' id='amazingslider-script-js'></script>-->
<!--<script type='text/javascript' src='static/js/amazingslider.js?ver=5.6' id='amazingslider-script-js'></script>-->

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

<?php
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

//echo  $sql;

$table=mysql_query($sql);
$rws=mysql_fetch_array($table);
$total_view =  $rws['seen_count'];

if(isset($_SESSION['product_viewed_counts']['pid']) && $_SESSION['product_viewed_counts']['pid']==$id){
    $seen_count = 0;
}  else {
    $_SESSION['product_viewed_counts']['pid'] = $id;
    $seen_count=1;
}

$total_view =  $rws['seen_count'] + $seen_count;

if($type=="1")
{
    $insert_count = mysql_query("update product set seen_count='".$total_view."' where product_id='".$id."'");

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
    $insert_count = mysql_query("update garment_product set seen_count='".$total_view."' where gproduct_id='".$id."'");
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
    $re1 = mysqli_query($con3,"select sum(commission_amt) from order_detail where item_id='".$rws[2]."' and bill_id in(select bill_id from phppos_rent where booking_status!='Booked')");
    $rero1 = mysqli_fetch_row($re1);
    $currentsp=$rero[0]-$rero1[0];
    $splimit=$rero[1]*0.8;
    if($currentsp>$splimit)
        $newsp=$currentsp;
    else
        $newsp=$splimit;
    
    if($newsp<=30000)
        $rentprice=$newsp*0.2;
    else if($newsp<=60000)
        $rentprice=$newsp*0.15;
    else
        $rentprice=$newsp*0.12;
    
        $deposit=$rero[1]-$rentprice; 

        $qty=round($rero[2]);
        $qtyr=round($rero[2]); 
    
//echo $qty;

if($type=="1") 
{
    /** if jewellery ***/
    if($rws[11]!="" & $rws[11]>0.00)
    {
        $newsp=$rws[11];
    }

    if($newsp!="" & $newsp>0.00)
    {
        $rentprice=$newsp;
    }

    if($rws[15]!="" & $rws[15]>0.00)
    {
        $deposit=$rws[15];
    }
    $todaysdt=date("Y-m-d");
    $qrybk23toc=mysqli_query($con3,"SELECT * FROM `order_detail` where `item_id`='".$rws[2]."' and bill_id in(SELECT bill_id  FROM `phppos_rent` WHERE (`pick_date` >=".$todaysdt." or `delivery_date` >=".$todaysdt.") and booking_status='Picked' ORDER BY `phppos_rent`.`pick_date` ASC) group by bill_id");
    while($gtfrbk23totc=mysqli_fetch_array($qrybk23toc))
    {
        $qty=$qty+$gtfrbk23totc[9];
    }

    /**** get social sites details of jewellerty****/
    $fb=$rws[16];
	$insta=$rws[17];
	$google=$rws[18];

	$twitter=$rws[19];

	$pin=$rws[20];

	$flipkart=$rws[21];
    $amazon=$rws[22];

}
/**** if $typ=="1" end ***/

if($type=="2")
{
    /** if garment***/

    if($rws[8]!="" & $rws[8]>0.00)
    {
        //echo $rws[8];
        $newsp=$rws[8];
    }

    if($newsp!="" & $newsp>0.00)
    {
        $rentprice=$newsp;
    }

    if($rws[12]!="" & $rws[12]>0.00)
    {
        $deposit=$rws[12];
    }

    /**** get social sites details of jewellerty****/

    $fb=$rws[13];

	$insta=$rws[14];

	$google=$rws[15];

	$twitter=$rws[16];

	$pin=$rws[17];

	$flipkart=$rws[18];
	
    $amazon=$rws[19]; 

}
    /**** if $typ=="2" end ***/
    $todaysdt=date("Y-m-d");
    //echo "SELECT * FROM `order_detail` where `item_id`='".$rws[2]."' and bill_id in(SELECT bill_id  FROM `phppos_rent` WHERE (`pick_date` >=".$todaysdt." or `delivery_date` >=".$todaysdt.") ORDER BY `phppos_rent`.`pick_date` ASC) group by bill_id";
    $qrybk=mysqli_query($con3,"SELECT * FROM `order_detail` where `item_id`='".$rws[2]."' and bill_id in(SELECT bill_id  FROM `phppos_rent` WHERE (`pick_date` >=".$todaysdt." or `delivery_date` >=".$todaysdt.") and booking_status!='Returned'  ORDER BY `phppos_rent`.`pick_date` ASC) group by bill_id");
    $nrwbk=mysqli_num_rows($qrybk);
    
    
if($transtyp=="2")
{
   // echo "222";
    
    $qrybk2=mysqli_query($con3,"SELECT * FROM `order_detail` where `item_id`='".$rws[2]."' and bill_id in(SELECT bill_id  FROM `phppos_rent` WHERE (`pick_date` >=".$todaysdt." or `delivery_date` >=".$todaysdt.")  and booking_status!='Returned' ORDER BY `phppos_rent`.`pick_date` ASC) group by bill_id");

    $dtarr=array();

    while($gtfrbk2=mysqli_fetch_array($qrybk2))
    {
        $qryrentbk=mysqli_query($con3,"Select pick_date, delivery_date, booking_status from phppos_rent where bill_id='".$gtfrbk2[0]."'");
        
        // echo "Select pick_date, delivery_date, booking_status from phppos_rent where bill_id='".$gtfrbk2[0]."'";
        $qty=$qty-$gtfrbk2[9];
        
        $data = mysqli_fetch_assoc($qryrentbk);
        $pick_date = $data['pick_date'];
        $delivery_date = $data['delivery_date'];
        $book_status = $data['booking_status'];
    }
} else {
    //echo "333";
    $qrybk2=mysqli_query($con3,"SELECT * FROM `order_detail` where `item_id`='".$rws[2]."' and bill_id in(SELECT bill_id  FROM `phppos_rent` WHERE (`pick_date` >=".$todaysdt." or `delivery_date` >=".$todaysdt.")  and booking_status!='Returned' ORDER BY `phppos_rent`.`pick_date` ASC) group by bill_id");

    $dtarr=array();

    while($gtfrbk2=mysqli_fetch_array($qrybk2))
    {
        $qryrentbk=mysqli_query($con3,"Select pick_date, delivery_date, booking_status from phppos_rent where bill_id='".$gtfrbk2[0]."'");
        // echo "Select pick_date, delivery_date, booking_status from phppos_rent where bill_id='".$gtfrbk2[0]."'";
        $qtyr=$qtyr-$gtfrbk2[9];
        
        //$book_status $pick_date $delivery_date
        
        $data = mysqli_fetch_assoc($qryrentbk);
        $pick_date = $data['pick_date'];
        $delivery_date = $data['delivery_date'];
        $book_status = $data['booking_status'];
    }
}

?>
<?php 
if($type=="1")
{
    $sqlpn="SELECT * FROM `product` WHERE `subcat_id`='".$rws['subcat_id']."'";
    $sqlpn24="SELECT name  FROM `subcat1` WHERE `subcat_id`='".$rws['subcat_id']."'";
}
else if($type=="2")
{
    $sqlpn="select * from  `garment_product` where product_for='".$rws['product_for']."' and  gproduct_id in(select gproduct_id from product_images_new where gproduct_id>0)";
    $sqlpn24="SELECT name  FROM `garments` WHERE `garment_id`='".$rws['product_for']."'";
}

$gtnm=mysql_query($sqlpn24);
$nmrws=mysql_fetch_array($gtnm);
$table=mysql_query($sqlpn);
$Num_Rows = mysql_num_rows ($table);

//=================
$pidarr="";

$prchsproid=mysqli_query($con3,"select b.name from phppos_purchase_details a, phppos_items b where a.item_id=b.item_id order by a.pur_id desc");
$prchsproidnr=mysqli_num_rows($prchsproid);

while($prchid=mysqli_fetch_row($prchsproid)){
    if($pidarr==""){
        
        $pidarr="'".$prchid[0]."'";
    }else{
        
        $pidarr=$pidarr.","."'".$prchid[0]."'";
    }
}
//echo $pidarr;

if($type=="1")
{
    $sqlpn=$sqlpn." and product_code in ($pidarr)";
    $sqlpn=$sqlpn." order by field(product_code,$pidarr) ";
}
else if($type=="2")
{
    $sqlpn=$sqlpn." and gproduct_code in ($pidarr)";
    
    $sqlpn=$sqlpn." order by field(gproduct_code,$pidarr)  ";
}

//echo $sqlpn;
$qrys3=mysql_query($sqlpn);
//===============
$productid=array();

while($row123=mysql_fetch_array($qrys3))
{
    $productid[]=$row123[0];
}

    $getproid=array_search($prid, $productid);	
    //	print_r($productid);
	//echo "fgvd ".$getproid;

    $cnt=count($productid);
    $tl=$cnt-1;

    $nxtt=$getproid+1;
    $prv=$getproid-1;

?>

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
$rowimg=mysql_fetch_row($qryimg);
$img_path ='https://yosshitaneha.com/uploads';
$pathmain = 'https://yosshitaneha.com/';
//$path=trim($pathmain."static/images/catalog/products".$rowimg[0]);	
$path = $img_path.$rowimg[0];

?>


<form method="post" style="margin-bottom: 0;" enctype="multipart/form-data" >
	<input type="hidden" name="final_amount" id="final_amt_id" value=ad"">
	<input type="hidden" name="selected_days" id="selected_days_id" value="">
	<input type="hidden" n35000ame="user_id" id="user_id_id" value="">
	<input type="hidden" name="deposite_amount" id="deposite_amount" value="<?php echo $deposit;?>">
	<input type="hidden" name="from_date" id="from_date" value="">
	<input type="hidden" name="till_date" id="till_date" value="">
	<input type="hidden" name="rent_amt" id="rent_amt" value="<?php echo $rentprice;?>">
	
	<section class="bgwhite p-t-55 p-b-65 ">
		<div>
		    <div>
        		<div class="col-sm-12 col-md-12 col-lg-12">
        			<div>
        				<div class="flex-w">
        					<!--<a href="sub_category.php?page=1">Jewellery&nbsp;</a>/&nbsp;
        					<a href="list.php?page=1">American Diamond</a> / CZ/AD choker necklace set with golden polish and ruby coloured stones--> 
        					
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
                    		    //echo "select name,maincat_id from subcat1 where subcat_id='".$rws[8]."'";
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
        						<!--<div class="wrap-slick3-dots y-scroll">
        						</div>
        	
        						<div class="slick3">
        							<div class="item-slick3" data-thumb="<?php echo $path;?>">
        								<div class="wrap-pic-w">
        									<section class="bgwhite">
        										<div class="">
          											<figure class="zoom" onmousemove="zoom(event)" style="background-image: url( '<?php echo $path; ?>')">
        											    <img class="test" id="img1" src="<?php echo $path; ?>" />
        											</figure>
        										</div>
        								 	</section>										
        								</div>
        							</div>
        						</div>-->
        						
        					</div>
        					<?php /* 
        					<div id="primary">
                    			<div class="demo-slider">
                                    <div id="amazingslider-23" style="display:block;position:relative;">
                                        <ul class="amazingslider-slides" style="display:none;">
                                            
                                            <?php 
                                            while($rowimg23=mysql_fetch_array($qryimg))
                                            {
                                                $img = str_replace("/ ","/",$rowimg23[0]); 
                                            
                                                $path=trim($pathmain."uploads".$img);
                                                
                                                $expl=explode('/',$path);
                                                
                                                $cnt=count($expl);
                                                
                                                $angle_img=trim($pathmain."thumbs/".trim($expl[$cnt-1]));
                                                
                                            ?>
                                            <li>
                                            <figure class="zoom" onmousemove="zoom(event)" style="background-image: url( '<?php echo $path; ?>')">
                                                <img class="test" src="<?php echo $path;?>"  alt="" style="margin-top:0;"/>
                                            </figure>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                        <ul class="amazingslider-thumbnails" style="display:none;">
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
                                                
                                            ?>
                                            <li><img src="<?php echo $angle_img; ?>" /></li>
                                        <?php } ?> 
                                        </ul>
                                    </div>
                                    <script src="https://amazingslider.com/wp-content/uploads/amazingslider/23/sliderengine/initslider.js"></script>
                                </div>			
                            </div>
                            
                            */ ?>
                            
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
                        
                         if($type=="1") //jwellery 
                        {
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
                            
                            if($newsp<=40000)
                                $rentprice=$newsp*0.20;
                            else if($newsp<=60000)
                                $rentprice=$newsp*0.17; 
                            else
                                $rentprice=$newsp*0.15;
                                
                                
                                
                               if($newsp<=10000){
                                   $courier = 750;
                               }else {
                                   $courier = 1000;                                   
                               }
                            
                            if($rentprice<1500){
                                $rentprice  =1500;

                            }
                        }
                          
                               $deposit=$newsp*0.35;
                                
                                
                                $final_rent = round_amount($rentprice  + $courier) ;
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
                    						    

                                
                                <span class="label label-primary"><?php //echo $book_status $pick_date $delivery_date; ?></span>
						        <!--<span class="p-b-10" style="color:#E6BE6E	;"><strong>MRP: 11000.00</strong></span>-->
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
            										<!--<span class="fs-15 m-l-10" id="finalVaueForRentel" style="font-size: 18px;color: #424242;"></span>-->
            										<span class="fs-15 m-l-10"  style="font-size: 18px;color: #424242;">Rs. <?php echo round_amount($deposit); ?></span>
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
    									<!-- end stock -->
    									<!-- color -->
									
										<!--<div class="">
											<tr class="m-t-10">
												<td style="border:0px; padding-bottom: 10px; ">
											
												    <span class="fs-15" style="color: #555555;"><b>Color</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span> 
											    </td>
											    <td style="border:0px;padding-bottom: 10px; "><b>:</b>&nbsp;&nbsp;&nbsp;</td>
    											<td style="border:0px;padding-bottom: 10px; ;">
    												<span class="fs-15 m-b-15 m-t-15 m-l-10 " style="color: #000000;">GOLD &amp; RUBY</span>
    											</td>
										    </tr>
										    <tr>
            									<p></p>	
            								</tr>
										</div>-->
									    <!-- end color -->
									</table>
								</div>
								<!-- size -->
								<!--  -->
								<!-- end size -->
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
							    <input class="checkbox-budget" type="radio" name="budget" id="3" checked>
        						<label class="for-checkbox-budget" for="3">
        							<span data-hover="3 Days">3 Days</span>
        						</label>							        
							    </div>

        						<div>
        						<input class="checkbox-budget" type="radio" name="budget" id="4">
        						<label class="for-checkbox-budget" for="4">
        							<span data-hover="4 Days">4 Days</span>
        						</label>        						    
        						</div>

        						<div>
        						    <input class="checkbox-budget" type="radio" name="budget" id="5">
        						<label class="for-checkbox-budget" for="5">							
        							<span data-hover="5 Days">5 Days</span>
        						</label>
        						</div>
        						
        						<div>
        						<input class="checkbox-budget" type="radio" name="budget" id="6">
        						<label class="for-checkbox-budget" for="6">							
        							<span data-hover="6 Days">6 Days</span>
        						</label>    
        						</div>
                				
                				<div>
                				<input class="checkbox-budget" type="radio" name="budget" id="7">
        						<label class="for-checkbox-budget" for="7">							
        							<span data-hover="7 Days">7 Days</span>
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
    										<input  type='text' placeholder="Enter your pincode" style="padding:5px;width:70%; margin: auto 1%;border:1px solid #e6be6e !important;" name="delivery_pin" id="delivery_pin" value=""/>
    									    <input class="btn btn-primary" type="button"  value="check Location"  id = "check_location" name="check_location"  style="width:30%; padding:0;  background-color: #E6BE6E;color: #444;"/>
    									    
    									</div>
    								</form>
							    </div>	
						    </div>
						    <br>

							<div class="">
							    <strong class="" style="color: #444444;">Select Date : </strong> <br>
							    <div class="" style="border-color:#E6BE6E;">
    								<div class="bo1 input-container lengthdate" style="border-color:#e6be6e;">
    									<i class="fa fa-calendar icon" style="font-size:14px;color: white;"></i>
								        <input type="text" name="daterange" id="dateRangeP" value="" style="text-align: left; width: 100%;padding-left: 3%;"></p>
    								</div>
							    </div>
						    </div>
							<!--<div class="rating" style="margin-top: 29px;">-->
							<br>
							<div >
                            	<span class="review-no"><?php echo $total_view;?> people viewed this product.</span>
                            </div>
                            <?php
                            $rating_result = get_rating_review($id,$type); 
                             //var_dump($rating_result);
                             if($rating_result['rating_count'] > 0) {
                                $total_rating = $rating_result['total_rating'] / $rating_result['rating_count'];
                             } else {
                                $total_rating = 0;
                             }
                            
                            ?>
                            
                            <br>
<br>

		                    <!-- add to cart code -->
							<div class="">
										<input class="btn btn-primary" type="button" value="Add To Cart"  id = "add_to_cart" name="add_to_cart"  style="width:100%; background-color: #E6BE6E;color: #444;"/>
							</div>
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
</form>
<!-- Footer -->

<script>
    /*  Rating  */
    $('#button-review').on('click', function() {
    	$.ajax({
    		url:  'rating_insert.php',
    		type: 'post',
    		data: $("#form-review").serialize(),
    		beforeSend: function() {},
    		complete: function() {},
    		success: function(msg) {
    			//alert(msg);
    			if(msg==1)
    			{
    			  window.location.reload();
    			}
    			else if(msg==3){
    		        alert("please login!!");
    		        window.location="login.php";
    			}
    		}
    	});
    });
 
</script>
<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
	<div class="flex-w p-b-90">
		<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
			<h4 class="s-text12 p-b-30"> GET IN TOUCH </h4>
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
    				<a href="/sub-category/2/" class="s-text7">
    					Jewellery
    				</a>
    			</li>
    			<li class="p-b-9">
    				<a href="/sub-category/1/" class="s-text7">
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
					<a href="/user-profile/" class="s-text7">
						Profile
					</a>
				</li>
				<li class="p-b-9">
					<a href="/my-orders/" class="s-text7">
						Orders 
					</a>
				</li>
				<li class="p-b-9">
					<a href="/wishlist/" class="s-text7">
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
					<a href="/Shipping,Cancellation&amp;Returns/" class="s-text7">
						Shipping
					</a>
				</li>

				<li class="p-b-9">
					<a href="/Shipping,Cancellation&amp;Returns/" class="s-text7">
						Cancellation
					</a>
				</li>

				<li class="p-b-9">
					<a href="/Shipping,Cancellation&amp;Returns/" class="s-text7">
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
        	 <a style="text-decoration: none;" href="terms-of-use/">TERMS OF USE</a> &nbsp;
    	
        	 | &nbsp;<a style="text-decoration: none;" href="/privacy-policy/"> PRIVACY POLICY  </a>&nbsp; 
    	
        	 | &nbsp;<a style="text-decoration: none;" href="/about-us/">ABOUT US </a>&nbsp; 
    	
        	 | <a style="text-decoration: none;" href="/enquiry/">&nbsp;ENQUIRY</a>&nbsp; 
	        
        	 | <a style="text-decoration: none;" href="/faqs/">&nbsp;FAQs</a>&nbsp;
    	
				<div style="text-align: center;font-size:15px;margin:10px 0px;">
		         	<a style="text-decoration: none;">
					Copyright © 2018 Sri Shringarr All Rights Reserved  </a><br/><br/>
		        </div>
			</div>
		</div>
	</footer>
	
<script>
$(function() {
    $('input[name="daterange"]').daterangepicker({
        dateLimit: { days: 7 },
         "dateFormat": "dd-mm-yy",
        "minDate": -7,
        "maxDate": 14,
        locale: {
            format: 'MM/DD/YYYY '
        },
    });
});
</script>

<script>
    // tell the embed parent frame the height of the content
    if (window.parent && window.parent.parent){
      window.parent.parent.postMessage(["resultsFrame", {
        height: document.body.getBoundingClientRect().height,
        slug: "rLnycn80"
      }], "*")
    }
    
    // always overwrite window.name, in case users try to set it manually
    window.name = "result"
</script>

<script>
    let allLines = []

    window.addEventListener("message", (message) => {
        if (message.data.console){
          let insert = document.querySelector("#insert")
          allLines.push(message.data.console.payload)
          insert.innerHTML = allLines.join(";\r")
    
          let result = eval.call(null, message.data.console.payload)
          if (result !== undefined){
            console.log(result)
          }
        }
    })
</script>
	
<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
	<span class="symbol-btn-back-to-top">
		<i class="fa fa-angle-double-up" aria-hidden="true"></i>
	</span>
</div> 

<!-- Container Selection1 -->
<div id="dropDownSelect1"></div>

	<!--<script type="text/javascript" src="http://sarmicrosystems.in/srishringarr/web/static/css/vendor/jquery/jquery-3.2.1.min.js"></script>-->

	<script type="text/javascript" src="http://sarmicrosystems.in/srishringarr/web/static/css/vendor/animsition/js/animsition.min.js"></script>

	<script type="text/javascript" src="http://sarmicrosystems.in/srishringarr/web/static/css/vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="http://sarmicrosystems.in/srishringarr/web/static/css/vendor/bootstrap/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="http://sarmicrosystems.in/srishringarr/web/static/css/vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>

	<script type="text/javascript" src="http://sarmicrosystems.in/srishringarr/web/static/css/vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="http://sarmicrosystems.in/srishringarr/web/static/js/slick-custom.js"></script>

	<script type="text/javascript" src="http://sarmicrosystems.in/srishringarr/web/static/css/vendor/countdowntime/countdowntime.js"></script>

	<script type="text/javascript" src="http://sarmicrosystems.in/srishringarr/web/static/css/vendor/lightbox2/js/lightbox.min.js"></script>

	<script type="text/javascript" src="http://sarmicrosystems.in/srishringarr/web/static/css/vendor/sweetalert/sweetalert.min.js"></script>

	<script src="static/js/main.js"></script>
	
	<!-- <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment-with-locales.min.js"></script> -->

	<script type="text/javascript" src="http://sarmicrosystems.in/srishringarr/web/static/js/site.js"></script>
	<!-- <script src='/static/js/datepicker.js'></script> -->
	<script src='http://sarmicrosystems.in/srishringarr/web/static/js/Drift.js'></script>
	<script type='text/javascript' src="http://sarmicrosystems.in/srishringarr/web/static/js/main.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	
    <script type="text/javascript">


// var selectobject = document.getElementById("mySelect");
// for (var i=0; i<selectobject.length; i++) {
//     if (selectobject.options[i].value == '47')
//         selectobject.remove(i);
// }



   $(document).ready(function() {
// var days = $(".subject-list").val();
// alert('ssssssssssssss')
// alert(days)

$("#rent_price").html('<?php echo $final_rent ; ?>');

$('input[name="budget"]').click(function(){
    
    $("#rent_price").html(''); 
    var days = $(this).attr('id');
    var rent_price = parseInt('<?php echo $final_rent; ?>') ; 
    
    var rent_calc_single = rent_price*0.05;
    
    
    console.log(rent_calc_single);
    
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
    
    
    $("#rent_price").html( rent_calc);
    
});




   		var $radios = $("#three_days_id");

	    if($radios.is(':checked') == false) {
	        $radios.filter('[value=3]').prop('checked', true);

	        var first_base_percent = 22;
			var second_base_percent = 17;
			var third_base_percent = 12; 

			var mrp = document.getElementById('price').value;
			console.log('mrp1 : ',mrp);

			if (mrp <= 40000)
			{
				amount = (mrp*(first_base_percent))/100;
				//rent_amt = 1;
				rent_amt = Math.ceil(amount/100)*100
				var finalData = "Rs. " + Number(rent_amt) + " For " + 3 + " days";
				rental_amt = $("#rentalValue").html(finalData);	

				deposite_amt = (mrp*35)/100;
				deposite = Math.ceil(deposite_amt/100)*100
				var finalDeposie = "Rs. " + Number(deposite);
				deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
				$("#final_amt_id").val(rent_amt);
				$("#deposite_amount_id").val(deposite);
			}
			if (mrp > 40000 & mrp <= 60000)
			{
				amount = (mrp*(second_base_percent))/100;
				rent_amt = Math.ceil(amount/100)*100
				var finalData = "Rs. " + Number(rent_amt) + " For " + 3 + " days";
				rental_amt = $("#rentalValue").html(finalData);

				deposite_amt = (mrp*35)/100;
				deposite = Math.ceil(deposite_amt/100)*100
				var finalDeposie = "Rs. " + Number(deposite);
				deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
				$("#final_amt_id").val(rent_amt);
				$("#deposite_amount_id").val(deposite);
			}
			if (mrp >= 60001)
			{
				amount = (mrp*(third_base_percent))/100;
				rent_amt = Math.ceil(amount/100)*100
				var finalData = "Rs. " + Number(rent_amt) + " For " + 3 + " days";
				rental_amt = $("#rentalValue").html(finalData);

				deposite_amt = (mrp*35)/100;
				deposite = Math.ceil(deposite_amt/100)*100
				var finalDeposie = "Rs. " + Number(deposite);
				deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
				$("#final_amt_id").val(rent_amt);
				$("#deposite_amount_id").val(deposite);
			}	

	    }
	
    });

	// $('#add_to_cart').on('click',function(){
	// 	swal('Added To Cart')
	// });
	
	$('#add_to_cart').on('click',function() {
	    
    console.log('add')
    var pid = <?php echo $id; ?>;
    var type = <?php echo $type?>;
    var qty = 1;
    var sku = document.getElementById('sku').value;
    var price = document.getElementById('price').value;
    
    var dateRangeP = $('#dateRangeP').val();
    var dateRangeP_arr = dateRangeP.split('-');
    
    $('#from_date').val(dateRangeP_arr[0]);
    $('#till_date').val(dateRangeP_arr[1]);
    //alert($('#from_date').val());
    var rent_date = document.getElementById('from_date').value;
    var return_date = document.getElementById('till_date').value;
    
    /*var dateRangeP = $('#dateRangeP').val();
    var dateRangeP_arr = dateRangeP.split('-');*/
    
    var days = document.getElementsByName('radiobtndays').value;
    var day = $('input[name="radiobtndays"]:checked').val();
    var d = $('input:radio[name=radiobtndays]:checked').val();
    
    var deposit = $('#deposite_amount').val();
    // alert(days+' day : '+day+' d : '+d);
    //alert($('#dateRangeP').val()); rent_amt
    
    var rent_amt = $('#rent_amt').val();
    alert(deposit+rent_amt);
    
	if($('#dateRangeP').val()==''){
		swal('Please select Date or Days');
	}
	else {
	    $.ajax({
           type: 'POST',    
            url:'addcart_process.php',
            data:'pid='+pid+'&type='+type+'&qty='+qty+'&rent_date='+rent_date+'&return_date='+return_date+'&price='+rent_amt+'&deposit='+deposit,
            
            success: function(msg){
                // alert(msg);
              
                if(msg==1)
                {
                   swal('Added To Cart');
        			//Scroll to top if cart icon is hidden on top
        			 $('html, body').animate({
        			 	'scrollTop' : $(".cart_anchor").position().top
        		    });
        		    window.location.reload();
                
                }else
                {
                    swal("No Quantity available");
                }
            }
        });
		
	  //  $(".cart_anchor").effect( "shake", { direction: "left", times: 4, distance: 101}, 2000 );
	 }
});
	       
function zoom(e){
  	var zoomer = e.currentTarget;
  	e.offsetX ? offsetX = e.offsetX : offsetX = e.touches[0].pageX
  	e.offsetY ? offsetY = e.offsetY : offsetX = e.touches[0].pageX
  	x = offsetX/zoomer.offsetWidth*100
  	y = offsetY/zoomer.offsetHeight*100
  	zoomer.style.backgroundPosition = x + '% ' + y + '%';
}

    
$('.subject-list').on('change', function() {
    $('.subject-list').not(this).prop('checked', false);
    var selected_days = $(this).val();
    $("#selected_days_id").val(selected_days);

    var first_base_percent = 22;
	var second_base_percent = 17;
	var third_base_percent = 12; 
	var mrp = "11000.00";
	console.log(mrp);

	if (selected_days == 3)
	{
		if (mrp <= 40000)
		{
			amount = (mrp*(first_base_percent))/100;
			//rent_amt = 1;
			rent_amt = Math.ceil(amount/100)*100
			var finalData = "Rs. " + Number(rent_amt) + " For " + selected_days + " days";
			rental_amt = $("#rentalValue").html(finalData);

			deposite_amt = (mrp*35)/100;
			deposite = Math.ceil(deposite_amt/100)*100
			var finalDeposie = "Rs. " + Number(deposite);
			deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
			$("#final_amt_id").val(rent_amt);
			$("#deposite_amount_id").val(deposite);
		}
		if (mrp > 40000 & mrp <= 60000)
		{
			amount = (mrp*(second_base_percent))/100;
			rent_amt = Math.ceil(amount/100)*100
			var finalData = "Rs. " + Number(rent_amt) + " For " + selected_days + " days";
			rental_amt = $("#rentalValue").html(finalData);

			deposite_amt = (mrp*35)/100;
			deposite = Math.ceil(deposite_amt/100)*100
			var finalDeposie = "Rs. " + Number(deposite);
			deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
			$("#final_amt_id").val(rent_amt);
			$("#deposite_amount_id").val(deposite);
		}
		if (mrp >= 60001)
		{
			amount = (mrp*(third_base_percent))/100;
			rent_amt = Math.ceil(amount/100)*100
			var finalData = "Rs. " + Number(rent_amt) + " For " + selected_days + " days";
			rental_amt = $("#rentalValue").html(finalData);

			deposite_amt = (mrp*35)/100;
			deposite = Math.ceil(deposite_amt/100)*100
			var finalDeposie = "Rs. " + Number(deposite);
			deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
			$("#final_amt_id").val(rent_amt);
			$("#deposite_amount_id").val(deposite);
		}	
	}
	else if (selected_days == 4)
	{
		if (mrp <= 40000)
		{
			amount = (mrp*(first_base_percent+5))/100;
			rent_amt = Math.ceil(amount/100)*100
			var finalData = "Rs. " + Number(rent_amt) + " For " + selected_days + " days";
			rental_amt = $("#rentalValue").html(finalData);

			deposite_amt = (mrp*35)/100;
			deposite = Math.ceil(deposite_amt/100)*100
			var finalDeposie = "Rs. " + Number(deposite);
			deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
			$("#final_amt_id").val(rent_amt);
			$("#deposite_amount_id").val(deposite);
		}
		if (mrp > 40000 & mrp <= 60000)
		{
			amount = (mrp*(second_base_percent+5))/100;
			rent_amt = Math.ceil(amount/100)*100
			var finalData = "Rs. " + Number(rent_amt) + " For " + selected_days + " days";
			rental_amt = $("#rentalValue").html(finalData);

			deposite_amt = (mrp*35)/100;
			deposite = Math.ceil(deposite_amt/100)*100
			var finalDeposie = "Rs. " + Number(deposite);
			deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
			$("#final_amt_id").val(rent_amt);
			$("#deposite_amount_id").val(deposite);
		}
		if (mrp >= 60001)
		{
			amount = (mrp*(third_base_percent+5))/100;
			rent_amt = Math.ceil(amount/100)*100
			var finalData = "Rs. " + Number(rent_amt) + " For " + selected_days + " days";
			rental_amt = $("#rentalValue").html(finalData);

			deposite_amt = (mrp*35)/100;
			deposite = Math.ceil(deposite_amt/100)*100
			var finalDeposie = "Rs. " + Number(deposite);
			deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
			$("#final_amt_id").val(rent_amt);
			$("#deposite_amount_id").val(deposite);
		}	
	}
	else if (selected_days == 5)
	{
		if (mrp <= 40000)
		{
			amount = (mrp*(first_base_percent+10))/100;
			rent_amt = Math.ceil(amount/100)*100
			var finalData = "Rs. " + Number(rent_amt) + " For " + selected_days + " days";
			rental_amt = $("#rentalValue").html(finalData);

			deposite_amt = (mrp*35)/100;
			deposite = Math.ceil(deposite_amt/100)*100
			var finalDeposie = "Rs. " + Number(deposite);
			deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
			$("#final_amt_id").val(rent_amt);
			$("#deposite_amount_id").val(deposite);
		}
		if (mrp > 40000 & mrp <= 60000)
		{
			amount = (mrp*(second_base_percent+10))/100;
			rent_amt = Math.ceil(amount/100)*100
			var finalData = "Rs. " + Number(rent_amt) + " For " + selected_days + " days";
			rental_amt = $("#rentalValue").html(finalData);

			deposite_amt = (mrp*35)/100;
			deposite = Math.ceil(deposite_amt/100)*100
			var finalDeposie = "Rs. " + Number(deposite);
			deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
			$("#final_amt_id").val(rent_amt);
			$("#deposite_amount_id").val(deposite);
		}
		if (mrp >= 60001)
		{
			amount = (mrp*(third_base_percent+10))/100;
			rent_amt = Math.ceil(amount/100)*100
			var finalData = "Rs. " + Number(rent_amt) + " For " + selected_days + " days";
			rental_amt = $("#rentalValue").html(finalData);

			deposite_amt = (mrp*35)/100;
			deposite = Math.ceil(deposite_amt/100)*100
			var finalDeposie = "Rs. " + Number(deposite);
			deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
			$("#final_amt_id").val(rent_amt);
			$("#deposite_amount_id").val(deposite);
		}	
	}
	else if (selected_days == 6)
	{
		if (mrp <= 40000)
		{
			amount = (mrp*(first_base_percent+15))/100;
			rent_amt = Math.ceil(amount/100)*100
			var finalData = "Rs. " + Number(rent_amt) + " For " + selected_days + " days";
			rental_amt = $("#rentalValue").html(finalData);

			deposite_amt = (mrp*35)/100;
			deposite = Math.ceil(deposite_amt/100)*100
			var finalDeposie = "Rs. " + Number(deposite);
			deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
			$("#final_amt_id").val(rent_amt);
			$("#deposite_amount_id").val(deposite);
		}
		if (mrp > 40000 & mrp <= 60000)
		{
			amount = (mrp*(second_base_percent+15))/100;
			rent_amt = Math.ceil(amount/100)*100
			var finalData = "Rs. " + Number(rent_amt) + " For " + selected_days + " days";
			rental_amt = $("#rentalValue").html(finalData);

			deposite_amt = (mrp*35)/100;
			deposite = Math.ceil(deposite_amt/100)*100
			var finalDeposie = "Rs. " + Number(deposite);
			deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
			$("#final_amt_id").val(rent_amt);
			$("#deposite_amount_id").val(deposite);
		}
		if (mrp >= 60001)
		{
			amount = (mrp*(third_base_percent+15))/100;
			rent_amt = Math.ceil(amount/100)*100
			var finalData = "Rs. " + Number(rent_amt) + " For " + selected_days + " days";
			rental_amt = $("#rentalValue").html(finalData);

			deposite_amt = (mrp*35)/100;
			deposite = Math.ceil(deposite_amt/100)*100
			var finalDeposie = "Rs. " + Number(deposite);
			deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
			$("#final_amt_id").val(rent_amt);
			$("#deposite_amount_id").val(deposite);
		}	
	}
	else if (selected_days == 7)
	{
		if (mrp <= 40000)
		{
			amount = (mrp*(first_base_percent+20))/100;
			rent_amt = Math.ceil(amount/100)*100
			var finalData = "Rs. " + Number(rent_amt) + " For " + selected_days + " days";
			rental_amt = $("#rentalValue").html(finalData);

			deposite_amt = (mrp*35)/100;
			deposite = Math.ceil(deposite_amt/100)*100
			var finalDeposie = "Rs. " + Number(deposite);
			deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
			$("#final_amt_id").val(rent_amt);
			$("#deposite_amount_id").val(deposite);
		}
		if (mrp > 40000 & mrp <= 60000)
		{
			amount = (mrp*(second_base_percent+20))/100;
			rent_amt = Math.ceil(amount/100)*100
			var finalData = "Rs. " + Number(rent_amt) + " For " + selected_days + " days";
			rental_amt = $("#rentalValue").html(finalData);

			deposite_amt = (mrp*35)/100;
			deposite = Math.ceil(deposite_amt/100)*100
			var finalDeposie = "Rs. " + Number(deposite);
			deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
			$("#final_amt_id").val(rent_amt);
			$("#deposite_amount_id").val(deposite);
		}
		if (mrp >= 60001)
		{
			amount = (mrp*(third_base_percent+20))/100;
			rent_amt = Math.ceil(amount/100)*100
			var finalData = "Rs. " + Number(rent_amt) + " For " + selected_days + " days";
			rental_amt = $("#rentalValue").html(finalData);

			deposite_amt = (mrp*35)/100;
			deposite = Math.ceil(deposite_amt/100)*100
			var finalDeposie = "Rs. " + Number(deposite);
			deposite_amt = $("#finalVaueForRentel").html(finalDeposie);
			$("#final_amt_id").val(rent_amt);
			$("#deposite_amount_id").val(deposite);
		}	
	}
});



</script>



</body>
</html>
