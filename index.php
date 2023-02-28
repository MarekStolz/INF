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
    <link id="link-style" rel="stylesheet" href="../INF/CSS/stylesd.css" />
</head>

<body>
    <header>
      <div class="nadpis">AIRPORT</div>
        <div id="cas" class="cas"></div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
        $(document).ready(function() {
            setInterval(function() {
                $.ajax({
                    url: "../INF/APP/table.php", // zde je potřeba uvést cestu k PHP skriptu, který vrací aktualizovanou tabulku
                    cache: false,
                    success: function(data) {
                        $('#flight-table').html(
                            data); // nahrazení obsahu tabulky novými daty
                    }
                });
            }, 3000); // interval aktualizace v milisekundách
        });
        </script>
    </header>
    <script src="../INF/SCRIPT/time.js"></script>
    <script src="../INF/SCRIPT/script.js"></script>
    <div id="flight-table">
        <?php include '../INF/APP/table.php'; 
    require '../INF/APP/login.php';
    ?>
    </div>
   
</body>

</html>