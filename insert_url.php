<?php
// insert_url.php
// Function to get the title of a web page
function get_title($url) {
    try {
        $html = file_get_contents($url);
        $dom = new DOMDocument;
        @$dom->loadHTML($html);
        $title = $dom->getElementsByTagName('title')->item(0)->nodeValue;
        //echo "$title <br>";
        return $title ? trim($title) : null;
    } catch (Exception $e) {
        echo "Error fetching title from $url: " . $e->getMessage();
        return null;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to MySQL database
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

    // Insert URL into the database
    $url = $_POST['url'];

    // Fetch HTML content of the URL
    $title = get_title($url);

    // Extract content between <title> and </title> tags using regular expression
    // preg_match("/<title>(.*?)<\/title>/i", $htmlContent, $matches);
    // $titleTagContent = isset($matches[1]) ? $matches[1] : '';

    // Insert URL and title tag content into the database
    $sql = "INSERT INTO websites (url, title_tag_content) VALUES ('$url', '$title')";
    $conn->query($sql);

    $conn->close();

    // Redirect to the "Show Keywords" form
    header("Location: insert_url_form.php");
    exit();

}
?>
