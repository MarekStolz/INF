<?php
require '../INF/APP/login.php';
?>
<!DOCTYPE html>
<html lang="cz">

<head>
    <title>AIRPORT</title>
    <meta charset="UTF-8" />
    <meta name="author" content="Marek Štolz">
    <meta name="description" content="Information table for airport" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link id="link-style" rel="stylesheet" href="styles.css" />
</head>

<body>
    <header>AIRPORT</header>
    <div id="cas" class="cas"></div>
    <script src="../INF/SCRIPT/time.js"></script>
    <script src="../INF/SCRIPT/script.js"></script>
    <?php include '../INF/APP/table.php';?>
</body>

</html>