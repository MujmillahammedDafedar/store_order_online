<?php
session_start();
if(isset($_POST['type']) && $_POST['type'] == 'accountkit' && isset($_POST['mobilenumber']) && isset($_SESSION['authdata']) && ($_SESSION['authdata'] == $_POST['mobilenumber'])){
    $_SESSION['mobilenumber'] = $_POST['mobilenumber'];
    $_SESSION['name'] = $_POST['name'];
}

if(isset($_POST['type']) && $_POST['type'] == 'facebook' && isset($_POST['first_name'])){
    $_SESSION['first_name'] = $_POST['first_name'];
    $_SESSION['last_name'] = $_POST['last_name'];
    $_SESSION['name'] = $_POST['first_name'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['id'] = $_POST['id'];
}


if(isset($_POST['type']) && $_POST['type'] == 'google' && isset($_POST['id'])){
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['image_url'] = $_POST['image_url'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['id'] = $_POST['id'];
}

