<?php
/*Created by 
Mansoor Baba Shaik
*/

if(isset($_POST) && ($_POST['Submit']=="Upload")){

    if(($_FILES['description']['type'] == "text/xml") &&
        ($_FILES['description']['error'] == 0)&&
        ($_FILES['description']['size'] != 0)){

        $filename = $_FILES['description']['name'];
        $newname = time()."-".$_FILES['description']['name'];
        $target = "../uploads/".$newname;
        session_start();
        $_SESSION['files']['filename'] = $filename;
        $_SESSION['files']['newname'] = $newname;
        move_uploaded_file($_FILES['description']['tmp_name'], $target);
        header('Location: ../upload');
    }
    else{
        die("Error occurred! Please refresh the page!");
    }
}

?>