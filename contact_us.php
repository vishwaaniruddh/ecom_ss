<?php include('header.php'); ?>





<section class="" style="background-image: url(static/images/site/grid_images/img-1.jpg);">
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(static/images/header.png);">
		<h2 class="l-text2 t-center">
			Contact Us
		</h2>
	</section><br>

<!--------------rahul 30-07-2019---------------->
<!-- 	<section class="" style="background-image: url(/static/images/site/grid_images/img-1.jpg);">
		<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(/static/images/site/grid_images/img-1.jpg);">
		<h2 class="l-text2 t-center">
			Contact Us
		</h2>
	</section> -->

<form action="." enctype="multipart/form-data" id="cart_form" method="POST">
	
	<input type="hidden" name="offer_send_btn" id="offer_send_btn" value="" />
	<!--------------rahul 30-07-2019---------------->
	<!-- <section class="bgwhite p-t-55 p-b-65"> -->
		<div class="container">

			<div class="bo9 p-l-40 p-r-40 p-t-30 p-b-38">
				<h5 class="m-text20 m-b-30 m-t-10 m-r-20">
					ENQUIRY 
				</h5>
				<form enctype="multipart/form-data" method="POST" action="send_mail.php">
					
					<div class="row">
						<div class="col-sm-4">
							<span class="s-text15">
								<strong>Full Name</strong>
							</span>
							<div class="size1 bo4 m-b-12">
								<input type="text" class="sizefull s-text7 p-l-15 p-r-15" placeholder="Enter Full Name" name="userName" value="" required> 
							</div>
						</div>

						<div class="col-sm-4">
							<span class="s-text15">
								<strong>Email</strong>
							</span>
							<div class="size1 bo4 m-b-12">
								<input type="text" class="sizefull s-text7 p-l-15 p-r-15" placeholder="Enter email address" name="email" value="" required>
							</div>
						</div>

						<div class="col-sm-4">
							<span class="s-text15">
								<strong>Mobile</strong>
							</span>
							<div class="size1 bo4 m-b-12">
								<input type="text" class="sizefull s-text7 p-l-15 p-r-15" placeholder="Enter Mobile" name="userPhone" value="" required>
							</div>
						</div>
						
						<div class="col-sm-12">
							<span class="s-text15">
								<strong>Subject</strong>
							</span>
							<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="userMsg" placeholder="Message" required></textarea>
						</div>
					</div>
				
					<div class="size1">
						<button class="flex-c-m size10 bg1 bo-rad-23 m-t-10 hov1 s-text1 trans-0-4 float-r" type="submit" name="send_enquiry" value="Submit">
							send
						</button>
					</div>
				</form>	
			</div>
			<br><br>

			<div class="row">
				<div class="col-sm-4" style="margin: auto;">
					<div class="bo9 p-l-40 p-r-40 p-t-30 p-b-38" style="height: 202px;">
				
					<h5 class="m-text20">
						Address
					</h5>
					<div class="s-text15 m-t-10">
						
						<span class="s-text16 w-size19 w-full-sm" >
							Shyamkamal Building B/1, Office No.104,<br>1 st Floor, Agarwal Market, Opp the station,<br>Vile Parle (East), Mumbai
						<br>Pin Code : 400 057<br>
						<a href="tel:+919324243011" class="Blondie">09324243011</a> / <a href="tel:+917400413163" class="Blondie">07400413163</a>
						
						</span><br>
					</div>   
					
				</div>
				</div>
		</div>
		<br>
		<br>
	</div>
<!-- </section> -->
</form>

<script type="text/javascript" src="static/scripts/maps.js"></script>

<?php include('footer.php'); ?>