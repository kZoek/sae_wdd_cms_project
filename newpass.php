<?php 
$pass = "cheese";
$firstStep =' 
<h3>please enter your password to proceed</h3>
<form>
    <label for="Pass">old password</label>
    <input type="password" name="Pass" id="Pass"> <span><i id="togglePs" class="fas fa-eye"></i></span>
    <input class="submitButton" type="submit" name="next" value="change password">
</form> '
;
$something= " banana";


if( isset($_GET['next']) ){
    if($_GET['Pass'] == $pass){
        $nextStep = 
       ' <h3>You can now enter a new password</h3>
        <form>
            <label for="newPass">new password</label>
            <input type="password" name="newPass" id="newPass"> <span><i id="togglePs" class="fas fa-eye"></i></span>
            <input class="submitButton" type="submit" name="updatePass" value="proceed">
        </form> 
        ';
        $pass = $_GET['newPass'];
    }
}

?>




<div class="card">
    <?php 
    if(isset($nextStep)){
        echo $nextStep;
    }else{
        echo $firstStep;
    }   
    // echo $firstStep;
    // echo $something;
    ?>
    </div>