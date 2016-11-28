<?php
/**
 * Created by PhpStorm.
 * User: mshaik_tmp
 * Date: 11/28/2016
 * Time: 10:57 AM
 */

if(isset($_POST)){
    $u = $_POST['u'];
    $p = $_POST['p'];
    if($u == "admin" && $p == "imsstore"){
        session_start();
        $adminLoggedIn = array();
        $adminLoggedIn['name'] = "Admin";
        $adminLoggedIn['status'] = 1;
        $_SESSION['logger'] = $adminLoggedIn;
        header("Location: ../../view/home");
    }
    else{
        echo "<script>
                alert('Only admin can log in to this site');
                window.location.href='../../index';
              </script>";
    }
}
else{
    die();
}

?>