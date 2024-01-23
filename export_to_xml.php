<?php
// export_to_xml.php

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

// Create XML content
$xml = new SimpleXMLElement('<keywords></keywords>');

while ($row = $result->fetch_assoc()) {
    $keyword = $xml->addChild('keyword');
    $keyword->addChild('name', $row['keyword']);
    $keyword->addChild('occurrences', $row['occurrences']);
}

// Send headers for download
header('Content-Type: application/xml');
header('Content-Disposition: attachment; filename="keywords.xml"');

// Output XML content
echo $xml->asXML();

$conn->close();


// include 'header.php';

?>
