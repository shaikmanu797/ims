<?php
/*Created by 
Mansoor Baba Shaik
*/

function insertCategory($postedContent){
    if(!Empty($postedContent) && $postedContent['Submit'] == "Add Category"){
        require('db-settings.php');
        $catName = trim($postedContent['catName']);
        //echo $catName;
        if($stmt = $mysqli -> prepare('INSERT INTO ims.category(type) VALUES(?)')){
            $stmt -> bind_param("s", $catName);
            $stmt -> execute();
            $stmt -> close();
            $msg = $catName." category has been added successfully!!";
        }
        else{
            $msg = die('Please go back and re-submit the form');
        }
        $mysqli -> close();
    }
    return $msg;
}
