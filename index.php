<!DOCTYPE html>
<html lang="cz">

<head>
    <title>AIRPORT</title>
    <meta charset="UTF-8" />
    <meta name="author" content="Marek Štolz">
    <meta name="description" content="Information table for airport" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link id="link-style" rel="stylesheet" href="../INF/CSS/styles.css?v=4" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <header>
        <div class="nadpis">AIRPORT</div>
        <div id="cas" class="cas"></div>
    </header>
    <script src="../INF/SCRIPT/refresh.js"></script>
    <script src="../INF/SCRIPT/time.js"></script>
    <div id="flight-table">
        <?php include '../INF/APP/table.php'; 
    ?>
    </div>

</body>

</html>