<?php date_default_timezone_set('Asia/Kolkata'); ?>
<!--<link rel='stylesheet' href='http://codepen.io/assets/libs/fullpage/jquery-ui.css'>-->
<link rel="stylesheet" href="css/newstyle.css" media="screen" type="text/css" />
<link href="yn/datepc/dcalendar.picker.css" rel="stylesheet" type="text/css">
<link href="yn/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="yn/css/addtocartpopup.css" rel="stylesheet" type="text/css">

<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
<!--<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

 <style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>
<script>
    // Get the modal
    var modal = document.getElementById('myModal');
    
    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");
    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    
    // When the user clicks the button, open the modal 
    
    if(btn){
        btn.onclick = function() {
        modal.style.display = "block";
    }    
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event){
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}
</script>
<script>

var overlay1="";
var overlay2="";
var overlay3=""; 

function OpenWindow(sts)
{
    //alert(sts);
    document.getElementById('typsel').value=sts;
    $('.x2').click();

    var selpr=document.getElementById('selectedproduct').value;
    var qtyr=document.getElementById('qtyr').value;
    var ppr=document.getElementById('ppricerent').value;
    var ppr2=document.getElementById('ppricesale').value;
    //alert(qtyr);
    if(sts=="2")
    {
        popupfun1();
    }
    else
    {
        salepopupfun(qtyr,ppr2);   
    }
}



function popupfun1()
{
//alert("test");
overlay1 = $('<div id="overlay1"></div>');
overlay1.show();
overlay1.appendTo(document.body);
$('.popup1').show();

$('.x1').click(function(){
$('.popup1').hide();
overlay1.appendTo(document.body).remove();
return false;
});
}
</script>

<script>

function stringToDate(_date,_format,_delimiter)
{
    
  try
    {
        
          var nofdays=$("input[type='radio'][name='daytyp']:checked").val();
   
       // alert(nofdays);
    if(_date!="")
    {
        
       

            var formatLowerCase=_format.toLowerCase();
            var formatItems=formatLowerCase.split(_delimiter);
            var dateItems=_date.split(_delimiter);
            var monthIndex=formatItems.indexOf("mm");
            var dayIndex=formatItems.indexOf("dd");
            var yearIndex=formatItems.indexOf("yyyy");
            var month=parseInt(dateItems[monthIndex]);
            
           var date = new Date(dateItems[monthIndex]+"/"+dateItems[dayIndex]+"/"+dateItems[yearIndex]);
        var newdate = new Date(date);

     newdate.setDate(newdate.getDate() + parseInt(nofdays));
    
    var dd = newdate.getDate();
    var mm = newdate.getMonth() + 1;
    var y = newdate.getFullYear();

    var someFormattedDate = dd + '/' + mm + '/' + y;
    
     // var rtdt=myDate.getDate()+"/"+myDate.getMonth()+"/"+myDate.getFullYear();
           document.getElementById('retdt').value=someFormattedDate;
         
           
           
           chkavbailb(_date,someFormattedDate);
    }
    else
    {
          var dtt=document.getElementById('demo').value;
     if(dtt!='')
     {
        
            var formatLowerCase=_format.toLowerCase();
            var formatItems=formatLowerCase.split(_delimiter);
            var dateItems=dtt.split(_delimiter);
            var monthIndex=formatItems.indexOf("mm");
            var dayIndex=formatItems.indexOf("dd");
            var yearIndex=formatItems.indexOf("yyyy");
            var month=parseInt(dateItems[monthIndex]);
            
              var date = new Date(dateItems[monthIndex]+"/"+dateItems[dayIndex]+"/"+dateItems[yearIndex]);
        var newdate = new Date(date);

     newdate.setDate(newdate.getDate() + parseInt(nofdays));
    
    var dd = newdate.getDate();
    var mm = newdate.getMonth() + 1;
    var y = newdate.getFullYear();

    var someFormattedDate = dd + '/' + mm + '/' + y;
    
     // var rtdt=myDate.getDate()+"/"+myDate.getMonth()+"/"+myDate.getFullYear();
           document.getElementById('retdt').value=someFormattedDate;
        
           chkavbailb(_date,someFormattedDate);
     }
    }
    }catch(ex)
    {
        
        //alert(ex);
    }
         
}

