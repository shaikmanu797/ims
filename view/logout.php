<?php
/**
 * Created by PhpStorm.
 * User: mshaik_tmp
 * Date: 11/28/2016
 * Time: 12:46 PM
 */
session_start();
if(isset($_SESSION) && !Empty($_SESSION['logger'])){
    session_unset();
    session_destroy();
    header("Location: ../");
}
else{
    header("Location: ../");
}

?>