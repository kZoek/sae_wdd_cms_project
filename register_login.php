<?php 
require_once("views/html_templates.php");
require_once("includes/register.inc.php");
require_once("includes/login.inc.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?=createHTMLHead('register or login','field to register or to login');?>
</head>
<body>
  <!-- nav -->
  <?=createNav($mainnav);?>
  <h1 class="sitetitle">Welcome Adventurer</h1>
  <h3>to secure your journey through the woods please</h3>
  <!-- register container -->
    <div class="regContainer">
        <section>
            <h2>register</h2>
        <form class="register" method="POST">
            <!-- error message, if the inputs are already in DB -->
            <?php if(isset($db_errorMess) ) { ?>
              <p class="errorMessage"> <?=$db_errorMess?> </p>
            <?php  } ?>
            <?php if(isset($reg_saved) ) { ?>
              <p class="errorMessage"> <?=$reg_saved?> </p>
            <?php  } ?>
            <!-- firstname -->
            <label for="regFirstname">First Name</label>
            <input type="text" name="regFirstname" id="regFirstname" value="<?=$firstName?>">
            <!-- error message, if something with the input is wrong -->
             <?php if(isset($firstname_error) ) { ?>
              <p class="errorMessage"> <?=$firstname_error?> </p>
            <?php  } ?>
            
            <!-- last name -->
            <label for="regLastname">Last Name</label>
            <input type="text" name="regLastname" id="regLastname" value="<?=$lastName?>">
             <!-- error message, if something with the input is wrong -->
            <?php if(isset($lastname_error) ) { ?>
              <p class="errorMessage"> <?=$lastname_error?> </p>
            <?php  } ?>
            <!-- last name -->
            <label for="regUsername">Username</label>
            <input type="text" name="regUsername" id="regUsername" value="<?=$userName?>">
             <!-- error message, if something with the input is wrong -->
            <?php if(isset($username_error) ) { ?>
              <p class="errorMessage"> <?=$username_error?> </p>
            <?php  } ?>
            <!-- email -->
            <label for="regEmail">Email Address</label>
            <input type="email" name="regEmail" id="regEmail" value="<?=$email?>">
             <!-- error message, if something with the input is wrong -->
            <?php if(isset($email_error) ) { ?>
              <p class="errorMessage"> <?=$email_error?> </p>
            <?php  } ?>
            <!-- password -->
            <label for="regPass">Password</label>
            <input type="password" name="regPass" id="regPass"><span><i id="togglePs" class="fas fa-eye-slash"></i></span>
             <!-- error message, if something with the input is wrong -->
            <?php if(isset($password_error) ) { ?>
              <p class="errorMessage"> <?=$password_error?> </p>
            <?php  } ?>
            <!-- checkbox for agb -->
            <label for="agb">Accept Terms and Conditions</label>
            <input type="checkbox" name="regagb" id="agb">
             <!-- error message, if something with the input is wrong -->
            <?php if(isset($agb_error) ) { ?>
              <p class="errorMessage"> <?=$agb_error?> </p>
            <?php  } ?>
            <input class="submitButton" type="submit" name="register" value="REGISTER">
          </form>    
        </section>

        <h1 class="orH2">or</h1>

        <section>
          <h2>sign in</h2>
          <form class="login" method="POST">
          <?php if(isset($login_errorMess) ) { ?>
                <p class="errorMessage"> <?=$login_errorMess?> </p>
              <?php  } ?>
              <label for="username">Enter your Username</label>
              <input type="text" name="username" id="username">
              <!-- error message, if something with the input is wrong -->
              <?php if(isset($loginuser_error) ) { ?>
                <p class="errorMessage"> <?=$loginuser_error?> </p>
              <?php  } ?>
              <label for="password">Enter your Password</label>
              <input type="password" name="password" id="password">
              <!-- error message, if something with the input is wrong -->
              <?php if(isset($loginpass_error) ) { ?>
                <p class="errorMessage"> <?=$loginpass_error?> </p>
              <?php  } ?>
              <input class="submitButton" type="submit" name="login" value="SIGN IN">
          </form>   
        </section>
  </div>
<!-- footer -->
  <?=createFooter();?>
    
</body>
</html>