<?php
/**
 * Created by PhpStorm.
 * User: Mansoor Baba Shaik
 * Date: 12/6/2016
 * Time: 2:01 PM
 */

session_start();
if(isset($_SESSION) && !Empty($_SESSION['logger'])){
    include("header.php");
    echo '<div class="main-header">
            <b>Edit</b>
          </div>
          <div class="main-content">
            <script type="text/javascript" src="../js/iframeActs.js"></script>
            <form name="editfrom" method="post" target="edit-iframe" action="../model/edittype.php">
            <center>
            <select name="edittype" required>
                <option value=""></option>
                <option value="1">Category</option>
                <option value="2">Product</option>
                <option value="3">Location</option>
            </select>&nbsp;
            <input type="submit" name="Submit" value="Select">
            </center>
            </form>
            <br/>
            <iframe name="edit-iframe" id="editIframe" onload="iframeLoaded(\'editIframe\');" src="../model/edittype.php" height="100%" width="100%" scrolling="no" frameborder="0"></iframe>
          </div>';
    include("footer.php");

}
else{
    session_unset();
    session_destroy();
    header("Location: ../");
}

?>