<?php 
/**
 * this file is primary for the Connection with DB responsible. 
 * There are some self created functions, to fetch data from DB mostly freely,
 * so it can be used multiply times, for different reasons.
 */
// define DB connection infos
define("DBSERVER","localhost");
define("DBUSER", "root");
define("DBPASSWORT", "root");
define("DBNAME","lost_in_the_woods");
// create the connection to the DB
$conn = mysqli_connect(DBSERVER,DBUSER,DBPASSWORT,DBNAME) OR die('DB Verbindung hat nicht geklappt: '.mysqli_connect_error());

// DB query functions
/**
 * function db_fetch_UserData -> get one row from the DB with the selected id for the profile
 * 
 * @param $id int -> awaits an ID to select specific row from DB
 * 
 * the Function will return all fetched Data
 */
function db_fetch_userData($id){
    global $conn;
    $query = "SELECT * FROM `users` WHERE id=? ";
    $stmt = mysqli_prepare($conn,$query);
    mysqli_stmt_bind_param($stmt,'s',$id);
    mysqli_stmt_execute($stmt);
    $resultat = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_assoc($resultat);
    return $data;
}
/**
 * function db_fetch_contents -> get all Contents from DB with the selected category
 * 
 * @param $cat string -> awaits a category to select contenct from DB
 * 
 * the Function will return all fetched Data
 */
function db_fetch_contents($cat){
    global $conn;
    $query = "SELECT * FROM `contents` WHERE site_category = ?";
    $stmt = mysqli_prepare($conn,$query);
    mysqli_stmt_bind_param($stmt,'s',$cat);
    mysqli_stmt_execute($stmt);
    $resultat = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_all($resultat,MYSQLI_ASSOC);
    return $data;
}
/**
 * function db_fetch_Entries -> get all entries from DB
 * 
 * the Function will return all fetched Data
 */
function db_fetch_Entries(){
    global $conn;
    $query = " SELECT * FROM `blog_entries` ORDER BY post_date desc";
    $stmt = mysqli_prepare($conn,$query);
    mysqli_stmt_execute($stmt);
    $resultat = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_all($resultat, MYSQLI_ASSOC);
    return $data;
}

?>