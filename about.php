<?php 
require_once("views/html_templates.php");
require_once("views/show_content.inc.php");
include_once("includes/profile_functions.inc.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?=createHTMLHead('about','long explanation about the game and team');?>
</head>
<body>
    <!-- nav -->
    <?=createNav($mainnav);?>
    <!-- title -->
    <?=createTitle();?>

    <!-- about section, about the game and our goals-->
    <?=$about?>
    <section class="about">
        <h2>about the team</h2>
        <!-- about the team members -->
        <div class="team">
            <div class="teamMember">
                <img class="memberImg" src="https://as2.ftcdn.net/jpg/01/04/01/37/500_F_104013719_0RBp6tC9Q0ryP0bzgTqHGZWPLbmz2Cdt.jpg" alt="team member">
                <h4>teamplayer</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore esse quod reprehenderit.</p>
            </div>

            <div class="teamMember">
                <img class="memberImg" src="https://as2.ftcdn.net/jpg/01/04/01/37/500_F_104013719_0RBp6tC9Q0ryP0bzgTqHGZWPLbmz2Cdt.jpg" alt="team member">
                <h4>teamplayer</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore esse quod reprehenderit.</p>
            </div>  
        </div>
    </section>
    <!-- footer -->
    <?=createFooter();?>
</body>
</html>