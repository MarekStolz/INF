<?php
$con = @mysqli_connect("localhost", "root", "", "airport", "3306");
if ($con === false) {
    die("D8 error");
}
mb_internal_encoding('UTF-8');
mysqli_query($con, "SET CHARACTER SET UTF8");

?>
<!DOCTYPE html>
<html lang="cz">

<head>
    <title>PHP-SQL</title>
    <meta charset="UTF-8" />
    <meta name="author" content="Marek Štolz">
    <meta name="description" content="Databáze s letu" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link id="link-style" rel="stylesheet" href="style.css" />
</head>

<body>
    <header>PRAGUE-AIRPORT</header>
    <script src="script.js"></script>
    <?php include 'table.php';?>
</body>

</html>