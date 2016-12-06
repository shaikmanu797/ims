<?php
/**
 * Created by PhpStorm.
 * User: mshaik_tmp
 * Date: 12/6/2016
 * Time: 2:25 PM
 */

if(isset($_GET) && !Empty($_GET['id']) && !Empty($_GET['for'])){
    require('programs/functions.php');
    $id = $_GET['id'];
    $for = $_GET['for'];
    if($for == "1"){
        $old = getCategory($id)['catName'];
        echo '<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
              <link href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" rel="Stylesheet" />
              <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" ></script>
              <script type="text/javascript" src="../js/autosuggest.js"></script>
              <br/>
              <form action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'?tab=1" method="post" autocomplete="off">'.
              '<input type="hidden" name="id" value="'.$id.'"/>'.
              '<b>Old Name: &nbsp;</b>'. $old.'<input type="hidden" name="oldcatName" value="'.$old.'"/>'.
              '<br/><br/>'.
              '<b>New Name: &nbsp;</b>'.'<input type="text" name="newcatName" id="catId" size="50" maxlength="150" onkeyup="category();" required />'.
              '<br/><br/>'.
              '<input type="submit" name="Submit" value="Update" />'.
              '</form>';
    }
}
elseif(isset($_POST) && !Empty($_POST) &&($_POST['Submit'] == "Update")){
    if(!Empty($_GET)){
        require('programs/functions.php');
        $tab = $_GET['tab'];
        switch($tab){
            case 1: echo updateCategory($_POST['id'], $_POST['oldcatName'],$_POST['newcatName']);
                    break;
        }

    }
}
else{
    die("Please go back or refresh page!!");
}