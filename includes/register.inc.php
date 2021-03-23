<?php
/**
 * this file is for the Register section on the register_login site responsible.
 * all self created functions are from the form_functions.inc.php file, bc those functions can be used in other forms too.
 */
// include files
include_once('config.inc.php');
include_once('form_functions.inc.php');

//declare variables 
$firstName = ""; 
$lastName = "";
$userName = "";
$email ="";

// // after submitting the register button:
if( isset($_POST['register']) ){
    // set a variable for all the inputs
    // and sanitize the inputs
    $firstName = validateInputs($_POST['regFirstname']); 
    $lastName = validateInputs( $_POST['regLastname']);
    $userName = validateInputs($_POST['regUsername']);
    $email = validateInputs($_POST['regEmail']);
    $password = validateInputs($_POST['regPass']);
    if(isset($_POST['regagb'])){
      $agb = $_POST['regagb'];  
    }
    
    //  var_dump($firstName);
    // check if the user filled everything out
    // firstname
    $firstname_error = check($firstName,"first Name",1,50);

    // lastname
    $lastname_error = check($lastName,"last Name",1,50);
   
    // username
    $username_error = check($userName,"Username",3,15);
  
    // emailadress
    $email_error = check($email,"Email Address",2,60);
  
    // password
   $password_error = check($password,"Password",8,20);
    // agb check
    if(empty($agb)){
        $agb_error= "Please accept the terms";
    }else{
        // check if the inputs already exists in database
        $db_errorMess = comparewithDB($conn,$userName,$email,$password);

        // hash password for security reasons

        $hashpass = password_hash($password, PASSWORD_DEFAULT);
        // if everything ok add inputs to the database
        if(!$db_errorMess && !$password_error && !$firstname_error
            && !$lastname_error && !$username_error && !$email_error){
            echo "going to save data";
            $insertQuery = "INSERT INTO `users`
            (`username`, `first_name`, `last_name`, `email`, `password`) 
            VALUES 
            (?,?,?,?,?)";
            $insertStmt = mysqli_prepare($conn,$insertQuery);
            // if(! $insertStmt){
            //     die('mysqli error: '.mysqli_error($conn));
            // }
            mysqli_stmt_bind_param($insertStmt,'sssss',$userName,$firstName,$lastName,$email,$hashpass);
            mysqli_stmt_execute($insertStmt);
            // var_dump($insertStmt);
            $insertResults = mysqli_stmt_affected_rows($insertStmt);
            // var_dump($insertResults);
            if( $insertResults > 0){
                $reg_saved = 'Registry was successful, you can now sign in';
                }
        }   
    }
   
    
        // the user will be asked, to login to proceed
}


?>