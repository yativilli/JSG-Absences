<?php

$db_details = include('../config/config.php');
$login = include('../config/config_submitToDB.php');

$conn = new mysqli($db_details['host'], $login['user'], $login['password'], $db_details['database']);

// Query to check if current date is already in db 
$query = 'SELECT COUNT(id) FROM `abwesenheiten` WHERE `abwesenheiten`.`Datum` = CURRENT_DATE';
$result = mysqli_query($conn, $query);
$isalready = mysqli_fetch_array($result)[0];

// If not, Insert Date into DB
if ($isalready == 0) {
    $query = 'INSERT INTO abwesenheiten (Datum)
    VALUES (CURRENT_DATE);';
    $result = mysqli_query($conn, $query);
    echo $query;
}

$return_arr = array();
$query = "SELECT Mitglieder_id, Name, Instrument FROM mitglieder";
$result = mysqli_query($conn, $query);

// Convert Result to Array
while($row = mysqli_fetch_array($result)){
    $id = $row['Mitglieder_id'];
    $name = $row['Name'];
    $instrument = $row['Instrument'];

    $return_arr[] = array("id" => $id, "name" => $name, "instrument" => $instrument);
}

// Query to Get Id of Current Date
$query = 'SELECT id FROM `abwesenheiten` WHERE Datum = CURRENT_DATE;';
$result = mysqli_query($conn, $query);
$idtoconnectto = mysqli_fetch_array($result)[0];
echo $idtoconnectto;

// Turn to JSON and display it for JS and Jquery
$json = json_decode(json_encode($return_arr));

// Set foreach-Count Variable
$j = 0;
foreach ($json as $js) {
    $j++;
    // Get the unique-status-ids from url by adding foreach-countvariable to $_GET-Key
    $js->status = $_GET['status' . $j];
    // Query to Add Absences into DB
    $query = 'INSERT INTO abwesenheiten_daten (Abwesenheiten_id, Status, user_id) VALUES (' . $idtoconnectto . ',"' . $js->status . '", '. $js->id . ');';
    echo $query;
    $result = mysqli_query($conn, $query);
}
// Forward to Output of Submitted Absences (Today)
header("Location: ../HTML/utgave.html");

?>