<?php


echo '<br/>
    <form name="addproduct" action="addproduct_DBINSERT.php" method="post">
  <!-- Table goes in the document BODY -->
  <table>
      <thead>
      <!-- Display CRUD options in TH format -->
      <tr>
        <th>Categroy Id</th>
        <td> <select name="category" required>
                <option value=""></option>
                
            </select></td>
      </tr>

      <tr>
        <th>Product Name</th>
        <td><input type="text" name="prodname" value=""></td>
      </tr>

      <tr>
        <th>Price</th>
        <td><input type="text" name="price" value=""></td>
      </tr>

      <tr>
        <th>Quantity</th>
        <td><input type="text" name="quantity" value=""></td>
      </tr>
      
      <tr>
        <th>Description</th>
        <td><textarea name="description" rows="15" cols="30"></textarea></td>
      </tr>
       
       <tr>
        <th>Location</th>
        <td> <select name="location" required>
                <option value=""></option>
                
            </select></td>
      </tr>
      <tr>
      
      <tr>
      <th>Manufacturer</th>
      <td><input type="text" name="manufacturer" value=""></td>
      </tr>
     <tr><td></td>
        <td><input type="submit" name="submit" value="Add Product"></td>
      </tr>
      </thead>
    </table>
  </form>
</body>
</html>';

?>




