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
					Connecter I Pipedrive >> CERM
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
								<?php //if(!empty($conn)){ echo "<pre>"; print_r($conn); } ?>
									<div class="col-md-12 pd-top">
										<form action="{{URL::to('/Pipedrive/dashboard/addeditNC') }}" method='post' class="form-horizontal">
											<div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label">
														CERM Client Name
														<span class='require'>*</span>
													</label>
													<div class="col-md-6">
														<div class="input-group">
															<span class="input-group-addon"></span>
															<input type="hidden" class="form-control"  name='Con_Id' value="<?php echo !empty($conn)?$conn[0]->id:'';?>"/>
															<input type="hidden" name="_token" value="{{ csrf_token() }}">
															<input type="text" class="form-control" name='C_Cname' value="<?php echo !empty($conn)?$conn[0]->C_Cname:''; ?>"/>
														</div>
													</div>
													<div class="col-md-3" style="text-align: right;"><input type="checkbox"  <?php echo !empty($conn)?($conn[0]->checked =='on'?'checked':''):'checked';?> data-toggle="toggle" name='checked'>
													</div>
												</div>
												<div class='row conn'>
													<div class="form-group">
														<label class="col-md-3 control-label">
															CERM User Reference
															<span class='require'>*</span>
														</label>
														<div class="col-md-6">
															<div class="input-group">
																<span class="input-group-addon"></span>
																<input type="text" class="form-control" value="<?php echo !empty($conn)?$conn[0]->C_Uref:'';?>"  name='C_Uref' />
															</div>
														</div>
														<div class="col-md-3 input-group" style="text-align: center;"><input type="submit" class="btn btn-primary" value='Test Connection'>
													    </div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label">
															Pipedrive API Token
															<span class='require'>*</span>
														</label>
														<div class="col-md-6">
															<div class="input-group">
																<span class="input-group-addon"></span>
																<input type="text" class="form-control" value="<?php echo !empty($conn)?$conn[0]->Pd_token:''?>"  name='Pd_token' />
															</div>
														</div>
														<div class="col-md-3 input-group" style="text-align: center;"><input type="submit" class="btn btn-danger" value="Clear">
													    </div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label">
															CERM Service URL
															<span class='require'>*</span>
														</label>
														<div class="col-md-6">
															<div class="input-group">
																<span class="input-group-addon"></span>
																<input type="text" class="form-control" value="<?php echo !empty($conn)?$conn[0]->C_Surl:''?>"  name='C_Surl' />
															</div>
														</div>
														<div class="col-md-3" style="text-align: center;">
													    </div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label">
														Pipedrive Deal Stage To Create CERM Customer
														<span class='require'>*</span>
													</label>
													<div class="col-md-5">
														<div class="input-group">
															<span class="input-group-addon"></span>
															<select class="form-control" name='Pd_dstage'>
															<?php foreach($stages as $stage){ ?>
															    <option value='<?php echo $stage->s_id; ?>' <?php echo !empty($conn)?($conn[0]->deal_stage == $stage->s_id?'selected="selected"':''):''?>><?php echo $stage->name; ?></option>
															<?php } ?>
															</select>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-5 control-label" style="text-align: left;">
														<p class="pdcont">Map Pipedrive Users To CERM Representative Reference Keys</p>
													</label>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label">
														Pipedrive Deal Stage To Create CERM Customer
													</label>
													<div class="col-md-2">
														<div class="input-group">
															<span class="input-group-addon"></span>
															<select class="form-control" name='sync_delay'>
															<?php for($i=1;$i< 16; $i++){ ?>
															    <option value='<?php echo $i; ?>' <?php echo !empty($conn)?($conn[0]->delay == $i?'selected="selected"':''):''?>><?php echo $i; ?></option>
															<?php } ?>
															</select>
														</div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-6">
													<input type="submit" class="btn btn-success" value="Save" name='save_edit'>
												</div>
												<div class="col-md-6">
													<input type="submit" class="btn btn-danger" value="Delete" name='delete'>
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
   
