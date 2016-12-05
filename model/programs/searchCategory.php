<?php
/*Created by 
Mansoor Baba Shaik
*/

require_once('db-settings.php');
$input = "%".trim($_GET['term'])."%";
if($stmt = $mysqli -> prepare("SELECT DISTINCT type FROM category WHERE type LIKE ? ORDER BY type ASC")){
    $stmt -> bind_param("s", $input);
    $stmt -> execute();
    $stmt -> bind_result($out);
    while($stmt -> fetch()){
        $data[] = $out;
    }
    $stmt -> close();
}
$mysqli -> close();

echo json_encode($data);

?>