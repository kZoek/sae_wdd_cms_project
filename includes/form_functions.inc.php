<?php 
/**
 * this file is for self created functions, wich made mostly for form validation and sanitation
 * some functions are connected to the DB, to compare its data with user Inputs
*/
include_once('config.inc.php'); 
/**
 * function validateInputs -> trims, filters ans strips tags from the input
 * 
 * @param $str string -> set the input, wich should be validated
 * 
 * The function will return the processed word
 */
function validateInputs($str){ // $string awaits an userinput
    $str = trim($str);
    $str = filter_var($str, FILTER_SANITIZE_STRING);
    $str = strip_tags($str);
    $str = htmlspecialchars($str);
    return $str;
}
// check if the input is empty
/**
 * function check -> check if the user input is empty or not
 *                   if not empty, check if the input is between
 *                   desired min and max figures
 * 
 * @param $input string -> set the input, wich should be checked
 * @param $inputName string -> set the Name of the Inputfield, wich one you are checking
 *                          it will return an Errorfield on the desired field
 * @param $minFig int -> set the minimum of how many figures the input should have
 * @param $maxFig int -> set the maximum of how many figures the input should have
 * 
 * the Function will return a string, if the input is:
 * empty - please insert ...
 * has less figures than minFig - the input has to be minimum ...
 * has more figures than maxFig - the input has to be maximum ...
 */
function check($input,$inputName,$minFig,$maxFig){
    $strLenght = strlen($input);
    if(empty($input)){
        return  "Please insert $inputName";
    }elseif($strLenght < $minFig){
        return  "The input has to be minimum $minFig figures long.";
     }elseif($strLenght > $maxFig){
        return "The input has to be maximum $maxFig figures long.";
     };

}
// check if the inputs already in database
/**
 * function comparewithDB -> compares the given Input with the DB Content.
 *                           Table name, columns and values wich will be checked, are given.
 *                    
 * @param $conn string -> set the connection to the DB
 * @param $compUsername string -> set the username wich should be compared with the DB
 * @param $compEmail string -> set the email wich should be compared with the DB
 * @param $compPass string -> set the password wich should be compared with the DB
 * 
 * The function will return a string, if it has a match in the DB.
 */
function comparewithDB($conn,$compUsername,$compEmail,$compPass){
    $DBquery = " SELECT * FROM `users`
     WHERE 
     `username` = ? AND
     `email` = ? AND
     `password` = ? ";
    $statement = mysqli_prepare($conn,$DBquery);
    mysqli_stmt_bind_param($statement,'sss',$compUsername,$compEmail,$compPass);
    mysqli_stmt_execute($statement);
    $resultat = mysqli_stmt_get_result($statement);
    if(mysqli_num_rows($resultat) > 0){
            return "Username, Email oder Password already exist, please enter something else.";
    }
}
/**
 * function compareLogin -> compares Login Inputs with DB
 *                          If it matches, the user will transferred to the Profile
 * 
 * @param $conn string -> set the connection to the DB
 * @param $compUsername string -> set the username wich should be compared with the DB
 * @param $compPass string -> set the password wich should be compared with the DB
 * 
 */
function compareLogin($conn,$compUsername,$compPass){
    $DBquery = " SELECT * FROM `users`
     WHERE 
     `username` = ? ";
    $statement = mysqli_prepare($conn,$DBquery);
    mysqli_stmt_bind_param($statement,'s',$compUsername);
    mysqli_stmt_execute($statement);
    $resultat = mysqli_stmt_get_result($statement);
    if(mysqli_num_rows($resultat) > 0){
        $userdata = mysqli_fetch_assoc($resultat);
        $userPass = $userdata['password'];
        $passCheck = password_verify($compPass,$userPass);
        if($passCheck == true){
        $userId = $userdata['id'];
        return $userId;   
        }
    }
}


?>