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
            <b>Create</b>
          </div>
          <div class="main-content">
            <form name="addfrom" method="post" target="add-iframe" action="../model/addtype.php">
            <center>
            <select name="addtype" required>
                <option value=""></option>
                <option value="1">Category</option>
                <option value="2">Product</option>
                <option value="3">Location</option>
            </select>&nbsp;
            <input type="submit" name="Submit" value="Add">
            </center>
            </form>
            <br/>
            <iframe name="add-iframe" src="../model/addtype.php" height="100%" width="100%" frameborder="0"></iframe>
          </div>';
    include("footer.php");

}
else{
    session_unset();
    session_destroy();
    header("Location: ../");
}

?>



