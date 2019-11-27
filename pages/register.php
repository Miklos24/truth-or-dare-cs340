<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'connectDB.php'; // connects to the database.

$errors = array();

$raw = file_get_contents("php://input");

$json = json_decode($raw, true);

$username = strval($json['username']);

$pass = strval($json['password']);

if (!ctype_alpha(str_replace(' ', '', $username)))
    array_push($errors, "invalid_name");

if (!mb_check_encoding($username, "ASCII"))
    array_push($errors, "unsupported_chars_name");

if (!mb_check_encoding($json['password'], "ASCII"))
    array_push($errors, "unsupported_chars_pass");

if (!filter_var($json['email'], FILTER_VALIDATE_EMAIL))
    array_push($errors, "invalid_email");

$email_query = "SELECT * FROM Users WHERE Email = '$json[email]'";

$result = 0; // TODO: make this better

if (!($result = mysqli_query($conn, $email_query)))
    die(json_encode("error"));

if ($result->num_rows != 0)
    array_push($errors, "email_exists");

$raw_pass = strval($json['password']);

if (strlen($raw_pass) < 6) {
    array_push($errors, "pass_too_short");
}

if (sizeof($errors) == 0) {
    $sql = "INSERT INTO Users (username, email, password) VALUES ('$username', '$json[email]', '$json[password]')";
    if (!mysqli_query($conn, $sql))
        die(json_encode("error"));
    echo json_encode("success");
} else {
    echo json_encode($errors);
}

mysqli_close($conn);

?>
