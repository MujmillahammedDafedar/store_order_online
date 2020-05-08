<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    
    <meta name="google-signin-scope" content="profile email">
    <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
    <title>Need Baskets</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?= base_url('css/materialize.css'); ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="<?= base_url('css/style.css'); ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="https://materializecss.com/extras/noUiSlider/nouislider.css" type="text/css" />
    <link rel="icon" href="<?php echo base_url('assets/images/yellow-blue.png'); ?>" type="image/png">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="<?php echo base_url('assets/js/jquery-3.4.1.min.js'); ?>"></script>

    <!-- Section:- Account Kit -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://sdk.accountkit.com/en_US/sdk.js"></script>

</head>

<body style="background-color:#fff">

<style>
    .abcRioButton {
        width:100% !important;
    }
</style>

<div class="container">
    <div class="row center">
        
        <div class="col-s12" style="margin-top:90px;">
            <img src="<?php echo base_url('assets/images/superman-nb - 192.png'); ?>" style="height:250px;"/>
        </div>
        <div class="col-s12" >
            <h6>Login to proceed.</h6>
            <br>
            <!--<div class="input-field col s6">
                <input id="mobilenumber" type="text" class="validate">
                <label for="email">Mobile Number</label>
                <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>            
            </div>
            <div class="col s6">
                <button class="btn waves-effect waves-light" type="submit" name="action">
                    <i class="material-icons right">send</i>
                  </button>                
            </div>
            <a  onclick="smsLogin();" class="loginBtn loginBtn--mobilenumber  waves-effect waves-light btn yellow" style="color:#dd2c00;width:100%;font-weight: 600;">Mobile Number</a>-->
        </div>
        <!--<div class="col-s12" >-->
        <!--<div>
            <br>
            <h5 style="color:white">Login</h5>
            <br>
        </div>-->
        <div class="col-m12">
              <button class="btn waves-effect waves-light" onclick="smsLogin();" type="button" name="action">Continue with mobile number
                <i class="material-icons right">send</i>
              </button>            
            <!--<a class="waves-effect waves-light btn deep-orange accent-4" ><i class="fab fa-buromobelexperte"></i> Mobile Number</a>-->
            <br>
            <br>
            <h7><u>OR</u></h7>
            <br>
            <!--<a class="btn-floating btn-large waves-effect waves-light white" onclick="smsLogin();" ><i class="fab fa-buromobelexperte" style="color:green"></i></a>&nbsp; | &nbsp;-->
            <a class="btn-floating btn-large waves-effect waves-light white" id="googlebtn" onclick="document.getElementById('my-signin2').click();" ><i class="fab fa-google" style="color:red"></i></a> &nbsp; | &nbsp;
            <a class="btn-floating btn-large waves-effect waves-light white" onclick="login();" ><i class="fab fa-facebook-f" style="color:#4267b2"></i></a>
        </div>
        <div class="col-s12 center" style="display:none">
            <div id="my-signin2" style="margin-top:10px"></div>
        </div>
        <!--</div>-->
          
          
          

        <!--<div class="col-s12" style="margin-top:90px;">
            <img src="<?php echo base_url('assets/images/superman-nb - 192.png'); ?>" style="height:160px;"/>
        </div>
        <div class="col-s12" >
            <h5>Please Login to Proceed</h5>
            <a  onclick="smsLogin();" class="loginBtn loginBtn--mobilenumber  waves-effect waves-light btn light-green darken-3" style="width:100%"><i class="fab fa-buromobelexperte"></i>  &nbsp;  Login with Mobile Number</a>
        </div>
        <div class="col-s12" style="margin-top:10px">
            <a onclick="login();"  class="loginBtn loginBtn--facebook waves-effect waves-light btn indigo darken-3" style="width:100%"><i class="fab fa-facebook-f"></i> &nbsp; Login with Facebook</a>
        </div>
        <div class="col-s12" style="margin-top:10px;display:none">
            <a class="waves-effect waves-light btn white" style="color:grey;width:100%"><i class="fab fa-google"></i> &nbsp; Login with Google</a>
        </div>     
        
        <div class="col-s12 center">
            <div id="my-signin2" style="margin-top:10px"></div>
        </div>-->
        
          <script>
            renderButton();
            function onSuccess(googleUser) {
                // console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
                var profile = googleUser.getBasicProfile();
    			// console.log(basicInfo.first_name);
    			$.post("../set-login", { type : 'google', name : profile.getName(), id : profile.getId(), email : profile.getEmail(), image_url : profile.getImageUrl()}, function(response2){
    			    response2 = response2.trim();
                    // console.log(response2);
                    // window.open('../accountkit/test.php','_self');
                    <?php if(!$this->input->get('logout')): ?>
                        if(response2 == 'take_mobile_no'){
                            window.open('<?php echo base_url().'take-mobile-no'; ?>','_self');
                        } else {
                            window.open('<?php echo base_url(); ?>','_self');
                        }
                    <?php endif; ?>
                });		
              
            }
            function onFailure(error) {
                console.log("failure...");
              console.log(error);
            }
            function renderButton() {
              gapi.signin2.render('my-signin2', {
                'scope': 'profile email',
                'width': '250px',
                'longtitle': true,
                'theme': 'dark',
                'onsuccess': onSuccess,
                'onfailure': onFailure
              });
            }
          </script>
        
    </div>
