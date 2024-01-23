<?php
// export_to_excel.php

// Connect to MySQL database
$servername = "localhost"; // Change this to your MySQL server address if it's not on the same machine
$username = "root";
$password = "";
$dbname = "final_project";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$result = $conn->query("SELECT keyword, occurrences FROM keywords");

// Send headers for download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="keywords.csv"');

// Output CSV content
$csvFile = fopen('php://output', 'w');

// Write headers
fputcsv($csvFile, array('Keyword', 'Occurrences'));

while ($row = $result->fetch_assoc()) {
    fputcsv($csvFile, array($row['keyword'], $row['occurrences']));
}

fclose($csvFile);

$conn->close();



?>
