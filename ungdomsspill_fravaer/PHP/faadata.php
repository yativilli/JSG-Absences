<?php

$db_details = include('../config/config.php');
$login = include('../config/config_faadata.php');

$conn = new mysqli($db_details['host'], $login['user'], $login['password'], $db_details['database']);

// Get GET-Variables from URL (Beginn- and Enddate of timespan; Getting Absence-entries)
$beginn = $_GET['beginn'];
$end = $_GET['end'];

// Query to get Absence-entries of a certain timespan, ordered by name
$return_arr = array();
$query = 'SELECT a.Datum AS Datum, m.Name AS Name, Status FROM `abwesenheiten` as a, `abwesenheiten_daten` as ad, `mitglieder` as m WHERE a.id = ad.Abwesenheiten_id AND ad.user_id = m.Mitglieder_id AND Datum>="' . $beginn . '" AND Datum<="' . $end . '" ORDER BY Name;';
$result = mysqli_query($conn, $query);

// Turn result in Array format
while ($row = mysqli_fetch_array($result)) {
    $Datum = $row['Datum'];
    $Name = $row['Name'];
    $Status = $row['Status'];

    $return_arr[] = array("Datum" => $Datum, "Name" => $Name, "Status" => $Status);
}

// Create and File for Storing the Data
$All_Absences_SortByName = fopen("../Files/All_Absences_SortByName.csv", "w");
// Save Header-Rows in file, in csv-Format
fputcsv($All_Absences_SortByName, ["Datum", "Name", "Status"], ";");
// Save each row in csv-Format into file 
foreach($return_arr as $ra){
    fputcsv($All_Absences_SortByName, $ra, ";");
}
// Close File
fclose($All_Absences_SortByName);

// Query to get Absence-entries of a certain timespan, grouped and ordered by name; Every Absence summed up
$query2 = 'SELECT a.Datum AS Datum, m.Name AS Name, SUM(Status) as Status FROM `abwesenheiten` as a, `abwesenheiten_daten` as ad, `mitglieder` as m WHERE a.id = ad.Abwesenheiten_id AND ad.user_id = m.Mitglieder_id AND Datum>="' . $beginn . '" AND Datum<="' . $end . '" GROUP BY Name ORDER BY Name;';
$result2 = mysqli_query($conn, $query2);

// Turn result in Array format
while ($row2 = mysqli_fetch_array($result2)) {
    $Datum2 = $row2['Datum'];
    $Name2 = $row2['Name'];
    $Status2 = $row2['Status'];

    $return_arra[] = array("Datum" => $Datum2, "Name" => $Name2, "Status" => $Status2);
}

// Create and File for Storing the Data
$Absences_AddedUp_GroupedByName = fopen("../Files/Absences_AddedUp_GroupedByName.csv", "w");
// Save Header-Rows in file, in csv-Format
fputcsv($Absences_AddedUp_GroupedByName, ["Datum des ersten Eintrags", "Name", "Anzahl Fehlproben"], ";");
// Save each row in csv-Format into file 
foreach($return_arra as $rb){
    fputcsv($Absences_AddedUp_GroupedByName, $rb, ";");
}
// Close File
fclose($Absences_AddedUp_GroupedByName);

// Forward to Output-HTML
header("Location: ../HTML/FileOutput.html");

?>