<?php
/**
 * this file is for the functions on the profile responsible
 * After the user is logged in, the session will get to all pages,
 * so this file have to be included on other pages too.
 */
// start session
session_start();
// check if the session connection trough ID okay
if($_SESSION['status'] == true){

    //modify the navigation array after login
    $mainnav[4]['text'] = 'Profile';
    $mainnav[4]['link'] = 'profile.php';
    $mainnav[]=array('link' => 'includes/logout.php','text' => 'Logout');

    //get user id from session to select the right infos from DB
    $loginId = $_SESSION['id'];
    // echo $_SESSION['id'];
    // var_dump($_SESSION);

    // get data from database to show infos on profile
    $userData=db_fetch_userData($loginId);
    $usercat = $userData['user_category'];

    // if the user is an admin, give additional link to the admintool
    if($usercat == "admin"){
        $admintoolBtn = '<a href="admintool.php">admintool</a>';
        // echo 'something';
    }
    // var_dump($userData);
}

?>