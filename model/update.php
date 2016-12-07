<?php
/**
 * Created by PhpStorm.
 * User: mshaik_tmp
 * Date: 12/6/2016
 * Time: 2:25 PM
 */

if(isset($_GET) && !Empty($_GET['id']) && !Empty($_GET['for'])){
    require('programs/functions.php');
    echo     '<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
              <link href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" rel="Stylesheet" />
              <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" ></script>
              <script type="text/javascript" src="../js/autosuggest.js"></script>
              <script type="text/javascript" src="../js/val.js"></script>
              ';
    $id = $_GET['id'];
    $for = $_GET['for'];
    if($for == "1"){
        $old = getCategory($id)['catName'];
        echo '<br/>
              <form name="categoryForm" method="post" autocomplete="off"  onsubmit="validateUpdate(1);">'.
              '<input type="hidden" name="id" value="'.$id.'"/>'.
              '<b>Old Name: &nbsp;</b>'. $old.'<input type="hidden" name="oldcatName" value="'.$old.'"/>'.
              '<br/><br/>'.
              '<b>New Name: &nbsp;</b>'.'<input type="text" name="newcatName" id="catId" size="50" maxlength="150" onkeyup="category();" required />'.
              '<br/><br/>'.
              '<input type="submit" name="Submit" value="Update" />'.
              '</form>';
    }
    elseif($for == "2"){


    }
    elseif($for == "3"){
        $old = getLocation($id)['locName'];
        echo '<form name="locationForm" method="post" autocomplete="off" onsubmit="validateUpdate(3);">'.
             '<input type="hidden" name="id" value="'.$id.'"/>'.
             '<b>Old Name: &nbsp;</b>'. $old.'<input type="hidden" name="oldlocName" value="'.$old.'"/>'.
             '<br/><br/>'.
             '<b>New Name: &nbsp;</b>'.'<input type="text" name="newlocName" id="locId" size="50" maxlength="50" onkeyup="loc();" required />'.
             '<br/><br/>'.
             '<input type="submit" name="Submit" value="Update" />'.
             '</form>';
    }
    else{
        die("Something went wrong!! Please refresh the page!");
    }
}
elseif(isset($_POST) && !Empty($_POST) &&($_POST['Submit'] == "Update")){
    if(!Empty($_GET)){
        require('programs/functions.php');
        $tab = $_GET['tab'];
        switch($tab){
            case 1: echo updateCategory($_POST['id'], $_POST['oldcatName'],$_POST['newcatName']);
                    break;
            case 2: echo "2";
                    break;
            case 3: echo updateLocation($_POST['id'], $_POST['oldlocName'],$_POST['newlocName']);
                    break;
        }

    }
}
else{
    die("Please go back or refresh page!!");
}