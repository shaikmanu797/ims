<?php
/*Created by 
Mansoor Baba Shaik
*/

session_start();
if(isset($_SESSION) && !Empty($_SESSION['logger'])){
    if(isset($_GET) && !Empty($_GET)){
         require('programs/functions.php');
         $id = $_GET['id'];
         tableDescr($id);
    }
    else{
        die('Something went wrong! Please go back or refresh page!!');
    }
}
else{
    session_unset();
    session_destroy();
    header("Location: ../");
}
