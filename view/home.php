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
    var_dump($_SESSION);
    for($i=1; $i<=25; $i++){
        echo "<p>Some text some text some text some text..</p>".$i;
    }

    include("footer.php");

}
else{
    session_unset();
    session_destroy();
    header("Location: ../");
}

?>



