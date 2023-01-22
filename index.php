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
    <?php
    $q = "SELECT * FROM flight";
    $result = mysqli_query($con, $q);
    echo '<table>' . PHP_EOL;
    echo '<th>LET</th><th>ODLET</th><th>PRILET</th><th>DESTINACE</th><th>BRANA</th>' . PHP_EOL;
    while (($airport = mysqli_fetch_array($result, MYSQLI_ASSOC)) !== null) {
        echo '<tr><td>' . $airport['code'] . '</td>' . '</td>' . '<td>' . $airport['from_dttm'] . '</td>' . '<td>' . $airport['to_dttm'] . '</td>' . '<td>' . $airport['to_airport_code'] . '</td>' . '<td>' . $airport['gate_code'] . '</td>' . '</tr>' . PHP_EOL;
    }
    echo '</table>' . PHP_EOL;
    /*
        $airportS = [];
        while (!empty($airportS = mysqli_fetch_array($result, MYSQLI_ASSOC)))
         {
            $airportS[] = [
    'code' => $row['code'],
    'id' => $row['id']        
            ];
}
echo json_encode($airportS);*/
    ?>
</body>

</html>