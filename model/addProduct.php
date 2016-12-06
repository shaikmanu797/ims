<?php

require_once('programs/functions.php');
$locDetails = getLocation();
$catDetails = getCategory();

echo '<br/>
        <form name="addProduct" action="programs/insertItems" method="post" enctype="multipart/form-data" autocomplete="off">
        <!-- Table goes in the document BODY -->
        <table>
            <thead>
            <!-- Display CRUD options in TH format -->
                <tr>
                    <th>Categroy Id</th>
                    <td> 
                        <select name="category" required>
                            <option value=""></option>';
                    for($i=0; $i<count($catDetails['id']); $i++){
                      echo '<option value="'.$catDetails['id'][$i].'">'.$catDetails['catName'][$i].'</option>';
                    }
echo                   '</select>
                    </td>
                </tr>

                <tr>
                    <th>Product Name</th>
                    <td><input type="text" name="prodName" value="" size="50" maxlength="250" required></td>
                </tr>

                <tr>
                    <th>Each Price</th>
                    <td><input type="number" min="0" step="0.01" max="999999999" name="price" value="" required></td>
                </tr>

                <tr>
                    <th>Quantity</th>
                    <td><input type="number" min="0" name="quantity" value="" required></td>
                </tr>
      
                <tr>
                    <th>Description</th>
                    <td>
                        <iframe src="upload.php" height="70px" width="383px" scrolling="auto" frameborder="0"></iframe>
                    </td>
                </tr>
                
                <tr id="preview">
                    <th></th>
                    <td></td>
                </tr>
                <tr>
                    <th>Location</th>
                    <td> 
                        <select name="location" required>
                            <option value=""></option>';
                    for($i=0; $i<count($locDetails['id']); $i++){
                        echo '<option value="'.$locDetails['id'][$i].'">'.$locDetails['locName'][$i].'</option>';
                    }
echo                   '</select></td>
                </tr>
                <tr>
                    <th>Manufacturer</th>
                    <td><input type="text" name="manufacturer" size="50" maxlength="250" value="" required></td>
                </tr>
                <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Add Product"></td>
                </tr>
            </thead>
        </table>
      </form>';

?>




