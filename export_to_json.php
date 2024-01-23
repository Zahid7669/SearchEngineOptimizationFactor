<?php
// export_to_json.php

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

// Create an associative array
$data = array();

while ($row = $result->fetch_assoc()) {
    $data[] = array('keyword' => $row['keyword'], 'occurrences' => $row['occurrences']);
}

// Send headers for download
header('Content-Type: application/json');
header('Content-Disposition: attachment; filename="keywords.json"');

// Output JSON content
echo json_encode($data);

$conn->close();


?>
