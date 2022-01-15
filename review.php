<?php 
session_start();
include('config.php');

$userid = $_SESSION['gid'];
$pid = $_GET['productid'];
$prod_type = $_GET['prod_type'];

$get_reviews = mysql_query("select * from ratings where product_id= '".$pid."' and product_category_id = '".$prod_type."'");
$count = mysql_num_rows($get_reviews);

?>

<?php include('header.php');?>
            <div class="container">
        		<div class="row">
        			<div class="col-sm-3">
        				<div class="rating-block">
        				    
        					<h4>Average user rating</h4>
        					<h2 class="bold padding-bottom-7">4.3 <small>/ 5</small></h2>
        					<button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
        					  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
        					</button>
        					<button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
        					  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
        					</button>
        					<button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
        					  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
        					</button>
        					<button type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
        					  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
        					</button>
        					<button type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
        					  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
        					</button>
        				</div>
        			</div>
        			<div class="col-sm-3">
        				<h4>Rating breakdown</h4>
        				<div class="pull-left">
        					<div class="pull-left" style="width:35px; line-height:1;">
        						<div style="height:9px; margin:5px 0;">5 <span class="glyphicon glyphicon-star"></span></div>
        					</div>
        					<div class="pull-left" style="width:180px;">
        						<div class="progress" style="height:9px; margin:8px 0;">
        						  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: 1000%">
        							<span class="sr-only">80% Complete (danger)</span>
        						  </div>
        						</div>
        					</div>
        					<div class="pull-right" style="margin-left:10px;">1</div>
        				</div>
        				<div class="pull-left">
        					<div class="pull-left" style="width:35px; line-height:1;">
        						<div style="height:9px; margin:5px 0;">4 <span class="glyphicon glyphicon-star"></span></div>
        					</div>
        					<div class="pull-left" style="width:180px;">
        						<div class="progress" style="height:9px; margin:8px 0;">
        						  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: 80%">
        							<span class="sr-only">80% Complete (danger)</span>
        						  </div>
        						</div>
        					</div>
        					<div class="pull-right" style="margin-left:10px;">1</div>
        				</div>
        				<div class="pull-left">
        					<div class="pull-left" style="width:35px; line-height:1;">
        						<div style="height:9px; margin:5px 0;">3 <span class="glyphicon glyphicon-star"></span></div>
        					</div>
        					<div class="pull-left" style="width:180px;">
        						<div class="progress" style="height:9px; margin:8px 0;">
        						  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: 60%">
        							<span class="sr-only">80% Complete (danger)</span>
        						  </div>
        						</div>
        					</div>
        					<div class="pull-right" style="margin-left:10px;">0</div>
        				</div>
        				<div class="pull-left">
        					<div class="pull-left" style="width:35px; line-height:1;">
        						<div style="height:9px; margin:5px 0;">2 <span class="glyphicon glyphicon-star"></span></div>
        					</div>
        					<div class="pull-left" style="width:180px;">
        						<div class="progress" style="height:9px; margin:8px 0;">
        						  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: 40%">
        							<span class="sr-only">80% Complete (danger)</span>
        						  </div>
        						</div>
        					</div>
        					<div class="pull-right" style="margin-left:10px;">0</div>
        				</div>
        				<div class="pull-left">
        					<div class="pull-left" style="width:35px; line-height:1;">
        						<div style="height:9px; margin:5px 0;">1 <span class="glyphicon glyphicon-star"></span></div>
        					</div>
        					<div class="pull-left" style="width:180px;">
        						<div class="progress" style="height:9px; margin:8px 0;">
        						  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: 20%">
        							<span class="sr-only">80% Complete (danger)</span>
        						  </div>
        						</div>
        					</div>
        					<div class="pull-right" style="margin-left:10px;">0</div>
        				</div>
        			</div>			
        		</div>			
		
        		<div class="row">
        			<div class="col-sm-7">
        				<hr/>
        				<div class="review-block">
        				    <h4>Total reviews : <?php echo $count;?></h4>
        				    <?php 
            				while($row =mysql_fetch_assoc($get_reviews)){ 
            				    
            				    $get_user_data = mysqli_query($con3,'select * from phppos_people where person_id="'.$userid.'" ');
            				    $user_data = mysqli_fetch_assoc($get_user_data);
            				    $review_count = $row['rating'];
            				    //echo $review_count;
            				?>
            					<div class="row">
            						<div class="col-sm-3">
            							<img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded">
            							<div class="review-block-name"><a href="#"><?php echo $user_data['first_name'].' '.$user_data['last_name']; ?></a></div>
            							<div class="review-block-date"><?php echo $row['date'];?><br/><!--1 day ago--></div>
            						</div>
            						<div class="col-sm-9">
            							<div class="review-block-rate">
            							    <?php for($i=1;$i<=5;$i++){ 
            							        $btn_class = 'btn-default btn-grey';
            							        if($i<=$review_count) {
            							            $btn_class = 'btn-warning';
            							        } else {
            							            $btn_class = 'btn-default btn-grey';
            							        }
            							    ?>
                								<button type="button" class="btn <?php echo $btn_class;?> btn-xs" aria-label="Left Align">
                								  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                								</button>
            								<?php } ?>
            								
            							</div>
            							<div class="review-block-title"><?php echo $user_data['first_name'].' '.$user_data['last_name'];?></div>
            							<div class="review-block-description"><?php echo $row['review'];?></div>
            						</div>
            					</div>
            					<hr/>
            				<?php } ?>
        				</div>
        			</div>
        		</div>
            </div> <!-- /container -->
            
            <?php include('footer.php')?>
        