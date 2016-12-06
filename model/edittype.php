<?php
/**
 * Created by PhpStorm.
 * User: mshaik_tmp
 * Date: 12/6/2016
 * Time: 2:02 PM
 */

if(isset($_POST) && !Empty($_POST) && $_POST['Submit'] == 'Edit'){
    $editID = $_POST["edittype"];
    switch($editID){
        case 1: require_once('editCategory.php');
                break;
        case 2: require_once('editProduct.php');
                break;
        case 3: require_once('editLocation.php');
                break;
    }
}
else{
    echo "Please select one value from above drop-down";
}

?>
