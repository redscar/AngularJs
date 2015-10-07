<?php
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "root", "", "angularjs");

$result = $conn->query("SELECT * from crapdata");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"Name":"'  . ($rs["Name"]) . '",';
    $outp .= '"Phone":"'   . ($rs["Phone"])        . '",';
	$outp .= '"Email":"'   . ($rs["Email"])       . '",';
	$outp .= '"Address":"'   . ($rs["Address"])        . '",';
	$outp .= '"City":"'   . ($rs["City"])        . '",';
	$outp .= '"Country":"'   . ($rs["Country"])        . '",';
    $outp .= '"Story":"'. ($rs["Story"])    . '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);
?> 