<?php

$db_details = include('../config/config.php');
$login = include('../config/config_skapmedlem.php');

$conn = new mysqli($db_details['host'], $login['user'], $login['password'], $db_details['database']);

// Get Name and Instrument of new Member from URL
$NameofNewMem = $_GET['name'];
$InstrumentofNewMem = $_GET['instrument'];

$arrayIsAlready = array();
$queryIsAlready = 'SELECT Count(Name) FROM `mitglieder` WHERE Name = "' . $NameofNewMem . '" AND Instrument = "' . $InstrumentofNewMem . '";';
$resultIsAlready = mysqli_query($conn, $queryIsAlready);
$isalready = mysqli_fetch_array($resultIsAlready)[0];

if ($isalready == 0) {
    // Query to Save these Values into DB
    $return_arr = array();
    $query = "INSERT INTO mitglieder (Name, Instrument) VALUES ('" . $NameofNewMem . "','" . $InstrumentofNewMem . "')";
    $result = mysqli_query($conn, $query);
}
// "Forward" back to *newuser.html*
header("Location: ../HTML/nyebrukere.html");

?>