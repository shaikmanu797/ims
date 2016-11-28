<?php
/**
 * Created by PhpStorm.
 * User: mshaik_tmp
 * Date: 11/28/2016
 * Time: 10:57 AM
 */

if(isset($_POST) && !Empty($_POST)){
    $u = $_POST['u'];
    $p = $_POST['p'];
    if($u == "adminims" && $p == "imsstore"){
        session_start();
        $adminLoggedIn = array();
        $adminLoggedIn['name'] = "Admin";
        $adminLoggedIn['status'] = 1;
        $_SESSION['logger'] = $adminLoggedIn;
        header("Location: ../../view/home");
    }
    else{
        echo "<script>
                window.alert('Only admin can log in to this site');
                window.location.href='../../';
              </script>";
    }
}
else{
    die();
}

?>