<?php
/*Created by 
Mansoor Baba Shaik
*/
echo '<br/>
      <form name="addCategory" method="post" action="programs/insertItems.php" enctype="multipart/form-data">
        <table border="0">
            <tbody>
                <tr>
                    <td>
                        <b>Category: </b>
                    </td>
                    <td>
                        <input type="text" name="catName" size="50" maxlength="150" required />
                    </td>
                    <td>&nbsp;
                        <input type="submit" name="Submit" value="Add Category" />
                    </td>
                </tr>
            </tbody>
        </table>
        </form>';

?>