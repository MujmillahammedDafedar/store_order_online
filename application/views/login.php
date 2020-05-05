<div class="hidden" style="overflow: hidden">
<a id="validation_error_" href="#" data-menu="menu-warning-1">
</a>
</div>
<?php echo form_open('users/login'); ?>

<div class="page-content header-clear-medium">
<div class="card card-style">
<div class="content mt-4 mb-0">
<h1 class="text-center font-900 font-40 text-uppercase mb-0">Login</h1>
<p class="bottom-0 text-center color-highlight font-11">Let's get you logged in</p>
<div class="input-style has-icon input-style-1 input-required pb-1">
<i class="input-icon fa fa-user color-theme"></i>
<span>Username</span>
<em>(required)</em>
<input type="name" placeholder="Username">
</div>
<div class="input-style has-icon input-style-1 input-required pb-1">
<i class="input-icon fa fa-lock color-theme"></i>
<span>Password</span>
<em>(required)</em>
<input type="name" placeholder="Password">
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
You can continue with your previous actions.<br> Easy to attach these to success calls.
</p>
<a href="#" class="close-menu btn btn-m btn-center-m button-s shadow-l rounded-s text-uppercase font-900 bg-red1-light">Go Back</a>
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
