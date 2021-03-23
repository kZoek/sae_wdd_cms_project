<?php
/**
 * this file provides created templates for the admintool, so it can be dynamic 
 */

// functions to create editors for content editing
/**
 *  function editEntries -> creates a template,wich will be used to create and delete Entries from the Newsfeed
 * 
 * @param $data array -> awaits an associative Array from Database Data, to create more options to the select-tag
 *                      Title and Id will be used from the Array.
 * 
 * The function returns the Template witt the stated Data
 */
    function editEntries($data){
        $entries ='    
        <!-- second section on the page, with edit possibilities  -->
        <div class="card">
            <h3>add new Entry to the Blog</h3>
            <form  method="POST">
                <label class="card-title" for="addEntry">New Entry Name: </label>
                <input type="text" name="addEntry" id="addEntry" placeholder=".. enter new title ..">
                <label class="card-title" for="addEntryText">Enter text: </label>
                <textarea name="addEntryText" id="addEntryText" cols="30" rows="10"></textarea>
                <input class="submitButton" type="submit" name="saveEntry" value="save new entry">
            </form>
        </div>

        <!-- third section on the page, with edit possibilities  -->
        <div class="card">       
            <h3>delete old Entry from Blog</h3>
            <span class="card-title"> select Entry: </span>
            <form  method="POST">
            <select name="entrytoDelete" id="enrtyDel">
                <option value="0"> -- choose an entry -- </option>';
        foreach ($data as $row) {
          $entries.='<option value="'.$row['id'].'">'.$row['entry_title'].'</option>';   
        }
        $entries.='</select>
            <input class="submitButton" type="submit" name="deleteEntry" value="delete Entry">
            </form>  
        </div>';
        return $entries;
    }

/**
 *  function editContent -> creates a template, wich will be used to edit Content in Admintool.
 * 
 * @param $contentTitle string -> it will fill the Title input automatically. Data got from DB
 * @param $contentText string -> it will fill the Content input automatically. Data got from DB
 * @param $contentId Int -> gives the ID for the Row, to determinate wich row should be affected. Data got from DB
 * 
 * The function returns the Template with the stated Data
 */
    function editContent($contentTitle,$contentText,$contentId){
        $aboutContent = '
        <div class="card">
            <form method="POST">
                <label class="card-title" for="editTitle">Title: </label>
                <input type="text" name="editTitle" id="editTitle" value="'.$contentTitle.'">
                <label class="card-title" for="editText">Edit Content: </label>
                <textarea name="editText" id="editText" cols="30" rows="10">'.$contentText.'</textarea>
                <input type="hidden" name="hiddenId" value="'.$contentId.'">
                <input class="submitButton" type="submit" name="saveChanges" value="save Changes">
            </form>
        </div>
        ';
        return $aboutContent;
    }
/**
 *  function startContent -> creates a Template, wich will be shown first on the Admintool
 * 
 * The function return the Template
 */
    function startContent(){
        $aboutContent = '
        <div class="card">
           <h3>Dashboard to edit Content</h3>
           <p> On this page you can edit some content on the page. Please select one site from the menu.</p>
        </div>
        ';
        return $aboutContent;
        
    }


?>

        
