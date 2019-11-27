<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'connectDB.php'; // connects to the database.

$errors = array();

$raw = file_get_contents("php://input");

$json = json_decode($raw, true);

$email = strval($json['email']); // TODO: error handling if this doesn't exist
$pass = strval($json['password']);

if (!mb_check_encoding($email, "ASCII") || (!filter_var($email, FILTER_VALIDATE_EMAIL)))
	die("email_not_registered");

if (!mb_check_encoding($pass, "ASCII"))
	die("invalid_password");

$query = "SELECT * FROM Users WHERE email = '$json[email]'";

if ($result = mysqli_query($conn, $query)) {
	if ($result->num_rows == 0)
		die("email_not_registered");
	$row = mysqli_fetch_row($result);
	if ($pass == $row[2]) {
		session_start();
		$_SESSION["username"] = $row[0];
		echo "success";
	} else {
		die("invalid_password");
	}
} else {
	die("doesn't exist...");
}

mysqli_close($conn);

?>