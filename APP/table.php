<?php
require 'api.php';

$json = file_get_contents('../JSON/flights.json');
$data = json_decode($json, true);

echo '<table>' . PHP_EOL;
echo '<tr><th>FLIGHT</th>
<th>TO</th>
<th>DEPARTURE</th>
<th>GATE</th>
<th>STATUS</th></tr>'
. PHP_EOL;

foreach ($data as $airport) {     
       
    $status_color = '';
    switch($airport['status']) {
        case 'CANCELED':
            $status_color = 'red';
            break;
        case 'DELAYED':
            $status_color = 'orange';
            break;
        case 'DEPARTED':
            $status_color = 'green';
            break;
        default:
            $status_color = 'white';
    }
    
    $previous_date = 0;
    if ($airport['from_dttm'] !== $previous_date) {
        $previous_date = $airport['from_dttm'];
        
        
        if ($airport['ifdelayed'] != 0) {
            $delay_in_minutes = $airport['ifdelayed'];
            $delay_in_seconds = $delay_in_minutes * 60;
            $delayed_timestamp = strtotime($airport['from_dttm']) + $delay_in_seconds;
            $from_dttm = date('Y-m-d H:i:s', $delayed_timestamp);
        } else {
            $from_dttm = $airport['from_dttm'];
        }
    } else {
        $from_dttm = '';
    }

    if ($airport['status'] == 'DEPARTED') {
        $from_dttm = date('Y-m-d H:i:s', strtotime($from_dttm) + 300);
    }

    $from_dttm_color = $status_color == 'orange' ? 'orange' : 'white';

    echo '<tr><td>' . $airport['code'] .
        '</td><td>' . $airport['destination'] .
        '</td><td style="color: ' . $from_dttm_color . ';">' . date('H:i', strtotime($from_dttm)) .
        '</td><td>' . $airport['gate_code'] .
        '</td><td style="color: ' . $status_color . ';">' . $airport['status'];
    
    if ($airport['status'] == 'DELAYED' && $airport['ifdelayed'] != 0) {
        echo ' for ' . $airport['ifdelayed'] . ' minutes';
    }
    
    echo '</td></tr>' . PHP_EOL;
}

if (empty($data)) {
    echo '<tr><td colspan="6">Žádné lety nejsou naplánovány v budoucnu.</td></tr>';
}

echo '</table>' . PHP_EOL;
?>
