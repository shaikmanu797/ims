<?php
/*Created by 
Mansoor Baba Shaik
*/
session_start();

if(isset($_SESSION['files']['filename'])&&!Empty($_SESSION['files']['filename'])){
    $filename = $_SESSION['files']['filename'];
    $newname = $_SESSION['files']['newname'];
    $target = "uploads/".$newname;
    echo "<a href='".$target."' target='_blank'>".$filename."</a>";
    echo "&nbsp";
    echo "<a href='delFile?file=".$newname."' style='text-decoration:none;color:red;'><sup>X</sup></a>";
}
else{
    echo '<table name="forFiles" border="0">
       <form name="files" method="post" action="programs/uploadFile" enctype="multipart/form-data">
        <tr>
            <td><input type="file" name="description" accept="application/xml" value="" required></td>
            <td><input type="submit" name="Submit" value="Upload"/></td>
        </tr>
        <tr>
            <td colspan="2"><i style="font-size: 13px;"><b>(Upload XML files only)</b></i></td>
        </tr>
        </form>
       </table>
     ';
}
?>