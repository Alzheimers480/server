<?php

require "../php_templ/db.php";
$fail=false;
session_start();
$email = $_GET["EMAIL"];
$conn = connectToDB();
if(!$conn){
	echo "conn failure";
}
$stmnt = $conn->prepare("UPDATE USERS2 SET VERIFYED=1 WHERE USER_EMAIL = ?;");
$stmnt->bind_param('s',$email);
$stmnt->execute();
?>
