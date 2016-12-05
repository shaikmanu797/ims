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
        if($stmt = $mysqli -> prepare('INSERT INTO category(type) VALUES(?)')){
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

        if($stmt = $mysqli -> prepare('INSERT INTO location(location_name) VALUES(?)')){
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
        session_start();
        $target = "../uploads/".$_SESSION['files']['newname'];
        $category_id = trim($postedContent['category']);
        $prodName = trim($postedContent['prodName']);
        $price = trim($postedContent['price']);
        $quantity = trim($postedContent['quantity']);
        $xml = simplexml_load_file($target);
        $description = $xml -> asXML();
        unlink($target);
        unset($_SESSION['files']);
        $location_id = trim($postedContent['location']);
        $manufacturer = trim($postedContent['manufacturer']);
        if($stmt = $mysqli -> prepare('INSERT INTO product(category_id, prodname, price, quantity, description, location_id, manufacturer) 
                                              VALUES(?, ?, ?, ?, ?, ?, ?)')){
            $stmt -> bind_param("isdisis", $category_id, $prodName, $price, $quantity, $description, $location_id, $manufacturer);
            $stmt -> execute();
            $stmt -> close();
            $msg = $prodName." Product has been added successfully!!";
        }
        else{
            $msg = die('Please go back and re-submit the form');
        }
        $mysqli -> close();
    }
    return $msg;
}


/**
 * Insertion functions -- end here
 */

/**
 * Retreiving  functions -- start here
 */

function getLocation(){
    require('db-settings.php');
    if($stmt = $mysqli -> prepare("SELECT id, location_name FROM location")){
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
    if($stmt = $mysqli -> prepare("SELECT id, type FROM category")){
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

function getAllProducts(){
    require('db-settings.php');
    if($stmt = $mysqli -> prepare("SELECT category_id, prodname, price, quantity, description, location_id, manufacturer FROM product")){
        $stmt -> execute();
        $stmt -> bind_result($category_id, $prodName, $price, $quantity, $description, $location_id, $manufacturer);
        $products = array();
        while($stmt -> fetch()){
            $products['category_id'][] = $category_id;
            $products['prodName'][] = $prodName;
            $products['price'][] = $price;
            $products['quantity'][] = $quantity;
            $products['description'][] = $description;
            $products['location_id'][] = $location_id;
            $products['manufacturer'][] = $manufacturer;
        }
    }
    return $products;
}

function getProduct($id){
    require('db-settings.php');
    if($stmt = $mysqli -> prepare("SELECT category_id, prodname, price, quantity, description, location_id, manufacturer FROM product WHERE id=?")){
        $stmt -> bind_param("i", $id);
        $stmt -> execute();
        $stmt -> bind_result($category_id, $prodName, $price, $quantity, $description, $location_id, $manufacturer);
        $prodDetails = array();
        while($stmt -> fetch()){
            $prodDetails['category_id'][] = $category_id;
            $prodDetails['prodName'][] = $prodName;
            $prodDetails['price'][] = $price;
            $prodDetails['quantity'][] = $quantity;
            $prodDetails['description'][] = $description;
            $prodDetails['location_id'][] = $location_id;
            $prodDetails['manufacturer'][] = $manufacturer;
        }
    }
    return $prodDetails;
}

/**
 * Retreiving  functions -- end here
 */

/**
 * Displaying  functions -- start here
 */

function tableDescr($id){
    $products=getProduct($id);
    $sxe = array();
    $xmlContent = array();
    for($i=0; $i<count($products['description']); $i++){
        $sxe[$i]= new SimpleXMLElement($products['description'][$i]);
        $xmlContent[$i]['title'][] = $sxe[$i] -> getName();
        foreach($sxe[$i] -> children() as $child) {
            $xmlContent[$i]['elementNames'][] = $child->getName();
            $xmlContent[$i]['values'][] = $child;
        }
    }


    for($i=0; $i<count($xmlContent); $i++) {
        echo '<table name="' . $xmlContent[$i]['title'][0] . '" border="1" cellspacing="1" cellpadding="3" >
            <tr>
              <th>Description</th>
              <th>Details</th>
            </tr>';
        for($j=0; $j<count($xmlContent[$i]['elementNames']); $j++){
            echo '<tr>
                <td>'.$xmlContent[$i]['elementNames'][$j].'</td>
                <td>'.$xmlContent[$i]['values'][$j].'</td>
              </tr>';
        }
        echo '</table>' . "<br/><br/>";
    }
}

/**
 * Displaying  functions -- end here
 */