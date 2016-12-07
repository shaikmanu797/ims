<?php
/*Created by
Mansoor Baba Shaik
*/

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
                <th>Options</th>
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
                        <td><a href='update?id=".trim($products['id'][$i])."&for=2'>Edit</a></td>
                        </tr>";
}
echo '</tbody></table>';

?>