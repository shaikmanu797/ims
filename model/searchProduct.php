<?php
/*Created by 
Mansoor Baba Shaik
*/

if(isset($_GET) && !Empty($_GET) && $_GET['id'] == "all"){
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
                <th>Col1</th>
                <th>Col2</th>
                <th>Col3</th>
                <th>Col4</th>
              </tr>
            </thead>
            <tbody>';
    for($i=0; $i<=30; $i++){
        echo "<tr id='".$i."'> 
                <td>".$i." cols"."</td>
                <td>".$i." cols"."</td>
                <td>".$i." cols"."</td>
                <td>".$i." cols"."</td>
              </tr>";
    }
    echo '</tbody></table>';
    
}
elseif(isset($_GET) && !Empty($_GET) && $_GET['id'] != "all"){
    $id = $_GET['id'];
    echo $id;
}
else{
    die("Please refresh the page!");
}

?>