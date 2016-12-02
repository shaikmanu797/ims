<?php
/*Created by 
Mansoor Baba Shaik
*/
echo '<br/>
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
      <link href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
      <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" ></script>
      <script type="text/javascript" src="../js/autosuggest.js"></script>
      <form name="addCategory" method="post" action="programs/insertItems" enctype="multipart/form-data" autocomplete="off">
        <table border="0">
            <tbody>
                <tr>
                    <td>
                        <b>Category: </b>
                    </td>
                    <td>
                        <input type="text" name="catName" id="catId" size="50" maxlength="150" onkeyup="category();" required />
                    </td>
                    <td>&nbsp;
                        <input type="submit" name="Submit" value="Add Category" />
                    </td>
                </tr>
            </tbody>
        </table>
        </form>';

?>