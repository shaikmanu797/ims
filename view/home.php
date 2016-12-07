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
    echo    "<b>Project Done By:</b><br/>
             <ol>
                <li>Mansoor Baba Shaik</li><br/>
                <li>Tarun H. Jeswani</li><br/>
                <li>Gaurav A. Samant</li><br/>
             </ol>";
    echo '</div>';
    include("footer.php");

}
else{
    session_unset();
    session_destroy();
    header("Location: ../");
}

?>



