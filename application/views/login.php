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
<a href="#" class="btn btn-m mt-2 mb-4 btn-full bg-green1-dark text-uppercase font-900">Login</a>
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

<?php
//session_start();

// verifying POST data and adding the values to session variables
if(isset($_POST["code"])){
  $_SESSION["code"] = $_POST["code"];
  $_SESSION["csrf_nonce"] = $_POST["csrf_nonce"];
  $ch = curl_init();
  // Set url elements
  $fb_app_id = '552558245447793';
  $ak_secret = 'a742192989c88afbd66d61b180ba6fb8';
  $token = 'AA|'.$fb_app_id.'|'.$ak_secret;
  // Get access token
  $url = 'https://graph.accountkit.com/v1.0/access_token?grant_type=authorization_code&code='.$_POST["code"].'&access_token='.$token;
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_URL,$url);
  $result=curl_exec($ch);
  $info = json_decode($result);
  // Get account information
  $url = 'https://graph.accountkit.com/v1.0/me/?access_token='.$info->access_token;
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_URL,$url);
  $result=curl_exec($ch);
  curl_close($ch);
  $final = json_decode($result);

  $_SESSION['id'] = $final->id;

  if(isset($final->email))
  {
    $_SESSION['email'] = $final->email->address;
  }
  else
  {
    $_SESSION['country_code'] = $final->phone->country_prefix;
    $_SESSION['phone'] = $final->phone->national_number;
  }
}

?>


<html>
<head>
  <title>Login with Account Kit</title>
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="ak-icon.png">
  <link rel="stylesheet" href="css.css">
  <!--Hotlinked Account Kit SDK-->
  <script src="https://sdk.accountkit.com/en_EN/sdk.js"></script>
</head>
<body>
  <style type="text/css">
    body{
  font-family: helvetica;
}
.ac{
  text-align: center;
}
.buttons{
  max-width: 300px;
  margin: auto;
}
.buttons button{
  width: 100%;
  border-style: none;
  background-color: #4E86FF;
  color: #FFF;
  padding: 10px;
  margin: 5px 0;
}
  </style>
<?php
// verifying if the session exists
?>

  <button onclick="phone_btn_onclick();">Login with SMS</button>

<script>
  // initialize Account Kit with CSRF protection
  AccountKit_OnInteractive = function(){
    AccountKit.init(
      {
        appId:552558245447793,         
        state:"Karnataka", 
        version:"v1.0"
      }
      //If your Account Kit configuration requires app_secret, you have to include ir above
    );
  };
  // login callback
  function loginCallback(response) {
    console.log(response);
    if (response.status === "PARTIALLY_AUTHENTICATED") {
      document.getElementById("code").value = response.code;
      document.getElementById("csrf_nonce").value = response.state;
      document.getElementById("my_form").submit();
    }
    else if (response.status === "NOT_AUTHENTICATED") {
      // handle authentication failure
      console.log("Authentication failure");
    }
    else if (response.status === "BAD_PARAMS") {
      // handle bad parameters
      console.log("Bad parameters");
    }
  }
  // phone form submission handler
  function phone_btn_onclick() {
    // you can add countryCode and phoneNumber to set values
    AccountKit.login('PHONE', {}, // will use default values if this is not specified
      loginCallback);
  }
  // email form submission handler
  function email_btn_onclick() {  
    // you can add emailAddress to set value
    AccountKit.login('EMAIL', {}, loginCallback);
  }
  // destroying session
  function logout() {
        document.location = 'logout.php';
  }
</script>
</html>