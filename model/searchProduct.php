<?php
/*Created by 
Mansoor Baba Shaik
*/

if(isset($_GET) && !Empty($_GET) && $_GET['id'] == "all"){
    require('programs/functions.php');
    $products = getProduct('');
    echo '<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-1.12.3.js"></script>
          <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
          <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
          <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
          <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css"/>
          <script>
              $(document).ready( function () {
                    $("#allProducts").DataTable();
              });
          </script >
         ';

    echo '<table id="allProducts" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Category</th>
                <th>Product Name</th>
                <th>Location</th>
                <th>Status</th>
                <th>More Details</th>
              </tr>
            </thead>
            <tbody>';
            for($i=0; $i<count($products['id']); $i++){
                echo "<tr id='".$i."'> 
                        <td>".trim(getCategory($products['category_id'][$i])['catName'])."</td>
                        <td>".trim(getProduct($products['id'][$i])['prodName'])."</td>
                        <td>".trim(getLocation($products['location_id'][$i])['locName'])."</td>
                        <td>";
                        if(getProduct($products['id'][$i])['quantity'] == "0") {
                            echo "Out of Stock";
                        }
                        else {
                            echo "In Stock <br/>" . trim(getProduct($products['id'][$i])['quantity']) . " left";
                        }
                echo    "</td>
                        <td><a href='searchProduct.php?id=".trim($products['id'][$i])."'>Click Here</a></td>
                        </tr>";
            }
    echo '</tbody></table>';
}
elseif(isset($_GET) && !Empty($_GET) && $_GET['id'] != "all"){
    require('programs/functions.php');
    $id = $_GET['id'];
    $prodDetails = getProduct($id);
    echo "<div align='right'><a href='searchProduct.php?id=all' style='color:Red;'><b style='font-size: 18px;'>Go Back</b></a></div>";
    echo "<br/><br/>";
    //print_r($prodDetails);
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
else{
    die("Please refresh the page!");
}

?>