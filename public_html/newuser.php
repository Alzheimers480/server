<?php

require "../php_templ/db.php";


function newUser($username, $password, $password2, $fname, $lname, $email){
	if(empty($username) || empty($password) || empty($password2) || empty($fname) || empty($lname) || empty($email)){
		echo "one of the fields was blank ";
		return false;
	}
	if($password != $password2){
		echo "The 2 passwords didn't match ";
		return false;
	}
	 $conn = connectToDB();
 	 if(!$conn){
        	 echo "conn failure ";
               	 return false;
       	 }
	$stmnt=$conn->prepare("INSERT INTO USERS2(USER_UID,USER_PWDHSH,USER_PWDSALT,USER_FNAME,USER_LNAME, USER_EMAIL, VERIFYED) VALUES(?,?,?,?,?,?,0)");
	$salt = file_get_contents('/dev/urandom', false, null, 0, 64);
	$options = array(
               'salt' => $salt
       );
        $phash=crypt($password,$salt);
	$stmnt->bind_param('ssssss',$username,$phash,$salt,$fname,$lname,$email);
        $stmnt->execute();
        $stmnt->close();
        $conn->close();
	return true;
}

$fail=false;
session_start();
if(newUser($_POST["USERNAME"], $_POST["PASSWORD"], $_POST["PASSWORD2"], $_POST["FNAME"], $_POST["LNAME"], $_POST["EMAIL"])) {
	echo "New User Created";
	$mail = $_POST["EMAIL"];
	shell_exec("sh /SECS/home/s/scnolton/public_html/email.sh scnolton@oakland.edu");
}
else{
	echo "unable to create new user";
}
?>
