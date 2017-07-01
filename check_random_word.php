<?php
include 'connect_2_db.php';
$english = $_GET['english'];
$ans	 = $_GET['ans'];
$sql="SELECT * FROM parole WHERE english='$english'";
$word	=	$conn->query($sql)->fetch_array();
$output = array('result' => 'true');

if ($word['parola']!=$ans) $output['result']=$word['parola'];
echo json_encode($output);
$conn->close();
?>