<?php
include 'connect_2_db.php';
$sql="SELECT * FROM parole";
$words	=	$conn->query($sql);
$max	=	$conn->query($sql)->num_rows;

for($i=1;$i<rand(1,$max);$i++)
{
	$res=$words->fetch_array();
}
$output = array('english' => $res['english'],'italian' => $res['parola'] );
echo json_encode($output);
$conn->close();
?>