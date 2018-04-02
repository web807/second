<head>
    <meta charset="UTF-8">
    <title>User Profile | Josh Admin Template</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="{{URL::asset('css/all.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/jquery.fs.boxer.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/user_profile.css') }}" rel="stylesheet" type="text/css" />
	<script src="{{URL::asset('js/jquery.min.js') }}" type="text/javascript"></script>
	<script src="{{URL::asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
</head>
<body class="skin-josh">
	<div class="row">
		<div class="col-md-4 pd-top"></div>
		<div class="col-md-4 pd-top">
			<form action="{{URL::to('/Pipedrive/login') }}" class="form-horizontal" method='post'>
				<div class="form-body">
					<div class="form-group">
						<label class="col-md-3 control-label">
							Email
							<span class='require'>*</span>
						</label>
						<div class="col-md-9">
							<div class="input-group">
								<span class="input-group-addon"></span>
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="email" class="form-control" name='uemail'/>
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
								<input type="password" placeholder="Password" class="form-control" name='pwd'/>
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
		<div class="col-md-4 pd-top"></div>
	</div>
</body>