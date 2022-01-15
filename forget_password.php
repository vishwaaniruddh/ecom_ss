<?php include_once('header.php'); ?>


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
  color: #800000;
  -webkit-transition: .5s ease;
  transition: .5s ease;
}
a:hover {
  color: #800000;
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
  background: #800000;
  color: #ffffff;
}
.tab-group .active a {
  background: #800000;
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
  color: #800000;
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
  border-color: #800000;
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
  background: #800000;
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

<div class="form">
<?php
      echo 'email : '.$_SESSION['email'];
      
if($_SESSION['status']=='0' ) { ?>
    <div class="alert alert-danger" role="alert">
      <strong>Oh snap!</strong> Change a few things up and try submitting again.
    </div>

<? } ?>

<ul class="tab-group">
    <li class="tab active" style="width:100%;"><a href="#login">Forget Password</a></li>
</ul>
  
<div class="tab-content active">
    <div id="login" class="active">   
        <h1>Enter Your Email ID</h1>
        <form action="reset_password.php" method="post">
            <div class="field-wrap">
                <label>
                  Email<span class="req">*</span>
                </label>
                <input type="email" name="emailid" required autocomplete="off"/>
            </div>
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
