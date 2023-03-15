<?php

$db_details = include('../config/config.php');
$login = include('../config/config_faadatafraidag.php');

$conn = new mysqli($db_details['host'], $login['user'], $login['password'], $db_details['database']);

// Query to get Absence-Entries from today
$return_arr = array();
$query = "SELECT a.Datum, m.Name, m.Instrument, ab.Status FROM `abwesenheiten` as a, `abwesenheiten_daten` as ab, `mitglieder` as m WHERE a.Datum = CURRENT_DATE AND ab.Abwesenheiten_id = a.id AND ab.user_id = m.Mitglieder_id;";
$result = mysqli_query($conn, $query);

// Convert Response to Array Format
while($row = mysqli_fetch_array($result)){
    $Datum = $row['Datum'];
    $Name = $row['Name'];
    $Status = $row['Status'];
    $Instrument = $row['Instrument'];

    $return_arr[] = array("Datum" => $Datum, "Name" => $Name, "Instrument" => $Instrument, "Status" => $Status);
}
// Convert to JSON-Format and display it on site (makes readable for JS and Jquery)
echo(json_encode($return_arr));

?>