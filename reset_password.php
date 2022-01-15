<?php 
include('header.php'); 

function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range(0, 9));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }
    return $key; 
}

?>

<style>
    *, *:before, *:after {
  box-sizing: border-box;
}

html {
  overflow-y: scroll;
}

body {
  background: #c1bdba;
  font-family: 'Titillium Web', sans-serif;
}

a {
  text-decoration: none;
  color: #1ab188;
  -webkit-transition: .5s ease;
  transition: .5s ease;
}
a:hover {
  color: #179b77;
}

.form {
  background: rgba(19, 35, 47, 0.9);
  padding: 40px;
  max-width: 900px;
  margin: 40px auto;
  border-radius: 4px;
  box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
  overflow: hidden;
}

.tab-group {
  list-style: none;
  padding: 0;
  margin: 0 0 40px 0;
}
.tab-group:after {
  content: "";
  display: table;
  clear: both;
} 
.tab-group li a {
  display: block;
  text-decoration: none;
  padding: 15px;
  background: rgba(160, 179, 176, 0.25);
  color: #a0b3b0;
  font-size: 20px;
  float: left;
  width: 100%;
  text-align: center;
  cursor: pointer;
  -webkit-transition: .5s ease;
  transition: .5s ease;
}
.tab-group li a:hover {
  background: #179b77;
  color: #ffffff;
}
.tab-group .active a {
  background: #1ab188;
  color: #ffffff;
}

/*.tab-content > div:last-child {*/
/*  display: none;*/
/*}*/

h1 {
  text-align: center;
  color: #ffffff;
  font-weight: 300;
  margin: 0 0 40px;
}

label {
  position: absolute;
  -webkit-transform: translateY(6px);
          transform: translateY(6px);
  left: 13px;
  color: rgba(255, 255, 255, 0.5);
  -webkit-transition: all 0.25s ease;
  transition: all 0.25s ease;
  -webkit-backface-visibility: hidden;
  pointer-events: none;
  font-size: 22px;
}
label .req {
  margin: 2px;
  color: #1ab188;
}

label.active {
  -webkit-transform: translateY(50px);
          transform: translateY(50px);
  left: 2px;
  font-size: 14px;
}
label.active .req {
  opacity: 0;
}

label.highlight {
  color: #ffffff;
}

input, textarea {
  font-size: 22px;
  display: block;
  width: 100%;

  padding: 5px 10px;
  background: none;
  background-image: none;
  border: 1px solid #a0b3b0;
  color: #ffffff;
  border-radius: 0;
  -webkit-transition: border-color .25s ease, box-shadow .25s ease;
  transition: border-color .25s ease, box-shadow .25s ease;
}
input:focus, textarea:focus {
  outline: 0;
  border-color: #1ab188;
}

textarea {
  border: 2px solid #a0b3b0;
  resize: vertical;
}

.field-wrap {
  position: relative;
  margin-bottom: 40px;
}

.top-row:after {
  content: "";
  display: table;
  clear: both;
}
.top-row > div {
  float: left;
  width: 48%;
  margin-right: 4%;
}
.top-row > div:last-child {
  margin: 0;
}

.button {
  border: 0;
  outline: none;
  border-radius: 0;
  padding: 15px 0;
  font-size: 2rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: .1em;
  background: #1ab188;
  color: #ffffff;
  -webkit-transition: all 0.5s ease;
  transition: all 0.5s ease;
  -webkit-appearance: none;
}

.button-block {
  display: block;
  width: 100%;
}

.forgot {
  margin-top: -20px;
  text-align: right;
}
.tab-group li{
    padding-bottom:0 ! important;
}
input[type=checkbox]{
        width: 40px;
        height: 30px;
        display: inline-block;
}
.tnc{
    font-size:22px;
    color:white;
}

</style>


<div class="custom_margin"></div>
<div class="container">
<?php
$email=$_POST['emailid'];

echo $email;

