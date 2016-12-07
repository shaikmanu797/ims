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

function getLocation($id){
    require('db-settings.php');
    if(isset($id) && !Empty($id)) {
        if ($stmt = $mysqli -> prepare("SELECT location_name FROM location WHERE id=?")) {
            $stmt -> bind_param("i", $id);
            $stmt->execute();
            $stmt->bind_result($locname);
            $locDetails = array();
            while ($stmt->fetch()) {
                $locDetails['locName'] = $locname;
            }
            $stmt->close();
        }
    }
    else{
        if ($stmt = $mysqli -> prepare("SELECT id, location_name FROM location")) {
            $stmt->execute();
            $stmt->bind_result($locid, $locname);
            $locDetails = array();
            while ($stmt->fetch()) {
                $locDetails['id'][] = $locid;
                $locDetails['locName'][] = $locname;
            }
            $stmt->close();
        }
    }
    $mysqli -> close();
    return $locDetails;
}

function getCategory($id){
    require('db-settings.php');
    if(isset($id) && !Empty($id)){
        if($stmt = $mysqli -> prepare("SELECT type FROM category WHERE id=?")) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->bind_result($catName);
            $catDetails = array();
            while ($stmt->fetch()) {
                $catDetails['catName'] = $catName;
            }
            $stmt->close();
        }
    }
    else{
        if($stmt = $mysqli -> prepare("SELECT id, type FROM category")){
            $stmt -> execute();
            $stmt -> bind_result($catid, $catName);
            $catDetails = array();
            while($stmt -> fetch()){
                $catDetails['id'][] = $catid;
                $catDetails['catName'][] = $catName;
            }
            $stmt -> close();
        }
    }
    $mysqli -> close();
    return $catDetails;
}

function getProduct($id){
    require('db-settings.php');
    if(isset($id) && !Empty($id)) {
        if ($stmt = $mysqli->prepare("SELECT category_id, prodname, price, quantity, description, location_id, manufacturer FROM product WHERE id=?")) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->bind_result($category_id, $prodName, $price, $quantity, $description, $location_id, $manufacturer);
            $prodDetails = array();
            while ($stmt->fetch()) {
                $prodDetails['category_id'] = $category_id;
                $prodDetails['prodName'] = $prodName;
                $prodDetails['price'] = $price;
                $prodDetails['quantity'] = $quantity;
                $prodDetails['description'] = $description;
                $prodDetails['location_id'] = $location_id;
                $prodDetails['manufacturer'] = $manufacturer;
            }
            $stmt->close();
        }
    }
    else{
        if($stmt = $mysqli -> prepare("SELECT id, category_id, prodname, price, quantity, description, location_id, manufacturer FROM product")){
            $stmt -> execute();
            $stmt -> bind_result($id, $category_id, $prodName, $price, $quantity, $description, $location_id, $manufacturer);
            $prodDetails = array();
            while($stmt -> fetch()){
                $prodDetails['id'][] = $id;
                $prodDetails['category_id'][] = $category_id;
                $prodDetails['prodName'][] = $prodName;
                $prodDetails['price'][] = $price;
                $prodDetails['quantity'][] = $quantity;
                $prodDetails['description'][] = $description;
                $prodDetails['location_id'][] = $location_id;
                $prodDetails['manufacturer'][] = $manufacturer;
            }
            $stmt->close();
        }
    }
    $mysqli -> close();
    return $prodDetails;
}

/**
 * Retreiving  functions -- end here
 */

/**
 * Displaying  functions -- start here
 */

function tableDescr($id){
    $product=getProduct($id);
    //print_r($product);
    $xmlContent = array();
    $sxe = new SimpleXMLElement($product['description']);
    $xmlContent['title'][] = $sxe -> getName();
    foreach($sxe -> children() as $child) {
        $xmlContent['elementNames'][] = $child->getName();
        $xmlContent['values'][] = $child;
    }
    //print_r($xmlContent);
    echo '<table align="center" name="' . $xmlContent['title'][0] . '" border="1" width="100%" cellspacing="1" cellpadding="6" >
            <tr>
              <th width="auto">Description</th>
              <th width="auto">Details</th>
            </tr>';
    for($i=0; $i<count($xmlContent['elementNames']); $i++){
        echo '<tr>
                  <td width="auto">&nbsp;&nbsp;'.$xmlContent['elementNames'][$i].'</td>
                  <td width="auto">&nbsp;&nbsp;'.$xmlContent['values'][$i].'</td>
              </tr>';
    }
        echo '</table>' . "<br/><br/>";
}

/**
 * Displaying  functions -- end here
 */


/**
 * Updating  functions -- start here
 */

function updateCategory($id, $old, $new){
    require('db-settings.php');
    if ($stmt = $mysqli -> prepare("UPDATE category SET type=? WHERE id=? AND type=?")) {
        $stmt->bind_param("sis", $new, $id, $old);
        $stmt->execute();
        $stmt->close();
        $msg = $old." has been updated to ".$new;
    }
    else{
        $msg = die("Updation error occurred!!");
    }
    $mysqli -> close();
    return $msg;
}

function updateLocation($id, $old, $new){
    require('db-settings.php');
    if ($stmt = $mysqli -> prepare("UPDATE location SET location_name=? WHERE id=? AND location_name=?")) {
        $stmt->bind_param("sis", $new, $id, $old);
        $stmt->execute();
        $stmt->close();
        $msg = $old." has been updated to ".$new;
    }
    else{
        $msg = die("Updation error occurred!!");
    }
    $mysqli -> close();
    return $msg;
}

function updateProduct($postedContent){
    return $postedContent;
}

/**
 * Updating  functions -- end here
 */


/**
 * Deleting  functions -- start here
 */

function deleteCategory($id, $category){
    require('db-settings.php');
    if ($stmt = $mysqli -> prepare("DELETE FROM category WHERE id=? AND type=?")) {
        $stmt->bind_param("is", $id, $category);
        $stmt->execute();
        $stmt->close();
        $msg = $category." has been delete successfully!!";
    }
    else{
        $msg = die("Deletion error occurred!!");
    }
    $mysqli -> close();
    return $msg;
}

function deleteLocation($id, $location){
    require('db-settings.php');
    if ($stmt = $mysqli -> prepare("DELETE FROM location WHERE id=? AND location_name=?")) {
        $stmt->bind_param("is", $id, $location);
        $stmt->execute();
        $stmt->close();
        $msg = $location." has been delete successfully!!";
    }
    else{
        $msg = die("Deletion error occurred!!");
    }
    $mysqli -> close();
    return $msg;
}

function deleteProduct($id){
    require('db-settings.php');
    if ($stmt = $mysqli -> prepare("DELETE FROM product WHERE id=?")) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        $msg = "This product has been delete successfully!!";
    }
    else{
        $msg = die("Deletion error occurred!!");
    }
    $mysqli -> close();
    return $msg;
}

/**
 * Deleting  functions -- end here
 */