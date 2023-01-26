<?php
    $q = "SELECT * FROM flight";
    $result = mysqli_query($con, $q);
    echo '<table>' . PHP_EOL;
    echo '<th>LET</th><th>ODLET</th><th>PRILET</th><th>DESTINACE</th><th>BRANA</th>' . PHP_EOL;
    while (($airport = mysqli_fetch_array($result, MYSQLI_ASSOC)) !== null) {
        echo '<tr><td>' . $airport['code'] . '</td>' . '</td>' . '<td>' . $airport['from_dttm'] . '</td>' . '<td>' . $airport['to_dttm'] . '</td>' . '<td>' . $airport['to_airport_code'] . '</td>' . '<td>' . $airport['gate_code'] . '</td>' . '</tr>' . PHP_EOL;
    }
    echo '</table>' . PHP_EOL;
    ?>