<?php
// start session
session_start();
// end session
if( isset($_SESSION['id']) ){
    $mainnav[4]['text'] = 'Login';
    $mainnav[4]['link'] = 'register_login.php';
    array_pop($mainnav);
    session_destroy();
    header("location: ../register_login.php");
}
?>