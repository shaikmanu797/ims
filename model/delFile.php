<?php
/*Created by 
Mansoor Baba Shaik
*/

if(isset($_GET) && !Empty($_GET['file'])){
    session_start();
    $target="uploads/".trim($_GET['file']);
    unlink($target);
    unset($_SESSION['files']);
    header('Location: upload');
}

?>