<?php

function connectToDB() {

	//IP or hostname
	$sqlServer = "localhost";
	$sqlUser = "scnolton";
	$sqlPassword = "wie7Aiz7si";
	//Schema/Database name
	$sqlDatabase = "scnolton";
	$conn = new mysqli($sqlServer, $sqlUser, $sqlPassword, $sqlDatabase);
	if($conn->connect_error) {
		return null;
	}
	return $conn;
}
?>
