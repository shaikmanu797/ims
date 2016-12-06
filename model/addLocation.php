<?php
/*Created by 
Mansoor Baba Shaik
*/

echo '<br/>
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
      <link href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" rel="Stylesheet" />
      <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" ></script>
      <script type="text/javascript" src="../js/autosuggest.js"></script>
      <form name="addLocation" method="post" action="programs/insertItems" enctype="multipart/form-data" autocomplete="off">
        <table border="0">
            <tbody>
                <tr>
                    <th>Location: </th>
                    <td>
                        <input type="text" name="locName" id="locId" size="50" maxlength="50" onkeyup="loc();" required />
                    </td>
                    <td>&nbsp;
                        <input type="submit" name="Submit" value="Add Location" />
                    </td>
                </tr>
            </tbody>
        </table>
        </form>';

?>