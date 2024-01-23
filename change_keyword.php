<?php
// change_keyword.php

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

    // Change keyword in the database
    $oldKeyword = $_POST['old_keyword'];
    $newKeyword = $_POST['new_keyword'];

    $conn->query("UPDATE websites SET title_tag_content = REPLACE(title_tag_content, '$oldKeyword', '$newKeyword')");

    $conn->close();

    // Display a message
    //echo "Keyword '$oldKeyword' has been changed to '$newKeyword'.";

    // Redirect to the "Show Keywords" form
    header("Location: show_keywords_form.php");
    exit();
}
?>