function stringT(_date,_format,_delimiter,incr)
{
    try
    {
        //alert(_date);
        var formatLowerCase=_format.toLowerCase();
        var formatItems=formatLowerCase.split(_delimiter);
        var dateItems=_date.split(_delimiter);
        var monthIndex=formatItems.indexOf("mm");
        var dayIndex=formatItems.indexOf("dd");
        var yearIndex=formatItems.indexOf("yyyy");
        var month=parseInt(dateItems[monthIndex])+parseInt(incr);
        month-=1;
        var formatedDate = new Date(dateItems[yearIndex],month,dateItems[dayIndex]);
        // return formatedDate;
       
        //stringToDate
        var newdt=dayIndex+parseInt(3);
        document.getElementById('demo').value=dayIndex+"/"+monthIndex+"/"+yearIndex;
        document.getElementById('retdt').value=newdt+"/"+monthIndex+"/"+yearIndex;
            
    }catch(ex)
    {
        
        alert(ex);
    }
}

function chkavbailb(val,retdt)
{
    try
    {
        if(val!="")
        {
            var typ=document.getElementById('typ').value;
            var selpr=document.getElementById('selectedproduct').value;
            
            $.ajax({
               type: 'POST',    
                url:'chkavailbpg.php',
                data:'val='+val+'&selpr='+selpr+'&typ='+typ+'&retdt='+retdt,
                
                success: function(msg){
                //alert(msg);
                  
                    if(msg!=0)
                    {
                        document.getElementById('qty').disabled=false;
                        document.getElementById('qty').innerHTML=msg;
                    
                        var ppr=document.getElementById('ppricerent').value;
                        var depositr=document.getElementById('depositr').value;
                        document.getElementById('totamt2').value=ppr;
                        document.getElementById('prate2').value=ppr;
                        document.getElementById('deposit1').value=depositr;
                        document.getElementById('dep2').value=depositr;
                        //document.getElementById('totamtf').value=ppr;
                        calcsaleamt2();
                    
                    }else
                    {
                        swal("No Quantity available");
                    }
                }
            });
        }
    }catch(ex)
    {
        //alert(ex);
    }
}

function salepopupfun(qty,pprice)
{
try
{
  
var min = 1,
    max = qty,
    select = document.getElementById('saleqty');

for (var i = min; i<=max; i++){
    var opt = document.createElement('option');
    opt.value = i;
    opt.innerHTML = i;
    select.appendChild(opt);
}
document.getElementById('prate').value=pprice;
document.getElementById('totamt').value=pprice;


overlay3 = $('<div id="overlay3"></div>');
overlay3.show();
overlay3.appendTo(document.body);
$('.popup3').show();


$('.x3').click(function(){
$('.popup3').hide();
overlay3.appendTo(document.body).remove();
return false;
});
}catch(exc)
{
    
    alert(exc);
}
}



function popupfun2()
{
//alert("test");
overlay2 = $('<div id="overlay2"></div>');
overlay2.show();
overlay2.appendTo(document.body);
$('.popup2').show();

$('.x2').click(function(){
$('.popup2').hide();
overlay2.appendTo(document.body).remove();
return false;
});
}

function clearfunc1(){
    
    try
    { 
        document.getElementById("saleqty").options.length = 0;
        document.getElementById("prate").value="";
        document.getElementById("totamt").value="";
        
        document.getElementById("qty").options.length = 0;
        document.getElementById("prate2").value="";
        document.getElementById("dep2").value="";
        document.getElementById("totamt2").value="";
        document.getElementById("deposit1").value="";
        document.getElementById("totamtf").value="";
        document.getElementById("retdt").value="";

    }catch(ex)
    {
        alert(ex);
    }
}

function clearfunc()
{
    try
    { 
        document.getElementById("saleqty").options.length = 0;
        document.getElementById("prate").value="";
        document.getElementById("totamt").value="";
        
        document.getElementById("qty").options.length = 0;
        document.getElementById("prate2").value="";
        document.getElementById("dep2").value="";
        document.getElementById("totamt2").value="";
        document.getElementById("deposit1").value="";
        document.getElementById("totamtf").value="";
        document.getElementById("demo").value="";
        document.getElementById("retdt").value="";

    }catch(ex)
    {
        alert(ex);
    }
    
}
var qtyav=false;

