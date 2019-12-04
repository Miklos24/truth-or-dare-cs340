<?php
session_start(); // session started so that we can save global variables

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'connectDB.php'; // connects to the database.

$errors = array();

$raw = file_get_contents("php://input");

$json = json_decode($raw, true);

$username = strval($json['username']);

$pass = strval($json['password']);

// if (!ctype_alpha(str_replace(' ', '', $username)))
//     array_push($errors, "invalid_name");

if (!mb_check_encoding($username, "ASCII"))
    array_push($errors, "unsupported_chars_name");

if (!mb_check_encoding($json['password'], "ASCII"))
    array_push($errors, "unsupported_chars_pass");

if (!filter_var($json['email'], FILTER_VALIDATE_EMAIL))
    array_push($errors, "invalid_email");

$email_query = "SELECT * FROM Users WHERE email = '$json[email]'";

$resultEmail = 0;

if (!($resultEmail = mysqli_query($conn, $email_query)))
    die(json_encode("error"));

if ($resultEmail->num_rows != 0)
    array_push($errors, "email_exists");

$username_query = "SELECT * FROM Users WHERE username = '$json[username]'";

$resultUser = 0;

if (!($resultUser = mysqli_query($conn, $username_query)))
    die(json_encode("error"));

if ($resultUser->num_rows != 0)
    array_push($errors, "username_exists");

$raw_pass = strval($json['password']);

if (strlen($raw_pass) < 6) {
    array_push($errors, "pass_too_short");
}

// If there are no errors then add the user to the database.
if (sizeof($errors) == 0) {
    $cstrong = 0;
    $password  = $json['password'];
    $bytes = openssl_random_pseudo_bytes(4, $cstrong); // generate a salt
    $salt = bin2hex($bytes);
    $passwordHashed = hash('sha256', "$password + $salt"); // add the salt to the password then use a hash function
    $sql = "INSERT INTO Users (username, email, password, salt) VALUES ('$username', '$json[email]', '$passwordHashed', '$salt')";
    if (!mysqli_query($conn, $sql))
        die(json_encode("error"));
    echo json_encode("success");
    $_SESSION["username"] = $username;

} else {
    echo json_encode($errors);
}

mysqli_close($conn);

?>
