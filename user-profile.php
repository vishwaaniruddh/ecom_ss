<?php 
session_start();
include('header.php'); 
include('config.php'); 
// var_dump($_SESSION); 

$userid = $_SESSION['id'];
// $userid = 50095;
$user_qry = mysql_query('select * from registration where registration_id= "'.$userid.'" ');
$user_data = mysql_fetch_assoc($user_qry);
?>
	<section class="bgwhite p-t-55 p-b-55">
		<div class="container">
			<div class="row" style="flex-wrap: inherit;">				
				<div class="bo9 col-sm-12 col-md-8 col-lg-6 p-l-40 p-r-40 p-t-30 p-b-38 m-1">
					<h5 class="m-text10 m-b-10">
						User Profile
						<a href="edit_profile.php" class="float-r"><span class="fs-20 fa fa-edit"></span></a>
					</h5>
					<hr>
					<div class="s-text15" style="line-height: 2;">
						<strong>Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;</strong>
						
					</div>
					<div class="s-text15">
						<strong>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;: &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;</strong>
						<?php echo $user_data['email'];?>
					</div>
					<div class="s-text15">
						<strong>Mobile&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;</strong>
						<?php echo $user_data['Mobile'];?>
					</div>
				</div>
				
				<div class="bo9 col-sm-12 col-md-8 col-lg-6 p-l-40 p-r-40 p-t-30 p-b-38 m-1" style="overflow-y: scroll; height: 300px;">
					<h5 class="m-text10 m-b-10">
						User Address 
						<a href="user-address.php" class="float-r"><span class="fs-15 fa fa-plus"></span></a>
					</h5>
					<hr>
					
						<div class="s-text15">
							No address added. Please Add Address!
						</div>
					
				</div>
			</div>

			<div class="row" style="flex-wrap: inherit;">			
				<div class="bo9 col-sm-24 col-md-16 col-lg-12 p-l-40 p-r-40 p-t-30 p-b-38 m-1">
					<h5 class="m-text10 m-b-10">
						User Order 
					</h5>
					<hr>
					<div class="s-text15">
						<strong>Total Order&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;</strong>
						0
					</div>
					<div class="s-text15">
						<strong>Pending Order&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;: &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;</strong>
						0
					</div>
					<div class="s-text15">
						<strong>Confirmed Order&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;</strong>
						0
					</div>
					<div class="s-text15">
						<strong>Cancelled Order&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;</strong>
						0
					</div>
					<div class="s-text15" style="float: right;">
						<!-- <a href="/my-orders/" class="s-text15" style="color: #E55540;"><strong>View Orders</strong></a> -->
						<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10 pointer">
							<a href="account/orders.php">
								<input class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 pointer" type="button"  value="View Orders"/>
							</a>
						</div>
					</div>
				</div>
			</div>
				
				<!-- <div class="bo9 col-sm-6 col-md-4 col-lg-3 p-l-40 p-r-40 p-t-30 p-b-38 m-1">
					<h5 class="m-text20 m-b-30">
						User Wishlist 
					</h5>
					<div class="s-text15">
						<strong>Total Products:</strong>
						0
					</div>
					<div class="s-text15">
						<a href="/wishlist/" class="s-text15" style="color: #E55540;"><strong>View Wishlist</strong></a>
					</div>
				</div>	 -->			
			</div>
		</div>
	</section> 

	
	<?php include('footer.php'); ?>