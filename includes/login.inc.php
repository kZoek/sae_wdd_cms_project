<?php
/**
 * this file is for the login section on the register_login site.
 * all self created functions are included from the form_functions.inc.php
 */
// start session
session_start();
$_SESSION['status'] = false;

// include files
include_once("config.inc.php");
include_once("form_functions.inc.php");

// declare variables
$username = "";

// after submitting the login button:
if( isset($_POST['login']) ){
//validate and sanitize inputs
$username = validateInputs($_POST['username']);
$password = validateInputs($_POST['password']);

// check if the fields are filled out
// username
$loginuser_error = check($username,"Username",3,15);
// password
$loginpass_error = check($password,"Password",8,20);
//check the inputs with BD
$login_token = compareLogin($conn,$username,$password);
// var_dump($login_token);
// On success load profile with personal data 
    if($login_token > 0){
    // declare some session variables for connection
    //    echo"login succesful";
        $_SESSION['id'] = $login_token;
        $_SESSION['status'] = true;
        header("Location: profile.php");
    }else{
        $login_errorMess = "Username or password wrong, please try again.";
    }  
 
}
?>