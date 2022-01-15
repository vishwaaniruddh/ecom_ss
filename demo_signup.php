<? include('custom_header.php');?>
	
	
<script src='static/js/validation.js'></script>
	<section class="bgwhite p-t-55 p-b-55">
		<div class="container">
			<div class="row">
				
				<!--<div class="col-sm-6 col-md-4 col-lg-4">-->
				<!--</div>-->
				
				<div class="bo9 col-sm-18 col-md-8 col-lg- p-l-40 p-r-40 p-t-30 p-b-38"style="margin-left: 180px;">
					<h5 class="m-text20 m-b-30 m-t-10 m-r-20">
						Sign Up 
					</h5>
					<form Action="demo_signupinsert.php" method="POST">
						
						<span class="s-text15">
							<strong>First Name</strong>
						</span>
						<div class="size1 bo4 m-b-12">
							<input type="text" class="sizefull s-text7 p-l-15 p-r-15" placeholder="Enter First Name" name="firstName" required> 
						</div>
						
						<span class="s-text15">
							<strong>Last Name</strong>
						</span>
						<div class="size1 bo4 m-b-12">
							<input type="text" class="sizefull s-text7 p-l-15 p-r-15" placeholder="Enter Last Name" name="lastName" required> 
						</div>
						
						<input type='hidden' name='csrfmiddlewaretoken' value='pl9llQBwhVNRohXlctLGavvs5TEzBpjBzbnoPLizqD2Er7DC6E8QuS9eSxoSD39j' />
						<span class="s-text15">
							<strong>Email Address</strong>
						</span>
						<div class="size1 bo4 m-b-12">
							<input type="text" class="sizefull s-text7 p-l-15 p-r-15" placeholder="Enter Email Address" name="userEmailId" required> 
						</div>
						
						
						<span class="s-text15">
							<strong>Mobile No.</strong>
						</span>
						<div class="size1 bo4 m-b-12">
							<input type="number" maxlength="10"  pattern="[0-9]{10}" class="sizefull s-text7 p-l-15 p-r-15" placeholder="Enter Mobile Number" name="userMobile" required> 
						</div>
						
						<span class="s-text15">
                          <strong>Gender</strong>
                          </span><br>
                          <div>
                          <label>
                            <input type="checkbox" class="radio" value="1" name="gender" />Male
                          </label>
                          <br>
                          <label>
                            <input type="checkbox" class="radio" value="1" name="gender" />Female
                          </label>
                          <br>
                          </div>
                        
	
						
						<span class="s-text15">
							<strong>Password</strong>
						</span>
						<div class="size1 bo4 m-b-12">
							<input type="password" class="sizefull s-text7 p-l-15 p-r-15" placeholder="Enter Password" name="userPassword" id="userPassword" required>
						</div>
						
						<span class="s-text15">
							<strong>Confirm Password</strong>
						</span>
						<div class="size1 bo4 m-b-12">
							<input type="password" class="sizefull s-text7 p-l-15 p-r-15" placeholder="Enter Confirm Password" id="rUserPassword" name="userPassword-repeat" required>
						</div>
						<div class="s-text15">	
							<input type="checkbox"  onclick="myFunction()"> Show password
						</div>															
						<div class="w-size25 float-r">
							<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" type="submit" name="login" value="Submit">
								Sign Up
							</button>
						</div>
					</form>	
				</div>
				
				<!--<div class="col-sm-6 col-md-4 col-lg-4">-->
				<!--</div>-->
				
				<!--<div class="col-sm-6 col-md-4 col-lg-4">-->
				<!--</div>-->
				
				<div class="col-sm-12 col-md-8 col-lg-8 p-t-30 p-b-38 s-text15 t-center">
					Already have an account - <a href="/login/" class="s-text15">Login!</a>		
				</div>
								
				<div class="col-sm-6 col-md-4 col-lg-4">
				</div>
			</div>
		</div>
	</section>

	
	
	<? include('custom_footer.php');?>