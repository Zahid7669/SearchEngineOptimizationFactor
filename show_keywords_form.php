<!DOCTYPE html>
<html>
<?php 
    include 'header.php';
    ?>
<head>
    <title>Show Keywords</title>
</head>
<body>
    <h2>Keywords and Occurrences</h2>
    <?php include 'show_keywords.php'; ?>

    <h2>Change Keyword</h2>
    <form action="change_keyword.php" method="post">
        <label for="old_keyword">Old Keyword:</label>
        <input type="text" name="old_keyword" required><br>

        <label for="new_keyword">New Keyword:</label>
        <input type="text" name="new_keyword" required><br>

        <input type="submit" value="Change Keyword">
    </form>
</body>
</html>
