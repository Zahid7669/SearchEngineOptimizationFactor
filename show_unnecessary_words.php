<?php
// show_unnecessary_words.php

// Connect to MySQL
$servername = "localhost"; // Change this to your MySQL server address if it's not on the same machine
$username = "root";
$password = "";
$dbname = "final_project";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch unnecessary words from the unnecessary_keywords table
$result = $conn->query("SELECT keyword FROM unnecessary_keywords");

// Display data in a table
echo "<table border='1'>
        <tr>
            <th>Unnecessary Word</th>
        </tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['keyword']}</td>
          </tr>";
}

echo "</table>";

$conn->close();
?>