function buy(sku,qty,pprice,slecprdid,actyp,btnid) {
    
    final_addtocart(sku,qty,pprice,slecprdid,actyp,btnid);
    setTimeout(function() { 
        window.location='showcart_details.php';
    }, 1000);
}
function buy1(sku,qty,pprice,slecprdid,actyp,btnid){
   
    final_addtocart(sku,qty,pprice,slecprdid,actyp,btnid);
    setTimeout(function(){ window.open='showcart_details.php';
        }, 2000);
}


function customize(sku,qty,pprice,slecprdid,actyp,btnid){
    
    final_addtocart(sku,qty,pprice,slecprdid,actyp,btnid,1);
    setTimeout(function(){
        window.location='showcart_details.php';
    }, 1000);
}

function finalchkonaddtocart(actyp,btnid)
{
    try
    { 
        var dt="";
        var retdt="";
        var qty="";
        
        var product_id=document.getElementById('selectedproduct').value; 
        var typ=document.getElementById('typ').value;
        if(actyp=="2")
        {
            qty=document.getElementById('saleqty').value;
        } else {
            qty=document.getElementById('qty').value;
            dt=document.getElementById('demo').value;
            retdt=document.getElementById('retdt').value;
        }

        $.ajax({
            type: 'POST',    
            url:'checkifqtyavailonaddtocart.php',
            data:'qtyselc='+qty+'&selpr='+product_id+'&dt='+dt+'&retdt='+retdt+'&typ='+typ+'&transtyp='+actyp,
            success: function(msg){
            // alert(msg);
            if(msg!="")
                {
                    if(parseInt(msg)>0)
                    {
                       // alert("ok");
                       
                        addcart(actyp,btnid);
                       
                        qtyav=true;
                        return qtyav;  
                    }else
                    {
                        swal("Sorry No Quantity Available");
                        qtyav=false;
                        return qtyav;
                    }
                }
            }
        });
        
    }catch(ex)
    {
        //alert(ex);
    }
    return qtyav;
}

// function final_addtocart(qty,pprice,slecprdid,actyp,btnid)
// {
//     //console.log('called 1');
//     clearfunc();
//     //console.log('cleared');
//     document.getElementById('selectedproduct').value=slecprdid;
//     document.getElementById('prate').value=pprice;
//     document.getElementById('totamt').value=pprice;
//     try
//     { 
//         var dt="";
//         var retdt="";
//         var qty="";
        
//       var product_id=document.getElementById('selectedproduct').value; 
      
//       var typ=document.getElementById('typ').value;
//       if(actyp=="2")
//         {
//             qty=document.getElementById('saleqty').value;
//         }
//         else
//         {
//             qty=document.getElementById('qty').value;
//             dt=document.getElementById('demo').value;
//             retdt=document.getElementById('retdt').value;
//         }
        
//         if(qty<1){
//             qty=1;
//         }

//         //console.log(product_id+'actyp='+actyp+'qty'+qty);

//         $.ajax({
//             type: 'POST',    
//             url:'checkifqtyavailonaddtocart.php',
//             data:'qtyselc='+qty+'&selpr='+product_id+'&dt='+dt+'&retdt='+retdt+'&typ='+typ+'&transtyp='+actyp,
//             success: function(msg){
//                 alert(msg);
//                 console.log('check :',msg);
//                 if(msg!="")
//                 {
//                     if(parseInt(msg)>0)
//                     {
//                         // alert("ok");
//                         addcart(actyp,btnid);
//                         qtyav=true;
//                             // window.location.reload(true);
//                         return qtyav;  
//                     }else
//                     {
//                         alert("Sorry No Quantity Available");
//                         qtyav=false;
                        
//                     }
//                 }
//             }
//         });
        
//     }catch(ex)
//     {
//         //alert(ex);
//     }
//     // window.location.reload(true);
//     return qtyav;

// }

