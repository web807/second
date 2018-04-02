<?php
//print_r($user);
//echo session('UserID');
//echo URL::to('/');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>User Profile | Josh Admin Template</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="{{URL::asset('css/app.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/jasny-bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/bootstrap-editable.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/bootstrap-magnify.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/jasny-bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/all.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/jquery.fs.boxer.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/user_profile.css')}}" rel="stylesheet" type="text/css" />
	<script src="{{URL::asset('js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{URL::asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
	<script src="{{URL::asset('js/dashboard.js') }}" type="text/javascript"></script>
	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</head>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="baseurl" value="<?php echo URL::to('/'); ?>">
<input type="hidden" name="userid" value="<?php echo session('UserID')->id; ?>">
<body class="skin-josh">
    <header class="header">
        <div class="logo">
            <p id='logo'>CERM >> Pd </p>
        </div>
        <nav class="navbar navbar-static-top" role="navigation">
            <div class="navbar-right">
			    <div class='col-md-4 buton'>
					<p id= 'hello'><?php echo session('UserID')->name." "; ?></p>
				</div>
				<div class='col-md-4 buton'>
				   <a href="<?php echo URL::to('Pipedrive/dashboard/setting'); ?>">
						<span id='sett' class="btn btn-success" value="Logout">Settings</span>
					</a>
				</div>
				<div class='col-md-4 buton'>
					<span id='logout' class="btn btn-danger" value="Logout">Logout</span>
				</div>
            </div>
        </nav>
    </header>
	 <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <section class="sidebar ">
                <div class="page-sidebar  sidebar-nav">
                    <div class="clearfix"></div>
                    <!-- BEGIN SIDEBAR MENU -->
					<ul id="menu" class="page-sidebar-menu">
                        <li>
                            <a href="<?php echo URL::to('Pipedrive/dashboard'); ?>">
                                <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
						
                    </ul>
					<ul id="menu" class="page-sidebar-menu">
                        <li>
                            <a href="<?php echo URL::to('Pipedrive/dashboard/connecter'); ?>">
                                <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                                <span class="title">All Connections</span>
                            </a>
                        </li>
						
                    </ul>
					<ul id="menu" class="page-sidebar-menu">
                        <li>
                            <a href="<?php echo URL::to('Pipedrive/dashboard/addeditNC'); ?>">
                                <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                                <span class="title">Add New Connection</span>
                            </a>
                        </li>
						
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
            </section>
        </aside>