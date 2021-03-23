<?php 
/**
 * this file is responsible for the edible content on all sites.
 */
require_once("includes/config.inc.php");

// get Content from DB
// for home site
$Homecontents = db_fetch_contents("home");

$home="";
foreach ($Homecontents as $content) {
    $home .='<h2>'.$content['title'].'</h2>';
    $home .='<p>'.nl2br($content['content']).'</p>';
}
// on home the newsfeed content
$blogEntries = db_fetch_Entries();

$blogEntry ="";
foreach ($blogEntries as $entry) {
    $blogEntry .='<article class="newsEntry">
                <h3>'.$entry['entry_title'].'</h3>
                <p>'.nl2br($entry['entry_content']).'</p>
                <span class="timestamp">posted: '.$entry['post_date'].'</span>
                </article>';
}


// for about site
$Aboutcontents = db_fetch_contents("about");
$about="";
foreach ($Aboutcontents as $content) {
    $about .= '<section class="about">';
    $about .='<h2>'.$content['title'].'</h2>';
    $about .='<p>'.nl2br($content['content']).'</p>';
    $about .= '</section>';
}


// for tutorial site
$Tutcontents = db_fetch_contents("tutorial");
// print_r($contents);
$tutorial="";
foreach ($Tutcontents as $content) {
    $tutorial .= '<section class="tutorial">';
    $tutorial .= '<h3>'.$content['title'].'</h3>';
    $tutorial .= '<p>'.nl2br($content['content']).'</p>';
    $tutorial .= '</section>';
}

?>