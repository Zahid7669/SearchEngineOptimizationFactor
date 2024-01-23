<!DOCTYPE html>
<html>
<?php 
    include 'header.php';
    ?>
<head>
    <title>Remove Unnecessary Words</title>
</head>
<body>
    <h2>Remove Unnecessary Words</h2>
    <form action="remove_words.php" method="post">
        <label for="unnecessary_words">Enter Unnecessary Words (semi-colon-separated):</label>
        <input type="text" name="unnecessary_words" required><br>

        <input type="submit" value="Remove Words">
    </form>

    <h2>Updated Keywords</h2>
    <?php include 'show_updated_keywords.php'; ?>

    <h2>Unnecessary Words</h2>
    <?php include 'show_unnecessary_words.php'; ?>
</body>
</html>
