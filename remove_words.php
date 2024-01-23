<?php
// remove_words.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Clear existing data in the unnecessary_keywords table
    $conn->query("DELETE FROM unnecessary_keywords");

    // Remove unnecessary words from the database
    $unnecessaryWords = explode(";", $_POST['unnecessary_words']);

    foreach ($unnecessaryWords as $word) {
        $word = trim($word);
        if (!empty($word)) {
            $word = mysqli_real_escape_string($conn, $word);
            $conn->query("INSERT INTO unnecessary_keywords (keyword) VALUES ('$word')");
            $conn->query("UPDATE websites SET title_tag_content = REPLACE(title_tag_content, '$word', '')");
        }
    }

    $conn->close();

    // Redirect to the "Show Keywords" form
    header("Location: remove_words_form.php");
    exit();

}
?>