</div>

<script>
// login callback
function loginCallback(response) {
	if (response.status === "PARTIALLY_AUTHENTICATED") {
		var code = response.code;
		var csrf = response.state;
		console.log('Recieved Auth Token form facebook.');
		// alert(code);
		$.post("../verify-accountkit", { code : code, csrf : csrf }, function(result){
		    // result
		    result = result.trim();
		    console.log(result);
            console.log('Verified Successfully.');
            // console.log(result);
            if(result != ''){
                // console.log("In the condition.");
                $.post("../set-login", { type : 'accountkit', mobilenumber : result }, function(response2){
                    response2 = response2.trim();
                    if(response2 == 'take_email_id'){
                        //window.open('<?php echo base_url().'take-email-id'; ?>','_self');
                        window.open('<?php echo base_url(); ?>','_self');
                    } else {
                        // alert('hello world');(
                       // window.close();
                        window.open('<?php echo base_url(); ?>','_self');
                    }
                });
            }
		});
	} else if (response.status === "NOT_AUTHENTICATED") {
		console.log('NOT_AUTHENTICATED');
	} else if (response.status === "BAD_PARAMS") {
		console.log('BAD_PARAMS');
	} 
} 

/************* Section:- Facebook Login ***************/
window.fbAsyncInit = function() {
	FB.init({
		appId      : '2399539133663315',
		xfbml      : true,
		version    : 'v7.0',
		status: true,
		cookie: true
	});
	FB.getLoginStatus(function(response){
		if(response.status === 'connected'){

		} else if(response.status === 'not_authorized') {

		} else {

		} // End of IF Else
	}); // End of getLoginStatus
}; // End of fbAsyncInit

