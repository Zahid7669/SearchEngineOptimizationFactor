<?php
// show_urls.php

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

// Fetch URLs from the database
$result = $conn->query("SELECT id, url, title_tag_content FROM websites");

// Display data in a table
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>URL</th>
            <th>Title</th>
        </tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['url']}</td>
            <td>{$row['title_tag_content']}</td>
          </tr>";
}

echo "</table>";

$conn->close();
?>
