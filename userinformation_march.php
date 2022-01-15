<? include('custom_header.php');?>
	
	
<script src='static/js/validation.js'></script>
	<section class="bgwhite p-t-55 p-b-55">
		<div class="container">
			<div class="row">
				
				<!--<div class="col-sm-6 col-md-4 col-lg-4">-->
				<!--</div>-->
				
				<div class="bo9 col-sm-18 col-md-8 col-lg- p-l-40 p-r-40 p-t-30 p-b-38"style="margin-left: 180px;">
					<h5 class="m-text20 m-b-30 m-t-10 m-r-20">
						User Information 
					</h5>
					<form action="userinfo_insertvishal.php" method="POST">
						<input type='hidden' name='csrfmiddlewaretoken' value='pl9llQBwhVNRohXlctLGavvs5TEzBpjBzbnoPLizqD2Er7DC6E8QuS9eSxoSD39j' />
						<span class="s-text15">
							<strong>First Name</strong>
						</span>
						<div class="size1 bo4 m-b-12">
							<input type="text" class="sizefull s-text7 p-l-15 p-r-15" placeholder="Enter Email Address" name="userEmailId" required> 
						</div>
						<span class="s-text15">
							<strong>Last Name</strong>
						</span>
						<div class="size1 bo4 m-b-12">
							<input type="text" class="sizefull s-text7 p-l-15 p-r-15" placeholder="Enter Last Name" name="lName" required> 
						</div>
						
						<span class="s-text15">
							<strong>Email</strong>
						</span>
						<div class="size1 bo4 m-b-12">
							<input type="text" class="sizefull s-text7 p-l-15 p-r-15" placeholder="Enter Email" name="useremail" id="useremail" required>
						</div>
						
						<span class="s-text15">
							<strong>Mobile No.</strong>
						</span>
						<div class="size1 bo4 m-b-12">
							<input type="number" maxlength="10"  pattern="[0-9]{10}" class="sizefull s-text7 p-l-15 p-r-15" placeholder="Enter Mobile Number" name="userMobile" required> 
						</div>
						
						<span class="s-text15">
							<strong>Cuntry</strong>
						</span>
						<div class="size1 bo4 m-b-12">
							<input type="text" class="sizefull s-text7 p-l-15 p-r-15" placeholder="Cuntry" id="cuntry" name="cuntry" required>
						</div>
						
							<span class="s-text15">
							<strong>State</strong>
						</span>
						<div class="size1 bo4 m-b-12">
							<input type="text" class="sizefull s-text7 p-l-15 p-r-15" placeholder="State" id="state" name="state" required>
						</div>
						
							<span class="s-text15">
							<strong>City</strong>
						</span>
						<div class="size1 bo4 m-b-12">
							<input type="text" class="sizefull s-text7 p-l-15 p-r-15" placeholder="City" id="city" name="city" required>
						</div>
						
							<span class="s-text15">
							<strong>Pincode</strong>
						</span>
						<div class="size1 bo4 m-b-12">
							<input type="text" class="sizefull s-text7 p-l-15 p-r-15" placeholder="Pincode" id="pincode" name="pincode" required>
						</div>
						
							<span class="s-text15">
							<strong>Address</strong>
						</span>
						<div class="size1 bo4 m-b-12">
							<input type="text" class="sizefull s-text7 p-l-15 p-r-15" placeholder="Address" id="address" name="address" required>
						</div>
						
						<!--<div class="s-text15">	-->
						<!--	<input type="checkbox"  onclick="myFunction()"> Show password-->
						<!--</div>															-->
						<div class="w-size25 float-r">
							<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" type="submit" name="submit" value="Submit">
								Submit
							</button>
						</div>
					</form>	
				</div>
				
				<!--<div class="col-sm-6 col-md-4 col-lg-4">-->
				<!--</div>-->
				
				<!--<div class="col-sm-6 col-md-4 col-lg-4">-->
				<!--</div>-->
				
				<!--<div class="col-sm-12 col-md-8 col-lg-8 p-t-30 p-b-38 s-text15 t-center">-->
				<!--	Already have an account - <a href="/login/" class="s-text15">Login!</a>		-->
				<!--</div>-->
								
				<div class="col-sm-6 col-md-4 col-lg-4">
				</div>
			</div>
		</div>
	</section>

	
	
	<? include('custom_footer.php');?>