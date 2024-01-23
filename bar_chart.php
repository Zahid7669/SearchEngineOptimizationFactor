<!DOCTYPE html>
<html>

<?php
include 'header.php';
?>

<head>
    <title>Keyword Bar Chart</title>
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        #chartContainer {
            width: 60%; /* Adjust the width as needed */
            margin: auto;
        }
    </style>
</head>

<body>
    <h2>Keyword Bar Chart</h2>
    <div id="chartContainer">
        <canvas id="keywordChart" width="300" height="150"></canvas>
    </div>

    <script>
        // Fetch data from the server using AJAX or embed data here
        <?php
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

        // Fetch data from the database
        $result = $conn->query("SELECT keyword, occurrences FROM keywords");

        // Prepare data for JavaScript
        $labels = [];
        $data = [];

        while ($row = $result->fetch_assoc()) {
            $labels[] = $row['keyword'];
            $data[] = $row['occurrences'];
        }

        $conn->close();
        ?>

        var data = {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: 'Occurrences',
                data: <?php echo json_encode($data); ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        // Create a bar chart
        var ctx = document.getElementById('keywordChart').getContext('2d');
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: data,
        });
    </script>
</body>

</html>