$sql=mysql_query("SELECT * FROM customer_login where email='".$email."'");
$sql_result=mysql_fetch_assoc($sql);
//echo "SELECT * FROM customer_login where email='".$email."'"; var_dump($sql_result);
if($sql_result>0)
{
   $string=random_string(8);
   
   $email = strip_tags($email);

   $userid=$sql_result['login_id'];
   
   $check_sql=mysql_query("select * from forget_password where userid='".$userid."'",$con);
   $check_sql_result=mysql_fetch_assoc($check_sql);
   
   //echo "select * from forget_password where userid='".$userid."'";exit;
   
   if($check_sql_result){
     $sql_password="update forget_password set password='".$string ."' where userid='".$userid."' ";       
   }
   else{
     $sql_password="insert into forget_password(userid,email,password) values('".$userid."','".$email."','".$string."')";
   }



//echo $sql_password;exit;
   
   
   if(mysql_query($sql_password,$con)){
    
            $subject="Srishringarr ! Your One Time Password";
            
                $headers .= "Reply-To: The Sender sales@yosshitaneha.com\r\n"; 
                $headers .= "Return-Path: The Sender sales@yosshitaneha.com\r\n"; 
                $headers .= "From: sales@yosshitaneha.com" ."\r\n" .
                $headers .= "Organization: Sender Organization\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=utf-8\r\n";
                $headers .= "X-Priority: 3\r\n";
                $headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
            
			$message="<h3>Your password is </h3>".$string;

            if(mail($email, $subject, $message, $headers)){ ?>
                <div class="alert alert-success" role="alert">
                    <strong>Mail sent successfully !</strong> Please check your email ( also check spam ).
                </div>  
    
            <? }
            else{ ?>
            
            <div class="alert alert-danger" role="alert">
                <strong>Oh snap!</strong> Some error while sending email..
            </div>
            
            <? }


        }
}

else{
    ?>
       <div class="alert alert-danger" role="alert">
                <strong>Oh snap!</strong> This email is not Registered !!
            </div>
<? } ?>

</div>

<div class="form">
      <?
      
      //echo $_SESSION['username'];
      
if($_SESSION['status']=='0' ){ ?>
    <div class="alert alert-danger" role="alert">
      <strong>Oh snap!</strong> Change a few things up and try submitting again.
    </div>

<? } ?>

      <ul class="tab-group">
        <li class="tab active" style="width:100%;"><a href="#login">Password reset </a></li>

      </ul>
      
      <div class="tab-content active">
          
          <div id="login" class="active">   
          <h1>Enter OTP sent to your email</h1>
         

        <form action="reset_response.php" method="post" onSubmit = "return checkPassword(this)">
            
            <div class="field-wrap">
            <label>
              OTP<span class="req">*</span>
            </label>
            <input type="text" name="otp" required autocomplete="off"/>
          </div>
          
               <div class="field-wrap">
            <label>
              New Password<span class="req">*</span>
            </label>
            <input type="password" name="password" required autocomplete="off"/>
          </div>
          
               <div class="field-wrap">
            <label>
              Confirm Password<span class="req">*</span>
            </label>
            <input type="password" name="cpassword" required autocomplete="off"/>
          </div>
          
          <input type="text" name="email" value="<? echo $email; ?>" hidden>
          
          <button class="button button-block"/>Submit</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->







<script>
    $('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

	  if (e.type === 'keyup') {
			if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
    	if( $this.val() === '' ) {
    		label.removeClass('active highlight'); 
			} else {
		    label.removeClass('highlight');   
			}   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
    		label.removeClass('highlight'); 
			} 
      else if( $this.val() !== '' ) {
		    label.addClass('highlight');
			}
    }

});

$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});

</script>


<script> 
          
           
            function checkPassword(form) { 
                password1 = form.password.value; 
                password2 = form.cpassword.value; 
  
                // If password not entered 
                if (password1 == '') 
                    alert ("Please enter Password"); 
                      
                // If confirm password not entered 
                else if (password2 == '') 
                    alert ("Please enter confirm password"); 
                      
                // If Not same return False.     
                else if (password1 != password2) { 
                    alert ("\nPassword did not match: Please try again...") 
                    return false; 
                }
            } 
        </script> 