function final_addtocart(sku,qty,pprice,slecprdid,actyp,btnid,customize=0)
{
    //console.log('called 1');
    var customize = customize;
    clearfunc();
    console.log('cleared');
    document.getElementById('selectedproduct').value=slecprdid;
    document.getElementById('prate').value=pprice;
    document.getElementById('totamt').value=pprice;
    try
    { 
        var dt="";
        var retdt="";
        var qty="";
        
        var product_id=document.getElementById('selectedproduct').value; 
      
        var typ=document.getElementById('typ').value;
        if(actyp=="2")
        {
            // qty=document.getElementById('cutom_new_qty').value;
            //qty = $('#cutom_new_qty').text();
            qty = document.getElementById('adjust_qty').value;
            
        }
        else
        {
            // qty=document.getElementById('cutom_new_qty').value;
            
            //qty = $('#cutom_new_qty').text();
            
            qty = document.getElementById('adjust_qty').value;
            
            
            dt=document.getElementById('demo').value;
            retdt=document.getElementById('retdt').value;
        }
        
        if(qty<1){
            qty=1;
        }

        console.log(product_id+'actyp='+actyp+'qty'+qty+'pprice'+pprice);

        $.ajax({
            type: 'POST',
            url:'checkifqtyavailonaddtocart.php',
            data:'sku='+sku+'&qtyselc='+qty+'&selpr='+product_id+'&dt='+dt+'&retdt='+retdt+'&typ='+typ+'&transtyp='+actyp+'&pprice='+pprice+'&is_customized='+customize,
            success: function(msg){
                // alert(msg);
                console.log('check :',msg);
                if(msg!="")
                {
                    if(parseInt(msg)>0)
                    {
                        if(swal("Product added to cart Succesfully !")) {
                            
                            // Ruchi : 5-5-20 addcart(actyp,btnid,customize);
                       
                            qtyav=true;
                        
                            // return qtyav;  
                    
                            //  window.location.reload();
                            
                        }
        
                    }else
                    {
                        //alert(msg);
                        // alert("Sorry No Quantity Available");
                        qtyav=false;
                        //   window.location.reload();
                        // return qtyav;
                    }
                }
            }
        });
        
    }catch(ex)
    {
        
    //    alert(ex);
    }

    return qtyav;
}


function final_addtocart1(sku,qty,pprice,slecprdid,actyp,btnid)
{
    //console.log('called 1');
    clearfunc();
    console.log('cleared');
    document.getElementById('selectedproduct').value=slecprdid;
    document.getElementById('prate').value=pprice;
    document.getElementById('totamt').value=pprice;
    try
    { 
        var dt="";
        var retdt="";
        var qty="";
        
        var product_id=document.getElementById('selectedproduct').value; 
      
        var typ=document.getElementById('typ').value;
        if(actyp=="2")
        {
            qty=document.getElementById('saleqty').value;
        }
        else
        {
            qty=document.getElementById('qty').value;
            dt=document.getElementById('demo').value;
            retdt=document.getElementById('retdt').value;
        }
        
        if(qty<1){
            qty=1;
        }

        console.log(pprice+'pprice'+product_id+'actyp='+actyp+'qty'+qty);


        $.ajax({
           type: 'POST',    
        url:'checkifqtyavailonaddtocart.php',
        data:'sku='+sku+'&qtyselc='+qty+'&selpr='+product_id+'&dt='+dt+'&retdt='+retdt+'&typ='+typ+'&transtyp='+actyp+'&pprice='+pprice,
        success: function(msg){
        //alert(msg);
        console.log('check :',msg);
        if(msg!="")
        {
            if(parseInt(msg)>0)
            {
                if(swal("Product added to cart Succesfully !")){
                
                //Ruchi : 5-5-20 addcart(actyp,btnid);
               
                qtyav=true;
                
                // window.location.reload();
                // return qtyav;  
                    
                }

            }else
            {
                //alert(msg);
                // alert("Sorry No Quantity Available");
                qtyav=false;
                //   window.location.reload();
                // return qtyav;
            }
        }
        }
        });
        
    }catch(ex)
    {
        
    //    alert(ex);
    }
    //   window.location.reload();
    return qtyav;
}

//===========================add in cart========================
function selection()
{    
    var cat = document.getElementById('sizes').value;    
    if (cat == 0) {
        swal('Mandatory');
        return false;
    }
    return true;
}

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


function fround(value,decimals)
{
    try
    {

return Number(Math.round(value+'e'+decimals)+'e-'+decimals);
}catch(exc)
{
    
   // alert(exc);
}
}

