<?php
/**
 * this file provides HTML templates to create dynamic sites
 * and make it easier to create new sites later on.
 */
// function to create the HTML Head element
/**
 * function createHTMLHead -> creates an Head element with dinamic title and metadesc
 *                         additionally it gives to the pages the specific css style sheet, based on the pagetitle.
 * 
 * @param $pageTitle string -> awaits the htmlpage Title, wich will be seen on the Browser
 * @param $metaDesc string -> awaits some description for SEO adjustments
 * 
 * The Function will return the head Element
 */
function createHTMLHead($pageTitle,$metaDesc){
    $headHTML = '
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="'.$metaDesc.'">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Do+Hyeon&family=Fanwood+Text:ital@0;1&family=Holtwood+One+SC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/font_and_color.css">
    <link rel="stylesheet" href="css/main.css">';
    // if the page has additional css, adding it to the head
    switch ($pageTitle) {
        case 'register or login':
            $headHTML.= '<link rel="stylesheet" href="css/reg_login.css">';
            $headHTML .='<title>'.$pageTitle.'</title>';
            break;
        
        case 'admintool':
            $headHTML.= '<link rel="stylesheet" href="css/admintool.css">';
            $headHTML .='<title>'.$pageTitle.'</title>';
            break;
        
        case 'about':
            $headHTML.= '<link rel="stylesheet" href="css/about.css">';
            $headHTML .='<title>'.$pageTitle.'</title>';
            break;
        case 'your profile':
            $headHTML.= '<link rel="stylesheet" href="css/profile.css">';
            $headHTML .='<title>'.$pageTitle.'</title>';
            break;
        
        default: // if not, just include the title
        $headHTML .='<title>'.$pageTitle.'</title>';
            break;
    }
    $headHTML.= '<script src="js/code.js" defer></script>';
    return $headHTML;
}

// function to create the navigation
// array for navigation elements with link
$mainnav = array(
    array('link' => 'index.php','text' => 'Home'),
    array('link' => 'about.php','text' => 'About'),
    array('link' => 'game.php','text' => 'Game'),
    array('link' => 'tutorial.php','text' => 'Tutorial'),
    array('link' => 'register_login.php','text' => 'Login')
);
/**
 * Function createNav -> creates a Navigation based on generated Array with Nav links and titles.
 * 
 * @param $navArray assoc array -> awaits an associative Array
 *                                 key 'link' for the link to the page
 *                                 key 'text' for the title in the Nav List
 * 
 * The Function will return the Navigation
 */
function createNav($navArray){
    $nav = '<nav>
            <ul>';
    foreach ($navArray as $navitem) {
        $nav .=   '<li><a href="'.$navitem['link'].'">'.$navitem['text'].'</a></li>';
    };
    $nav .='</ul>
            </nav>';
    return $nav;
}
// function to create title in Header
/**
 * Function createTitle -> creates a Header element with the Title of the page 
 * 
 * The function will return the title
 */
function createTitle(){
    $title = '
    <!-- title of the page -->
    <header class="title">
        <h1 class="sitetitle">lost in the woods</h1>
    </header> 
    ';
    return $title;
}
//  function to create Footer
/**
 * Function createFooter -> creates a footer with links to social media and other links
 *                          has additionally an to Top button
 * 
 * The function will return the footer
 */
function createFooter(){
    $footer = '
        <footer>
        <a class="toSmw" href="">Privacy Policy</a>
        <a class="toSmw" href="https://www.facebook.com/">Facebook</a>
        <a class="toSmw" href="https://www.youtube.com/">YouTube</a>
        <button class="toTopbtn"><i class="fas fa-arrow-circle-up"></i></button>
        </footer>';
        return $footer;
}


    
 


 
    
