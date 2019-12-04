<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'connectDB.php'; // connects to the database.

$errors = array();

$raw = file_get_contents("php://input");

$json = json_decode($raw, true);

$username = strval($json['username']); // TODO: error handling if this doesn't exist
$pass = strval($json['password']);


if (!mb_check_encoding($pass, "ASCII"))
	die("invalid_password");

$query = "SELECT * FROM Users WHERE username = '$json[username]'";

if ($result = mysqli_query($conn, $query)) {
	if ($result->num_rows == 0)
		die("username_not_registered");
	$row = mysqli_fetch_row($result);
	$salt = $row[3];
	$passTry = hash('sha256', "$pass + $salt"); // create a new hash based on input pass
	if ($passTry == $row[2]) {
		$_SESSION["username"] = $row[0]; // TEST this once logout
		echo "success";
	} else {
		die("invalid_password");
	}
} else {
	die("doesn't exist...");
}

mysqli_close($conn);

?>