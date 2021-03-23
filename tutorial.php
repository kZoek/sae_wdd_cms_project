<?php 
require_once("includes/config.inc.php");
require_once("views/show_content.inc.php");
require_once("views/html_templates.php");
include_once("includes/profile_functions.inc.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?=createHTMLHead('tutorial','explanation about the gameplay and userinterface');?>
</head>
<body>
  <!-- nav -->
  <?=createNav($mainnav);?>
  <!-- title -->
  <?=createTitle();?>

  <!-- tutorial section -->
  <h2 class="smTitle">Tutorial how to play</h2>
  <?=$tutorial?>
  <?=createFooter();?>

</body>
</html>