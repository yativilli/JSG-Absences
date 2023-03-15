<?php

$db_details = include('../config/config.php');
$login = include('../config/config_login.php');

$conn = new mysqli($db_details['host'], $login['user'], $login['password'], $db_details['database']);

// Get Username and Password per URL
$UsernameofU = $_POST['username'];
$PasswordofU = $_POST['password'];

// Query to check if valid login is in DB
$return_arr = array();
$query = "SELECT COUNT(active) FROM login WHERE login=" . "'" . $UsernameofU . "'" . " AND password=" . "'" . $PasswordofU . "' AND active=1;";
$result = mysqli_query($conn, $query);

// Save Response in Variable
$row = mysqli_fetch_array($result);
$iscorrect = $row[0];

// Set Different Cookie, if login was valid or not;
if ($iscorrect == "1") {
    // Set Cookie to "Valid login"
    $cookie_name = "__uslo_";
    $cookie_value = 2348793278943578;
    setcookie($cookie_name, $cookie_value, time() + (43200), "/"); // 86400 = 1 day
    // Forward to "real" site
    header("Location: ../HTML/index1.html");
} else {
    // Set Cookie to "login not valid
    $cookie_name = "__uslo_";
    $cookie_value = 4809093454323789;
    setcookie($cookie_name, $cookie_value, time() + (43200), "/"); // 86400 = 1 day
    // "Forward" back to Login-Site
    header("Location: ../index.html");
}

?>