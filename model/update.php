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
        echo '<br/>
              <form name="categoryForm" method="post" autocomplete="off"  onsubmit="validateUpdate(1);">'.
              '<input type="hidden" name="id" value="'.$id.'"/>'.
              '<b>Old Name: &nbsp;</b>'. $old.'<input type="hidden" name="oldcatName" value="'.$old.'"/>'.
              '<br/><br/>'.
              '<b>New Name: &nbsp;</b>'.'<input type="text" name="newcatName" id="catId" size="50" maxlength="150" onkeyup="category();" required />'.
              '<br/><br/>'.
              '<input type="submit" name="Submit" value="Update" />'.
              '</form>';
    }
    elseif($for == "2"){
        $locDetails = getLocation('');
        $catDetails = getCategory('');
        $prodDetails = getProduct($id);
        echo "<div align='right'><a href='editProduct' style='color:Red;'><b style='font-size: 18px;'>Go Back</b></a></div>";
        echo '<br/>
        <form name="productForm" method="post" enctype="multipart/form-data" onsubmit="validateUpdate(2);" autocomplete="off">
        <input type="hidden" name="id" value="'.$id.'"/>
        <table>
            <thead>
                <tr>
                    <th>Category Id</th>
                    <td> 
                        <select name="category" required>
                            <option value=""></option>';
                        for($i=0; $i<count($catDetails['id']); $i++){
                            if($catDetails['id'][$i]==$prodDetails['category_id']){
                                echo '<option value="'.$catDetails['id'][$i].'" selected>'.$catDetails['catName'][$i].'</option>';
                            }
                            else{
                                echo '<option value="'.$catDetails['id'][$i].'">'.$catDetails['catName'][$i].'</option>';
                            }
                        }
                 echo  '</select>
                    </td>
                </tr>

                <tr>
                    <th>Product Name</th>
                    <td><input type="text" name="prodName" value="'.trim($prodDetails['prodName']).'" size="50" maxlength="250" required></td>
                </tr>

                <tr>
                    <th>Each Price</th>
                    <td><input type="number" min="0" step="0.01" max="999999999" name="price" value="'.trim($prodDetails['price']).'" required></td>
                </tr>

                <tr>
                    <th>Quantity</th>
                    <td><input type="number" min="0" name="quantity" value="'.trim($prodDetails['quantity']).'" required></td>
                </tr>
      
                <tr>
                    <th>Description</th>
                    <td id="fileDescr">
                        <a href="preview?id='.$id.'" target="_blank">Preview</a>&nbsp; &nbsp;
                        <a href="javascript: changeDescr(\'fileDescr\'); top.iframeLoaded(\'editIframe\');">Change</a>
                    </td>
                </tr>
                
                <tr id="preview">
                </tr>
                
                <tr>
                    <th>Location</th>
                    <td> 
                        <select name="location" required>
                            <option value=""></option>';
                        for($i=0; $i<count($locDetails['id']); $i++){
                            if($locDetails['id'][$i]==$prodDetails['location_id']){
                                echo '<option value="'.$locDetails['id'][$i].'" selected>'.$locDetails['locName'][$i].'</option>';
                            }
                            else{
                                echo '<option value="'.$locDetails['id'][$i].'">'.$locDetails['locName'][$i].'</option>';
                            }
                        }
                 echo  '</select>
                    </td>
                </tr>
                
                <tr>
                    <th>Manufacturer</th>
                    <td><input type="text" name="manufacturer" size="50" maxlength="250" value="'.trim($prodDetails['manufacturer']).'" required></td>
                </tr>
                
                <tr>
                <td></td>
                <td></td>
                </tr>
                
                <tr>
                <td></td>
                <td></td>
                </tr>
                
                <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Update"></td>
                </tr>
            </thead>
        </table>
      </form>';
    }
    elseif($for == "3"){
        $old = getLocation($id)['locName'];
        echo '<form name="locationForm" method="post" autocomplete="off" onsubmit="validateUpdate(3);">'.
             '<input type="hidden" name="id" value="'.$id.'"/>'.
             '<b>Old Name: &nbsp;</b>'. $old.'<input type="hidden" name="oldlocName" value="'.$old.'"/>'.
             '<br/><br/>'.
             '<b>New Name: &nbsp;</b>'.'<input type="text" name="newlocName" id="locId" size="50" maxlength="50" onkeyup="loc();" required />'.
             '<br/><br/>'.
             '<input type="submit" name="Submit" value="Update" />'.
             '</form>';
    }
    else{
        die("Something went wrong!! Please refresh the page!");
    }
}
elseif(isset($_POST) && !Empty($_POST) &&($_POST['Submit'] == "Update")){
    if(!Empty($_GET)){
        require('programs/functions.php');
        $tab = $_GET['tab'];
        switch($tab){
            case 1: echo updateCategory($_POST['id'], $_POST['oldcatName'],$_POST['newcatName']);
                    break;
            case 2: print_r(updateProduct($_POST));
                    break;
            case 3: echo updateLocation($_POST['id'], $_POST['oldlocName'],$_POST['newlocName']);
                    break;
        }

    }
}
else{
    die("Please go back or refresh page!!");
}