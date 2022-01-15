
<?php include('header.php'); ?>
	<section class="bgwhite p-t-55 p-b-55">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-4">
				</div> 
				<div class="bo9 col-sm-6 col-md-4 col-lg-4 p-l-40 p-r-40 p-t-30 p-b-38">
					<h5 class="m-text20 m-b-30 m-t-10 m-r-20">
						Login 
					</h5>
					<form enctype="multipart/form-data" method="post" action="login_process.php">
						
						<span class="s-text15">
							<strong>Email Address</strong>
						</span>
						<div class="size1 bo4 m-b-12">
							<input type="text" class="sizefull s-text7 p-l-15 p-r-15" placeholder="Enter Email Address" name="usernm" required> 
						</div>
						<span class="s-text15">
							<strong>Password</strong>
						</span>
						<div class="size1 bo4 m-b-12">
							<input type="password" class="sizefull s-text7 p-l-15 p-r-15" placeholder="Enter Password" name="pass" required>
						</div>
												
						<div class="w-size25 float-r">
						    <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="7032783d58">
						    <input type="hidden" name="_wp_http_referer" value="/staging/sid/my-account/">
							<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" type="submit" name="login" value="Submit">
								Login
							</button>
							
							<a class="forget_password" href="forget_password.php" style="color:#227504 !important;">Lost your password</a>
							
						</div>
					</form>	
				</div>
				
				<div class="col-sm-6 col-md-4 col-lg-4">
				</div>
				
				<div class="col-sm-6 col-md-4 col-lg-4">
				</div>
				
				<div class="col-sm-6 col-md-4 col-lg-4 p-t-30 p-b-38 s-text15">
					<center>Not a member yet? Welcome on board - </center> <a href="/signup/" class="s-text15"><center><b class="flex-c-m vv bg1 bo-rad-23 hov1 m-text3 trans-0-4" style="
								    width: 200px;height: 40px;
								">Sign up now!</b></center></a>		
				</div>
								
				<div class="col-sm-6 col-md-4 col-lg-4">
				</div>
			</div>
		</div>
	</section> 

	
	 
	<?php include('footer.php'); ?>
