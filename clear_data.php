<?php
// clear_data.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Clear all data from the websites table
    $conn->query("TRUNCATE TABLE websites");

    $conn->close();
    // Redirect to the "Show Keywords" form
    header("Location: insert_url_form.php");
    exit();
}
?>
