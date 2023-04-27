<?php

$dbhost = "localhost";
$dbemail = "root";
$dbpass = "";
$dbname = "login_test";

if(!$con = mysqli_connect($dbhost, $dbemail, $dbpass, $dbname)){
	die("Failed to connect");
}

?>