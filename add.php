<?php

	
	$english = $_GET['english'];
	$parola  = $_GET['parola'];
	include 'connect_2_db.php';
	$output  = array("parola","english","data","numero","num_words","existence"); 
	$sql_insrt    = "INSERT INTO parole (parola,english,data) VALUES ('$parola','$english',now())";
	$sql_slct_last = "SELECT * FROM parole ORDER BY numero DESC LIMIT 1";
	$sql_slct_all = "SELECT * FROM parole";
	$sql_existence_test = "SELECT * from parole WHERE english='$english' AND parola='$parola'";
	$res=$conn->query($sql_existence_test)->num_rows;

	if ( $res==0 ) {
		$conn->query($sql_insrt);
		$num_words = $conn->query($sql_slct_all)->num_rows;
		$last_row  = $conn->query($sql_slct_last)->fetch_array();
		$output['existence'] = $res; // 0 means inserted word doesnt already exist
		$output['numero']    = $last_row['numero'];
		$output['parola']    = $last_row['parola'];
		$output['english']   = $last_row['english'];
		$output['data']      = $last_row['data'];
		$output['num_words'] = $num_words;
	}
	else {
		$output["existence"]=1;
	}

	echo json_encode($output);
	$conn->close(); // Connection Closed
?>
