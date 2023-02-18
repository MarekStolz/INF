<?php

    $q = "SELECT * FROM flight ORDER BY from_dttm LIMIT 8";
    $result = mysqli_query($con, $q);
    echo '<table>' . PHP_EOL;
    echo '<th>LET</th>
    <th>DESTINACE</th>
    <th>ODLET</th>
    <th>PRILET</th>
    <th>BRANA</th>
    <th>STATUS</th>'
     . PHP_EOL;
    while (($airport = mysqli_fetch_array($result, MYSQLI_ASSOC)) !== null) {
        echo '<tr><td>' . $airport['code'] .
        '</td></td><td>' . $airport['destination'] .
         '</td><td>' . date('H:i', strtotime($airport['from_dttm'])) .
          '</td><td>' . date('H:i', strtotime($airport['to_dttm'])) .
           '</td><td>' . $airport['gate_code'] .
            '</td><td>' . $airport['status'] .
             '</td></tr>' . PHP_EOL;
    }
    echo '</table>' . PHP_EOL;
    ?>