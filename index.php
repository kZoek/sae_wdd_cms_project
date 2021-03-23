<?php 
require_once("views/html_templates.php");
require_once("views/show_content.inc.php");
include_once("includes/profile_functions.inc.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?=createHTMLHead('home','landing page');?>
</head>
<body>
  <!-- nav -->
  <?=createNav($mainnav);?>
  <!-- title -->
  <?=createTitle();?>
  <!-- about section -->
  <section class="about">
    <?=$home?>
  </section>

  <!-- newsfeed section -->
  <section class="news">
    <h2>updates about the game and us</h2>
      <?=$blogEntry?>
    </section>
    <!-- footer -->
    <?=createFooter();?>

</body>