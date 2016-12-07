<?php
/**
 * Created by PhpStorm.
 * User: mshaik_tmp
 * Date: 11/28/2016
 * Time: 11:05 AM
 */

session_start();
if(isset($_SESSION) && !Empty($_SESSION['logger'])){
    include("header.php");
    echo '<div class="main-header">
            <b>Home</b>
          </div>
          <div class="main-content">';
    echo    '<center><img src="../images/inventory.jpg" width="70%" height="40%" alt="Welcome to IMS" /></center>';
    echo '</div>';
    include("footer.php");

}
else{
    session_unset();
    session_destroy();
    header("Location: ../");
}

?>



