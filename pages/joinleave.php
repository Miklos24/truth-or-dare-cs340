<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'connectDB.php'; // connects to the database.

$errors = array();

$raw = file_get_contents("php://input");

$json = json_decode($raw, true);

$username = strval($json['username']); // TODO: error handling if this doesn't exist
$gID = strval($json['gID']);
$gName = strval($json['gName']);
$type = strval($json['type']);

if($type == "join"){
	$sql = "INSERT INTO MemberOf (username, gID, num_pts) VALUES ('$username', '$gID', '0')";
	if ($result = mysqli_query($conn, $sql)) {
		echo $gName;
	}
	else{
		echo "failure";
	}
}
else if($type == "leave"){
	$sql = "DELETE FROM MemberOf WHERE username = '$username' AND gID = '$gID'";

	if ($result = mysqli_query($conn, $sql)) {
		echo "success";
	}
}

mysqli_close($conn);

?>