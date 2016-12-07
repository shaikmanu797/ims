<?php
/**
 * Created by PhpStorm.
 * User: mshaik_tmp
 * Date: 12/6/2016
 * Time: 3:38 PM
 */

if(isset($_POST) && !Empty($_POST) && $_POST['Submit'] == 'Select'){
    $deleteID = $_POST["deletetype"];
    switch($deleteID){
        case 1: require_once('deleteCategory.php');
                break;
        case 2: require_once('deleteProduct.php');
                break;
        case 3: require_once('deleteLocation.php');
                break;
    }
}
else{
    echo "Please select one value from above drop-down";
}
