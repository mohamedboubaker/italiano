<?php
include 'connect_2_db.php';
$natures = array('Verbo','Nome','Aggettivo','Avverbio','Articolo','Pronome','Preposizione','Coniugazione');
$stats   = array('Verbo'=>0,'Nome'=> 0,'Aggettivo'=> 0,'Avverbio'=>0,'Articolo'=>0,'Pronome'=>0,'Preposizione'=>0,'Coniugazione'=>0);
$result  = array();
foreach ($natures as $value) {
	$sql="SELECT * FROM parole WHERE natura='$value'";
	$res[$value] = $conn->query($sql)->num_rows;
}

echo json_encode($res);
$conn->close();
?>