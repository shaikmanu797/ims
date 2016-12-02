<?php
/*Created by 
Mansoor Baba Shaik
*/

if(isset($_POST) && !Empty($_POST)){
    $form = $_POST['Submit'];
    $postedContent = $_POST;
    require_once("functions.php");
    switch ($form){
        case "Add Category": echo insertCategory($postedContent);
                             break;
        case "Add Product": echo "prod";
                            break;
        case "Add Location": echo insertLocation($postedContent);
                             break;
    }
}
else{
    die('Please go back and re-submit the form');
}

?>