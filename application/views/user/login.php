
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
<script src="https://www.gstatic.com/firebasejs/6.3.3/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.3.3/firebase-auth.js"></script>
<style type="text/css">
	.btn-icon:hover {
    /* color: #fff; */
}
.btn-icon:hover {
    /* color: #fff; */
}
</style>
</head>
<div class="page-content header-clear-medium">
<div class="card card-style">
<div class="content mt-4 mb-0">
<h1 class="text-center font-900 font-40 text-uppercase mb-0">Login</h1>
<p class="bottom-0 text-center color-highlight font-11">Let's get you logged in</p>

<div id="number-div" class="input-style has-icon input-style-1 input-required pb-1">
<i class="input-icon fa fa-user color-theme"></i>
<span>Mobile number</span>
<em>(required)</em>
<input type="tel" required id="phoneNumber" name="number" placeholder="Enter Mobile number">
<div id="errorMesagea"></div>

</div>
<div class="input-style has-icon input-style-1 input-required pb-1">

  <div id="recaptcha-container"></div>
</div>

<div id="otp-div" class="input-style has-icon input-style-1 input-required pb-1" style="display: none;">
<i class="input-icon fa fa-lock color-theme"></i>
<span>OTP</span>
<em>(required)</em>
<input type="text" name="password" required id="code" placeholder="Enter OTP">
<div id="errorMesage"></div>
<a href="#" onclick="submitPhoneNumberAuth()">Resend OTP</a>
</div>
<button type="submit" id="hidebutton"  onclick="submitPhoneNumberAuth()" class="btn btn-m btn-full mb-3 rounded-xs text-uppercase font-900 shadow-s bg-green1-dark">Get otp</button>
<button type="submit" id="submitOtp"  onclick="submitPhoneNumberAuthCode()" class="btn btn-m btn-full mb-3 rounded-xs text-uppercase font-900 shadow-s bg-green1-dark" style="display: none">Confirm</button>
<div class="divider"></div>



<a href="#" onclick="toggleSignIn()" class="btn btn-icon btn-m btn-full rounded-s shadow-l text-uppercase font-900 text-left">  <img width="20px" style="    margin-left: -33px;
" alt="Google sign-in" 
                src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" /> &nbsp &nbsp &nbsp &nbsp Register with Google</a>
