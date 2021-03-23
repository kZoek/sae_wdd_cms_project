<?php
/**
 * this file is for the functions on the admintool site responsible.
 * some self created functions are used from the form_functions.inc.php for validation 
 * and some self created functions are used from the config.inc.php for working with the DB data
 */
include_once("config.inc.php");
include_once("form_functions.inc.php");

// create the edit container 
$editContent = '<div class="editcontainer">';


//save changes in DB if content was edited
if( isset($_POST['saveChanges']) ){
    $title=$_POST['editTitle'];
    $text=$_POST['editText'];
   
    // echo "Yay";
    // echo $_POST['hiddenId'];
    // sanitize Inputs
    $title = validateInputs($_POST['editTitle']);
    $content = validateInputs($_POST['editText']);
    $id = $_POST['hiddenId'];

   // if both inputs are filled, update DB
    if(!empty($title) && !empty($content) ){
        $updateQuery = " UPDATE `contents` SET `title`= ?, `content`=? WHERE `id`=? ";
        $updateStmt = mysqli_prepare($conn,$updateQuery);
        mysqli_stmt_bind_param($updateStmt,'sss',$title,$content,$id);
        mysqli_stmt_execute($updateStmt);
        // print_r($updateStmt);
        $updateResultat = mysqli_stmt_affected_rows($updateStmt);
    //    var_dump($updateResultat);
        if($updateResultat>0){
            $updateStatus = "changes have been saved";
        }else{
            $updateStatus = "something went wrong,please try again";
        }
    }
}

// delete entries from DB
if( isset($_POST['deleteEntry']) ){
    // select the id from the option value
    $entryId = $_POST['entrytoDelete'];
    // if the value is higher than null, select the entry from DB and delete it
    if($entryId > 0){
        echo $entryId;
        //create query to delete
        $deleteQuery = " DELETE FROM `blog_entries` WHERE id = ?";
        $deleteStmt = mysqli_prepare($conn,$deleteQuery);
        mysqli_stmt_bind_param($deleteStmt,'s',$entryId);
        mysqli_stmt_execute($deleteStmt);
        $deleteRes = mysqli_stmt_affected_rows($deleteStmt);
        if($deleteRes > 0){
            $updateStatus = "Entry was deleted";
        }else{
            $updateStatus = "Something went wrong.";
        }
    }
}
// Add new Entries to the DB
if( isset($_POST['saveEntry']) ){
    $entrytitle = validateInputs($_POST['addEntry']);
    $entryText = validateInputs($_POST['addEntryText']);

    // if both inputs are filled out, save entry in DB
    if(!empty($entrytitle) && !empty($entryText) ){
        $insertQuery = "INSERT INTO `blog_entries` (`entry_title`,`entry_content` ) VALUES (?,?)";
        $insertStmt = mysqli_prepare($conn,$insertQuery);
        mysqli_stmt_bind_param($insertStmt,'ss',$entrytitle,$entryText);
        mysqli_stmt_execute($insertStmt);
        $insertRes = mysqli_stmt_affected_rows($insertStmt);
        if($insertRes > 0){
            $updateStatus = "Entry was succesfully saved";
        }else{
            $updateStatus = "Something went wrong, please try again.";
        }
    }

}
//get the Entries from DB
$entries = db_fetch_Entries();

// if the category is set, show the editing options
if( isset($_GET['cat']) ){
    // save Category from URL in Variable
    $category=$_GET['cat'];
    // get Contents from DB
    $contents = db_fetch_contents($category);
    // loop trough the Content, to get title, text and id
    foreach ($contents as $content) {
        // switch Template for the selected site category
        switch ($_GET['cat']) {
            case 'home':
                $editContent.= editContent($content['title'],$content['content'],$content['id']);
                $editContent.= editEntries($entries);
                break;
            case 'about':
                $editContent.= editContent($content['title'],$content['content'],$content['id']);
                break;
            case 'tutorial':
                $editContent.= editContent($content['title'],$content['content'],$content['id']);
                break;
            default:
            $editContent .= startContent();
                break;
            }
    }


}else{
    // for the first time, it will show the "start" site of the Admintool
 $editContent .= startContent();   
}
$editContent .= '</div>';


?>