function calcsaleamt2()
{
 try
{
    
    var nofdays=$("input[type='radio'][name='daytyp']:checked").val();
    
    var pqty=document.getElementById('qty').value;
    
    if(pqty!="")
    {
    var depos=document.getElementById('dep2').value;
    
 var pprice=fround(document.getElementById('prate2').value,2);


if(nofdays=="6")
{
var ppr=fround((parseFloat(pprice)*10)/100,2);
pprice=pprice+parseFloat(ppr);   
}
else if(nofdays=="8")
{
var ppr=fround((parseFloat(pprice)*15)/100,2);
pprice=pprice+parseFloat(ppr);
}


var finalp=parseInt(pqty)*pprice;

document.getElementById('totamt2').value=fround(finalp,2);

depos1=parseInt(pqty)*depos;
document.getElementById('deposit1').value=fround(depos1,2);

if(depos1!="")
{
finalp=parseFloat(depos1)+finalp;  
}

document.getElementById('totamtf').value=fround(finalp,2);
}
 
}catch(exc)
{
    
    alert(exc);
}
   
    
}

function calcsaleamt()
{
try
{ var pqty=document.getElementById('saleqty').value;
    if(pqty!="")
    {
   
 var pprice=fround(document.getElementById('prate').value,2);

var finalp=parseInt(pqty)*pprice;
document.getElementById('totamt').value=fround(finalp,2);
}
 
}catch(exc)
{
    
    //alert(exc);
}
    
}


</script>

