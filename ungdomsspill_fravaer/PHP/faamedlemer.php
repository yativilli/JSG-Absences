<?php

$db_details = include('../config/config.php');
$login = include('../config/config_faamedlemer.php');

$conn = new mysqli($db_details['host'], $login['user'], $login['password'], $db_details['database']);

// Query to get all Members
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

// Turn to JSON and display it for JS and Jquery
echo(json_encode($return_arr));

// Save in .txt file for easy acces by PHP
$myfile = fopen("../Files/Mitglieder.txt", "w");
fwrite($myfile, json_encode($return_arr));
fclose($myfile);

?>