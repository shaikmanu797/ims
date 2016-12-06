<?php
/**
 * Created by PhpStorm.
 * User: Mansoor Baba Shaik
 * Date: 12/6/2016
 * Time: 3:26 PM
 */

session_start();
if(isset($_SESSION) && !Empty($_SESSION['logger'])){
    include("header.php");
    echo '<div class="main-header">
            <b>Delete</b>
          </div>
          <div class="main-content">
            <script type="text/javascript" src="../js/iframeActs.js"></script>
            <form name="deletefrom" method="post" target="delete-iframe" action="../model/deletetype.php">
            <center>
            <select name="deletetype" required>
                <option value=""></option>
                <option value="1">Category</option>
                <option value="2">Product</option>
                <option value="3">Location</option>
            </select>&nbsp;
            <input type="submit" name="Submit" value="Delete">
            </center>
            </form>
            <br/>
            <iframe name="delete-iframe" id="deleteIframe" onload="iframeLoaded(\'deleteIframe\');" src="../model/deletetype.php" height="100%" width="100%" scrolling="no" frameborder="0"></iframe>
          </div>';
    include("footer.php");

}
else{
    session_unset();
    session_destroy();
    header("Location: ../");
}

?>