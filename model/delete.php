<?php
/**
 * Created by PhpStorm.
 * User: mshaik_tmp
 * Date: 12/6/2016
 * Time: 2:25 PM
 */

if(isset($_GET) && !Empty($_GET['id']) && !Empty($_GET['for'])){
    require('programs/functions.php');
    echo     '<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
              <link href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" rel="Stylesheet" />
              <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" ></script>
              <script type="text/javascript" src="../js/autosuggest.js"></script>
              <script type="text/javascript" src="../js/val.js"></script>
              ';
    $id = $_GET['id'];
    $for = $_GET['for'];
    if($for == "1"){
        $old = getCategory($id)['catName'];
        echo '<br/>'.
            '<form name="categoryForm" method="post" autocomplete="off"  onsubmit="validateDelete(1);">'.
            '<input type="hidden" name="id" value="'.$id.'"/>'.
            '<h3>Please note that deleting a category will delete all the products associated with this category.</h3>'.
            '<b>Category: &nbsp;</b>'. $old.'<input type="hidden" name="oldcatName" value="'.$old.'"/>'.
            '<br/><br/>'.
            '<input type="submit" name="Submit" value="Delete" />'.
            '</form>';
    }
    elseif($for == "2"){
        $prodDetails = getProduct($id);
        echo "<div align='right'><a href='deleteProduct' style='color:Red;'><b style='font-size: 18px;'>Go Back</b></a></div>";
        echo'<center>'.
            '<form name="productForm" method="post" autocomplete="off" onsubmit="validateDelete(2);">'.
            '<input type="hidden" name="id" value="'.$id.'"/>'.
            '<br/><br/>'.
            '<b>Click the button to delete this product -> </b>&nbsp;'.
            '<input type="submit" name="Submit" value="Delete" />'.
            '</form>'.
            '</center>';
        echo "<table name='Product' id='Product-".$id."' border='0' width='100%' cellpadding='8'>
            <tbody>
                <tr>
                    <td align='left'><b>Category: </b>&nbsp;".trim(getCategory($prodDetails['category_id'])['catName'])."</td>
                    <td align='left'><b>Product Name: </b>&nbsp;".trim($prodDetails['prodName'])."</td>
                </tr>
                <tr>
                    <td align='left'><b>Each Price: </b>&nbsp;"."$ ".trim($prodDetails['price'])."</td>
                    <td align='left'><b>Quantity: </b>&nbsp;".trim($prodDetails['quantity'])." available</td>
                </tr>
                <tr>
                    <td align='left'><b>Manufacturer: </b>&nbsp;".trim($prodDetails['manufacturer'])."</td>
                    <td align='left'><b>Warehouse Location: </b>&nbsp;".trim(getLocation($prodDetails['location_id'])['locName'])."</td>
                </tr>
                
            </tbody>
           </table>";
        echo "<br/>";
        tableDescr($id);

    }
    elseif($for == "3"){
        $old = getLocation($id)['locName'];
        echo'<br/>'.
            '<form name="locationForm" method="post" autocomplete="off" onsubmit="validateDelete(3);">'.
            '<input type="hidden" name="id" value="'.$id.'"/>'.
            '<h3>Please note that deleting a location will delete all the products associated with this location.</h3>'.
            '<b>Location: &nbsp;</b>'. $old.'<input type="hidden" name="oldlocName" value="'.$old.'"/>'.
            '<br/><br/>'.
            '<input type="submit" name="Submit" value="Delete" />'.
            '</form>';
    }
    else{
        die("Something went wrong!! Please refresh the page!");
    }
}
elseif(isset($_POST) && !Empty($_POST) &&($_POST['Submit'] == "Delete")){
    if(!Empty($_GET)){
        require('programs/functions.php');
        $tab = $_GET['tab'];
        switch($tab){
            case 1: echo deleteCategory($_POST['id'], $_POST['oldcatName']);
                    break;
            case 2: echo deleteProduct($_POST['id']);
                    break;
            case 3: echo deleteLocation($_POST['id'], $_POST['oldlocName']);
                    break;
        }

    }
}
else{
    die("Please go back or refresh page!!");
}