<a href="#" class="btn btn-icon btn-m mt-2 mb-4 btn-full rounded-s shadow-l bg-twitter text-uppercase font-900 text-left" style="display: none;"><i class="fab fa-twitter text-center"></i>Register with Twitter</a>

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


    <script>
      // Paste the config your copied earlier
     const firebaseConfig = {
  apiKey: "AIzaSyBEAzaw4UdtN-110RFcEiD1IGWTIAD0Wgs",
  authDomain: "nearme-bd535.firebaseapp.com",
  databaseURL: "https://nearme-bd535.firebaseio.com",
  projectId: "nearme-bd535",
  storageBucket: "nearme-bd535.appspot.com",
  messagingSenderId: "807407970976",
  appId: "1:807407970976:web:b540e6dc5a1b66d75b77c5",
  measurementId: "G-Q3TYF4R8P6"
};

      firebase.initializeApp(firebaseConfig);



       //   * Function called when clicking the Login/Logout button.
     //*/
    // [START buttoncallback]
    function toggleSignIn() {
      if (!firebase.auth().currentUser) {
        // [START createprovider]
        var provider = new firebase.auth.GoogleAuthProvider();
        // [END createprovider]
        // [START addscopes]
        provider.addScope('https://www.googleapis.com/auth/plus.login');
        // [END addscopes]
        // [START signin]
        firebase.auth().signInWithRedirect(provider);
        // [END signin]
      } else {
        // [START signout]
        firebase.auth().signOut();
        // [END signout]
      }
      // [START_EXCLUDE]
     // document.getElementById('quickstart-sign-in').disabled = true;
      // [END_EXCLUDE]
    }
    // [END buttoncallback]


    /**
     * initApp handles setting up UI event listeners and registering Firebase auth listeners:
     *  - firebase.auth().onAuthStateChanged: This listener is called when the user is signed in or
     *    out, and that is where we update the UI.
     *  - firebase.auth().getRedirectResult(): This promise completes when the user gets back from
     *    the auth redirect flow. It is where you can get the OAuth access token from the IDP.
     */
    function initApp() {
      // Result from Redirect auth flow.
      // [START getidptoken]
      firebase.auth().getRedirectResult().then(function(result) {
        if (result.credential) {
          // This gives you a Google Access Token. You can use it to access the Google API.
          var token = result.credential.accessToken;
          // [START_EXCLUDE]
          console.log(result);
          // document.getElementById('quickstart-oauthtoken').textContent = token;
           //Get verified user info here
           var additionalUserInfo = result.additionalUserInfo; 
           //console.log(result); 
           //console.log('Here is your verified data');
           window.open("<?php echo base_url()?>Users/userdata?name="+result.additionalUserInfo.profile["name"]+'&&id='+result.additionalUserInfo.profile["id"]+'&&picture='+result.additionalUserInfo.profile["picture"]+'&&verified_email='+result.additionalUserInfo.profile["verified_email"]+'&&email='+additionalUserInfo.profile["email"], '_self');


        } else {
          // document.getElementById('quickstart-oauthtoken').textContent = 'null';
          // [END_EXCLUDE]
        }
        // The signed-in user info.
        var user = result.user;
      }).catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        // The email of the user's account used.
        var email = error.email;
        // The firebase.auth.AuthCredential type that was used.
        var credential = error.credential;
        // [START_EXCLUDE]
        if (errorCode === 'auth/account-exists-with-different-credential') {
          alert('You have already signed up with a different auth provider for that email.');
          // If you are using multiple auth providers on your app you should handle linking
          // the user's accounts here.
        } else {
          console.error(error);
        }
        // [END_EXCLUDE]
      });
      // [END getidptoken]

      // Listening for auth state changes.
      // [START authstatelistener]
      firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
          // User is signed in.
          var displayName = user.displayName;
          var email = user.email;
          var emailVerified = user.emailVerified;
          var photoURL = user.photoURL;
          var isAnonymous = user.isAnonymous;
          var uid = user.uid;
          var providerData = user.providerData;
        //  console.log(user);
          // [START_EXCLUDE]
          // document.getElementById('quickstart-sign-in-status').textContent = 'Signed in';
          // document.getElementById('quickstart-sign-in').textContent = 'Sign out';
          // document.getElementById('quickstart-account-details').textContent = JSON.stringify(user, null, '  ');
          // [END_EXCLUDE]
        } else {
          // User is signed out.
          // [START_EXCLUDE]
          // document.getElementById('quickstart-sign-in-status').textContent = 'Signed out';
          // document.getElementById('quickstart-sign-in').textContent = 'Sign in with Google';
          // document.getElementById('quickstart-account-details').textContent = 'null';
          // document.getElementById('quickstart-oauthtoken').textContent = 'null';
          // [END_EXCLUDE]
        }
        // [START_EXCLUDE]
        // document.getElementById('quickstart-sign-in').disabled = false;
        // [END_EXCLUDE]
      });
      // [END authstatelistener]

      // document.getElementById('quickstart-sign-in').addEventListener('click', toggleSignIn, false);
    }

    window.onload = function() {
      initApp();
    };

      // Create a Recaptcha verifier instance globally
      // Calls submitPhoneNumberAuth() when the captcha is verified
      window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier(
        "recaptcha-container",
        {
          size: "normal",
          callback: function(response) {
            submitPhoneNumberAuth();
          }
        }
      );

      // This function runs when the 'sign-in-button' is clicked
      // Takes the value from the 'phoneNumber' input and sends SMS to that phone number
      function submitPhoneNumberAuth() {
		var divId = document.getElementById("otp-div");
		var getOtpbutton = document.getElementById("hidebutton");
		var confirmButton = document.getElementById("submitOtp");
        var captchId = document.getElementById("recaptcha-container");
        var numberDiv = document.getElementById("number-div");
        var phoneNumber = document.getElementById("phoneNumber").value;
        var appVerifier = window.recaptchaVerifier;
            getOtpbutton.style.display = "none";
               captchId.style.display="block";



        firebase
          .auth()
          .signInWithPhoneNumber(phoneNumber, appVerifier)
          .then(function(confirmationResult) {
            window.confirmationResult = confirmationResult;
                        divId.style.display = "block";
                        captchId.style.display="none";
                        getOtpbutton.style.display = "none";
                        numberDiv.style.display="none";
                        confirmButton.style.display = "block";
                        console.log('confirm')
          })
          .catch(function(error) {
            console.log(error);
            if(error.message == 'Invalid format.'){
            document.getElementById("errorMesagea").innerHTML = error.message+'/Check your mobile number and click on Get OTP';
                        getOtpbutton.style.display = "block";
                          captchId.style.display="none";
                      }


          });
      }

      // This function runs when the 'confirm-code' button is clicked
      // Takes the value from the 'code' input and submits the code to verify the phone number
      // Return a user object if the authentication was successful, and auth is complete
      function submitPhoneNumberAuthCode() {
        var code = document.getElementById("code").value;
 
        confirmationResult
          .confirm(code)
          .then(function(result) {
            var user = result.user;
            console.log(user);
            console.log(user.phoneNumber);
       window.open("<?php echo base_url()?>Users/phoneAuth?phoneNumber="+user.phoneNumber+'&&creationTime='+user.metadata["creationTime"]+'&&lastSignInTime='+user.metadata["lastSignInTime"], '_self');
          })
          .catch(function(error) {
            //console.log(error);
            //console.log(error.message);
            //document.getElementById("errorMesage").value = error["message"];
                        document.getElementById("errorMesage").innerHTML = 'Invalid OTP';

          });
      }

      //This function runs everytime the auth state changes. Use to verify if the user is logged in
      firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
          console.log("USER LOGGED IN");
        } else {
          // No user is signed in.
          console.log("USER NOT LOGGED IN");
        }
      });
    </script>



<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/custom.js"></script>
<style type="text/css">

@media (max-width: 1200px) {
  #recaptcha-container > div > div {
    transform: scale(0.9);
    -webkit-transform: scale(0.9);
    transform-origin: 0 0;
    -webkit-transform-origin: 0 0
  }
} 
</style>
</body>  