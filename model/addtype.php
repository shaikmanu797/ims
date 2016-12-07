<?php
/*Created by 
Mansoor Baba Shaik
*/
if(isset($_POST) && !Empty($_POST) && $_POST['Submit'] == 'Select'){
    $addID = $_POST["addtype"];
    switch($addID){
        case 1: require_once('addCategory.php');
                break;
        case 2: require_once('addProduct.php');
                break;
        case 3: require_once('addLocation.php');
                break;
    }
}
else{
    echo "Please select one value from above drop-down";
}

?>