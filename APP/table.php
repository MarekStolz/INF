<?php
$con = @mysqli_connect("localhost", "root", "", "lety", "3306");
if ($con === false) {
    die("D8 error");
}
mb_internal_encoding('UTF-8');
mysqli_query($con, "SET CHARACTER SET UTF8");

$current_time = date('Y-m-d H:i:s');

$q = "SELECT * FROM flight WHERE from_dttm > '$current_time' ORDER BY from_dttm LIMIT 8";
$result = mysqli_query($con, $q);

echo '<table>' . PHP_EOL;
echo '<th>LET</th>
<th>DESTINACE</th>
<th>ODLET</th>
<th>PRILET</th>
<th>BRANA</th>
<th>STATUS</th>'
. PHP_EOL;

$row_count = 0; // nastavení počáteční hodnoty pro počítání řádků
while (($airport = mysqli_fetch_array($result, MYSQLI_ASSOC)) !== null) {
    $row_count++;
    // použití ternárního operátoru pro určení třídy řádku
    $row_class = $row_count % 2 == 0 ? 'even' : 'odd';
    
    // přiřazení barvy písma podle hodnoty v 'status'
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
    
    echo '<tr class="' . $row_class . '"><td>' . $airport['code'] .
    '</td></td><td>' . $airport['destination'] .
     '</td><td>' . date('H:i', strtotime($airport['from_dttm'])) .
      '</td><td>' . date('H:i', strtotime($airport['to_dttm'])) .
       '</td><td>' . $airport['gate_code'] .
        '</td><td style="color: ' . $status_color . ';">' . $airport['status'] .
         '</td></tr>' . PHP_EOL;
}

if ($row_count === 0) {
    echo '<tr><td colspan="6">Žádné lety nejsou naplánovány v budoucnu.</td></tr>';
}

echo '</table>' . PHP_EOL;
?>