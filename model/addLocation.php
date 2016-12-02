<?php
/*Created by 
Mansoor Baba Shaik
*/

echo '<br/>
      <form name="addLocation" method="post" action="programs/insertItems.php" enctype="multipart/form-data" autocomplete="off">
        <table border="0">
            <tbody>
                <tr>
                    <th>Location: </th>
                    <td>
                        <input type="text" name="locName" size="50" maxlength="50" required />
                    </td>
                    <td>&nbsp;
                        <input type="submit" name="Submit" value="Add Location" />
                    </td>
                </tr>
            </tbody>
        </table>
        </form>';

?>