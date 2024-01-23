<?php
// show_keywords.php

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

// Clear existing data in the keywords table
$conn->query("DELETE FROM keywords");

// Fetch data from the database
$result = $conn->query("SELECT title_tag_content FROM websites");
$keywords = [];

while ($row = $result->fetch_assoc()) {
    // Extract individual keywords and count occurrences
    $words = explode(" ", $row['title_tag_content']);

    foreach ($words as $word) {
        $word = trim($word);
        if (!empty($word)) {
            if (isset($keywords[$word])) {
                $keywords[$word]++;
            } else {
                $keywords[$word] = 1;
            }
        }
    }
}

// Insert data into the keywords table
foreach ($keywords as $word => $count) {
    $word = mysqli_real_escape_string($conn, $word);
    $conn->query("INSERT INTO keywords (keyword, occurrences) VALUES ('$word', $count)");
}

// Fetch data from the database
$result = $conn->query("SELECT keyword, occurrences FROM keywords");

// Display data in a table
echo "<table border='1'>
        <tr>
            <th>Keyword</th>
            <th>Occurrences</th>
        </tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['keyword']}</td>
            <td>{$row['occurrences']}</td>
          </tr>";
}

echo "</table>";

$conn->close();
?>
