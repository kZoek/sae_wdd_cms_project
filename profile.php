<?php 
require_once("views/html_templates.php");
include_once("includes/config.inc.php");
include_once("includes/profile_functions.inc.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?=createHTMLHead('your profile','view of your own profile');?>
</head>
<body>
    <!-- nav -->
    <?=createNav($mainnav);?>
    <!-- title -->
    <?=createTitle();?>

    <!-- profil -->
    <h2 class="smTitle">Welcome back Player!</h2>
    <section class="about">
        <!-- infos about the player -->
        <div class="profileinfos">
            <!-- container for personal infos -->
            <div class="card">
                <h3>personal informations</h3>
                <span class="card-title"> first name </span>
                <p><?=$userData['first_name']?></p> 
                <span class="card-title"> last name </span>
                <p><?=$userData['last_name']?></p>
            </div>
            <!-- container for ingame infos -->
            <div class="card">
                <h3>ingame informations</h3>
                <span class="card-title"> username </span>
                <p><?=$userData['username']?></p>
            </div>
            <!-- container for contact infos -->
            <div class="card">       
                <h3>contact informations</h3>
                <span class="card-title"> Email address </span>
                <p><?=$userData['email']?></p>
            </div>
            <div class="card">       
                <?php if(isset($admintoolBtn)){ ?>
                <h3>Admintool</h3>
                <span class="card-title">click on the link below to edit content</span>
                <p><?=$admintoolBtn?></p>
                </div>
                <?php } ?>
        </div>

    </section>

    <?=createFooter();?>

</body>
</html>