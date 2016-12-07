<?php
/*Created by
Mansoor Baba Shaik
*/

require('programs/functions.php');
$categories = getCategory('');
    echo '<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-1.12.3.js"></script>
          <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
          <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
          <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
          <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css"/>
          <script>
              $(document).ready( function () {
                    $("#allCategories").DataTable();
              });
          </script >
         ';

    echo '<table id="allCategories" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Category Name</th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>';
            for($i=0; $i<count($categories["id"]);$i++){
                echo '<tr id="'.$i.'">'.
                        '<td>'.trim($categories["catName"][$i]).'</td>'.
                        '<td>'.'<a href="update?id='.$categories["id"][$i].'&for=1" >Edit</a>'.'</td>'.
                     '</tr>';
            }
      echo '</tbody>
           </table>';

?>