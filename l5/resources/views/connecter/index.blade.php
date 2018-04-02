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
			<div class="col-md-6">
				<?php if(Session::has('message')){ ?>
					<p class="alert {{ Session::get('alert-class', 'alert-info')}}  alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ Session::get('message') }}</p>
				<?php } 
				?>
				<div id="alertdiv"></div>
			</div>
			<div class="col-md-2">
				<a href='<?php echo URL::to('Pipedrive/dashboard/addeditNC'); ?>'>
					<button class="btn btn-success">Add New Connection</button>
				</a>
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
										<?php //echo "<pre>"; print_r($persons); ?>
										<script type="text/javascript" class="init">
											$(document).ready(function() {
												$('#example').DataTable({
													//"order": [[0, "desc" ]]
												});
											} );
										</script>
										<table id="example" class="display" style="width:100%">
											<thead>
												<tr>
													<th>ID</th>
													<th>Client Name</th>
													<th>Checked</th>
													<th>Reference</th>
													<th>CERM Url</th>
													<th>Deal Stage</th>
													<th>Delay</th>
												</tr>
											</thead>
											<tbody>
											<?php  $i= 0 ; foreach($conn as $con){ ?>
												<tr id='<?php echo "p_".$con->id; ?>'>
													<td><?php echo ++$i; ?></td>
													<td><a href='<?php echo URL::to('/Pipedrive/dashboard/addeditNC/'.$con->id); ?>'><p class='editlink'><?php echo $con->C_Cname; ?></p></a></td>
													<td><?php echo $con->checked=='on'?"<div class='on_c'><div>":"<div class='off_c'><div>"; ?></td>
													<td><?php echo $con->C_Uref; ?></td>
													<td><?php echo $con->C_Surl; ?></td>
													<td><?php echo $con->name; ?></td>
													<td><?php echo $con->delay; ?></td>
												</tr>
											<?php } ?>
											</tbody>
										</table>
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
<script>
$(document).ready(function(){
	var baseurl= $('input[name="baseurl"]').val();
	$.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('input[name="_token"]').val()
          }
        });
   $(".pdel").click(function(){
		var p_id=$(this).val();
        $.ajax({
		  type: 'POST',
		  url: baseurl+'/pd_delperson',
		  data: {id : p_id},
		  dataType: "text",
		  success: function(resultData) { 
		     var obj = JSON.parse(resultData);
			 if(obj.p_id != '') 
			 {
				$('#p_'+p_id).hide();
				$( "#alertdiv" ).html('<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Person Deleted.</div>');
				$(".alert alert-successalert-dismissible").fadeOut(500);
			 }
		  }
		});
    });
});
</script>
<link href="{{URL::asset('datatable/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
<script src="{{URL::asset('datatable/jquery.dataTables.min.js') }}" type="text/javascript"></script>
@include('includes/footer')