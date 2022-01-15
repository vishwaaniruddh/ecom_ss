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
        /*var days = document.getElementsByName('radiobtndays').value;
        var days = $('input[name="radiobtndays"]:checked').val();
        var d = $('input:radio[name=radiobtndays]:checked').val();
        alert(days);*/
        
        // window.location.reload();
      
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
                    swal("Product added to cart Succesfully !");
                    window.location.reload();

    
                } else
                {
                    swal('No Qunatity Available');
                    window.location.reload();

                }
            }
            
            }
            });
    }


</script>