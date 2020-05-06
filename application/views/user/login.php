
<!DOCTYPE HTML>
<html lang="en">

<!-- Mirrored from www.enableds.com/products/sticky30/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 May 2020 06:53:57 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>StickyMobile BootStrap</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/assets/styles/style.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i|Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i,900,900i&amp;display=swap" rel="stylesheet">

<link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
</head>
<?php echo form_open('users/login'); ?>
<div class="page-content header-clear-medium">
<div class="card card-style">
<div class="content mt-4 mb-0">
<h1 class="text-center font-900 font-40 text-uppercase mb-0">Login</h1>
<p class="bottom-0 text-center color-highlight font-11">Let's get you logged in</p>
<?php if(validation_errors()){ ?>
<div class="alert alert-danger">
  <?php echo validation_errors(); ?>
</div>
<?php } ?>
<div class="input-style has-icon input-style-1 input-required pb-1">
<i class="input-icon fa fa-user color-theme"></i>
<span>Username</span>
<em>(required)</em>
<input type="name" name="username" placeholder="Username">
</div>
<div class="input-style has-icon input-style-1 input-required pb-1">
<i class="input-icon fa fa-lock color-theme"></i>
<span>Password</span>
<em>(required)</em>
<input type="name" name="password" placeholder="Password">
</div>
<button type="submit" class="btn btn-m btn-full mb-3 rounded-xs text-uppercase font-900 shadow-s bg-green1-dark">Login</button>

<div class="divider"></div>
<a href="#" class="btn btn-icon btn-m btn-full shadow-l bg-facebook text-uppercase font-900 text-left"><i class="fab fa-facebook-f text-center"></i>Login with Facebook</a>
<a href="#" class="btn btn-icon btn-m mt-2 btn-full shadow-l bg-twitter text-uppercase font-900 text-left"><i class="fab fa-twitter text-center"></i>Login with Twitter</a>
<div class="divider mt-4 mb-3"></div>
<div class="d-flex">
<div class="w-50 font-11 pb-2 color-theme opacity-60 pb-3 text-left"><a href="#" class="color-theme">Create Account</a></div>
<div class="w-50 font-11 pb-2 color-theme opacity-60 pb-3 text-right"><a href="#" class="color-theme">Forgot Credentials</a></div>
</div>
</div>
</div>

<div id="menu-warning-1" class="menu menu-box-modal rounded-m" data-menu-height="300" data-menu-width="310">
<h1 class="text-center mt-4"><i class="fa fa-3x fa-times color-red2-dark"></i></h1>
<h1 class="text-center mt-3 text-uppercase font-900">Wooops!</h1>
<p class="boxed-text-l">
Check your username and password.<br> Try again.
</p>
<a href="<?php echo base_url();?>user/login" class="close-menu btn btn-m btn-center-m button-s shadow-l rounded-s text-uppercase font-900 bg-red1-light">Go Back</a>
</div>
<div id="menu-warning-2" class="menu menu-box-modal bg-red2-dark rounded-m" data-menu-height="300" data-menu-width="310">
<h1 class="text-center mt-4"><i class="fa fa-3x fa-times-circle color-white shadow-xl rounded-circle"></i></h1>
<h1 class="text-center mt-3 text-uppercase color-white font-900">Wooops!</h1>
<p class="boxed-text-l color-white opacity-70">
You can continue with your previous actions.<br> Easy to attach these to success calls.
</p>
<a href="#" class="close-menu btn btn-m btn-center-m button-s shadow-l rounded-s text-uppercase font-900 bg-white">Go Back</a>
</div>
<?php echo form_close() ?>


<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/custom.js"></script>
</body>
<?php if($this->uri->segment(2) == 'login'){ ?>
	<script type="text/javascript">
       <?php echo $this->session->flashdata('login_failed'); ?>
<?php if($this->input->get('auth') == 'failed'){ ?>
    $(window).on('load',function(){
     $('#menu-warning-1').showMenu();
     });

</script>
<?php } ?>
<?php } ?>
