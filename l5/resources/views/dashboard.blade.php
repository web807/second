<?php
//print_r($user);
//echo session('UserID');
//echo URL::to('/');
?>
@include('includes/header')
<aside class="right-side">
	<section class="content-header">
		<div class='row'>
			<div class="col-md-4">
				<h1>
					Dashboard
				</h1>
			</div>
		</div>
	</section>
	<section class="content">
		<div class="row ">
			<div class="col-md-12">
				<div class="row ">
					<div class="col-md-12">
						<div class="tab-content">
							<div id="tab-activity" class="tab-pane fade in active">
								<div class="row">
									<div class="col-md-12 pd-top">
									    <div class='dashboard'>
										<div class="col-md-4"> <div class='allcon'><p class='allcon1'><?php echo "All Connection<br/>".$total;  ?></p></div></div>
										<div class="col-md-4 dash"><div class='actconn'><p class='allcon1'><?php echo "Active Connection<br/>".$active;  ?></p></div></div>
										<div class="col-md-4 dash"><div class='unactconn'><p class='allcon1'><?php echo "Unactive Connection<br/>".$unactive;  ?></p></div></div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</aside>
@include('includes/footer')
   
