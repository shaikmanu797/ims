<?php
/*Created by 
Mansoor Baba Shaik
*/

/**
 * Insertion functions -- start here
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

function insertLocation($postedContent){
    if(!Empty($postedContent) && $postedContent['Submit'] == "Add Location"){
        require('db-settings.php');
        $locName = trim($postedContent['locName']);

        if($stmt = $mysqli -> prepare('INSERT INTO ims.location(location_name) VALUES(?)')){
            $stmt -> bind_param("s", $locName);
            $stmt -> execute();
            $stmt -> close();
            $msg = $locName." Location has been added successfully!!";
        }
        else{
            $msg = die('Please go back and re-submit the form');
        }
        $mysqli -> close();
    }
    return $msg;
}

function insertProduct($postedContent){
    if(!Empty($postedContent) && $postedContent['Submit'] == "Add Product") {
        require('db-settings.php');
    }
}


/**
 * Insertion functions -- end here
 */

/**
 * Retreiving  functions -- start here
 */

function getLocation(){
    require('db-settings.php');
    if($stmt = $mysqli -> prepare("SELECT id, location_name FROM ims.location")){
        $stmt -> execute();
        $stmt -> bind_result($locid, $locname);
        $locDetails = array();
        while($stmt -> fetch()){
            $locDetails['id'][] = $locid;
            $locDetails['locName'][] = $locname;
        }
    }
    return $locDetails;
}

function getCategory(){
    require('db-settings.php');
    if($stmt = $mysqli -> prepare("SELECT id, type FROM ims.category")){
        $stmt -> execute();
        $stmt -> bind_result($catid, $catName);
        $catDetails = array();
        while($stmt -> fetch()){
            $catDetails['id'][] = $catid;
            $catDetails['catName'][] = $catName;
        }
    }
    return $catDetails;
}