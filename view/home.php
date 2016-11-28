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
            for($i=1; $i<=20; $i++){
                echo 'Yahoo we did it!'.$i.'<br />';
            }
    echo '</div>';
    include("footer.php");

}
else{
    session_unset();
    session_destroy();
    header("Location: ../");
}

?>



