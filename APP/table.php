<?php
require 'login.php';

$q = "SELECT * FROM flight WHERE from_dttm > '$current_time' ORDER BY from_dttm LIMIT 10";
$result = mysqli_query($con, $q);

echo '<table>' . PHP_EOL;
echo '<th>LET</th>
<th>TO</th>
<th>DEPARTURE</th>
<th>GATE</th>
<th>STATUS</th>'
. PHP_EOL;

$row_count = 0; 
while (($airport = mysqli_fetch_array($result, MYSQLI_ASSOC)) !== null) {
    $row_count++;
   
    $row_class = $row_count % 2 == 0 ? 'even' : 'odd';
    
    
    $status_color = '';
    switch($airport['status']) {
        case 'CANCELED':
            $status_color = 'red';
            break;
        case 'DELAYED':
            $status_color = 'orange';
            break;
        default:
            $status_color = 'green';
    }
    

    $from_dttm = $airport['from_dttm'];
    if ($airport['ifdelayed'] != 0) {
        $from_dttm = date('Y-m-d H:i:s', strtotime($airport['from_dttm'] . ' + ' . $airport['ifdelayed'] . ' minutes'));
    }

    $from_dttm_color = $status_color == 'orange' ? 'orange' : 'white';

    echo '<tr class="' . $row_class . '"><td>' . $airport['code'] .
        '</td></td><td>' . $airport['destination'] .
        '</td><td style="color: ' . $from_dttm_color . ';">' . date('H:i', strtotime($from_dttm)) .
        '</td><td>' . $airport['gate_code'] .
        '</td><td style="color: ' . $status_color . ';">' . $airport['status'];
    
    if ($airport['status'] == 'DELAYED' && $airport['ifdelayed'] != 0) {
        echo ' for ' . $airport['ifdelayed'] . ' minutes';
    }
    
    echo '</td></tr>' . PHP_EOL;
}

if ($row_count === 0) {
    echo '<tr><td colspan="6">Žádné lety nejsou naplánovány v budoucnu.</td></tr>';
}

echo '</table>' . PHP_EOL;
?>