<?php


require "../php_templ/db.php";


function authUser($username, $password) {

	if(empty($username) || empty($password)){
		echo "empty uname/password";
		return false;
	}
	$conn = connectToDB();
	if(!$conn){
		echo "conn failure";
		return false;
	}


	$stmnt=$conn->prepare("SELECT USER_PWDSALT FROM USERS2 WHERE USER_UID = ?");//We use Prepared Statements to protect against SQL injection attacks
	$stmnt->bind_param('s',$username);

	$stmnt->execute();
	$stmnt->bind_result($salt);

	$stmnt->fetch();
	$stmnt->close();

	if(!$salt) {
		//User wasn't found
		echo $username . " was not found";
		return false;
	}

	$phash = crypt($password,$salt);
	

	$stmnt = $conn->prepare("SELECT USER_UID FROM USERS2 WHERE USER_UID = ? AND USER_PWDHSH = ?");
	$stmnt->bind_param('ss',$username,$phash);

	$stmnt->execute();
	$stmnt->bind_result($uid);

	while($stmnt->fetch()) {
		if($uid != $username) {
			$stmnt->close();
			echo "username/password not found";
			return false;

		} else {
			return true;
		}

	}

	if($stmnt->num_rows == 1){
		return true;
	}

	return false;
}


$fail=false;
session_start();
if(empty($_GET["action"]) || $_GET["action"] == "login") {

	if(authUser($_POST["USERNAME"], $_POST["PASSWORD"])) {
		$_SESSION["USER"] = $_POST["USERNAME"];	
		echo "Hello1";
	} else {
		echo "Hello2";
	}
	
} else if ($_GET["action"] == "logout") {
	session_unset();
	$fail=session_destroy();
	header('Location: index.php');
} else {
	//Should just throw an error for now
	die("Invalid Action");
}
echo $_SESSION["USER"];


?>
