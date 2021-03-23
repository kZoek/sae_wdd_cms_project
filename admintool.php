<?php
require_once("includes/config.inc.php"); 
require_once("views/html_templates.php");
require_once("views/admintool_templates.php");
include_once("includes/admintool_functions.inc.php");  
include_once("includes/profile_functions.inc.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?=createHTMLHead('admintool','working bench for admin to edit content');?>
</head>
<body>
    <!-- nav -->
    <?=createNav($mainnav);?>

    <!-- title -->
    <?=createTitle();?>

    <!-- admintool -->

    <!-- list of edible content -->
   <aside class="settingsmenu">
        <ul>
            <li><a href="admintool.php?cat=home">edit home page</a></li>
            <li><a href="admintool.php?cat=about">edit about page</a></li>
            <li><a href="admintool.php?cat=tutorial">edit tutorial page</a></li>
        </ul>
    </aside>

    <!-- dashboard  -->
    <section class="admintool">
    <!-- overview what the admin selected -->
        <div class="overView">
            <h2>Welcome Admin</h2>
            <!-- popup after something was edited or not -->
            <h3 class="changeInfo"> 
                <?php if(isset($updateStatus)){
                echo $updateStatus;
                }?> 
            </h3>
            <!-- show the current site -->
            <?php if( isset($category)){
                echo  '<h3>'.$category.' Page</h3>';
            } ?>

            <!-- dynamic content what is currently displayed -->
            <section class="editContent">
                <?=$editContent?>
            </section>
        </div>
    </section>

    <!-- footer -->
    <?=createFooter();?>

    <!-- srcripts for CKeditor -->
    <script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'addEntryText' ); 
    </script>
</body>
</html>