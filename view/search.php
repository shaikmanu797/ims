<?php
/*Created by 
Mansoor Baba Shaik
*/
session_start();
if(isset($_SESSION) && !Empty($_SESSION['logger'])){
    include("header.php");
    echo '<div class="main-header">
            <b>Search Products</b>
          </div>
          <div class="main-content">
            <script type="text/javascript" src="../js/iframeActs.js"></script>
            <h3>You can look into particular product here available in our IMS!!</h3>
            <iframe name="search-iframe" style="overflow: hidden;" id="searchIframe" scrolling="no" onload="iframeLoaded(\'searchIframe\');" src="../model/searchProduct?id=all" height="100%" width="100%" frameborder="0"></iframe>
          </div>';
    include("footer.php");

}
else{
    session_unset();
    session_destroy();
    header("Location: ../");
}
