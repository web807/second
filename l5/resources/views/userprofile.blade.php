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
					Account Setting
				</h1>
			</div>
			<div class="col-md-8">
				<?php if(Session::has('message')){ ?>
					<p class="alert {{ Session::get('alert-class', 'alert-info')}}  alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ Session::get('message') }}</p>
				<?php } ?>
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
										<form action="{{URL::to('/Pipedrive/dashboard/addedituser') }}" method='post' class="form-horizontal">
											<div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label">
														Name
														<span class='require'>*</span>
													</label>
													<div class="col-md-9">
														<div class="input-group">
															<span class="input-group-addon"></span>
															<input type="hidden" class="form-control"  name='uid' value="<?php echo $user->id; ?>"/>
															<input type="hidden" name="_token" value="{{ csrf_token() }}">
															<input type="text" class="form-control" name='uname' value="<?php echo $user->name; ?>"/>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label">
														Email
														<span class='require'>*</span>
													</label>
													<div class="col-md-9">
														<div class="input-group">
															<span class="input-group-addon"></span>
															<input type="email" class="form-control" value="<?php echo $user->email; ?>"  name='uemail' />
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label">
														Password
														<span class='require'>*</span>
													</label>
													<div class="col-md-9">
														<div class="input-group">
															<span class="input-group-addon"></span>
															<input type="password" placeholder="Password" class="form-control" value="<?php echo $user->password; ?>"  name='upwd1' />
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label">
														Confirm Password
														<span class='require'>*</span>
													</label>
													<div class="col-md-9">
														<div class="input-group">
															<span class="input-group-addon"></span>
															<input type="password" placeholder="Confirm Password" class="form-control" value="<?php echo $user->password; ?>"  name='upwd2' />
														</div>
													</div>
												</div>
											</div>
											<div class="form-actions">
												<div class="col-md-offset-3 col-md-9">
													<button type="submit" class="btn btn-primary">Submit</button>
													&nbsp;
													<input type="reset" class="btn btn-default hidden-xs" value="Reset">
												</div>
											</div>
										</form>
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
   