<body onload="">
    <input type="hidden" name="typsel" id="typsel">
    <div class="row">
        <div class="col-md-12">
            <div class="login-card popup1">
                <form name="fm" method="post" id="frmf">
                    <div class="cnt223321">
                                    <Button alt='quit' class='x1' id='x1' style="background: #00a0e4;"> X </Button>
                                    <h3 style="padding: 15px; font-size:16px; color:#fff;"><b></b></h3> </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row" style="margin-top:4%;">
                                <div class="col-sm-3">Select Days</div>
                                <div class="col-sm-8">
                                    <input type="radio" id="dayid4" type="text" name="daytyp"  onchange="calcsaleamt2();stringToDate('','dd/MM/yyyy','/');" value="4" checked> 4 Days
                                    <input type="radio" id="dayid5" type="text" name="daytyp"  onchange="calcsaleamt2();stringToDate('','dd/MM/yyyy','/');" value="6"> 6 Days
                                    <input type="radio" id="dayid6" type="text" name="daytyp"  onchange="calcsaleamt2();stringToDate('','dd/MM/yyyy','/');" value="8"> 8 Days
                                    </div>
                            </div>
                            
                            <?php if($typ==2 && $transtyp==1){?>
                            
                            <div class="row" style="margin-top:4%;">
                                <div class="col-sm-3">Select Size</div>
                                <div class="col-sm-8">
                                    <select name="sizes" id="sizes" >
                                        <option value="0">Select Size</option>
                                    <?php 
                                    
                                    $szarr=explode(",",$row1[20]);
                                    for($a=28;$a<=42;$a++)
                                    {
                                    ?> 
                                     <option value="<?php echo $a;?>" <?php if(in_array($a,$szarr)){ echo "selected";}?>><?php echo $a;?></option>
                                    
                                    <?php $a=$a+1; } ?>
                                      
                                    </select>
                                    </div>
                            </div>
                            <?php } ?>
                            
                            
                            <div class="row" style="margin-top:2%;">
                                <div class="col-sm-3">Select Date</div>
                                <div class="col-sm-8">
                                    
                                    
                                    <?php
                                    $mindt=date("Y-m-d", strtotime("+4 day"));
                                    ?>
                                    <input id="demo" type="text" data-mindate="<?php echo $mindt;?>" onchange="clearfunc1();stringToDate(this.value,'dd/MM/yyyy','/');" value=""> </div>
                            </div>
                            <div class="row" style="margin-top:1%;">
                                <div class="col-sm-3">Return Date</div>
                                <div class="col-sm-8">
                                    <input id="retdt" name="retdt" type="text" readonly> </div>
                            </div>
                            <div class="row" style="margin-top:1%;">
                                <div class="col-sm-3">Quantity</div>
                                <div class="col-sm-8">
                                    <select id="qty" name="qty" disabled="disabled" onchange="calcsaleamt2();"> </select>
                                </div>
                            </div>
                            <div class="row" style="margin-top:1%;">
                                <div class="col-sm-3">Amount</div>
                                <div class="col-sm-8">
                                    <input type="text" name="totamt2" id="totamt2" readonly> </div>
                            </div>
                            <div class="row" style="margin-top:1%;">
                                <div class="col-sm-3">Deposit</div>
                                <div class="col-sm-8">
                                    <input type="text" name="deposit1" id="deposit1" readonly> </div>
                            </div>
                            <div class="row" style="margin-top:1%;">
                                <div class="col-sm-3">Total Amount</div>
                                <div class="col-sm-8">
                                    <input type="text" name="totamtf" id="totamtf" readonly> </div>
                            </div>
                            <div class="row" style="margin-top:1%;">
                                <div class="col-sm-12">
                                    <button class="myButton" type="button" id="b1" onclick="finalchkonaddtocart(1,this.id);">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="prate2" id="prate2">
                    <br>
                    <input type="hidden" name="dep2" id="dep2">
                    <!--Scripts-->
                    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
                    <script src="datepc/dcalendar.picker.js"></script>
                    <script>
                        $('#demo').dcalendarpicker({
                            format: 'dd/mm/yyyy'
                        });
                        $(document).ready(function () {
                            
                            
                    if($.fn.dcalendarpicker){
                    $('#demo').dcalendarpicker({
                    format: 'dd-mm-yyyy'
                    });
                    }
                            
        
                        });
                    </script>
                </form>
            </div>
        </div>
    </div>
 
    <div class='popup2' style="display:none;">
        <div class='cnt22311'>
            <div class="cnt2233211">
                <Button alt='quit' class='x2' id='x2' style="background: #00a0e4;"> X </button>
                <h3 style="padding: 15px; font-size:16px; color:#fff;"><b>Select</b></h3> </div>
            <div class="become-card" align="center">
                <form name="FormName">
                    <div>
                        <button class="myButton" type="button" onclick="OpenWindow(1);">Buy</button>   <!-- &nbsp;OR&nbsp;
                    <button class="myButton" type="button" onclick="OpenWindow(2);">Rent</button>-->
                        
                    </div>
                    <br> </form>
            </div>
        </div>
    </div>
    <!--New Popup3-->
             <div class="row">
        <div class="col-md-12">
            <div class='login-card1 popup3' style="display:none;">
                <form name="fm" method="post" id="frmf">
                    <div class='cnt223321'>
                            <Button alt='quit' class='x3' id='x3' style="background: #00a0e4;"> X </Button>
                            <h3 style="padding: 15px; font-size:16px; color:#fff;"><b></b></h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php if($typ==2 ){?>
                            
                            <div class="row" style="margin-top:4%;">
                                <div class="col-sm-3">Select Size</div>
                                <div class="col-sm-8">
                                    <select name="sizes" id="sizes">
                                    <option value="0">Select Size</option>
                                    <?php 
                                    
                                    $szarr=explode(",",$row1[20]);
                                    for($a=34;$a<=42;$a++)
                                    {
                                    ?> 
                                     <option value="<?php echo $a;?>" <?php if(in_array($a,$szarr)){ echo "selected";}?>><?php echo $a;?></option>
                                    
                                    <?php $a=$a+1; } ?>
                                      
                                    </select>
                                    </div>
                            </div>
                            <?php } ?>
                            <div class="row" style="margin-top:3%;">
                                <div class="col-sm-3">Select Quantity</div>
                                <div class="col-sm-8">
                                    <select id="saleqty" name="saleqty" onchange="calcsaleamt();"></select>
                                </div>
                            </div>
                            <div class="row"  style="margin-top:2%;">
                                <div class="col-sm-3">Total Amount</div>
                                <div class="col-sm-8">
                                    <input type="text" name="totamt" id="totamt" readonly> </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button class="myButton" type="button" id="b2" onclick="finalchkonaddtocart(2,this.id);">Add To Cart</button>
                                </div>
                            </div>
                            <input type="hidden" name="prate" id="prate">
                        </div>
                         
                    </div>
                </form>
                </div>
            </div>
        </div>
</body>