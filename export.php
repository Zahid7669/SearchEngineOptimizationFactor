<!DOCTYPE html>
<html>

<?php 
include 'header.php';
?>

<head>
    <title>Export Report</title>
</head>

<body>
    <h2>Export Report</h2>

    <form action="export_to_xml.php" method="post">
        <input type="submit" value="Export to XML">
    </form>

    <form action="export_to_json.php" method="post">
        <input type="submit" value="Export to JSON">
    </form>

    <form action="export_to_excel.php" method="post">
        <input type="submit" value="Export to Excel (CSV)">
    </form>
</body>

</html>
