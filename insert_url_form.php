<!DOCTYPE html>
<html>

<?php 
    include 'header.php';
    ?>
<head>
    <title>Insert URL</title>
</head>
<body>
    <h2>Insert URL</h2>
    <form action="insert_url.php" method="post">
        <label for="url">Enter URL:</label>
        <input type="text" name="url" required><br>

        <input type="submit" value="Insert URL">
    </form>

    <h2>List of Inserted URLs</h2>
    <?php 
    include 'show_urls.php';
    ?>

    <form action="clear_data.php" method="post">
        <input type="submit" value="Clear All Data">
    </form>
</body>
</html>
