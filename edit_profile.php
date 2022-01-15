<?php session_start(); 
include('header.php');
include('config.php');
//var_dump($_SESSION);
?>
  

	<section class="bgwhite p-t-55 p-b-55">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-4">
				</div>
				
				<div class="bo9 col-sm-6 col-md-4 col-lg-4 p-l-40 p-r-40 p-t-30 p-b-38">
					<h5 class="m-text20 m-b-30 m-t-10 m-r-20">
						Edit Profile 
					</h5>
					<form enctype="multipart/form-data" method="POST">
						
						<span class="s-text15">
							<strong>Full Name</strong>
						</span>
						<div class="size1 bo4 m-b-12">
							<input type="text" class="sizefull s-text7 p-l-15 p-r-15" placeholder="Enter Full Name" name="fullname" value="" required> 
						</div>
						<span class="s-text15">
							<strong>Email</strong>
						</span>
						<div class="size1 bo4 m-b-12">
							<input type="email" class="sizefull s-text7 p-l-15 p-r-15" placeholder="Enter Password" name="email" value="rahulsbdit2019@gmail.com" disabled>
						</div>
						<span class="s-text15">
							<strong>Mobile</strong>
						</span>
						<div class="size1 bo4 m-b-12">
							<input type="number" maxlength="10" class="sizefull s-text7 p-l-15 p-r-15" placeholder="Enter Mobile" name="mobile" value="9324576504" required>
						</div>
						<span class="s-text15">
							<strong>Password</strong>
						</span>
						<div class="size1 bo4 m-b-12">
							<input type="password" class="sizefull s-text7 p-l-15 p-r-15" placeholder="Enter Password" name="userPassword" id="userPassword" required>
						</div>
												
						<div class="w-size25 float-r">
							<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" type="submit" name="edit_profile" value="Save">
								Save
							</button>
						</div>
					</form>	
				</div>
				
				<div class="col-sm-6 col-md-4 col-lg-4">
				</div>
			</div>
		</div>
	</section> 

	
	<?php include('footer.php'); ?>