(function(d, s, id){
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) {return;}
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// This Function user Optinal, Currently not using.
function getInfo() {
	FB.api('/me', 'GET', {fields: 'first_name,last_name,name,id'}, function(response) {
	// document.getElementById('status').innerHTML = response.id;

	window.open('testy?viewmore=true#portfolio','_self');
	// showhideform();
	// document.getElementById('status').innerHTML = response.id;
	//alert(response.id);
	// fbinfo = response.id;
	}); // End FB API
} // End of Get Info


function getResults(){
	window.open('index.php?results=true#portfolio','_self');
} // End of Get Results

// This Function user Optinal, Currently not using.
function logout(){
	FB.logout(function(response) {
		document.location.reload();
	});
} // End of Logout
/************* End of Facebook Login ***************/

var friendsList = '';
var basicInfo = '';
function login(){
	FB.login(function(response){
		if(response.status === 'connected'){
			FB.api('/me', 'GET', {fields: 'first_name,last_name,name,id,email'}, function(response) {

					// basicInfo = JSON.stringify(response);
					basicInfo = response;
					// console.log(basicInfo.first_name);
    				$.post("../set-login", { type : 'facebook', first_name : basicInfo.first_name, last_name : basicInfo.last_name, name : basicInfo.name, id : basicInfo.id,email : basicInfo.email }, function(response2){
                        response2 = response2.trim();
                        // console.log(response2);
                        if(response2 == 'take_mobile_no'){
                            window.open('<?php echo base_url().'take-mobile-no'; ?>','_self');
                        } else {
                            // alert('hello');
                            window.open('<?php echo base_url(); ?>','_self');
                        } 
    				    
                        // console.log(response2);
                        // window.open('../accountkit/test.php','_self');
                        // window.open('<?php echo base_url(); ?>','_self');
                    });					
			});    // FB API  
			/*FB.api('/me/friends', function(response2) {
				friendsList = JSON.stringify(response2.data);
				// var fbInfoArray = friendsList.concat(basicInfo);
				var fbInfoArray = friendsList;
				console.log(basicInfo);
				

				
				document.getElementById("userinfo").value = fbInfoArray;
				document.myform.submit();                        
			}); */     					
		} else if(response.status === 'not_authorized') {
		    console.log('not_authorized');
			// document.getElementById('status').innerHTML = 'we are not logged in.';
			// alert("unauthorized");
		} else {
		    console.log('not_logged');
			// document.getElementById('status').innerHTML = 'you are not logged in to Facebook';
			//document.getElementById('logoufb').style.display = 'none';                
		} // End of IF Else

	// },{scope: 'email,user_friends', return_scopes: true}); // End of FB LOGIn
	}); // End of FB LOGIn
} // End of Login Function
// get user basic info	


/************** Section:- Account Kit **************/
AccountKit_OnInteractive = function(){
	AccountKit.init({
		appId:"2399539133663315", 
		state:"CSRF_TOKEN", 
		version:"v1.1",
		fbAppEventsEnabled:true,
	});
};

// phone form submission handler
function smsLogin() {
	AccountKit.login(
		'PHONE', 
		{countryCode: "+91"},
		loginCallback
	);
}

  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }

</script>

<?php if($this->input->get('logout')): ?>
    <script>signOut();</script>
<?php endif; ?>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://materializecss.com/extras/noUiSlider/nouislider.js"></script>
  
  <script src="<?= base_url('js/materialize.js'); ?>"></script>
  <script src="<?= base_url('js/init.js'); ?>"></script>


</body>
</html>    





















////////////////////////
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
<div data-card-height="cover" class="card">
<div class="card-center">
<div class="pl-5 pr-5">
<h1 class="color-white text-center text-uppercase font-900 fa-4x">LOGIN</h1>
<p class="color-highlight text-center font-12">
Image or Infinite Background Effect
</p>
<div class="input-style input-light has-icon input-style-1 input-required">
<i class="input-icon fa fa-user font-11"></i>
<span>Username</span>
<em>(required)</em>
<input type="name" placeholder="Username">
</div>
<div class="input-style input-light has-icon input-style-1 input-required mb-5">
<i class="input-icon fa fa-lock font-11"></i>
<span>Password</span>
<em>(required)</em>
<input type="password" placeholder="Password">
</div>
<div class="d-flex mt-n4 mb-4">
<div class="w-50 font-11 pb-2 color-white opacity-60 text-left"><a href="#" class="color-white">Create Account</a></div>
<div class="w-50 font-11 pb-2 color-white opacity-60 text-right"><a href="#" class="color-white">Forgot Credentials</a></div>
</div>
<a href="#" class="back-button btn btn-full btn-m shadow-large rounded-s text-uppercase font-900 bg-highlight">LOGIN</a>
<div class="divider mt-3"></div>
<a href="#" class="btn btn-icon btn-m btn-full shadow-l rounded-s bg-facebook text-uppercase font-900 text-left"><i class="fab fa-facebook-f text-center"></i>Login with Facebook</a>
<a href="#" class="btn btn-icon btn-m btn-full shadow-l rounded-s bg-twitter text-uppercase font-900 text-left mt-2 "><i class="fab fa-twitter text-center"></i>Login with Twitter</a>
</div>
</div>
<div class="card-overlay bg-black opacity-85"></div>
<div class="card-overlay-infinite preload-img" data-src="images/pictures/_bg-infinite.jpg"></div>
</div>
</div>

<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/custom.js"></script>
</body>